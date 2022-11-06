<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%consumer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m221106_101804_create_consumer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('consumer', [
            'id' => $this->primaryKey(),
            'Full_name' => $this->string(255)->notNull(),
            'phone' => $this->string(255)->notNull(),
            'mail' => $this->string(255)->notNull(),
            'user_ID' => $this->integer(7)->notNull(),
        ]);

        $this->createIndex(
            '{{%idx-consumer-user_ID}}',
            '{{%consumer}}',
            'user_ID'
        );

        $this->addForeignKey(
            'fk-consumer-user_ID',
            'consumer',
            'user_ID',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-consumer-user_ID}}',
            '{{%consumer}}'
        );

        // drops index for column `user_ID`
        $this->dropIndex(
            '{{%idx-consumer-user_ID}}',
            '{{%consumer}}'
        );

        $this->dropTable('{{%consumer}}');
    }
}
