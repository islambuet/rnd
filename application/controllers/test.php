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
//        $this->db->from('rnd_task');
//        $this->db->where('type','TASK');
//        $this->db->where_in('id',array(29,30));
//        $results=$this->db->get()->result();
//        foreach($results as $result)
//        {
//            $data['user_group_id']=4;
//            $data['task_id']=$result->id;
//            $data['view']=1;
//            $data['add']=1;
//            $data['edit']=1;
//            $data['delete']=1;
//            $data['print']=1;
//            $data['report']=1;
//            $data['status']=1;
//            $data['created_by']=0;
//            $data['creation_date']=time();
//            $this->db->insert('rnd_user_group_role',$data);
//
//
//        }




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

