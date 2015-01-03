<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_pesticide_stock_out extends ROOT_Controller
{

    private $message;
    public function __construct()
    {
      parent::__construct();
      $this->$message="";
      $this->load->model("rnd_pesticide_stock_out_model");

    }
    public function index($task="list",$id=0)
    {
      if($task == "list"){
      $this->rnd_list($id);
    }
      elseif ($task=="add" || $task == "edit")
    {
      $this->rnd_add_edit($id);
    }
      elseif($task=="save")
    {
      $this->rnd_save($id);
    }
      elseif($task=="delete")
    {
      $this->rnd_change_status($id);
    }
      else
      $this->rnd_list($id);
    }


    public function rnd_list()
    {

    }   /////    Render list end

    public function rnd_add_edit()
    {
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_pesticide_stock_in/add_edit",$data,true));
        $this->jsonReturn($ajax);
    }     ///// add edit end

    public function rnd_save()
    {

    }      ////// save end


    public function rnd_change_status()
    {

    }


    private function check_validation()
    {

    }
}
