<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{


    public function index()
    {

        $this->db->from('rnd_crop');
        $this->db->limit($this->uri->segment(3),0);
        $result=$this->db->get()->result();
        echo "<pre>";
        print_r($result);
        echo "</pre>";

    }
    function get()
    {
        echo 'hi';
    }

}

?>
