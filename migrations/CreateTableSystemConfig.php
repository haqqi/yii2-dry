<?php

namespace haqqi\dry\migrations;

use haqqi\dry\base\Migration;
use haqqi\dry\models\SystemConfig;

/**
 * Class CreateTableSystemConfig
 * @package haqqi\dry\migrations
 *
 * Usage: extend this class with your own migration
 */
class CreateTableSystemConfig extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(SystemConfig::tableName(), [
            'id'        => $this->string(36)->notNull(),
            'key'       => $this->string(255)->notNull()->unique(),
            'value'     => $this->text(),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime()
        ], $this->tableOptions);

        $this->addPrimaryKey('id', SystemConfig::tableName(), ['id']);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable(SystemConfig::tableName());
    }
}