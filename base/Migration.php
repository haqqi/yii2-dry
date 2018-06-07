<?php

namespace haqqi\dry\base;

class Migration extends \yii\db\Migration
{
    /**
     * @var string
     */
    protected $tableOptions;

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();

        // switch based on driver name
        switch ($this->getDb()->driverName) {
            case 'mysql':
                $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                break;
            case 'pgsql':
                $this->tableOptions = null;
                break;
            default:
                throw new \RuntimeException('Your database is not supported!');
        }
    }

    public function formatForeignKeyName($tableNameForeign, $tableNamePrimary) {
        $tableNameForeign = trim($tableNameForeign, '{}');
        $tableNameForeign = str_replace('%', '', $tableNameForeign);
        $tableNamePrimary = trim($tableNamePrimary, '{}');
        $tableNamePrimary = str_replace('%', '', $tableNamePrimary);

        return 'fk_' . $tableNameForeign . '_' . $tableNamePrimary;
    }
}