<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Pesanan extends CI_Migration
{
    protected $tableName  = 'pesanan';

    public function up()
    {
		$this->dbforge->drop_table($this->tableName, TRUE);

        $this->dbforge->add_field(array(
            'id_pesanan' => array(
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'metode_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => '70',
            ],
            'total_harga' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'id_barang' => [
                'type' => 'INT',
				'unsigned' => TRUE,
                'constraint' => '4',
            ],
			'id_pelanggan' => [
                'type' => 'INT',
				'unsigned' => TRUE,
                'constraint' => '4',
            ],
			'status' => [
                'type' => 'VARCHAR',
				'constraint' => '100',
            ],
			'tanggal' => [
                'type' => 'datetime',
            ],
        ));
        $this->dbforge->add_key('id_pesanan', TRUE);

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table($this->tableName);

		// $this->db->query('
		// 	ALTER TABLE pesanan
		// 	ADD CONSTRAINT FK_Pesanan_Barang
		// 	FOREIGN KEY (id_barang) REFERENCES barang (id);
		// ');
		// $this->db->query('
		// 	ALTER TABLE pesanan
		// 	ADD CONSTRAINT FK_Pesanan_User
		// 	FOREIGN KEY (id_pelanggan) REFERENCES user (id);
		// ');

        //Inserting first row
        // $this->db->insert($this->tableName, [
        //     'username' => 'murad_ali',
        //     'phone' => '123-123-7834',
        //     'password' => password_hash('123456', PASSWORD_BCRYPT),
        // ]);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}

/* End of file 20210428103449_pesanan.php */
    
                        