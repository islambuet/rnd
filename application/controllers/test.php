<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{

    public function index()
	{
        echo "inside test";

    }
    public function get_index($array,$task_id)
    {
        foreach($array as $index=>$a)
        {
            if($a['task_id']==$task_id)
            {
                return $index;
            }
        }
        return false;
    }

}
