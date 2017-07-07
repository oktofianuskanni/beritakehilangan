<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "beritas".
 *
 * @property integer $berita_id
 * @property integer $user_id
 * @property integer $category_id
 * @property string $jenis_berita
 * @property string $judul_berita
 * @property string $deskripsi_berita
 * @property string $tanggal_kejadian
 * @property string $email
 * @property integer $hub_email
 * @property string $no_telp1
 * @property string $no_telp2
 * @property string $pin_bb
 * @property integer $hub_wa
 * @property string $status
 * @property integer $province_id
 * @property integer $regency_id
 * @property integer $district_id
 * @property integer $village_id
 * @property string $alamat
 * @property string $created_at
 * @property string $updated_at
 * @property string $tampilkan_alamatlengkap
 * @property string $tampilkan_notelp1
 * @property string $tampilkan_notelp2
 * @property string $hub_pin_bb
 * @property string $status_ditemukan
 * @property string $tampil_nama
 *
 * @property User $user
 * @property Category $category
 * @property Documents[] $documents
 */
class Beritas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beritas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'jenis_berita', 'judul_berita', 'deskripsi_berita', 'tanggal_kejadian', 'email', 'hub_email', 'no_telp1', 'no_telp2', 'pin_bb', 'hub_wa', 'status', 'regency_id', 'district_id', 'village_id', 'alamat', 'created_at', 'updated_at', 'tampilkan_alamatlengkap', 'tampilkan_notelp1', 'tampilkan_notelp2', 'hub_pin_bb', 'status_ditemukan', 'tampil_nama'], 'required'],
            [['user_id', 'category_id', 'hub_email', 'hub_wa', 'province_id', 'regency_id', 'district_id', 'village_id'], 'integer'],
            [['jenis_berita', 'deskripsi_berita', 'status'], 'string'],
            [['tanggal_kejadian', 'created_at', 'updated_at'], 'safe'],
            [['judul_berita'], 'string', 'max' => 50],
            [['email', 'no_telp1', 'no_telp2', 'pin_bb', 'tampilkan_alamatlengkap'], 'string', 'max' => 100],
            [['alamat'], 'string', 'max' => 200],
            [['tampilkan_notelp1', 'tampilkan_notelp2', 'hub_pin_bb', 'status_ditemukan', 'tampil_nama'], 'string', 'max' => 1],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'berita_id' => 'Berita ID',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'jenis_berita' => 'Jenis Berita',
            'judul_berita' => 'Judul Berita',
            'deskripsi_berita' => 'Deskripsi Berita',
            'tanggal_kejadian' => 'Tanggal Kejadian',
            'email' => 'Email',
            'hub_email' => 'Hub Email',
            'no_telp1' => 'No Telp1',
            'no_telp2' => 'No Telp2',
            'pin_bb' => 'Pin Bb',
            'hub_wa' => 'Hub Wa',
            'status' => 'Status',
            'province_id' => 'Province ID',
            'regency_id' => 'Regency ID',
            'district_id' => 'District ID',
            'village_id' => 'Village ID',
            'alamat' => 'Alamat',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'tampilkan_alamatlengkap' => 'Tampilkan Alamatlengkap',
            'tampilkan_notelp1' => 'Tampilkan Notelp1',
            'tampilkan_notelp2' => 'Tampilkan Notelp2',
            'hub_pin_bb' => 'Hub Pin Bb',
            'status_ditemukan' => 'Status Ditemukan',
            'tampil_nama' => 'Tampil Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocuments()
    {
        return $this->hasMany(Documents::className(), ['berita_id' => 'berita_id']);
    }
}
