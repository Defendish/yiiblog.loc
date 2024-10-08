<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "PostCategory".
 *
 * @property int $id
 * @property string $Название
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PostCategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Название'], 'required'],
            [['Название'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Название' => 'Название',
        ];
    }
}
