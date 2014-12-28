<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_crop_variety extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("create_crop_variety_model");
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

        $config = System_helper::pagination_config(base_url() . "create_crop_variety/index/list/",$this->create_crop_variety_model->get_total_varieties(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['varietyInfo'] = $this->create_crop_variety_model->get_varietyInfo($page);
        $data['title']="Crop Variety List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop_variety/list",$data,true));
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
            $data['title']="Edit Crop Variety";
            $data['typeInfo'] = $this->create_crop_variety_model->get_type_row($id);
        }
        else
        {
            $data['title']="Add Crop Variety";
            $data["typeInfo"] = Array(
                'id' => 0,
                'crop_id' => '',
                'product_type' => '',
                'product_type_code' => '',
                'product_type_height' => '',
                'product_type_width' => '',
                'status' => ''
            );
        }

        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array());
        $data['principals'] = Query_helper::get_info('rnd_principal_info', '*', array());
        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop_variety/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("variety_id");
        $user = User_helper::get_user();

        $seasonPost = $this->input->post('season');

        $data = Array(
            'principal_id'=>$this->input->post('principal_id'),
            'flowering_type_id'=>$this->input->post('flowering_type'),
            'crop_id'=>$this->input->post('crop_select'),
            'product_type_id'=>$this->input->post('crop_type'),
            'variety_name'=>$this->input->post('variety_name'),
            'variety_type'=>$this->input->post('variety_type'),
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
                for($i=0; $i<sizeof($seasonPost); $i++)
                {
                    $data['modified_by'] = $user->user_id;
                    $data['modification_date'] = time();
                    $data['season_id'] = $seasonPost[$i];

                    Query_helper::update('rnd_variety_info',$data,array("id = ".$id));
                }

                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");

            }
            else
            {
                for($i=0; $i<sizeof($seasonPost); $i++)
                {
                    $data['created_by'] = $user->user_id;
                    $data['creation_date'] = time();
                    $data['season_id'] = $seasonPost[$i];

                    Query_helper::add('rnd_variety_info',$data);
                }

                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");

            }

            $this->rnd_list();//this is similar like redirect
        }

    }

    private function check_validation()
    {
        if(!Validation_helper::validate_numeric($this->input->post('principal_id')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('flowering_type')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('crop_select')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('crop_type')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('variety_name')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('variety_type')))
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
