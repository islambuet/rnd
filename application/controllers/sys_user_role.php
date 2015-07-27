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
        $data['title']="Edit User Role";
        $data['id']=$id;
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("sys_user_role/add_edit",$data,true));
        $ajax['page_url']=base_url()."sys_user_role/index/edit/".$id;
        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $user=User_helper::get_user();
        $tasks=$this->input->post('tasks');
        $user_group_id=$this->input->post('id');

        $time=time();
        $this->db->trans_start();  //DB Transaction Handle START

        foreach($tasks as $task)
        {

            $data=array();
            if(isset($task['view'])&& ($task['view']==1))
            {
                $data['view']=1;
            }
            else
            {
                $data['view']=0;
            }
            if(isset($task['add'])&& ($task['add']==1))
            {
                $data['add']=1;
            }
            else
            {
                $data['add']=0;
            }
            if(isset($task['edit'])&& ($task['edit']==1))
            {
                $data['edit']=1;
            }
            else
            {
                $data['edit']=0;
            }
            if(isset($task['delete'])&& ($task['delete']==1))
            {
                $data['delete']=1;
            }
            else
            {
                $data['delete']=0;
            }
            if(isset($task['report'])&& ($task['report']==1))
            {
                $data['report']=1;
            }
            else
            {
                $data['report']=0;
            }
            if(isset($task['print'])&& ($task['print']==1))
            {
                $data['print']=1;
            }
            else
            {
                $data['print']=0;
            }
            if(($data['add'])||($data['edit'])||($data['delete'])||($data['report'])||($data['print']))
            {
                $data['view']=1;
            }
            if($task['ugr_id']>0)
            {
                $data['modified_by']=$user->id;
                $data['modification_date']=$time;
                Query_helper::update('rnd_user_group_role',$data,array("id = ".$task['ugr_id']));
            }
            else
            {
                $data['user_group_id']=$user_group_id;
                $data['task_id']=$task['task_id'];
                $data['created_by']=$user->id;
                $data['creation_date']=$time;
                Query_helper::add('rnd_user_group_role',$data);
            }

        }
        $this->db->trans_complete();   //DB Transaction Handle END

        if ($this->db->trans_status() === TRUE)
        {
            $this->message=$this->lang->line("MSG_ROLE_ASSIGN_SUCCESS");
            $this->rnd_list();
        }
        else
        {
            $ajax['status']=false;
            $ajax['desk_message']=$this->lang->line("MSG_ROLE_ASSIGN_FAIL");
            $this->jsonReturn($ajax);
        }
    }

}
