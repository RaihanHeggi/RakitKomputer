<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Laporan_keuangan extends CI_Migration
{
    protected $tableName  = 'laporan_keuangan';

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_laporan' => array(
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'tanggal_laporan' => [
                'type' => 'date',
            ],
        ));
        $this->dbforge->add_key('id_laporan', TRUE);

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table($this->tableName);

        $this->db->insert($this->tableName, [
			'tanggal_laporan' => '2021-04-27',
		]);
		$this->db->insert($this->tableName, [
			'tanggal_laporan' => '2021-05-28',
		]);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}

/* End of file 2021063152319_laporan_keuangan.php */
    
                        