<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Konsultan extends CI_Migration
{
    protected $tableName  = 'konsultan';

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_konsultan' => array(
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_konsultan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_konsultan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email_konsultan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
			'id_user' => [
                'type' => 'INT',
                'constraint' => '3',
            ],
        ));
        $this->dbforge->add_key('id_konsultan', TRUE);

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table($this->tableName);

        $this->db->insert($this->tableName, [
			'nama_konsultan' => 'Sya Raihan Heggi',
			'alamat_konsultan' => 'Vila Bogor Indah',
			'email_konsultan' => 'heggi.sya@gmail.com',
			'id_user' => '1',
		]);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}

/* End of file 202106315129_konsultan.php */
    
                        