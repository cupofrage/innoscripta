<?php

use yii\db\Migration;

/**
 * Class m210416_124442_init_migrate
 */
class m210416_124442_init_migrate extends Migration
{
    private const TABLE_CATEGORY = "category";
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(self::TABLE_CATEGORY,             [
            'id'                   => 'pk',
            "title"                => "VARCHAR(255) NOT NULL",
            "description"          => "TEXT",
            "created_at"           => "DATETIME",
            "updated_at"           => "DATETIME",
            "is_deleted"           => "TINYINT(1) NOT NULL DEFAULT 0",
        ], 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->createIndex("idx_title_category", self::TABLE_CATEGORY, "title");
        $this->createIndex("idx_created_at_category", self::TABLE_CATEGORY, "created_at");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_CATEGORY);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210416_124442_init_migrate cannot be reverted.\n";

        return false;
    }
    */
}
