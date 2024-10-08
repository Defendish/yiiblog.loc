<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%PostCategory}}`.
 */
class m241008_141712_create_PostCategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('PostCategory', [
            'id' => $this->primaryKey(), // Определение первичного ключа id
            'Название' => $this->string(255)->notNull(), // Поле для названия категории
        ]);

        // Вставка начальных данных
        $this->batchInsert('PostCategory', ['Название'], [
            ['Спорт'],
            ['Еда'],
            ['Фото'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('PostCategory');
    }
}
