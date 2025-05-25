<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;
use PHPUnit\Framework\Constraint\Constraint;

class UserTable extends Migration
{
   public function up()
{
    $this->forge->addField([
        'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
        'name' => ['type' => 'VARCHAR', 'constraint' => 220, 'null' => false],
        'username' => ['type' => 'VARCHAR', 'constraint' => 220, 'null' => false],
        'password' => ['type' => 'VARCHAR', 'constraint' => 220, 'null' => false],
        'created_at' => ['type'    => 'TIMESTAMP', 'null'    => false, 'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->addUniqueKey('username');

    $this->forge->createTable('user', true, [
            'ENGINE' => 'InnoDB',
            'CHARSET' => 'utf8mb4',
            'COLLATE' => 'utf8mb4_general_ci',
        ]);
}

public function down()
{
    $this->forge->dropTable('user');
}

}
