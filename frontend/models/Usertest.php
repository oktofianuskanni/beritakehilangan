<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $nama_lengkap
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $province_id
 * @property integer $regency_id
 * @property integer $district_id
 * @property integer $village_id
 * @property string $alamat
 * @property string $telephone
 * @property string $mobile_handphone
 * @property string $pin_bb
 * @property integer $status_account
 *
 * @property Beritas[] $beritas
 * @property Provinces $province
 */
class Usertest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'province_id', 'regency_id', 'district_id', 'village_id', 'alamat', 'telephone', 'mobile_handphone', 'pin_bb'], 'required'],
            [['status', 'created_at', 'updated_at', 'regency_id', 'district_id', 'village_id', 'status_account'], 'integer'],
            [['nama_lengkap', 'alamat', 'telephone', 'pin_bb'], 'string', 'max' => 100],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['province_id'], 'string', 'max' => 2],
            [['mobile_handphone'], 'string', 'max' => 30],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinces::className(), 'targetAttribute' => ['province_id' => 'province_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_lengkap' => 'Nama Lengkap',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'province_id' => 'Province ID',
            'regency_id' => 'Regency ID',
            'district_id' => 'District ID',
            'village_id' => 'Village ID',
            'alamat' => 'Alamat',
            'telephone' => 'Telephone',
            'mobile_handphone' => 'Mobile Handphone',
            'pin_bb' => 'Pin Bb',
            'status_account' => 'Status Account',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBeritas()
    {
        return $this->hasMany(Beritas::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Provinces::className(), ['province_id' => 'province_id']);
    }
}
