<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdminTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 220, 'null' => false],
            'username' => ['type' => 'VARCHAR', 'constraint' => 220, 'null' => false],
             'password' => ['type' => 'VARCHAR', 'constraint' => 220, 'null' => false],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('username');

        $this->forge->createTable('admin', true, [
            'ENGINE' => 'InnoDB',
            'CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_general_ci',
        ]);

        $this->db->query('ALTER TABLE `admin` ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE `admin` DROP FOREIGN KEY `admin_ibfk_1`');

        $this->forge->dropTable('admin');
    }
}
