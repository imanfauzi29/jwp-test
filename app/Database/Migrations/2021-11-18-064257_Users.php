<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'auto_increment'    => true,
                'unsigned'          => true
            ],
            'name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100'
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '12',
                'null'              => false
            ],
            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => false
            ],
            'token' => [
                'type'              => 'TEXT',
                'null'              => true
            ],
            'profile_picture' => [
                'type'              => 'TEXT',
                'null'              => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
