<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_crop extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
//        $this->load->model("dashboard_model");
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
    public function rnd_list($page=0)
    {
        $data['title']="Crate Crop";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $this->jsonReturn($ajax);

    }
    public function rnd_add_edit($id=0)
    {
        $data['title']="Add edit";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop/add_edit",$data,true));

        $this->jsonReturn($ajax);

    }
    public function rnd_save()
    {

        print_r($this->input->post());
        exit;
        //this function only do save nothing else
        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->lang->line("MSG_INVALID_INPUT");
            $this->jsonReturn($ajax);
        }
        else
        {
            //check save if success call bellow two line
            $this->message=$this->lang->line("MSG_SAVED_SUCCESS");
            $this->rnd_list();//this is similar like redirect
        }

    }
    private function check_validation()
    {
        return false;
    }


}
