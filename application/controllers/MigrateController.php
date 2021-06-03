<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class MigrateController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
				$this->load->model('MigrateModel');
				$this->load->helper('url');  
    }
    public function index()
    {
		// up($tablename, $migrate_id)
			$tes = $this->MigrateModel->up();
			echo 'Migrations ran successfully!';
    }
}
        
    /* End of file  MigrateController.php */
        
                            