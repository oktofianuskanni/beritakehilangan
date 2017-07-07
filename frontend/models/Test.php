<?php

namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;



use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $test_id
 * @property string $avatar
 * @property string $accept
 * @property string $attachment_1
 * @property string $multiple
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $imageFiles;

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
            //[['avatar', 'accept', 'attachment_1', 'multiple'], 'required'],
            [['avatar', 'accept', 'attachment_1', 'multiple'], 'string', 'max' => 100],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'test_id' => 'Test ID',
            'avatar' => 'Avatar',
            'accept' => 'Accept',
            'attachment_1' => 'Attachment 1',
            'multiple' => 'Multiple',
        ];
    }



    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
