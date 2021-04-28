<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MigrateModel extends CI_Model 
{
	public function up() {
		$this->load->dbforge();
		$this->load->library('migration');
		
		$this->migration->version(001);
		$this->migration->version(002);
		$this->migration->version(003);
	}

}
                        
/* End of file Migrate.php */
    
                        