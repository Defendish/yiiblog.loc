<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Post}}`.
 */
class m241008_143436_create_Post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Post', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title'=> $this->string(),
            'text'=> $this->text(),
            'post_category_id'=> $this->integer(),
            'status'=> $this->integer(),
            'image'=> $this->string(),
            'created_at'=> $this->integer(),
            'upload_at'=> $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Post}}');
    }
}
