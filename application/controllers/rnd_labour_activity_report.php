<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_labour_activity_report extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_labour_activity_report_model");
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

        //$data['fertilizer_info']= $this->rnd_labour_activity_report_model->get_fertilizers();
        $data['title'] = "Labour Activity Report";

        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['types'] = Query_helper::get_info('rnd_variety_info', '*', array('status ='.$this->config->item('active')));


        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_labour_activity_report/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."rnd_labour_activity_report/index/search/";

        $this->jsonReturn($ajax);
    }
    public function rnd_report()
    {
        $season_id=$this->input->post("season_id");
        $crop_id=$this->input->post("crop_id");
        $variety_id=$this->input->post("labour_activity_variety");
        $start_date=strtotime($this->input->post("labour_activity_start_date"));
        $end_date=strtotime($this->input->post("labour_activity_end_date"));
//        $data['fertilizers']=$this->rnd_labour_activity_report_model->get_fertilizers($id);
//        $data['stock_in_infos']=$this->rnd_labour_activity_report_model->get_fertilizer_stock_in($id);
//        $data['stock_out_infos']=$this->rnd_labour_activity_report_model->get_fertilizer_stock_out($id);
        $data['labour_activity_infos']=$this->rnd_labour_activity_report_model->get_activity_infos($season_id,$crop_id,$variety_id,$start_date,$end_date);

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("rnd_labour_activity_report/report", $data, true));
        $this->jsonReturn($ajax);

    }




}
