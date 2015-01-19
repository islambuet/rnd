<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class General_crop_info_report extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("general_crop_info_report_model");
    }

    public function index($task="search",$id=0)
    {
        if($task=="search")
        {
            $this->rnd_search();
        }
        elseif($task=="report")
        {
            $this->rnd_report();
        }
        else
        {
            $this->rnd_search();
        }
    }

    public function rnd_search()
    {
        $data['title'] = "Crop Info";
        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['types'] = Query_helper::get_info('rnd_variety_info', '*', array('status ='.$this->config->item('active')));

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("general_crop_info_report/search", $data, true));

        if ($this->message)
        {
            $ajax['message'] = $this->message;
        }

        $ajax['page_url']=base_url()."general_crop_info_report/index/search/";
        $this->jsonReturn($ajax);
    }

    public function rnd_report()
    {
        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->lang->line("MSG_INVALID_INPUT");
            $this->jsonReturn($ajax);
        }
        else
        {
            $rndCode = $this->input->post('common_rnd_code');
            $inputRndCode = $this->input->post('input_rnd_code');

            $data['procurements']=$this->general_crop_info_report_model->get_procurement($rndCode, $inputRndCode);

            $ajax['status'] = true;
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("general_crop_info_report/report", $data, true));
            $this->jsonReturn($ajax);
        }
    }

    private function check_validation()
    {
        if($this->input->post('common_season_id'))
        {
            if(Validation_helper::validate_empty($this->input->post('common_crop_id')))
            {
                return false;
            }
        }

        if($this->input->post('common_crop_id'))
        {
            if(Validation_helper::validate_empty($this->input->post('common_crop_type')))
            {
                return false;
            }
        }

        if($this->input->post('common_crop_type'))
        {
            if(Validation_helper::validate_empty($this->input->post('common_rnd_code')))
            {
                return false;
            }
        }

        return true;
    }

}
