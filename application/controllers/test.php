<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{

//    public function index()
//	{
//        $this->session->set_userdata('user_id',null);
//
//    }
    public function index()
    {
        $this->load->library('table');
        //$this->db->select ('id, name, location, email, tlp');
        $this->db->from ('rnd_crop');

        $results = $this->db->get()->result_array();
        foreach($results as &$result)
        {
            $result['crop_name']='<a href="segment_3">'.$result['crop_name'].'</a>';
        }

        echo $this->table->generate($results);

    }
    function getCOmpanyList ($limit, $offset)
    {
        $this->db->from('Matches m');
        $this->db->select('m.team1,m.team2,m.group,m.count,tn1.name team1_name,tn2.name team2_name,gn.name group_name');
        $this->db->join('TeamName tn1','tn1.team_id = m.team1');
        $this->db->join('TeamName tn2','tn2.team_id = m.team2');
        $this->db->join('GroupNames gn','gn.group_id = m.group');
        $this->db->where('m.count',1);
        $results=$this->db->get()->result();
    }

}

