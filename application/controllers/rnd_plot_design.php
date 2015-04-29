<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_plot_design extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_plot_design_model");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list($id);
        }
        else if($task=="add")
        {
            $this->rnd_add();
        }
        elseif($task=="save")
        {
            $this->rnd_save();
        }
        else
        {
            $this->rnd_list();
        }
    }
    public function rnd_list($page=0)
    {

        //$config = System_helper::pagination_config(base_url() . "rnd_plot_design/index/list/",$this->create_crop_variety_model->get_total_varieties(),4);
        $config = System_helper::pagination_config(base_url() . "rnd_plot_design/index/list/",200,4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        //$data['plots'] = $this->create_crop_variety_model->get_varieties($page);
        $data['designed_plots'] = array();
        $data['title']="Designed Plot List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_plot_design/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."rnd_plot_design/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add()
    {
        $data['title'] = "Design Plot";
        $data['plots'] = Query_helper::get_info('rnd_setup_plot_info', '*', array('status =1'));
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_plot_design/add", $data, true));

        if ($this->message)
        {
            $ajax['message'] = $this->message;
        }

        $ajax['page_url']=base_url()."rnd_plot_design/index/add/";
        $this->jsonReturn($ajax);
    }
    public function load_crop_ordering()
    {
        $data['title']='Select Crop ordering';
        $data['year']=$this->input->post('year');
        $data['season_id']=$this->input->post('season_id');
        $data['plot_id']=$this->input->post('plot_id');
        $data['num_rows']=$this->input->post('num_rows');
        //check validation for those inputs and already exits at data base;
        //if invalid or exits show message
        //else
        $data['crops']=$this->rnd_plot_design_model->get_crops($data['year'],$data['season_id']);
        $ajax['status'] = true;
        $ajax['content'][]=array("id"=>"#variety_list","html"=>$this->load->view("rnd_plot_design/crops_ordering",$data,true));
        $this->jsonReturn($ajax);

    }
    public function load_plot()
    {
        $data['title']='Design plot';
        $data['year']=$this->input->post('year');
        $data['season_id']=$this->input->post('season_id');
        $data['plot_id']=$this->input->post('plot_id');
        $data['num_rows']=$this->input->post('num_rows');
        $data['plot_setup']=$this->input->post('plot_setup');
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
    public function rnd_save()
    {

        $ajax['status'] = true;


        $ajax['message']="under construction";


        $this->jsonReturn($ajax);
    }

}
