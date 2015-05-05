<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{
    public function index()
    {
        $row=array(9,8,0,7);
        echo "<td>".$row[0], $row[1],$row[2], $row[3]."</td>";
    }
}

