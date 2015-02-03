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
            $year=$this->input->post("year");
            $season_id=$this->input->post("season_id");
            $crop_id=$this->input->post("crop_id");
            $crop_type_id=$this->input->post("crop_type_id");
            $config=Query_helper::get_info("rnd_setup_image_fifteen_days","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1);
            $data=array();
            if($config)
            {
                $data['title']='Edit Images';
                $data['number_of_fifteendays']=$config['number_of_fifteendays'];
                $images=json_decode($config['images'],true);
                for($i=1;$i<=$this->config->item("max_number_of_fifteen_days");$i++)
                {
                    if($i<=$data['number_of_fifteendays'])
                    {
                        $data['images'][$i*15]=$images[$i*15];
                    }
                    else
                    {
                        $data['images'][$i*15]='no_image.jpg';
                    }

                }

            }
            else
            {
                $old_config=Query_helper::get_info("rnd_setup_image_fifteen_days","*",array('year = '.($year-1),'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1);
                $data['title']='Add Images';
                if($old_config)
                {
                    $data['number_of_fifteendays']=$old_config['number_of_fifteendays'];
                    $images=json_decode($old_config['images'],true);
                    for($i=1;$i<=$this->config->item("max_number_of_fifteen_days");$i++)
                    {
                        if($i<=$data['number_of_fifteendays'])
                        {
                            $data['images'][$i*15]=$images[$i*15];
                        }
                        else
                        {
                            $data['images'][$i*15]='no_image.jpg';
                        }

                    }

                }
                else
                {
                    $data['number_of_fifteendays']=$this->config->item("default_number_of_fifteen_days");
                    for($i=1;$i<=$this->config->item("max_number_of_fifteen_days");$i++)
                    {
                        $data['images'][$i*15]='no_image.jpg';
                    }
                }

            }

            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#config_15_images","html"=>$this->load->view("setup_image_fifteen_days/list",$data,true));
            if($this->message)
            {
                $ajax['message']=$this->message;
            }
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
            $dir=$this->config->item("dir");
            $uploaded_images=System_helper::upload_file($dir['15_days_image_config']);

            $year=$this->input->post("year");
            $season_id=$this->input->post("season_id");
            $crop_id=$this->input->post("crop_id");
            $crop_type_id=$this->input->post("crop_type_id");
            $number_of_fifteendays=$this->input->post("number_of_fifteendays");
            $config=Query_helper::get_info("rnd_setup_image_fifteen_days","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1);
            $user = User_helper::get_user();
            $time=time();
            $data['number_of_fifteendays']=$number_of_fifteendays;
            $images=array();
            for($i=1;$i<=$number_of_fifteendays;$i++)
            {
                if(array_key_exists('file_'.($i*15),$uploaded_images))
                {

                    if($uploaded_images['file_'.($i*15)]['status'])
                    {
                        $images[($i*15)]=$uploaded_images['file_'.($i*15)]['info']['file_name'];
                    }
                    else
                    {
                        $images[($i*15)]=$this->input->post('old_'.($i*15));
                        $this->message.=$uploaded_images['file_'.($i*15)]['message'];

                    }
                }
                else
                {
                    $images[($i*15)]=$this->input->post('old_'.($i*15));
                }
                //Query_helper::add('rnd_setup_image_fifteen_days_images',$image_data);
            }
            $data['images']=json_encode($images);
            $this->db->trans_start();  //DB Transaction Handle START
            if($config)
            {
                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = $time;
                Query_helper::update('rnd_setup_image_fifteen_days',$data,array('id = '.$config['id']));

            }
            else
            {
                $data['year']=$year;
                $data['season_id']=$season_id;
                $data['crop_id']=$crop_id;
                $data['crop_type_id']=$crop_type_id;
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = $time;
                Query_helper::add('rnd_setup_image_fifteen_days',$data);
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
