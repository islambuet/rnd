<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{

    public function index()
	{
        echo "<pre>";
        print_r(System_helper::get_ordered_crops());
        echo "</pre>";
        echo $this->db->last_query();

    }

}
