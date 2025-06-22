<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAvailableForWorkToJobseekerProfiles extends Migration
{
    public function up()
    {
        $this->forge->addColumn('jobseeker_profiles', [
            'available_for_work' => [
                'type'       => 'JSON',
                'null'       => true,
                'after'      => 'phone' // Adjust position as needed
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('jobseeker_profiles', 'available_for_work');
    }
}
