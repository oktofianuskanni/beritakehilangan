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

    public $globalSearch;

    public function rules()
    {
        return [
            [['berita_id', 'hub_email', 'hub_wa', 'province_id', 'regency_id', 'district_id', 'village_id'], 'integer'],
            [['globalSearch','tampil_nama','jenis_berita', 'judul_berita', 'deskripsi_berita', 'tanggal_kejadian', 'email', 'no_telp1', 'no_telp2', 'pin_bb', 'status', 'created_at', 'updated_at', 'user_id', 'category_id'], 'safe'],
        ];
    }

        public function attributeLabels()
    {
        return [
            'globalSearch' => '',
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


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);
        // add conditions that should always apply here

/*        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);*/

        $this->load($params);



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('category');
        $query->joinWith('user');


        $query
            //->andFilterWhere(['like', 'user.nama_lengkap', $this->user_id])
            ->orFilterWhere(['like', 'jenis_berita', $this->globalSearch])
            ->orFilterWhere(['like', 'category.category_name', $this->globalSearch])
            ->orFilterWhere(['like', 'judul_berita', $this->globalSearch])
            ->orFilterWhere(['like', 'deskripsi_berita', $this->globalSearch]);
            //->andFilterWhere(['like', 'email', $this->email])
            //->andFilterWhere(['like', 'no_telp1', $this->no_telp1])
            //->andFilterWhere(['like', 'no_telp2', $this->no_telp2])
            //->andFilterWhere(['like', 'pin_bb', $this->pin_bb])
            //->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
