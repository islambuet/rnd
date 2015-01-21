<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class ROOT_Controller extends CI_Controller
{
    public $permission;
    public function __construct()
    {
        parent::__construct();
        $this->permission=$this->get_permission();
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            $user=User_helper::get_user();
            if(!$user)
            {
                if($this->router->class!="home")
                {
                    $this->login_page("Time out");
                }
            }
        }
        else
        {
            echo $this->load->view("main",'',true);
            die();
        }
    }

    public function jsonReturn($array)
    {
        header('Content-type: application/json');
        echo json_encode($array);
        exit();
    }

    public function login_page($message="")
    {
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("login","",true));
        $ajax['content'][]=array("id"=>"#right_side","html"=>$this->load->view("login_right","",true));
        $ajax['content'][]=array("id"=>"#user_info","html"=>"");
        if($message)
        {
            $ajax['message']=$message;
        }
        $ajax['page_url']=base_url()."home/login";
        $this->jsonReturn($ajax);
    }

    public function dashboard_page($message="")
    {
        $ajax['status']=true;
        $this->load->model("root_model");
        $data['modules']=$this->root_model->get_modules();
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("dashboard",$data,true));
        $ajax['content'][]=array("id"=>"#user_info","html"=>$this->load->view("user_info","",true));
        $ajax['content'][]=array("id"=>"#right_side","html"=>$this->load->view("dashboard_right","",true));
        if($message)
        {
            $ajax['message']=$message;
        }
        $ajax['page_url']=base_url()."home";
        $this->jsonReturn($ajax);
    }

    private function get_permission()
    {
        $controller_name=$this->router->class;
        if($controller_name=="home")
        {
            return array('view'=>'YES','add'=>"YES",'edit'=>'YES','delete'=>"YES",'save'=>"YES");

        }
        $user=User_helper::get_user();

        $this->db->select
            ('
        ait_user_group.ug_id,
        ait_system_task.st_pram,
        ait_user_group.up_eventadd,
        ait_user_group.up_eventsave,
        ait_user_group.up_eventedit,
        ait_user_group.up_eventdelete,
        ait_user_group.up_eventview
        ');
        $this->db->from('ait_user_group');
        $this->db->join('ait_system_task','ait_system_task.st_id = ait_user_group.up_st_id','LEFT');
        $this->db->where('st_pram',$controller_name);
        $this->db->where('ait_user_group.ug_id',$user->user_group_id);
        $result=$this->db->get()->row_array();
        if($result)
        {
            $permission=array();

            $permission['view']=($result['up_eventview']=="details")?"YES":"NO";
            $permission['add']=($result['up_eventadd']=="add")?"YES":"NO";
            $permission['edit']=($result['up_eventedit']=="edit")?"YES":"NO";
            $permission['delete']=($result['up_eventdelete']=="delete")?"YES":"NO";
            $permission['save']=($result['up_eventsave']=="save")?"YES":"NO";
            return $permission;
        }
        else
        {
            return array('view'=>'NO','add'=>"NO",'edit'=>'NO','delete'=>"NO",'save'=>"NO");
        }

    }
}
