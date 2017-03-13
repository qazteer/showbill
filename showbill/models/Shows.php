<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shows".
 *
 * @property integer $id
 * @property integer $id_event
 * @property string $title
 * @property string $desc
 * @property string $image
 */
class Shows extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shows';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_event', 'title', 'desc', 'image'], 'required'],
            [['id_event'], 'integer'],
            [['title', 'desc', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_event' => 'Id Event',
            'title' => 'Title',
            'desc' => 'Desc',
            'image' => 'Image',
        ];
    }

    public function getEvent(){
        return $this->hasOne(Events::className(), ['id' => 'id_event']);
    }
}
