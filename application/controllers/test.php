<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends Search
{
    static private $person = 1;




    public function index()
	{
        $this->sum();

    }







}
abstract class Search extends CI_Controller
{
    public function sum()
    {
        $a=5;
        echo ++$a;


    }
}
