<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Report_trial_analysis extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->config->load('report_config');;
        $this->load->model("report_trial_analysis_model");
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
        $data['title'] = "Trial Analysis Report";

        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $data['crops'] = System_helper::get_ordered_crops();
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("report_trial_analysis/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."report_trial_analysis/index/search/";

        $this->jsonReturn($ajax);
    }
    private function rnd_report_text_details()
    {
        $report_name=$this->input->post('report_name');
        //$variety_ids=$this->input->post('varieties');
        $ajax['status'] = true;
        $ajax['message'] = 'under_process_for_text_details '.$report_name;
        $this->jsonReturn($ajax);
    }


    private function rnd_report()
    {
        $report_type=$this->input->post('report_type');
        $report_name=$this->input->post('report_name');
        $variety_ids=$this->input->post('varieties');
        if(is_array($variety_ids)&&(sizeof($variety_ids)>0))
        {
            if($report_type==2)
            {
                if($report_name==4)
                {
                    $this->rnd_report_text_details();
                }
                else
                {
                    $data['report_name']=$report_name;
                    $data['varieties']=array();
                    $ajax['status'] = true;
                    $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_summary", $data, true));
                    $this->jsonReturn($ajax);
                }

            }
            else if($report_type==1)
            {

                $ajax['status'] = true;
                $ajax['message'] = 'under_process_for_image_report';
                $this->jsonReturn($ajax);
            }
            else
            {
                $ajax['status'] = false;
                $ajax['message'] = $this->lang->line('INVALID_REPORT_TYPE');
                $this->jsonReturn($ajax);
            }

        }
        else
        {
            $ajax['status'] = false;
            $ajax['message'] = $this->lang->line('LABEL_SELECT_VARIETY');
            $this->jsonReturn($ajax);
        }
    }

    public function load_varieties_for_trial_report()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $data['varieties']=$this->report_trial_analysis_model->get_varieties($year,$season_id,$crop_id,$crop_type_id);
        $data['title'] = "Select varieties and report type";

        if($data['varieties'])
        {
            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#variety_list","html"=>$this->load->view("report_trial_analysis/variety_selection",$data,true));
            $this->jsonReturn($ajax);
        }
        else
        {

            $ajax['status']=false;
            $ajax['message']=$this->lang->line('NO_VARIETY_EXIST_FOR_YOUR_SELECTION');
            $this->jsonReturn($ajax);
        }
    }

}
