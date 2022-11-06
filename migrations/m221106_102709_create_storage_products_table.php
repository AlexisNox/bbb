<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%storage_products}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%storages}}`
 * - `{{%products}}`
 */
class m221106_102709_create_storage_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%storage_products}}', [
            'id' => $this->primaryKey(),
            'storage_ID' => $this->integer(7)->notNull(),
            'product_ID' => $this->integer(7)->notNull(),
            'quantity' => $this->integer(7)->notNull()
        ]);

        // creates index for column `storage_ID`
        $this->createIndex(
            '{{%idx-storage_products-storage_ID}}',
            '{{%storage_products}}',
            'storage_ID'
        );

        // add foreign key for table `{{%storages}}`
        $this->addForeignKey(
            '{{%fk-storage_products-storage_ID}}',
            '{{%storage_products}}',
            'storage_ID',
            '{{%storages}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_ID`
        $this->createIndex(
            '{{%idx-storage_products-product_ID}}',
            '{{%storage_products}}',
            'product_ID'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            '{{%fk-storage_products-product_ID}}',
            '{{%storage_products}}',
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
        // drops foreign key for table `{{%storages}}`
        $this->dropForeignKey(
            '{{%fk-storage_products-storage_ID}}',
            '{{%storage_products}}'
        );

        // drops index for column `storage_ID`
        $this->dropIndex(
            '{{%idx-storage_products-storage_ID}}',
            '{{%storage_products}}'
        );

        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            '{{%fk-storage_products-product_ID}}',
            '{{%storage_products}}'
        );

        // drops index for column `product_ID`
        $this->dropIndex(
            '{{%idx-storage_products-product_ID}}',
            '{{%storage_products}}'
        );

        $this->dropTable('{{%storage_products}}');
    }
}
