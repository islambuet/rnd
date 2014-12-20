<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Home extends ROOT_Controller
{
	public function index()
	{
		$this->load->view("main");
	}
    public function load_main_page()
    {
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("login","",true));
        $ajax['content'][]=array("id"=>"#right_side","html"=>$this->load->view("login_right","",true));
        $this->jsonReturn($ajax);
    }
}
