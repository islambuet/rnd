<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Data_text_harvest_compile extends ROOT_Controller
{
    private  $message;
    private $day_15;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("data_text_harvest_compile_model");
        $this->config->load('harvest_config');
        $this->lang->load('rnd_harvest');
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
        $data['title']="Harvest Compile Text Data Entry";

        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("data_text_harvest_compile/add_edit",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."data_text_harvest_compile/index/add_edit";
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

            $data['harvest_data'] = $this->data_text_harvest_compile_model->get_data_from_harvest_cropWise($season_id, $crop_id, $crop_type_id, $variety_id);

            if(is_array($data['harvest_data']) && sizeof($data['harvest_data'])>0)
            {
                $data['variety_info'] = $this->data_text_harvest_compile_model->get_variety_info($year,$season_id,$crop_id,$crop_type_id,$variety_id);

                if($data['variety_info']['data_text_id']>0)
                {
                    $data['title']="Edit Data";
                }
                else
                {
                    $data['title']="Add Data";
                }

                $data['options'] = Query_helper::get_info('rnd_setup_text_harvest_compile','*',array('crop_id ='.$crop_id),1);

                if($this->message)
                {
                    $ajax['message']=$this->message;
                }

                $ajax['status']=true;
                $ajax['content'][]=array("id"=>"#harvest_text","html"=>$this->load->view("data_text_harvest_compile/list",$data,true));

                $this->jsonReturn($ajax);
            }
            else
            {
                $ajax['status']=false;
                $ajax['message']=$this->lang->line('THIS_VARIETY_IS_NOT_HARVESTED_YET');
                $this->jsonReturn($ajax);
            }

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
            $inputs=$this->input->post();
            if(!isset($inputs['data_text_id']))
            {
                $ajax['status']=false;
                $ajax['message']=$this->lang->line('MSG_CANNOT_SAVE');
                $this->jsonReturn($ajax);

            }

            $year = $inputs['year'];
            $season_id = $inputs['season_id'];
            $crop_id = $inputs['crop_id'];
            $crop_type_id = $inputs['crop_type_id'];
            $variety_id = $inputs['variety_id'];


            $id=$inputs['data_text_id'];
            $data=array();
            $data['info']=json_encode(array('normal'=>$inputs['normal'],'replica'=>$inputs['replica']));
            $data['ranking']=$this->input->post('ranking');
            $user = User_helper::get_user();
            $time=time();

            $this->db->trans_start();  //DB Transaction Handle START

            if($id>0)
            {
                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = $time;
                Query_helper::update('rnd_data_text_harvest_compile',$data,array('id = '.$id));
            }
            else
            {
                $data['variety_id']=$variety_id;
                $data['year']=$year;
                $data['season_id']=$season_id;
                $data['crop_id']=$crop_id;
                $data['crop_type_id']=$crop_type_id;

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = $time;
                Query_helper::add('rnd_data_text_harvest_compile',$data);
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

    public function get_harvest_compile_varieties_for_data_text()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $data['varieties']=$this->data_text_harvest_compile_model->get_varieties($year,$season_id,$crop_id,$crop_type_id);

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
            $this->jsonReturn($ajax);
        }
        else
        {
            $data_dropdown=array();
            $data_dropdown['selected'] = '';
            $ajax['content'][]=array("id"=>"#variety_id","html"=>$this->load->view("dropdown",$data_dropdown,true));

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
        if($valid)
        {
            if(Query_helper::get_info("delivery_and_sowing_setup","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'season_end_status = 1'),1))
            {
                $valid=false;
                $this->message.=$this->lang->line('SEASON_ALREADY_END').'<br>';

            }
            if($valid)
            {
                if(!Query_helper::get_info("delivery_and_sowing_setup","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'sowing_status = 1'),1))
                {
                    $valid=false;
                    $this->message.=$this->lang->line('SOWING_DID_NOT_STARTED').'<br>';

                }

            }
        }

        return $valid;

    }


}
