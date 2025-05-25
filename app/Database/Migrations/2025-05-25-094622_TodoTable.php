<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TodoTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true,],
            'user_id' => ['type' => 'INT', 'unsigned' => true,],
            'title' => ['type' => 'VARCHAR', 'constraint' => 220, 'null' => false,],
            'description' => ['type' => 'TEXT', 'null' => false],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'Pending',],
            'created_at' => ['type'    => 'TIMESTAMP', 'null'    => false, 'default' => new RawSql('CURRENT_TIMESTAMP'),],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');

        $this->forge->createTable('todo', true, [
            'ENGINE' => 'InnoDB',
            'CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_general_ci',
        ]);

         $this->db->query('ALTER TABLE `todo` ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE `todo` DROP FOREIGN KEY `todo_ibfk_1`');

        $this->forge->dropTable('todo');
    }
}
