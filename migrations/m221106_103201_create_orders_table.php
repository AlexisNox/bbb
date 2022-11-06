<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%consumer}}`
 * - `{{%products}}`
 * - `{{%shops}}`
 */
class m221106_103201_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'consumer_ID' => $this->integer(7)->notNull(),
            'product_ID' => $this->integer(7)->notNull(),
            'shops_ID' => $this->integer(7)->notNull(),
            'order_date' => $this->dateTime(),
        ]);

        // creates index for column `consumer_ID`
        $this->createIndex(
            'idx-orders-consumer_ID',
            'orders',
            'consumer_ID'
        );

        // add foreign key for table `{{%consumer}}`
        $this->addForeignKey(
            'fk-orders-consumer_ID',
            'orders',
            'consumer_ID',
            'consumer',
            'id',
            'CASCADE'
        );

        // creates index for column `product_ID`
        $this->createIndex(
            'idx-orders-product_ID',
            'orders',
            'product_ID'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            'fk-orders-product_ID',
            'orders',
            'product_ID',
            'products',
            'id',
            'CASCADE'
        );

        // creates index for column `shops_ID`
        $this->createIndex(
            'idx-orders-shops_ID',
            'orders',
            'shops_ID'
        );

        // add foreign key for table `{{%shops}}`
        $this->addForeignKey(
            'fk-orders-shops_ID',
            'orders',
            'shops_ID',
            'shops',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%consumer}}`
        $this->dropForeignKey(
            'fk-orders-consumer_ID',
            'orders'
        );

        // drops index for column `consumer_ID`
        $this->dropIndex(
            'idx-orders-consumer_ID',
            'orders'
        );

        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            'fk-orders-product_ID',
            'orders'
        );

        // drops index for column `product_ID`
        $this->dropIndex(
            'idx-orders-product_ID',
            'orders'
        );

        // drops foreign key for table `{{%shops}}`
        $this->dropForeignKey(
            'fk-orders-shops_ID',
            'orders'
        );

        // drops index for column `shops_ID`
        $this->dropIndex(
            'idx-orders-shops_ID',
            'orders'
        );

        $this->dropTable('orders');
    }
}
