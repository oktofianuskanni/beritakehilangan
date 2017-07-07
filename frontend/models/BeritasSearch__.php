<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Beritas;

/**
 * BeritasSearch represents the model behind the search form about `frontend\models\Beritas`.
 */
class BeritasSearch extends Beritas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['berita_id', 'user_id', 'category_id', 'province_id', 'regency_id', 'district_id', 'village_id'], 'integer'],
            [['jenis_berita', 'judul_berita', 'deskripsi_berita', 'tanggal_kejadian', 'email', 'hub_email', 'no_telp1', 'no_telp2', 'pin_bb', 'hub_wa', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = Beritas::find();

        //$query->select(['berita_id', 'user_id']);

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
        $query->andFilterWhere([
            'berita_id' => $this->berita_id,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'tanggal_kejadian' => $this->tanggal_kejadian,
            'province_id' => $this->province_id,
            'regency_id' => $this->regency_id,
            'district_id' => $this->district_id,
            'village_id' => $this->village_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'jenis_berita', $this->jenis_berita])
            ->andFilterWhere(['like', 'judul_berita', $this->judul_berita])
            ->andFilterWhere(['like', 'deskripsi_berita', $this->deskripsi_berita])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'hub_email', $this->hub_email])
            ->andFilterWhere(['like', 'no_telp1', $this->no_telp1])
            ->andFilterWhere(['like', 'no_telp2', $this->no_telp2])
            ->andFilterWhere(['like', 'pin_bb', $this->pin_bb])
            ->andFilterWhere(['like', 'hub_wa', $this->hub_wa])
            ->andFilterWhere(['like', 'status', $this->status]);

       // $query->andFilterCompare('jenis_berita', 'Ditemukan');

        return $dataProvider;
    }
}
