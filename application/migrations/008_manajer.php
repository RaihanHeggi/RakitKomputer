<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Manajer extends CI_Migration
{
    protected $tableName  = 'manajer';

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_manajer' => array(
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_manajer' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_manajer' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
			'id_user' => [
                'type' => 'INT',
                'constraint' => '3',
            ],
        ));
        $this->dbforge->add_key('id_manajer', TRUE);

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table($this->tableName);

        $this->db->insert($this->tableName, [
			'nama_manajer' => 'Hindia',
			'alamat_manajer' => 'Jln Telekomunikasi',
			'id_user' => '4',
		]);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}

/* End of file 2021063151750_manajer.php */
    
                        