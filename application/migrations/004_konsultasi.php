<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Konsultasi extends CI_Migration
{
    protected $tableName  = 'konsultasi';

    public function up()
    {
		$this->dbforge->drop_table($this->tableName, TRUE);

        $this->dbforge->add_field(array(
            'id_konsultasi' => array(
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),'parent_id' => array(
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'data_konsultasi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_pelanggan' => [
                'type' => 'INT',
				'unsigned' => TRUE,
                'constraint' => '4',
            ],
			'id_konsultan' => [
                'type' => 'INT',
				'unsigned' => TRUE,
                'constraint' => '4',
            ],
            'timestamp' => [
                'type' => 'date',
				'unsigned' => TRUE,
            ],

        ));
        $this->dbforge->add_key('id_konsultasi', TRUE);

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table($this->tableName);

		$this->db->query('
			ALTER TABLE konsultasi
			ADD CONSTRAINT FK_Pelanggan
			FOREIGN KEY (id_pelanggan) REFERENCES pelanggan (id_pelanggan);
		');
		$this->db->query('
			ALTER TABLE konsultasi
			ADD CONSTRAINT FK_Konsultan
			FOREIGN KEY (id_konsultan) REFERENCES user (id_konsultan);
		');

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
    
                        