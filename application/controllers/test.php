<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{
	public function index()
	{
        $this->session->set_userdata("user_id", "");
        /*$this->load->model("dashboard_model");
        $module_id="SM-000002";
        $data['tasks']=$this->dashboard_model->get_tasks($module_id);

        print_r($data);*/
	}


}
