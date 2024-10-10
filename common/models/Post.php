<?php

namespace common\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use Yii;

/**
 * This is the model class for table "Post".
 * @property int $id
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
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 10;
    const STATUS_REJECTED = 20;
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
    public function rules() {
        return [
            [['title', 'user_id', 'text', 'post_category_id', 'status'], 'required'], // Обязательные поля
            ['title', 'string', 'max' => 255], // Максимальная длина для заголовка
            ['text', 'string'], // Проверка на строку для текста
            ['user_id', 'integer'], // Проверка на целое число для категории
            ['post_category_id', 'integer'], // Проверка на целое число для категории
            ['status', 'integer'], // Проверка на целое число для статуса
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор'),
            'user_id' => Yii::t('app', 'ID пользователя'),
            'title' => Yii::t('app', 'Заголовок'),
            'text' => Yii::t('app', 'Текст'),
            'post_category_id' => Yii::t('app', 'Категория поста'),
            'status' => Yii::t('app', 'Статус'),
            'image' => Yii::t('app', 'Изображение'),
            'created_at' => Yii::t('app', 'Дата создания'),
            'upload_at' => Yii::t('app', 'Дата обновления'),
        ];
    }
    public function getStatusText() {
        return PostStatus::getText($this->status);
    }
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'upload_at',
                'value' => time(), // Используем NOW() для установки текущего времени
            ],
        ];
    }
    public function getCreatedAtFormatted() {
        return date('Y-m-d H:i:s', $this->created_at);
    }

    public function getUploadAtFormatted() {
        return date('Y-m-d H:i:s', $this->upload_at);
    }
    public static function getStatusLabels() {
        return [
            self::STATUS_DRAFT => Yii::t('app', 'Новый'),
            self::STATUS_PUBLISHED => Yii::t('app', 'Опубликован'),
            self::STATUS_REJECTED => Yii::t('app', 'Отклонен'),
        ];
    }

    public function getCategoryName() {
        // Предполагается, что у вас есть модель Category
        $category = PostCategory::findOne($this->post_category_id);
        return $category ? $category->Название : Yii::t('app', 'Неизвестная категория');
    }

    public function getStatusName() {
        $statusLabels = self::getStatusLabels();
        return isset($statusLabels[$this->status]) ? $statusLabels[$this->status] : Yii::t('app', 'Неизвестный статус');
    }


}
