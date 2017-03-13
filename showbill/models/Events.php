<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property integer $id
 * @property integer $id_place
 * @property string $date
 * @property string $image
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_place', 'date', 'image'], 'required'],
            [['id_place'], 'integer'],
            [['date', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_place' => 'Id Place',
            'date' => 'Date',
            'image' => 'Image',
        ];
    }

    public function getPlaces(){
        return $this->hasOne(Places::className(), ['id' => 'id_place']);
    }

    public function getShow(){
        return $this->hasOne(Shows::className(), ['id_event' => 'id']);
    }
}
