<?php

namespace frontend\models;

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
class UploadForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['avatar', 'accept', 'attachment_1', 'multiple'], 'required'],
            [['avatar', 'accept', 'attachment_1', 'multiple'], 'string', 'max' => 100],
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
}
