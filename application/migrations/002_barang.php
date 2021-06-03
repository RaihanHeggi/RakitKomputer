<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Barang extends CI_Migration
{
    protected $tableName  = 'barang';

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_barang' => array(
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tipe_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'merk_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
			],
			'harga_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
			],
            'stok_barang' => [
                'type' => 'VARCHAR',
                'constraint' => '4',
			],
			'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
				'null' => TRUE
			],
			'deskripsi' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ]
			
        ));
        $this->dbforge->add_key('id_barang', TRUE);

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table($this->tableName);

        $this->db->insert($this->tableName, [
            'nama_barang' => 'SSD 32GB',
            'tipe_barang' => 'Storage',
			'merk_barang' => 'Corsair',
			'stok_barang' => '3',
			'harga_barang' => '10000',
			'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a orci quis.',
        ]);
		$this->db->insert($this->tableName, [
            'nama_barang' => 'VGA 1GB',
            'tipe_barang' => 'Graphic Card',
			'merk_barang' => 'NVIDIA',
			'stok_barang' => '20',
			'harga_barang' => '25000',
			'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a orci quis.',
        ]);
		$this->db->insert($this->tableName, [
            'nama_barang' => 'VGA 2GB',
            'tipe_barang' => 'Graphic Card',
			'merk_barang' => 'NVIDIA',
			'stok_barang' => '42',
			'harga_barang' => '40000',
			'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a orci quis.',
        ]);
		$this->db->insert($this->tableName, [
            'nama_barang' => 'RAM 4GB',
            'tipe_barang' => 'RAM',
			'merk_barang' => 'HYNIX',
			'stok_barang' => '7',
			'harga_barang' => '30000',
			'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a orci quis.',
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}

/* End of file 20210428104431_barang.php */
    
                        