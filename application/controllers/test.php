<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{

    public function index()
	{
        $this->load->helper('directory');

        $map = directory_map('./application/views/', 1, FALSE);
        echo "<pre>";
        print_r($map);
        echo "</pre>";
        foreach($map as $key=>$m)
        {
            if(is_dir('./application/views/'.$m))
            {
                unset($map[$key]);
            }
        }
        echo "<pre>";
        print_r($map);
        echo "</pre>";



    }

}
