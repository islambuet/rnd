<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_fertilizer_current_stock extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_fertilizer_current_stock_model");
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

        $data['fertilizer_info']= $this->rnd_fertilizer_current_stock_model->get_fertilizers();
        $data['title'] = "Fertilizer Current Stock Report";

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_fertilizer_current_stock/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."rnd_fertilizer_current_stock/index/search/";

        $this->jsonReturn($ajax);
    }
    public function rnd_report()
    {
        $id=$this->input->post("fertilizer_id")?$this->input->post("fertilizer_id"):0;
        $data['fertilizers']=$this->rnd_fertilizer_current_stock_model->get_fertilizers($id);
        $data['stock_in_infos']=$this->rnd_fertilizer_current_stock_model->get_fertilizer_stock_in($id);
        $data['stock_out_infos']=$this->rnd_fertilizer_current_stock_model->get_fertilizer_stock_out($id);

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("rnd_fertilizer_current_stock/report", $data, true));
        $this->jsonReturn($ajax);

    }




}
