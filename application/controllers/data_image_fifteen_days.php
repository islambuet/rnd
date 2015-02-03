<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Data_image_fifteen_days extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("data_image_fifteen_days_model");
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
        $data['title']="Data Image Fifteen Days";

        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("data_image_fifteen_days/add_edit",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."data_image_fifteen_days/index/add_edit";
        $this->jsonReturn($ajax);
    }

    public function rnd_list()
    {


    }

    public function rnd_save()
    {

    }

    public function get_fifteen_days_for_data_image()
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
                $data['value'][] = $i*15;
                $data['name'][] = $i*15;
            }

            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#number_of_fifteendays","html"=>$this->load->view("dropdown",$data,true));
            $this->jsonReturn($ajax);
        }
        else
        {
            $ajax['status']=false;
            $ajax['message']=$this->lang->line('IMAGE_15_DAYS_NOT_SETUP');
            $this->jsonReturn($ajax);
        }

    }


    private function check_validation()
    {
        $valid=true;
        if(Validation_helper::validate_empty($this->input->post('year')))
        {
            $valid=false;
            $this->message.="Select a Year<br>";
        }
        if(Validation_helper::validate_empty($this->input->post('season_id')))
        {
            $valid=false;
            $this->message.="Select a Season<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('crop_id')))
        {
            $valid=false;
            $this->message.="Select a Crop<br>";
        }
        if(Validation_helper::validate_empty($this->input->post('crop_type_id')))
        {
            $valid=false;
            $this->message.="Select a crop type<br>";
        }
        return $valid;

    }


}
