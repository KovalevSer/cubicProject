<?php

use yii\db\Migration;

class m150819_152818_cprj_projects extends Migration
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
        if (!in_array('cprj_projects', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cprj_projects}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(50) NOT NULL',
                    'description' => 'VARCHAR(255) NOT NULL',
                    'status' => 'INT(11) NOT NULL',
                    'created' => 'DATE NOT NULL',
                    'responsible_user' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }
    }

    public function down()
    {
        echo "m150819_152818_cprj_projects cannot be reverted.\n";

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
