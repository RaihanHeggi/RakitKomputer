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
		$this->migration->version(004);
		$this->migration->version(005);
		$this->migration->version(006);
		$this->migration->version(007);
		$this->migration->version(010);
		$this->migration->version(011);
		$this->migration->version(012);
	}

}
                        
/* End of file Migrate.php */
    
                        