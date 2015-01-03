<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_crop_type extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("create_type_model");
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
        $config = System_helper::pagination_config(base_url() . "create_crop_type/index/list/",$this->create_type_model->get_total_types(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['typeInfo'] = $this->create_type_model->get_typeInfo($page);
        $data['title']="Crop Type List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_type/list",$data,true));
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

            $data['typeInfo'] = $this->create_type_model->get_type_row($id);
            $data['title']="Edit Crop Type (".$data['typeInfo']['product_type'].")";
        }
        else
        {
            $data['title']="Create New Crop Type";
            $data["typeInfo"] = Array(
                'id' => 0,
                'crop_id' => '',
                'product_type' => '',
                'product_type_code' => '',
                'product_type_height' => '',
                'product_type_width' => '',
                'status' => $this->config->item('active')
            );
        }

        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_type/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("type_id");
        $user = User_helper::get_user();

        $data = Array(
            'crop_id'=>$this->input->post('crop_id'),
            'product_type'=>$this->input->post('product_type'),
            'product_type_code'=>$this->input->post('type_code'),
            'product_type_height'=>$this->input->post('height'),
            'product_type_width'=>$this->input->post('width'),
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

                Query_helper::update('rnd_product_type_info',$data,array("id = ".$id));
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");

            }
            else
            {
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_product_type_info',$data);
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");

            }

            $this->rnd_list();//this is similar like redirect
        }

    }

    private function check_validation()
    {
        if(Validation_helper::validate_empty($this->input->post('crop_id')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('product_type')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('type_code')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('height')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('width')))
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
