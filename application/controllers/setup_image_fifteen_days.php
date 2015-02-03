<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Setup_image_fifteen_days extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("setup_image_fifteen_days_model");
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
        $data['title']="Setup Image Fifteen Days";

        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_image_fifteen_days/add_edit",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."setup_image_fifteen_days/index/add_edit";
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
            $data['title']="Upload Images";
            $data['number_of_fifteendays']=$this->config->item("default_number_of_fifteen_days");
            for($i=0;$i<$this->config->item("max_number_of_fifteen_days");$i++)
            {
                $data['images'][$i*15]=base_url().'images/15_days_image_config/no_image.jpg';
            }
            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#config_15_images","html"=>$this->load->view("setup_image_fifteen_days/list",$data,true));
            $this->jsonReturn($ajax);

        }

    }

    public function rnd_save()
    {
        /*$id = $this->input->post("crop_id");
        $user = User_helper::get_user();

        $data = Array(
            'crop_name'=>$this->input->post('crop_name'),
            'crop_code'=>$this->input->post('crop_code'),
            'crop_width'=>$this->input->post('crop_width'),
            'crop_height'=>$this->input->post('crop_height'),
            'fruit_type'=>$this->input->post('fruit_type'),
            'sample_size'=>$this->input->post('sample_size'),
            'initial_plants'=>$this->input->post('initial_plants'),
            'plants_per_hectare'=>$this->input->post('plants_per_hectare'),
            'status'=>$this->config->item('status_active')
        );

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {
            $this->db->trans_start();  //DB Transaction Handle START
            $time=time();

            $data['created_by'] = $user->user_id;
            $data['creation_date'] = $time;

            $crop_id=Query_helper::add('rnd_crop',$data);

            $this->db->trans_complete();   //DB Transaction Handle END

            if ($this->db->trans_status() === TRUE)
            {
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
            }
            else
            {
                $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
            }

            $this->rnd_add_edit();//this is similar like redirect
        }*/

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
