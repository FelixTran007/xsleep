<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserPermissionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'       => ['type' => 'SMALLINT', 'unsigned' => true],
            'permission_id' => ['type' => 'SMALLINT', 'unsigned' => true],
            'type'          => [
                'type'       => 'ENUM',
                'constraint' => ['allow', 'deny'],
                'default'    => 'allow',
                'null'       => false,
            ],
        ]);

        // primary key kết hợp
        $this->forge->addKey(['user_id', 'permission_id'], true);

        // foreign keys
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('permission_id', 'permissions', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('user_permissions');
    }

    public function down()
    {
        $this->forge->dropTable('user_permissions');
    }
}
