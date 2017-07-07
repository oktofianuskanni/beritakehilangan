<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property integer $document_id
 * @property integer $berita_id
 * @property string $filename
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Beritas $berita
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['berita_id', 'filename', 'created_at', 'updated_at'], 'required'],
            [['berita_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['filename'], 'string', 'max' => 200],
            [['berita_id'], 'exist', 'skipOnError' => true, 'targetClass' => Beritas::className(), 'targetAttribute' => ['berita_id' => 'berita_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'document_id' => 'Document ID',
            'berita_id' => 'Berita ID',
            'filename' => 'Filename',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBerita()
    {
        return $this->hasOne(Beritas::className(), ['berita_id' => 'berita_id']);
    }
}
