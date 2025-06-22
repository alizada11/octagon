<?php
// Migration: 2024-05-19-000002_create_jobseeker_experiences_table.php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJobseekerExperiencesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'jobseeker_id'  => ['type' => 'INT'],
            'company_name'  => ['type' => 'VARCHAR', 'constraint' => 255],
            'job_title'     => ['type' => 'VARCHAR', 'constraint' => 255],
            'start_date'    => ['type' => 'DATE'],
            'end_date'      => ['type' => 'DATE', 'null' => true],
            'description'   => ['type' => 'TEXT', 'null' => true],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('jobseeker_experiences');
    }

    public function down()
    {
        $this->forge->dropTable('jobseeker_experiences');
    }
}
