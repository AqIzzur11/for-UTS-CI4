<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu0145 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_menu'   =>[
                'type'          => 'BIGINT',
                'constraint'    => 20,
                'unsigned'      => TRUE,
                'auto_increment'=> TRUE
            ],
            'jenis_menu'   =>[
                'type'          => 'VARCHAR',
                'constraint'    => 20,
            ],
            'nama_menu'   =>[
                'type'          => 'VARCHAR',
                'constraint'    => 30,
            ],
            'harga'   =>[
                'type'          => 'DOUBLE',
                // 'constraint'    => 30,
            ],
            'status_menu'   =>[
                'type'          => 'ENUM',
                'constraint'    => ['Ada', 'Tidak Ada'],
                'default'       => 'Ada'
            ],
        ]);
        $this->forge->addKey('id_menu', TRUE);
        $this->forge->createTable('Menu0145');
    }

    public function down()
    {
        $this->forge->dropTable('Menu0145', TRUE);
    }
}
