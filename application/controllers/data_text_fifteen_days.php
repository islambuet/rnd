<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Data_text_fifteen_days extends ROOT_Controller
{
    private  $message;
    private $day_15;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->day_15=$this->config->item("day_interval_15");
        $this->load->model("data_text_fifteen_days_model");
    }

    public function index($task="add_edit",$id=0)
    {
        if($task=="add_edit")
        {
            $this->rnd_add_edit();
        }
        elseif($task=="list")
        {
            $this->rnd_list();
        }
        elseif($task=="save")
        {
            $this->rnd_save();
        }
    }

    public function rnd_add_edit()
    {
        $data['title']="15 Days Interval Report (Fortnightly)";

        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("data_text_fifteen_days/add_edit",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."data_text_fifteen_days/index/add_edit";
        $this->jsonReturn($ajax);
    }

    public function rnd_list()
    {
        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {
            $year = $this->input->post('year');
            $season_id = $this->input->post('season_id');
            $crop_id = $this->input->post('crop_id');
            $crop_type_id = $this->input->post('crop_type_id');
            $day_number = $this->input->post('day_number');

            $data['title']="Fortnightly Report Fields";
            $data['varieties']=$this->data_text_fifteen_days_model->get_varieties($year,$season_id,$crop_id,$crop_type_id,$day_number);

            if($this->message)
            {
                $ajax['message']=$this->message;
            }
            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#data_15_images","html"=>$this->load->view("data_text_fifteen_days/list",$data,true));
            $this->jsonReturn($ajax);
        }
    }

    public function rnd_save()
    {


    }

    public function get_fifteen_days_for_data_text()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');

        $data['selected'] = '';
        $config = Query_helper::get_info("rnd_setup_image_fifteen_days","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1);

        if($config)
        {
            for($i=1; $i<=$config['number_of_fifteendays']; $i++)
            {
                $data['value'][] = $i*$this->day_15;
                $data['name'][] = $i*$this->day_15;
            }

            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#day_number","html"=>$this->load->view("dropdown",$data,true));
            $this->jsonReturn($ajax);
        }
        else
        {
            $ajax['status']=false;
            $ajax['message']=$this->lang->line('IMAGE_15_DAYS_NOT_SETUP');
            $this->jsonReturn($ajax);
        }
    }

    public function get_variety_for_data_text()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $day_number = $this->input->post('day_number');

        $data['selected'] = '';
        $data['varieties']=$this->data_text_fifteen_days_model->get_varieties($year,$season_id,$crop_id,$crop_type_id,$day_number);

        if($data['varieties'])
        {
            foreach($data['varieties'] as $variety)
            {
                $data['value'][] = $variety['id'];
                $data['name'][] = System_helper::get_rnd_code($variety,1);
            }

            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#variety_id","html"=>$this->load->view("dropdown",$data,true));
            $this->jsonReturn($ajax);
        }
        else
        {
            $ajax['status']=false;
            $ajax['message']=$this->lang->line('NO_VARIETY_EXIST_FOR_YOUR_SELECTION');
            $this->jsonReturn($ajax);
        }
    }


    private function check_validation()
    {
        $valid=true;

        return $valid;

    }


}
