<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m210416_125354_create_product_table extends Migration
{
    private const TABLE_PRODUCT = "product";
    private const TABLE_CATEGORY = "category";

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_PRODUCT,             [
            'id'                   => 'pk',
            "title"                => "VARCHAR(255) NOT NULL",
            "description"          => "TEXT",
            "created_at"           => "DATETIME",
            "updated_at"           => "DATETIME",
            "sku"                  => "VARCHAR(25) NOT NULL",
            "category_id"          => "INT(32) NOT NULL",
            "is_deleted"           => "TINYINT(1) NOT NULL DEFAULT 0",
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->addForeignKey('fk_product_category', self::TABLE_PRODUCT, 'category_id', self::TABLE_CATEGORY, 'id', 'CASCADE');

        $this->createIndex("idx_title_product", self::TABLE_PRODUCT, "title");
        $this->createIndex("idx_created_at_product", self::TABLE_PRODUCT, "created_at");
        $this->createIndex("uidx_sku", self::TABLE_PRODUCT, "sku", true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_category', self::TABLE_PRODUCT);
        $this->dropTable(self::TABLE_PRODUCT);
    }
}
