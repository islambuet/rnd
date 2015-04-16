<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class General_crop_info_setup extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("general_crop_info_setup_model");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list($id);
        }
        elseif($task=="add" || $task=="edit")
        {
            $this->rnd_add_edit($id);
        }
        elseif($task=="save")
        {
            $this->rnd_save();
        }
        else
        {
            $this->rnd_list($id);
        }
    }

    public function rnd_list($page=0)
    {
        $config = System_helper::pagination_config(base_url() . "general_crop_info_setup/index/list/",$this->general_crop_info_setup_model->get_total_records(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['crops'] = $this->general_crop_info_setup_model->get_crops($page);
        $data['title']="Crop Info";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("general_crop_info_setup/list",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."general_crop_info_setup/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id>0)
        {
            $data['crop_info'] = $this->general_crop_info_setup_model->get_crop_info($id);
            $data['title']="Edit Crop Info";
            $ajax['page_url']=base_url()."general_crop_info_setup/index/edit/".$id;
        }
        else
        {
            $data['title']="Create New Crop Info";
            $data["crop_info"]['id'] = 0;
            $data["crop_info"]['year'] = date("Y",time());
            $data["crop_info"]['expected_analysis_date_from'] = '';
            $data["crop_info"]['expected_analysis_date_to'] = '';
            $data["crop_info"]['analysis_date'] = '';
            $data["crop_info"]['expected_analysis_date_with_market_from'] = '';
            $data["crop_info"]['expected_analysis_date_with_market_to'] = '';
            $data["crop_info"]['analysis_with_market_date'] = '';
            $data["crop_info"]['expected_presentation_to_management_from'] = '';
            $data["crop_info"]['expected_presentation_to_management_to'] = '';
            $data["crop_info"]['presentation_to_management'] = '';

            $ajax['page_url']=base_url()."general_crop_info_setup/index/add";
        }

        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("general_crop_info_setup/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("id");
        $user = User_helper::get_user();

        $data['expected_analysis_date_from']=System_helper::get_time($this->input->post('expected_analysis_date_from'));
        $data['expected_analysis_date_to']=System_helper::get_time($this->input->post('expected_analysis_date_to'));
        $data['analysis_date']=System_helper::get_time($this->input->post('analysis_date'));
        $data['expected_analysis_date_with_market_from']=System_helper::get_time($this->input->post('expected_analysis_date_with_market_from'));
        $data['expected_analysis_date_with_market_to']=System_helper::get_time($this->input->post('expected_analysis_date_with_market_to'));
        $data['analysis_with_market_date']=System_helper::get_time($this->input->post('analysis_with_market_date'));
        $data['expected_presentation_to_management_from']=System_helper::get_time($this->input->post('expected_presentation_to_management_from'));
        $data['expected_presentation_to_management_to']=System_helper::get_time($this->input->post('expected_presentation_to_management_to'));
        $data['presentation_to_management']=System_helper::get_time($this->input->post('presentation_to_management'));

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {
            if($id>0)
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_general_crop_info_setup',$data,array("id = ".$id));

                $this->db->trans_complete();   //DB Transaction Handle END

                if($this->db->trans_status() === TRUE)
                {
                    $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
                }
                else
                {
                    $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                }
            }
            else
            {
                $this->db->trans_start();  //DB Transaction Handle START
                $data['year']=$this->input->post('year');
                $data['season_id']=$this->input->post('season_id');
                $data['crop_id']=$this->input->post('crop_id');
                $data['crop_type_id']=$this->input->post('crop_type_id');
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_general_crop_info_setup',$data);

                $this->db->trans_complete();   //DB Transaction Handle END

                if ($this->db->trans_status() === TRUE)
                {
                    $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
                }
                else
                {
                    $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
                }
            }

            $this->rnd_list();//this is similar like redirect
        }

    }

    private function check_validation()
    {
        $valid=true;
        if(!($this->input->post('id')>0))
        {
            $year=$this->input->post('year');
            $season_id=$this->input->post('season_id');
            $crop_id=$this->input->post('crop_id');
            $crop_type_id=$this->input->post('crop_type_id');
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
                $this->message.="Select a Crop Type<br>";
            }
            if($valid)
            {
                $exist=Query_helper::get_info('rnd_general_crop_info_setup',array('id'),array('year ='.$year,'season_id ='.$season_id,'crop_id ='.$crop_id,'crop_type_id ='.$crop_type_id),1);
                if($exist)
                {
                    $valid=false;
                    $this->message.="You already Added this setup.Please Edit that setup.<br>";
                }
            }
        }

        return $valid;
    }


}
