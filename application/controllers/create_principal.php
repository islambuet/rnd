<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_principal extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("create_principal_model");
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
        $config = System_helper::pagination_config(base_url() . "create_principal/index/list/",$this->create_principal_model->get_total_principals(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['principalInfo'] = $this->create_principal_model->get_principalInfo($page);
        $data['title']="Crop Principal";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_principal/list",$data,true));
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
            $data['title']="Edit Crop Principal";
            $data['principalInfo'] = $this->create_principal_model->get_principal_row($id);
        }
        else
        {
            $data['title']="Add Crop Principal";
            $data["principalInfo"] = Array(
                'id' => 0,
                'principal_name' => '',
                'principal_code' => '',
                'contact_person_name' => '',
                'email' => '',
                'contact_number' => '',
                'address' => '',
                'status' => ''
            );
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_principal/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("principal_id");
        $user = User_helper::get_user();

        $data = Array(
            'principal_name'=>$this->input->post('principal_name'),
            'principal_code'=>$this->input->post('principal_code'),
            'contact_person_name'=>$this->input->post('contact_person_name'),
            'email'=>$this->input->post('email_id'),
            'contact_number'=>$this->input->post('contact_number'),
            'address'=>$this->input->post('address'),
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

                Query_helper::update('rnd_principal_info',$data,array("id = ".$id));
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");

            }
            else
            {
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_principal_info',$data);
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");

            }

            $this->rnd_list();//this is similar like redirect
        }

    }

    private function check_validation()
    {
        if(Validation_helper::validate_empty($this->input->post('principal_name')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('principal_code')))
        {
            return false;
        }

        return true;
    }


}
