<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_User extends CI_Migration
{
    protected $tableName  = 'user';

    public function up()
    {	
		$this->dbforge->drop_table($this->tableName, TRUE);

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 4,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'role' => [
				'type' => 'CHAR',
			],
		));
		$this->dbforge->add_key('id', TRUE);
	
		// If you want to add a foriegn key.
		// role_id must be a column of this table, please add it above in the table. And make sure admin_roles table is added before this table. 
		// $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (role_id) REFERENCES admin_roles(id) ON DELETE RESTRICT ON UPDATE CASCADE');
	
		$this->dbforge->create_table($this->tableName);
	
		$this->db->insert($this->tableName, [
			'email' => 'admin@admin.com',
			'password' => md5('admin'),
			'nama' => 'Admin (Superadmin)',
			'alamat' => 'admin admin',
			'role' => '1',
		]);
		$this->db->insert($this->tableName, [
			'email' => 'manajer@manajer.com',
			'password' => md5('manajer'),
			'nama' => 'Manajer',
			'alamat' => 'manajer manajer',
			'role' => '2',
		]);
		$this->db->insert($this->tableName, [
			'email' => 'konsultan@konsultan.com',
			'password' => md5('konsultan'),
			'nama' => 'konsultan',
			'alamat' => 'konsultan konsultan',
			'role' => '3',
		]);
		$this->db->insert($this->tableName, [
			'email' => 'pelanggan@pelanggan.com',
			'password' => md5('pelanggan'),
			'nama' => 'pelanggan',
			'alamat' => 'pelanggan pelanggan',
			'role' => '4',
		]);
    }

    public function down()
    {
        $this->dbforge->drop_table($this->tableName);
    }
}

/* End of file 001_user.php */
    
                        
