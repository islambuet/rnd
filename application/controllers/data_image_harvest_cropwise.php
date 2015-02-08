<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Data_image_harvest_cropwise extends ROOT_Controller
{
    private  $message;
    private $day_15;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->day_15=$this->config->item("day_interval_15");
        $this->load->model("data_image_harvest_cropwise_model");
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
        $data['title']="Data Image Harvest Crop wise";

        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("data_image_harvest_cropwise/add_edit",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."data_image_harvest_cropwise/index/add_edit";
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
            $harvest_no = $this->input->post('harvest_no');

            $data['title']="Upload Image";
            $data['sowing_info']=Query_helper::get_info('delivery_and_sowing_setup','*',array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id),1);
            $data['harvest_no']=$harvest_no;

            $image_sample_json=Query_helper::get_info('rnd_setup_image_harvest_cropwise',array('images'),array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1);

            $head_images=json_decode($image_sample_json['images'],true);


            $data['head_images']=$head_images;

            $data['varieties']=$this->data_image_harvest_cropwise_model->get_varieties($year,$season_id,$crop_id,$crop_type_id,$harvest_no);

            if($this->message)
            {
                $ajax['message']=$this->message;
            }
            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#harvest_cropwise_images","html"=>$this->load->view("data_image_harvest_cropwise/list",$data,true));
            $ajax['content'][]=array("id"=>"#harvest_no","html"=>$this->get_harvest_no_dropdown($harvest_no));
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
            $harvest_no = $this->input->post('harvest_no');
            $dir=$this->config->item("dir");
            $uploaded_images=System_helper::upload_file($dir['harvest cropwise_image_data']);

            $user = User_helper::get_user();
            $time=time();

            $variety_ids=$this->input->post('variety_id');
            $this->db->trans_start();  //DB Transaction Handle START
            foreach($variety_ids as $variety_id)
            {
                $data=array();
                $id=$this->input->post('rdihc_id_'.$variety_id);
                $image_normal=array();
                $image_replica=array();
                $remarks=array();
                foreach($this->config->item('harvest cropwise_image') as $key=>$harvest_config)
                {

                    $image_normal[$key]=$this->input->post('old_normal_image_'.$key.'_'.$variety_id);
                    if(array_key_exists('file_normal_'.$key.'_'.$variety_id,$uploaded_images))
                    {

                        if($uploaded_images['file_normal_'.$key.'_'.$variety_id]['status'])
                        {
                            $image_normal[$key]=$uploaded_images['file_normal_'.$key.'_'.$variety_id]['info']['file_name'];
                        }
                        else
                        {
                            $this->message.=$uploaded_images['file_normal_'.$key.'_'.$variety_id]['message'].'<br>';
                        }
                    }

                    $image_replica[$key]=$this->input->post('old_replica_image_'.$key.'_'.$variety_id);
                    if(array_key_exists('file_replica_'.$key.'_'.$variety_id,$uploaded_images))
                    {

                        if($uploaded_images['file_replica_'.$key.'_'.$variety_id]['status'])
                        {
                            $image_replica[$key]=$uploaded_images['file_replica_'.$key.'_'.$variety_id]['info']['file_name'];
                        }
                        else
                        {
                            $this->message.=$uploaded_images['file_replica_'.$key.'_'.$variety_id]['message'].'<br>';
                        }
                    }

                    $remarks[$key]=$this->input->post('remarks_'.$key.'_'.$variety_id);
                }
                $data['images']=json_encode(array('normal'=>$image_normal,'replica'=>$image_replica));
                $data['remarks']=json_encode($remarks);
                if($id>0)
                {
                    $data['modified_by'] = $user->user_id;
                    $data['modification_date'] = $time;
                    Query_helper::update('rnd_data_image_harvest_cropwise',$data,array('id = '.$id));
                }
                else
                {
                    $data['variety_id']=$variety_id;
                    $data['year']=$year;
                    $data['season_id']=$season_id;
                    $data['crop_id']=$crop_id;
                    $data['crop_type_id']=$crop_type_id;
                    $data['harvest_no']=$harvest_no;
                    $data['created_by'] = $user->user_id;
                    $data['creation_date'] = $time;
                    Query_helper::add('rnd_data_image_harvest_cropwise',$data);
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
    private function get_harvest_no_dropdown($selected)
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');


        $config = Query_helper::get_info("rnd_data_image_harvest_cropwise","max(harvest_no) total_harvest",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1);
        $max_harvest=1;

        if($config && $config['total_harvest'])
        {
            $max_harvest=($config['total_harvest']>0)?($config['total_harvest']+1):1;
        }
        $data['selected']=$selected;

        for($i=1; $i<=$max_harvest; $i++)
        {
            $data['value'][] = $i;
            $data['name'][] = $i;
        }
        $html=$this->load->view("dropdown",$data,true);
        return $html;
    }

    public function get_harvest_no_for_data_image()
    {
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#harvest_no","html"=>$this->get_harvest_no_dropdown(0));
        $this->jsonReturn($ajax);

    }


    private function check_validation()
    {
        $valid=true;
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $harvest_no = $this->input->post('harvest_no');
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
        if(Validation_helper::validate_empty($harvest_no))
        {
            $valid=false;
            $this->message.="Select a harvest no.<br>";
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
                if($valid)
                {
                    if(!Query_helper::get_info("rnd_setup_image_harvest_cropwise","*",array('year = '.$year,'season_id = '.$season_id,'crop_id = '.$crop_id,'crop_type_id = '.$crop_type_id),1))
                    {
                        $valid=false;
                        $this->message.=$this->lang->line('IMAGE_HARVEST_CROPWISE_NOT_SETUP').'<br>';

                    }
                }

            }
        }
        return $valid;

    }


}
