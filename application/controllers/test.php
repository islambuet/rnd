<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{

    public function index()
	{
        $fields = $this->db->list_fields('rnd_crop');
        //$fields = $this->db->field_data('rnd_crop');

        echo "<pre>";
        print_r($fields);
        echo "</pre>";
    }

}
