<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "regencies".
 *
 * @property string $regency_id
 * @property string $province_id
 * @property string $name
 *
 * @property Districts[] $districts
 * @property Provinces $province
 */
class Regencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['regency_id', 'province_id', 'name'], 'required'],
            [['regency_id'], 'string', 'max' => 4],
            [['province_id'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinces::className(), 'targetAttribute' => ['province_id' => 'province_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'regency_id' => 'Regency ID',
            'province_id' => 'Province ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(Districts::className(), ['regency_id' => 'regency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Provinces::className(), ['province_id' => 'province_id']);
    }
}
