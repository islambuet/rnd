<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Report_pesticide_current_stock extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->load->model("report_pesticide_current_stock_model");
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
        $data['title'] = "Pesticide Current Stock Report";
        $data['pesticides']= Query_helper::get_info('rnd_pesticide_fungicide_info',array('id','pesticide_name'),array('status = 1'));
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("report_pesticide_current_stock/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."report_pesticide_current_stock/index/search/";

        $this->jsonReturn($ajax);
    }
    public function rnd_report()
    {
        $id=$this->input->post("pesticide_id");

        $data['current_stock_info']=$this->report_pesticide_current_stock_model->get_pesticide_current_stock($id);
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_pesticide_current_stock/report", $data, true));
        $this->jsonReturn($ajax);

    }
}
