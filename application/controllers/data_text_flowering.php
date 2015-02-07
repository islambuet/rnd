<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Data_text_flowering extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("data_text_flowering_model");
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
        $data['title']="Flowering Report";

        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("data_text_flowering/add_edit",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."data_text_flowering/index/add_edit";
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
            $variety_id = $this->input->post('variety_id');
            $flowering_time = $this->input->post('flowering_time');

            $data['title']="Flowering Report Fields";

            $data['variety_info']=$this->data_text_flowering_model->get_variety_info($year,$season_id,$crop_id,$crop_type_id,$variety_id,$flowering_time);
            $data['options']=Query_helper::get_info('rnd_setup_text_flowering','*',array('crop_id ='.$crop_id),1);
            $data['flowering_time']=$flowering_time;

            if($this->message)
            {
                $ajax['message']=$this->message;
            }
            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#flowering_text","html"=>$this->load->view("data_text_flowering/list",$data,true));
            $this->jsonReturn($ajax);
        }
    }

    public function rnd_save()
    {
        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {
            $inputs = $this->input->post();
            $year = $inputs['year'];
            $season_id = $inputs['season_id'];
            $crop_id = $inputs['crop_id'];
            $crop_type_id = $inputs['crop_type_id'];
            $variety_id = $inputs['variety_id'];
            $flowering_time = $inputs['flowering_time'];

            $id = $inputs['data_text_id'];
            $data = array();
            $data['info'] = json_encode(array('normal'=>$inputs['normal'],'replica'=>$inputs['replica']));
            $user = User_helper::get_user();
            $time = time();

            $this->db->trans_start();  //DB Transaction Handle START

            if($id>0)
            {
                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = $time;
                Query_helper::update('rnd_data_text_flowering',$data,array('id = '.$id));
            }
            else
            {
                $data['variety_id']= $variety_id;
                $data['year'] = $year;
                $data['season_id'] = $season_id;
                $data['crop_id'] = $crop_id;
                $data['crop_type_id'] = $crop_type_id;
                $data['flowering_time'] = $flowering_time;
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = $time;
                Query_helper::add('rnd_data_text_flowering',$data);
            }

            $this->db->trans_complete();   //DB Transaction Handle END

            if ($this->db->trans_status() === TRUE)
            {
                $this->message.=$this->lang->line("MSG_CREATE_SUCCESS");
            }
            else
            {
                $this->message.=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
            }
            $this->rnd_list();
        }
    }

    public function get_flowering_times_for_data_text()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $data['varieties']=$this->data_text_flowering_model->get_varieties($year,$season_id,$crop_id,$crop_type_id);

        if($data['varieties'])
        {
            $data_dropdown=array();
            $data_dropdown['selected'] = '';
            foreach($data['varieties'] as $variety)
            {
                $data_dropdown['value'][] = $variety['id'];
                $data_dropdown['name'][] = System_helper::get_rnd_code($variety,1);
            }

            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#variety_id","html"=>$this->load->view("dropdown",$data_dropdown,true));

            $config = Query_helper::get_info("rnd_setup_image_flowering","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1);
            if($config)
            {
                $data_dropdown=array();
                $data_dropdown['value']=array();
                $data_dropdown['name']=array();
                $data_dropdown['selected'] = '';

                foreach($this->config->item('flowering_image') as $val=>$flower)
                {
                    $data_dropdown['value'][] = $val;
                    $data_dropdown['name'][] = $flower;
                }
                $ajax['content'][]=array("id"=>"#flowering_time","html"=>$this->load->view("dropdown",$data_dropdown,true));
            }
            else
            {
                $ajax['status']=false;
                $ajax['message']=$this->lang->line('FLOWERING_NOT_SETUP');
                $data_dropdown=array();
                $data_dropdown['value']=array();
                $data_dropdown['name']=array();
                $data_dropdown['selected'] = '';

                $ajax['content'][]=array("id"=>"#flowering_time","html"=>$this->load->view("dropdown",$data_dropdown,true));
            }
            $this->jsonReturn($ajax);
        }
        else
        {
            $data_dropdown=array();
            $data_dropdown['selected'] = '';
            $ajax['content'][]=array("id"=>"#variety_id","html"=>$this->load->view("dropdown",$data_dropdown,true));
            $ajax['content'][]=array("id"=>"#flowering_time","html"=>$this->load->view("dropdown",$data_dropdown,true));

            $ajax['status']=false;
            $ajax['message']=$this->lang->line('NO_VARIETY_EXIST_FOR_YOUR_SELECTION');
            $this->jsonReturn($ajax);
        }
    }

    private function check_validation()
    {
        $valid=true;
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $variety_id = $this->input->post('variety_id');
        $flowering_time = $this->input->post('flowering_time');

        if(Validation_helper::validate_empty($year))
        {
            $valid=false;
            $this->message.="Select a Year<br>";
        }
        if(Validation_helper::validate_empty($season_id))
        {
            $valid=false;
            $this->message.="Select a Season<br>";
        }

        if(Validation_helper::validate_empty($crop_id))
        {
            $valid=false;
            $this->message.="Select a Crop<br>";
        }
        if(Validation_helper::validate_empty($crop_type_id))
        {
            $valid=false;
            $this->message.="Select a crop type<br>";
        }
        if(Validation_helper::validate_empty($variety_id))
        {
            $valid=false;
            $this->message.="Select a RND code<br>";
        }
        if(Validation_helper::validate_empty($flowering_time))
        {
            $valid=false;
            $this->message.="Select a Flowering Time<br>";
        }
        if($valid)
        {
            if(!Query_helper::get_info("rnd_setup_image_flowering","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1))
            {
                $valid=false;
                $this->message.=$this->lang->line('FLOWERING_NOT_SETUP').'<br>';

            }
            if(!Query_helper::get_info("delivery_and_sowing_setup","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'sowing_status = 1'),1))
            {
                $valid=false;
                $this->message.=$this->lang->line('SOWING_DID_NOT_STARTED').'<br>';

            }
            if($valid)
            {
                if(Query_helper::get_info("delivery_and_sowing_setup","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'season_end_status = 1'),1))
                {
                    $valid=false;
                    $this->message.=$this->lang->line('SEASON_ALREADY_END').'<br>';
                }
            }
        }

        return $valid;
    }

}