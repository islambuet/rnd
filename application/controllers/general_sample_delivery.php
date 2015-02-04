<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class General_sample_delivery extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("general_sample_delivery_model");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list($id);
        }
        elseif($task=="edit")
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
        $config = System_helper::pagination_config(base_url() . "general_sample_delivery/index/list/",$this->general_sample_delivery_model->get_total_samples(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['samples'] = $this->general_sample_delivery_model->get_samples($page);
        $data['title']="Sample Delivery List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("general_sample_delivery/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."general_sample_delivery/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {

        $data['sample']=$this->general_sample_delivery_model->get_sample_info($id);
        $data['variety_not_sent']=$this->general_sample_delivery_model->get_varieties($data['sample']['year'],$data['sample']['season_id'],$data['sample']['crop_id'],0);
        $data['variety_sent']=$this->general_sample_delivery_model->get_varieties($data['sample']['year'],$data['sample']['season_id'],$data['sample']['crop_id'],1);
        $data['title']="Sample Delivery";
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("general_sample_delivery/add_edit",$data,true));

        $ajax['page_url']=base_url()."general_sample_delivery/index/edit/".$id;

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {

        $id = $this->input->post("sample_id");
        $varieties=$this->input->post("varieties");

        if(is_array($varieties))
        {
            $sample=$this->general_sample_delivery_model->get_sample_info($id);
            if($sample['sowing_status']==0)
            {
                $user = User_helper::get_user();

                $data['sample_delivery_status']=1;
                $data['modified_by']=$user->user_id;
                $data['modification_date']=time();
                $data['sample_size']=$sample['sample_size'];
                $this->db->trans_start();  //DB Transaction Handle START
                foreach($varieties as $variety_season_id)
                {
                    Query_helper::update('rnd_variety_season',$data,array("id = ".$variety_season_id));
                }
                $this->db->trans_complete();   //DB Transaction Handle END

                if ($this->db->trans_status() === TRUE)
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
                $this->message=$this->lang->line("SOWING_STARTED_NO_MORE_DELIVERY");
            }
        }
        $this->rnd_list();//this is similar like redirect

    }


    public function check_existing_season()
    {
        if($this->general_sample_delivery_model->check_existing_season($this->input->post('sample_season_id'), $this->input->post('sample_rnd_year')))
        {
            $ajax['status']=true;
        }
        else
        {
            $ajax['status']=false;
        }

        if($ajax['status'])
        {
            $ajax['message'] = 'Season Exists for the selected year';
        }
        else
        {
            $ajax['message'] = '';

        }

        $this->jsonReturn($ajax);
    }

    private function check_validation()
    {
        // Will be Modified

        if($this->input->post('sample_season_id'))
        {
            if(Validation_helper::validate_empty($this->input->post('sample_season_id')))
            {
                return false;
            }
        }

        if($this->input->post('sample_rnd_year'))
        {
            if(Validation_helper::validate_empty($this->input->post('sample_rnd_year')) || $this->general_sample_delivery_model->check_existing_season($this->input->post('sample_season_id'), $this->input->post('sample_rnd_year')))
            {
                return false;
            }
        }

        if(Validation_helper::validate_empty($this->input->post('destined_delivery_date')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('delivered')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('received')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('destined_sowing_date')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('sowing')))
        {
            return false;
        }

        return true;
    }


}
