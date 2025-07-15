<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAgenciesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'INT', 'auto_increment' => true],
            'user_id'               => ['type' => 'INT', 'unsigned' => true],
            'name'                  => ['type' => 'VARCHAR', 'constraint' => 255],
            'license_number'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'license_expiry'        => ['type' => 'DATE', 'null' => true],
            'country_id'            => ['type' => 'INT', 'unsigned' => true],
            'city'                  => ['type' => 'VARCHAR', 'constraint' => 100],
            'address'               => ['type' => 'TEXT'],
            'phone'                 => ['type' => 'VARCHAR', 'constraint' => 20],
            'email'                 => ['type' => 'VARCHAR', 'constraint' => 255],
            'website'               => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'representative_name'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'representative_designation' => ['type' => 'VARCHAR', 'constraint' => 100],
            'representative_phone'  => ['type' => 'VARCHAR', 'constraint' => 20],
            'representative_email'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'license_file'          => ['type' => 'VARCHAR', 'constraint' => 255],
            'status'                => ['type' => 'ENUM', 'constraint' => ['pending', 'approved', 'rejected'], 'default' => 'pending'],
            'created_at'            => ['type' => 'DATETIME', 'null' => true],
            'updated_at'            => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('agencies');
    }

    public function down()
    {
        $this->forge->dropTable('agencies');
    }
}
