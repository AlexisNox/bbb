<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%delivery_catalog}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%delivery}}`
 * - `{{%products}}`
 */
class m221106_102556_create_delivery_catalog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%delivery_catalog}}', [
            'id' => $this->primaryKey(),
            'delivery_ID' => $this->integer(7)->notNull(),
            'product_ID' => $this->integer(7)->notNull(),
            'quantity' => $this->integer(7)->notNull()
        ]);

        // creates index for column `delivery_ID`
        $this->createIndex(
            '{{%idx-delivery_catalog-delivery_ID}}',
            '{{%delivery_catalog}}',
            'delivery_ID'
        );

        // add foreign key for table `{{%delivery}}`
        $this->addForeignKey(
            '{{%fk-delivery_catalog-delivery_ID}}',
            '{{%delivery_catalog}}',
            'delivery_ID',
            '{{%delivery}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_ID`
        $this->createIndex(
            '{{%idx-delivery_catalog-product_ID}}',
            '{{%delivery_catalog}}',
            'product_ID'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            '{{%fk-delivery_catalog-product_ID}}',
            '{{%delivery_catalog}}',
            'product_ID',
            '{{%products}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%delivery}}`
        $this->dropForeignKey(
            '{{%fk-delivery_catalog-delivery_ID}}',
            '{{%delivery_catalog}}'
        );

        // drops index for column `delivery_ID`
        $this->dropIndex(
            '{{%idx-delivery_catalog-delivery_ID}}',
            '{{%delivery_catalog}}'
        );

        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            '{{%fk-delivery_catalog-product_ID}}',
            '{{%delivery_catalog}}'
        );

        // drops index for column `product_ID`
        $this->dropIndex(
            '{{%idx-delivery_catalog-product_ID}}',
            '{{%delivery_catalog}}'
        );

        $this->dropTable('{{%delivery_catalog}}');
    }
}
