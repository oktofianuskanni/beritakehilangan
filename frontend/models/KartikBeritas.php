<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $test_id
 * @property string $nama_tes
 */
class KartikBeritas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $file;

    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_tes'], 'required'],
            [['nama_tes'], 'string', 'max' => 100],
            
            [['file'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
            //[['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'test_id' => 'Test ID',
            'nama_tes' => 'Nama Tes',
            'file' => 'Logo',

        ];
    }
}
