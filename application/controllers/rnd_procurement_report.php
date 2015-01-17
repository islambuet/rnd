<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_procurement_report extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_procurement_report_model");
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
        $data['title'] = "Procurement Report";
        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['types'] = Query_helper::get_info('rnd_variety_info', '*', array('status ='.$this->config->item('active')));

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_procurement_report/search", $data, true));

        if ($this->message)
        {
            $ajax['message'] = $this->message;
        }

        $ajax['page_url']=base_url()."rnd_procurement_report/index/search/";
        $this->jsonReturn($ajax);
    }

    public function rnd_report()
    {
//        $season = $this->input->post('procurement_season_id');
        $crop = $this->input->post('procurement_crop_id');
        $type = $this->input->post('procurement_variety');

        $data['procurements']=$this->rnd_procurement_report_model->get_procurement($crop, $type);

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("rnd_procurement_report/report", $data, true));
        $this->jsonReturn($ajax);

    }

}
