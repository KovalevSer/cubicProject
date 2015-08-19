<?php

use yii\db\Migration;

class m150819_152850_cprj_tasks extends Migration
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
        if (!in_array('cprj_tasks', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%cprj_tasks}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'projectID' => 'INT(11) NOT NULL',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'status' => 'INT(11) NOT NULL',
                    'priority' => 'INT(11) NOT NULL',
                    'description' => 'TEXT NOT NULL',
                    'parentTask' => 'INT(11) NOT NULL',
                    'waitListID' => 'INT(11) NOT NULL',
                    'progress' => 'INT(11) NOT NULL',
                    'created' => 'DATETIME NOT NULL',
                    'startDate' => 'DATETIME NOT NULL',
                    'finishDate' => 'DATETIME NOT NULL',
                    'authorID' => 'INT(11) NOT NULL',
                    'responsibleID' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }
    }

    public function down()
    {
        echo "m150819_152850_cprj_tasks cannot be reverted.\n";

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
