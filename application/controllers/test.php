<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{
    static private $person = 1;

    public function sum(&$a,$b)
    {


    }


    public function index()
	{

        $crops = Query_helper::get_info('rnd_crop', '*', array('status !='.$this->config->item('status_delete')));
        print_r($crops);
        echo $crops[1]['crop_name'];
    }






}
