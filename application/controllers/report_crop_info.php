<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Report_crop_info extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->load->model("report_crop_info_model");
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

    private function rnd_search()
    {
        $data['title'] = "Crop Info Report";
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("report_crop_info/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."report_crop_info/index/search/";

        $this->jsonReturn($ajax);
    }
    private function rnd_report()
    {

        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $data['varieties']=$this->report_crop_info_model->get_varieties($year,$season_id);

        $ajax['status']=true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_crop_info/report", $data, true));
        $this->jsonReturn($ajax);
    }
}
