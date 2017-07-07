<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Beritas;

/**
 * ListSearch represents the model behind the search form about `frontend\models\Beritas`.
 */
class ListSearch extends Beritas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['berita_id', 'user_id', 'category_id', 'hub_email', 'hub_wa', 'province_id', 'regency_id', 'district_id', 'village_id'], 'integer'],
            [['jenis_berita', 'judul_berita', 'deskripsi_berita', 'tanggal_kejadian', 'email', 'no_telp1', 'no_telp2', 'pin_bb', 'status', 'alamat', 'created_at', 'updated_at', 'tampilkan_alamatlengkap', 'tampilkan_notelp1', 'tampilkan_notelp2', 'hub_pin_bb', 'status_ditemukan', 'tampil_nama'], 'safe'],
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
            'hub_email' => $this->hub_email,
            'hub_wa' => $this->hub_wa,
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
            ->andFilterWhere(['like', 'no_telp1', $this->no_telp1])
            ->andFilterWhere(['like', 'no_telp2', $this->no_telp2])
            ->andFilterWhere(['like', 'pin_bb', $this->pin_bb])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'tampilkan_alamatlengkap', $this->tampilkan_alamatlengkap])
            ->andFilterWhere(['like', 'tampilkan_notelp1', $this->tampilkan_notelp1])
            ->andFilterWhere(['like', 'tampilkan_notelp2', $this->tampilkan_notelp2])
            ->andFilterWhere(['like', 'hub_pin_bb', $this->hub_pin_bb])
            ->andFilterWhere(['like', 'status_ditemukan', $this->status_ditemukan])
            ->andFilterWhere(['like', 'tampil_nama', $this->tampil_nama]);

        return $dataProvider;
    }
}
