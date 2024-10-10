<?php

namespace app\models;
use common\models\PostStatus;
use Yii;

/**
 * This is the model class for table "Post".
 *
 * @property int $user_id
 * @property string|null $title
 * @property string|null $text
 * @property int|null $post_category_id
 * @property int|null $status
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $upload_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['post_category_id', 'status', 'created_at', 'upload_at'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'title' => 'Title',
            'text' => 'Text',
            'post_category_id' => 'Post Category ID',
            'status' => 'Status',
            'image' => 'Image',
            'created_at' => 'Created At',
            'upload_at' => 'Upload At',
        ];
    }
    public function actionGetStatuses() {
        return [
            'statuses' => PostStatus::getApiList(),
        ];
    }
}
