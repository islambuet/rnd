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
        $this->dashboard_page();
        //$this->login_page();
    }

    public function login()
    {
        $this->dashboard_page();
        //$this->login_page();

    }
    public function get_sub_menu()
    {
        $menu_id=$this->input->post("menu_id");
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#sub-menu","html"=>$this->load->view("sub_menu","",true));

        $this->jsonReturn($ajax);

    }

}
