<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shops_products}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%shops}}`
 * - `{{%products}}`
 */
class m221106_102941_create_shops_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shops_products}}', [
            'id' => $this->primaryKey(),
            'shop_ID' => $this->integer(7)->notNull(),
            'product_ID' => $this->integer(7)->notNull(),
            'quantity' => $this->integer(7)->notNull()
        ]);

        // creates index for column `shop_ID`
        $this->createIndex(
            '{{%idx-shops_products-shop_ID}}',
            '{{%shops_products}}',
            'shop_ID'
        );

        // add foreign key for table `{{%shops}}`
        $this->addForeignKey(
            '{{%fk-shops_products-shop_ID}}',
            '{{%shops_products}}',
            'shop_ID',
            '{{%shops}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_ID`
        $this->createIndex(
            '{{%idx-shops_products-product_ID}}',
            '{{%shops_products}}',
            'product_ID'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            '{{%fk-shops_products-product_ID}}',
            '{{%shops_products}}',
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
        // drops foreign key for table `{{%shops}}`
        $this->dropForeignKey(
            '{{%fk-shops_products-shop_ID}}',
            '{{%shops_products}}'
        );

        // drops index for column `shop_ID`
        $this->dropIndex(
            '{{%idx-shops_products-shop_ID}}',
            '{{%shops_products}}'
        );

        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            '{{%fk-shops_products-product_ID}}',
            '{{%shops_products}}'
        );

        // drops index for column `product_ID`
        $this->dropIndex(
            '{{%idx-shops_products-product_ID}}',
            '{{%shops_products}}'
        );

        $this->dropTable('{{%shops_products}}');
    }
}
