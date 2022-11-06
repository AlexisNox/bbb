<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m221106_093901_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
