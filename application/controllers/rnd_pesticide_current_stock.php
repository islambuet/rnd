<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_pesticide_current_stock extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_pesticide_current_stock_model");
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

        $data['pesticide_info']= $this->rnd_pesticide_current_stock_model->get_pesticides();
        $data['title'] = "Pesticide Current Stock Report";

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_pesticide_current_stock/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."rnd_pesticide_current_stock/index/search/";

        $this->jsonReturn($ajax);
    }
    public function rnd_report()
    {
        $id=$this->input->post("pesticide_id")?$this->input->post("pesticide_id"):0;
        $data['pesticides']=$this->rnd_pesticide_current_stock_model->get_pesticides($id);
        $data['stock_in_infos']=$this->rnd_pesticide_current_stock_model->get_pesticide_stock_in($id);
        $data['stock_out_infos']=$this->rnd_pesticide_current_stock_model->get_pesticide_stock_out($id);

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("rnd_pesticide_current_stock/report", $data, true));
        $this->jsonReturn($ajax);

    }




}
