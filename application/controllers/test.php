<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{

    public function index()
	{
        $this->load->model("general_sample_delivery_model");
        $data['sample']=$this->general_sample_delivery_model->get_sample_info(1);
        $data['variety_not_sent']=$this->general_sample_delivery_model->get_varieties($data['sample']['year'],$data['sample']['season_id'],$data['sample']['crop_id'],0);
        $data['variety_sent']=$this->general_sample_delivery_model->get_varieties($data['sample']['year'],$data['sample']['season_id'],$data['sample']['crop_id'],1);
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

}
