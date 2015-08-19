<?php

use yii\db\Migration;

class m150819_152906_cprj_taskstatus extends Migration
{

    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('cprj_taskstatus', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cprj_taskstatus}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(25) NOT NULL',
                    'description' => 'VARCHAR(120) NOT NULL',
                ], $tableOptions_mysql);
            }
        }
    }

    public function down()
    {
        echo "m150819_152906_cprj_taskstatus cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
