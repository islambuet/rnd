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
        $a=5;
        echo ++$a;
    }







}
