<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m221106_100631_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'title' => $this->string(11),
            'category_ID' => $this->integer(7)->notNull(),
        ]);

    
        $this->createIndex(
            'idx-products-category_ID',
            'products',
            'category_ID'
        );

        $this->addForeignKey(
            'fk-products-category_ID',
            'products',
            'category_ID',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            'fk-products-category_ID',
            'products'
        );

        // drops index for column `category_ID`
        $this->dropIndex(
            'idx-products-category_ID',
            'products'
        );

        $this->dropTable('{{%products}}');
    }
}
