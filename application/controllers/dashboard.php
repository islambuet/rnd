<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Dashboard extends ROOT_Controller
{

    public function get_sub_menu()
    {
        $menu_id=$this->input->post("menu_id");
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#sub-menu","html"=>$this->load->view("sub_menu","",true));

        $this->jsonReturn($ajax);

    }

}
