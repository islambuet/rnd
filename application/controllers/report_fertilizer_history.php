<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Report_fertilizer_history extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->load->model("report_fertilizer_history_model");
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
        $data['title'] = "Fertilizer History Report";
        $data['fertilizers']= Query_helper::get_info('rnd_fertilizer_info',array('id','fertilizer_name'),array('status = 1'));
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("report_fertilizer_history/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."report_fertilizer_history/index/search/";

        $this->jsonReturn($ajax);
    }
    private function rnd_report()
    {

        $report_id = $this->input->post('report_id');
        $date_from = strtotime($this->input->post('date_from'));
        $date_to = strtotime($this->input->post('date_to'));
        $fertilizer_id = $this->input->post('fertilizer_id');
        if(($date_from===false)||($date_to===false))
        {

            $ajax['status']=false;
            $ajax['message']='Invalid Date';
            $this->jsonReturn($ajax);

        }
        else
        {
            $date_to=$date_to+3600*24;
            $data['stocks_info']=$this->report_fertilizer_history_model->stocks_info($report_id,$date_from,$date_to,$fertilizer_id);
            $ajax['status']=true;
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_fertilizer_history/report", $data, true));
            $this->jsonReturn($ajax);
        }

    }
}
