<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%storages}}`.
 */
class m221106_101648_create_storages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('storages', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'adress' => $this->string(255)->notNull(),
            'phone' => $this->string(255)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('storages');
    }
}
