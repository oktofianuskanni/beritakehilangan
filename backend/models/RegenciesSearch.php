<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Regencies;

/**
 * RegenciesSearch represents the model behind the search form about `backend\models\Regencies`.
 */
class RegenciesSearch extends Regencies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regency_id', 'province_id', 'name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Regencies::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->joinWith('province');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'regency_id', $this->regency_id])
            ->andFilterWhere(['like', 'provinces.name', $this->province_id])
            ->andFilterWhere(['like', 'regencies.name', $this->name]);

        return $dataProvider;
    }
}
