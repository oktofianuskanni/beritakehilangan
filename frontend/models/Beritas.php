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
 *
 * @property User $user
 * @property Category $category
 */
class Beritas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $fileImages;
    public $attachment_1;


    //public $fileImages;
    //public $fileImages;



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
            [['user_id', 'category_id', 'jenis_berita', 'deskripsi_berita', 'tanggal_kejadian', 'no_telp1', 'no_telp2', 'pin_bb', 'email'], 'required'],
            [['user_id', 'category_id', 'hub_email', 'hub_wa', 'province_id', 'regency_id', 'district_id', 'village_id'], 'integer'],
            [['jenis_berita', 'deskripsi_berita', 'status'], 'string'],
            [['tampil_nama','tanggal_kejadian', 'created_at', 'updated_at', 'judul_berita', 'created_at', 'updated_at', 'status', 'province_id', 'regency_id', 'district_id', 'village_id', 'hub_email', 'hub_wa'], 'safe'],
            [['judul_berita'], 'string', 'max' => 30],            
            [['email'], 'email'],
            [['email', 'no_telp1', 'no_telp2', 'pin_bb'], 'string', 'max' => 100],
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
            'user_id' => 'Kehilangan/ Menemukan',
            'category_id' => 'Kategori',
            'jenis_berita' => 'Jenis Berita',
            'judul_berita' => 'Judul Berita',
            'deskripsi_berita' => 'Deskripsi Berita',
            'tanggal_kejadian' => 'Tanggal Kejadian',
            'email' => 'Email',
            'hub_email' => 'Bisa dihubungi lewat email',
            'no_telp1' => 'Telepon',
            'no_telp2' => 'Mobile',
            'pin_bb' => 'Pin Bb',
            'hub_wa' => 'Bisa dihubungi lewat WA',
            'status' => 'Status',
            'province_id' => 'Province ID',
            'regency_id' => 'Regency ID',
            'district_id' => 'District ID',
            'village_id' => 'Village ID',
            'created_at' => 'Tanggal Input',
            'updated_at' => 'Tanggal Berita', //Updated At
            //'tampil_nama' => 'Updated At',


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
