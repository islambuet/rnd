<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Config_fifteen_days extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("config_fifteen_days_model");
    }

    public function index($task="add_edit",$id=0)
    {
        if($task=="add_edit")
        {
            $this->rnd_add_edit($id);
        }
        elseif($task=="save")
        {
            $this->rnd_save();
        }
    }

    public function rnd_add_edit($page=0)
    {
        $data['cropInfo'] = $this->config_fifteen_days_model->get_cropInfo($page);
        $data['title']="Config Fifteen Days";

        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("config_fifteen_days/add_edit",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."config_fifteen_days/index/add_edit";
        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {

        $id = $this->input->post("crop_id");
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
            $status_data['crop_id']=$crop_id;
            $status_data['created_by']=$user->user_id;
            $status_data['creation_date']=$time;
            Query_helper::add('rnd_status_fifteen_days_report',$status_data);
            Query_helper::add('rnd_status_flowering_report',$status_data);
            Query_helper::add('rnd_status_fruit_report',$status_data);
            Query_helper::add('rnd_status_harvest_compile_report',$status_data);
            Query_helper::add('rnd_status_harvest_report',$status_data);
            Query_helper::add('rnd_status_yield_report',$status_data);
            $this->db->trans_complete();   //DB Transaction Handle END

            if ($this->db->trans_status() === TRUE)
            {
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
            }
            else
            {
                $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
            }

            $this->rnd_list();//this is similar like redirect
        }

    }
    public function rnd_save_ordering()
    {

        $id = $this->input->post("crop_id");
        $data['ordering']=$this->input->post("ordering");
        $user = User_helper::get_user();
        $this->db->trans_start();  //DB Transaction Handle START

        $data['modified_by'] = $user->user_id;
        $data['modification_date'] = time();

        Query_helper::update('rnd_crop',$data,array("id = ".$id));

        $this->db->trans_complete();   //DB Transaction Handle END

        if ($this->db->trans_status() === TRUE)
        {
            $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
        }
        else
        {
            $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
        }
        $this->rnd_list();//this is similar like redirect

    }

    private function check_validation()
    {
        $valid=true;
        if(Validation_helper::validate_empty($this->input->post('crop_name')))
        {
            $valid=false;
            $this->message.="Crop Name Cannot Be Empty<br>";
        }
        elseif($this->create_crop_model->check_crop_name_existence($this->input->post('crop_name')))
        {
            $valid=false;
            $this->message.="Crop Name Exists<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('crop_code')))
        {
            $valid=false;
            $this->message.="Crop Code Cannot Be Empty<br>";
        }
        elseif($this->create_crop_model->check_crop_code_existence($this->input->post('crop_code')))
        {
            $valid=false;
            $this->message.="Crop Code Exists<br>";
        }
        if(!Validation_helper::validate_numeric($this->input->post('crop_width')))
        {
            $valid=false;
            $this->message.="Crop Width Must be number<br>";
        }
        if(!Validation_helper::validate_numeric($this->input->post('crop_height')))
        {
            $valid=false;
            $this->message.="Crop height Must be number<br>";
        }
        if(!Validation_helper::validate_int($this->input->post('fruit_type')))
        {
            $valid=false;
            $this->message.="Select Fruit Type<br>";
        }

        if(!Validation_helper::validate_numeric($this->input->post('sample_size')))
        {
            $valid=false;
            $this->message.="Sample size Must be number<br>";
        }

        if(!Validation_helper::validate_int($this->input->post('initial_plants')))
        {
            $valid=false;
            $this->message.="Initial plants Must be number<br>";
        }
        if(!Validation_helper::validate_int($this->input->post('plants_per_hectare')))
        {
            $valid=false;
            $this->message.="Plants per hectare Must be number<br>";
        }

        return $valid;
    }


}
