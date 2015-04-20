<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{


    public function index()
    {

        $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
        echo json_encode($arr);

    }
    function get()
    {
        echo 'hi';
    }

}

?>
