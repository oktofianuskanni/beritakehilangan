<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $name
 * @property integer $gender
 * @property string $born
 * @property string $email
 * @property string $phone
 * @property string $address
 */
class Generate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'born', 'email', 'phone', 'address'], 'required'],
            [['gender'], 'integer'],
            [['born'], 'safe'],
            [['name', 'email'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 25],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'gender' => Yii::t('app', 'Gender'),
            'born' => Yii::t('app', 'Born'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
        ];
    }
}
