<?php
// app/Database/Migrations/2024-05-18-AboutUs.php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AboutUs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'language'   => ['type' => 'VARCHAR', 'constraint' => 2], // 'en' or 'ar'
            'title'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'content'    => ['type' => 'TEXT'],
            'image'      => ['type' => 'VARCHAR', 'constraint' => 255],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('about_us');
    }

    public function down()
    {
        $this->forge->dropTable('about_us');
    }
}
