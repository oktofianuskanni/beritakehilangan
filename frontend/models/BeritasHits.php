<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "beritas_hits".
 *
 * @property integer $beritas_hits_id
 * @property integer $berita_id
 * @property integer $hits
 * @property string $created_at
 * @property string $updated_at
 */
class BeritasHits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'beritas_hits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['berita_id', 'hits', 'created_at', 'updated_at'], 'required'],
            [['berita_id', 'hits'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'beritas_hits_id' => Yii::t('app', 'Beritas Hits ID'),
            'berita_id' => Yii::t('app', 'Berita ID'),
            'hits' => Yii::t('app', 'Hits'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
