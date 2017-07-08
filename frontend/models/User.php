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
 * @property integer $province_id
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
 */
class User extends \yii\db\ActiveRecord
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
            [['nama_lengkap', 'email',  'mobile_handphone','province_id', 'regency_id', 'alamat'], 'required'],
            [['username','auth_key', 'password_hash','created_at', 'updated_at', 'district_id','pin_bb','village_id', 'telephone'],'safe'],
            [['created_at','mobile_handphone','status', 'province_id', 'regency_id', 'district_id', 'village_id', 'status_account'], 'integer'],
            [['nama_lengkap', 'alamat', 'telephone', 'pin_bb'], 'string', 'max' => 100],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            //[['mobile_handphone'], 'integer', 'max' => 12],
            [['auth_key'], 'string', 'max' => 32],
            [['updated_at'], 'string', 'max' => 30],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
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
            'mobile_handphone' => 'Mobile Handphone *) 08xx',
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
}
