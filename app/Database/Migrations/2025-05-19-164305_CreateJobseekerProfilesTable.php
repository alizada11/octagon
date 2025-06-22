<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJobseekerProfilesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'unsigned' => true, 'null' => false],
            'full_name'       => ['type' => 'VARCHAR', 'constraint' => 255],
            'dob'             => ['type' => 'DATE', 'null' => true],
            'gender'          => ['type' => 'ENUM', 'constraint' => ['male', 'female'], 'null' => true],
            'marital_status'  => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'nationality'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'address'         => ['type' => 'TEXT', 'null' => true],
            'phone'           => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'photo'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'cv_file'         => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('jobseeker_profiles');
    }

    public function down()
    {
        $this->forge->dropTable('jobseeker_profiles');
    }
}
