<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_feriliser_requirement extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_feriliser_requirement_model");
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
        $config = System_helper::pagination_config(base_url() . "create_crop/index/list/",$this->rnd_feriliser_requirement_model->get_total_crops(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['cropInfo'] = $this->rnd_feriliser_requirement_model->get_cropInfo($page);
        $data['title']="Fertilizer Requirement List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_feriliser_requirement/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['cropInfo'] = $this->rnd_feriliser_requirement_model->get_crop_row($id);
            $data['title']="Edit Crop (".$data['cropInfo']['crop_name'].")";
        }
        else
        {
            $data["cropInfo"] = Array(
                'id' => 0,
                'crop_name' => '',
                'crop_code' => '',
                'crop_height' => '',
                'crop_width' => '',
                'status' => $this->config->item('active')
            );
            $data['title']="New Fertilizer Requirements";
        }

        $data['fertilizers']= Query_helper::get_info('rnd_fertilizer_info', '*', array());
        $data['seedbeds']= Query_helper::get_info('rnd_seed_bed_info', '*', array());


        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_feriliser_requirement/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("requirement_id");
        $user = User_helper::get_user();

        $data = Array(
            'fertilizer_id'=>$this->input->post('fertilizer'),
            'seed_bed_id'=>$this->input->post('seedbed'),
            'crop_width'=>$this->input->post('quantity'),
            'crop_height'=>$this->input->post('crop_height'),
            'status'=>$this->input->post('status'),
        );

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->lang->line("MSG_INVALID_INPUT");
            $this->jsonReturn($ajax);
        }
        else
        {
            if($id>0)
            {
                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_crop_info',$data,array("id = ".$id));
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");

            }
            else
            {
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_crop_info',$data);
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");

            }

            $this->rnd_list();//this is similar like redirect
        }

    }

    private function check_validation()
    {
        if(Validation_helper::validate_empty($this->input->post('crop_name')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('crop_code')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('crop_width')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('crop_height')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('status')))
        {
            return false;
        }
        return true;
    }


}
