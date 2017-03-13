<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "places".
 *
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property string $image
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'places';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'desc', 'image'], 'required'],
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
            'title' => 'Title',
            'desc' => 'Desc',
            'image' => 'Image',
        ];
    }
}
