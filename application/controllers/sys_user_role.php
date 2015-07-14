<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Sys_user_role extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
       $this->load->model("sys_user_role_model");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list($id);
        }
        elseif($task=="add" || $task=="edit")
        {
            $this->rnd_add_edit($id);
        }
        elseif($task=="save")
        {
            $this->rnd_save();
        }
        else
        {
            $this->rnd_list($id);
        }
    }

    public function rnd_list()
    {
        $data['title']="User Role";
        $data['user_groups_info']=$this->sys_user_role_model->get_roles_count();

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("sys_user_role/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."sys_user_role";

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        $data['access_tasks']=$this->sys_user_role_model->get_my_tasks($id);
        $data['role_status']=$this->sys_user_role_model->get_role_status($id);
        $data['id']=$id;

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("sys_user_role/add_edit",$data,true));
        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("id");
        $data=$this->input->post('task');
        $user = User_helper::get_user();
        if($id>0)
        {
            $this->db->trans_start();  //DB Transaction Handle START

            $data['modified_by'] = $user->user_id;
            $data['modification_date'] = time();

            Query_helper::update('rnd_task',$data,array("id = ".$id));

            $this->db->trans_complete();   //DB Transaction Handle END

            if ($this->db->trans_status() === TRUE)
            {
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
                $this->rnd_list();
            }
            else
            {
                $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
            }
        }
        else
        {
            $this->db->trans_start();  //DB Transaction Handle START

            $data['created_by'] = $user->user_id;
            $data['creation_date'] = time();

            Query_helper::add('rnd_task',$data);

            $this->db->trans_complete();   //DB Transaction Handle END

            if ($this->db->trans_status() === TRUE)
            {
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
                $this->rnd_list();
            }
            else
            {
                $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
            }
        }
    }

}
