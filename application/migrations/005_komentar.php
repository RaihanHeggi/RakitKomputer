<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_komentar extends CI_Migration
{
    protected $tableName  = 'komentar';

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_komentar' => array(
                'type' => 'INT',
                'constraint' => 3,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'id_konsultasi' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'komentar' => [
                'type' => 'longtext',
            ],
			'id_user' => [
                'type' => 'INT',
                'constraint' => 3,
            ],
            'timestamp' => [
                'type'	=> 'datetime',
            ]
        ));
        $this->dbforge->add_key('id_komentar', TRUE);

        // If you want to add a foriegn key.
        // role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
        // $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');

        $this->dbforge->create_table($this->tableName);

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

/* End of file 202106315952_005_komentar.php */
    
                        