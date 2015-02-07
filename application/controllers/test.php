<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{

    public function index()
	{
        //$this->db->order_by('str_to_date(day, "%d-%b-%Y")', "asc",false);
        $oBy='day';
    $this->db->select('str_to_date('.$oBy.', "%d-%b-%Y") day',false);
    $this->db->order_by('day','ASC');
    $query = $this->db->get('rnd_test');
        echo $this->db->last_query();
        print_r($query->result());

    }

}
