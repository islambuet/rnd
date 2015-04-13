<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Report_local_procurement extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->load->model("report_local_procurement_model");
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
        $data['title'] = "Local Procurement Report";
        $data['principals'] = Query_helper::get_info('rnd_principal', '*', array('status !='.$this->config->item('status_delete')));
        $data['companies'] = Query_helper::get_info('rnd_competitor', '*', array('status !='.$this->config->item('status_delete')));
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("report_local_procurement/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."report_local_procurement/index/search/";

        $this->jsonReturn($ajax);
    }
    private function rnd_report()
    {

        $year = $this->input->post('year');
        $variety_type = $this->input->post('variety_type');
        $principal_id = $this->input->post('principal_id');
        $company_id = $this->input->post('company_id');

        $data['varieties']=$this->report_local_procurement_model->get_varieties($year,$variety_type,$principal_id,$company_id);

        $ajax['status']=true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_local_procurement/report", $data, true));
        $this->jsonReturn($ajax);
    }
}
