<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Report_principal extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->load->model("report_principal_model");
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
        $data['title'] = "Principal Report";
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $data['crops'] = System_helper::get_ordered_crops();
        $data['principals'] = Query_helper::get_info('rnd_principal', '*', array('status !='.$this->config->item('status_delete')));
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("report_principal/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."report_principal/index/search/";

        $this->jsonReturn($ajax);
    }
    /*private function rnd_report()
    {

        $year = $this->input->post('year');
        $variety_type = $this->input->post('variety_type');
        $principal_id = $this->input->post('principal_id');
        $company_id = $this->input->post('company_id');

        $data['varieties']=$this->report_local_procurement_model->get_varieties($year,$variety_type,$principal_id,$company_id);

        $ajax['status']=true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_local_procurement/report", $data, true));
        $this->jsonReturn($ajax);
    }*/
    public function load_varieties_for_principal_report()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $principal_id = $this->input->post('principal_id');
        $data['varieties']=$this->report_principal_model->get_varieties($principal_id,$year,$season_id,$crop_id,$crop_type_id);
        $data['title'] = "Select varieties";
        $data['year']=$year;
        $data['season_id']=$season_id;
        $data['crop_id']=$crop_id;
        $data['crop_type_id']=$crop_type_id;
        $data['principal_id']=$principal_id;

        if($data['varieties'])
        {
            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#variety_list","html"=>$this->load->view("report_principal/variety_selection",$data,true));
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
