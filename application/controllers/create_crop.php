<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_crop extends ROOT_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        //this function only do save nothing else
        $this->rnd_list();//this is similar like redirect
    }


}
