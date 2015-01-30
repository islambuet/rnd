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
        $i=1;

        print_r($_GET['item_name' + $i]);
    }







}
