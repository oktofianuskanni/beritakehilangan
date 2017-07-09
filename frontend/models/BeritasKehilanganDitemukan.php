<?php

namespace frontend\models;

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
 * @property string $created_at
 * @property string $updated_at
 * @property string $tampilkan_alamatlengkap
 * @property string $tampilkan_notelp2
 * @property string $tampilkan_notelp1 
 * @property string $alamat
 *
 * @property User $user
 * @property Category $category
 */
class BeritasKehilanganDitemukan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

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
            [['category_id', 'jenis_berita', 'deskripsi_berita', 'email', 'no_telp2', 'judul_berita'], 'required'],
            [['user_id', 'category_id', 'hub_email', 'hub_wa', 'province_id', 'regency_id', 'district_id', 'village_id'], 'integer'],
            [['status_ditemukan','hub_pin_bb','alamat','tampilkan_alamatlengkap','tampilkan_notelp2','tampilkan_notelp1','jenis_berita', 'deskripsi_berita', 'status'], 'string'],
            [['tanggal_kejadian', 'tampil_nama','status_ditemukan','hub_pin_bb','alamat','tampilkan_alamatlengkap','tampilkan_notelp2','tampilkan_notelp1','tanggal_kejadian', 'created_at', 'updated_at', 'status', 'province_id', 'regency_id', 'district_id', 'village_id', 'created_at', 'updated_at', 'user_id', 'hub_wa', 'hub_email', 'no_telp1', 'pin_bb'], 'safe'],
            //[['judul_berita'], 'string', 'max' => 50],

            //[['judul_berita'], 'string', 'min' => 25],

            [['email', 'no_telp1', 'no_telp2', 'pin_bb'], 'string', 'max' => 100],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['file'], 'file', 'extensions' => 'png, jpg'],

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
            'hub_email' => 'Bisa hubungi saya lewat Email',
            'no_telp1' => 'Telephone PSTN',
            'no_telp2' => 'Mobile Handphone',
            'pin_bb' => 'Pin Bb',
            'hub_wa' => 'Bisa bubungi saya lewat WA',
            'status' => 'Berita di tampilkan ke Publik?',
            'province_id' => 'Province ID',
            'regency_id' => 'Regency ID',
            'district_id' => 'District ID',
            'village_id' => 'Village ID',
            'created_at' => 'Created At',
            'updated_at' => 'Tanggal Berita', //Updated At
            'tampilkan_notelp1' => 'Tampilkan telepon ke halaman utama',
            'tampilkan_notelp2' => 'Tampilkan mobile ke halaman utama',
            'tampilkan_alamatlengkap' => 'Tampilkan alamat ke halaman utama',            
            'alamat' => 'alamat',            
            'hub_pin_bb' => 'Bisa hubungi saya lewat BBM',
            'status_ditemukan' => 'Status saat ini?',
            'tampil_nama' => 'Tampilkan nama ke halaman utama',
            'file' => 'Upload foto *.jpg/png',







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
        return $this->hasOne(Documents::className(), ['berita_id' => 'berita_id']);
    }
}
