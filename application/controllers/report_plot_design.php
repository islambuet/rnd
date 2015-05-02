<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Report_plot_design extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->load->model("report_plot_design_model");
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
        $data['title'] = "Plot Design Report";
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $data['plots'] = Query_helper::get_info('rnd_setup_plot_info', '*', array());
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("report_plot_design/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."report_plot_design/index/search/";

        $this->jsonReturn($ajax);
    }
    private function rnd_report()
    {

        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $plot_id = $this->input->post('plot_id');
        $data['plot_info']=$this->report_plot_design_model->get_plot_info($year,$season_id,$plot_id);
        $ajax['status']=true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_plot_design/report", $data, true));
        $this->jsonReturn($ajax);
    }
}
