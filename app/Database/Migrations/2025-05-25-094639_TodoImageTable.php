<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class TodoImageTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true,],
            'todo_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false,],
            'image_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false,],
            'uploaded_at' => ['type' => 'TIMESTAMP', 'null' => false, 'default' => new RawSql('CURRENT_TIMESTAMP'),],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('todo_id');

           $this->forge->createTable('todo_image', true, [
            'ENGINE'  => 'InnoDB',
            'CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_general_ci',
        ]);

         $this->db->query('ALTER TABLE `todo_image` ADD CONSTRAINT `todo_image_ibfk_1` FOREIGN KEY (`todo_id`) REFERENCES `todo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE `todo_image` DROP FOREIGN KEY `todo_image_ibfk_1`');

        $this->forge->dropTable('todo_image');
    }
}
