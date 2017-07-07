<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Villages;

/**
 * VillagesSearch represents the model behind the search form about `backend\models\Villages`.
 */
class VillagesSearch extends Villages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['village_id', 'district_id', 'name'], 'safe'],
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
        $query = Villages::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $query->joinWith('district');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'village_id', $this->village_id])
            ->andFilterWhere(['like', 'districts.name', $this->district_id])
            ->andFilterWhere(['like', 'villages.name', $this->name]);

        return $dataProvider;
    }
}
