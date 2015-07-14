<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Sys_module_task extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
       $this->load->model("sys_module_task_model");
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
        $data['title']="Module and Task";
        $data['modules_tasks']=$this->sys_module_task_model->get_modules_tasks_table_tree();

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("sys_module_task/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."sys_module_task";

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['module_task'] = $this->sys_module_task_model->get_module_task_info($id);
            $data['title']='Edit '.$data['module_task']['name'];
            $ajax['page_url']=base_url()."sys_module_task/index/edit/".$id;
        }
        else
        {
            $data['title']="Create New Module/Task";
            $data["module_task"] = Array(
                'id' => 0,
                'name' => '',
                'type' => '',
                'parent' => 0,
                'controller' => '',
                'ordering' => 99,
                'icon' => 'menu.png',
                'status' => 1
            );
            $ajax['page_url']=base_url()."sys_module_task/index/add";
        }

        //$data['crops'] = System_helper::get_ordered_crops();
        $data["modules"] = $this->sys_module_task_model->get_modules();
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("sys_module_task/add_edit",$data,true));

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
