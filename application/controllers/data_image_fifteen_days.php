<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Data_image_fifteen_days extends ROOT_Controller
{
    private  $message;
    private $day_15;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->day_15=$this->config->item("day_interval_15");
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
        $data['title']="Data Image Fortnightly";

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

            $data['title']="Upload Image";
            $image_sample_json=Query_helper::get_info('rnd_setup_image_fifteen_days',array('images'),array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1);

            $image_sample=json_decode($image_sample_json['images'],true);
            $data['day_number']=$day_number;
            $data['sowing_info']=Query_helper::get_info('delivery_and_sowing_setup','*',array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id),1);
            $data['sample_image']=$image_sample[$day_number];

            $data['varieties']=$this->data_image_fifteen_days_model->get_varieties($year,$season_id,$crop_id,$crop_type_id,$day_number);

            if($this->message)
            {
                $ajax['message']=$this->message;
            }

            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#data_15_images","html"=>$this->load->view("data_image_fifteen_days/list",$data,true));
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
            $year = $this->input->post('year');
            $season_id = $this->input->post('season_id');
            $crop_id = $this->input->post('crop_id');
            $crop_type_id = $this->input->post('crop_type_id');
            $day_number = $this->input->post('day_number');
            $dir=$this->config->item("dir");
            $uploaded_images=System_helper::upload_file($dir['15_days_image_data']);
//
            $user = User_helper::get_user();
            $time=time();

            //Query_helper::add('rnd_setup_image_fifteen_days',$data);
            $variety_ids=$this->input->post('variety_id');
            $this->db->trans_start();  //DB Transaction Handle START
            foreach($variety_ids as $variety_id)
            {
                $data=array();
                $id=$this->input->post('rdifd_id_'.$variety_id);
                $image_normal=$this->input->post('old_normal_image_'.$variety_id);

                if(array_key_exists('file_normal_'.$variety_id,$uploaded_images))
                {
                    if($uploaded_images['file_normal_'.$variety_id]['status'])
                    {
                        $image_normal=$uploaded_images['file_normal_'.$variety_id]['info']['file_name'];
                    }
                    else
                    {
                        $this->message.=$uploaded_images['file_normal_'.$variety_id]['message'].'<br>';
                    }
                }

                $image_replica=$this->input->post('old_replica_image_'.$variety_id);
                if(array_key_exists('file_replica_'.$variety_id,$uploaded_images))
                {

                    if($uploaded_images['file_replica_'.$variety_id]['status'])
                    {
                        $image_replica=$uploaded_images['file_replica_'.$variety_id]['info']['file_name'];
                    }
                    else
                    {
                        $this->message.=$uploaded_images['file_replica_'.$variety_id]['message'].'<br>';
                    }
                }

                $data['images']=json_encode(array('normal'=>$image_normal,'replica'=>$image_replica));
                $data['remarks']=$this->input->post('remarks_'.$variety_id);
                if($id>0)
                {
                    $data['modified_by'] = $user->user_id;
                    $data['modification_date'] = $time;
                    Query_helper::update('rnd_data_image_fifteen_days',$data,array('id = '.$id));
                }
                else
                {
                    $data['variety_id']=$variety_id;
                    $data['year']=$year;
                    $data['season_id']=$season_id;
                    $data['crop_id']=$crop_id;
                    $data['crop_type_id']=$crop_type_id;
                    $data['day_number']=$day_number;
                    $data['created_by'] = $user->user_id;
                    $data['creation_date'] = $time;
                    Query_helper::add('rnd_data_image_fifteen_days',$data);
                }
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


    private function check_validation()
    {
        $valid=true;
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $day_number = $this->input->post('day_number');
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
        if(Validation_helper::validate_empty($day_number))
        {
            $valid=false;
            $this->message.="Select a Day<br>";
        }
        if($valid)
        {
            if(!Query_helper::get_info("rnd_setup_image_fifteen_days","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1))
            {
                $valid=false;
                $this->message.=$this->lang->line('IMAGE_15_DAYS_NOT_SETUP').'<br>';

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
