<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Districts;

/**
 * DistrictsSearch represents the model behind the search form about `frontend\models\Districts`.
 */
class DistrictsSearch extends Districts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district_id', 'regency_id', 'name'], 'safe'],
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
        $query = Districts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'district_id', $this->district_id])
            ->andFilterWhere(['like', 'regency_id', $this->regency_id])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}