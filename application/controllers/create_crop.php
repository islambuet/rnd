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

}
