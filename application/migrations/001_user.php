<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_User extends CI_Migration
{
    protected $tableName  = 'user';

    public function up()
    {	
		$this->dbforge->drop_table($this->tableName, TRUE);

		$this->dbforge->add_field(array(
			'id_user' => array(
				'type' => 'INT',
				'constraint' => 3,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			]
		));
		$this->dbforge->add_key('id_user', TRUE);
	
		// If you want to add a foriegn key.
		// role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
		// $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');
	
		$this->dbforge->create_table($this->tableName);
	
		$this->db->insert($this->tableName, [
			'email' => 'heggi.sya@gmail.com',
			'password' => '123',
			'username' => 'heggi.sya@gmail.com',
		]);
		$this->db->insert($this->tableName, [
			'email' => 'hafidz123@gmail.com',
			'password' => '123',
			'username' => 'hafidz123',
		]);
		$this->db->insert($this->tableName, [
			'email' => 'fariz123@gmail.com',
			'password' => '123',
			'username' => 'fariz123',
		]);
		$this->db->insert($this->tableName, [
			'email' => 'hindia123@gmail.com',
			'password' => '123',
			'username' => 'hindia123',
		]);
		$this->db->insert($this->tableName, [
			'email' => 'arga123@gmail.com',
			'password' => '123',
			'username' => 'arga123',
		]);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}

/* End of file 001_user.php */
    
                        
