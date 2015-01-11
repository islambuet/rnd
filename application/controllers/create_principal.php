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
        $ajax['page_url']=base_url()."create_principal/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['principalInfo'] = $this->create_principal_model->get_principal_row($id);
            $data['title']="Edit Crop Principal (".$data['principalInfo']['principal_name'].")";
            $ajax['page_url']=base_url()."create_principal/index/edit/".$id;
        }
        else
        {
            $data['title']="Create New Crop Principal";
            $data["principalInfo"] = Array(
                'id' => 0,
                'principal_name' => '',
                'principal_code' => '',
                'contact_person_name' => '',
                'email' => '',
                'contact_number' => '',
                'address' => '',
                'status' =>$this->config->item('active')
            );
            $ajax['page_url']=base_url()."create_principal/index/add";
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
            'principal_name'=>$this->input->post('cp_principal_name'),
            'principal_code'=>$this->input->post('cp_principal_code'),
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
                $this->db->trans_start();  //DB Transaction Handle START

                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_principal_info',$data,array("id = ".$id));

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
                $this->db->trans_start();  //DB Transaction Handle START

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_principal_info',$data);

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

    public function check_existing_principal_name()
    {
        if($this->create_principal_model->check_existing_principal_name($this->input->post('principal_name'),$this->input->post('principal_id')))
        {
            $ajax['status']=true;
        }
        else
        {
            $ajax['status']=false;
        }

        if($ajax['status'])
        {
            $ajax['message'] = 'Principal Name Exists';
        }
        else
        {
            $ajax['message'] = '';
        }

        $this->jsonReturn($ajax);
    }

    public function check_existing_principal_code()
    {
        if($this->create_principal_model->check_existing_principal_code($this->input->post('principal_code'),$this->input->post('principal_id')))
        {
            $ajax['status']=true;
        }
        else
        {
            $ajax['status']=false;
        }

        if($ajax['status'])
        {
            $ajax['message'] = 'Principal Code Exists';
        }
        else
        {
            $ajax['message'] = '';

        }

        $this->jsonReturn($ajax);
    }

    private function check_validation()
    {
        if(Validation_helper::validate_empty($this->input->post('cp_principal_name')) || $this->create_principal_model->check_existing_principal_name($this->input->post('cp_principal_name'),$this->input->post('principal_id')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('cp_principal_code')) || $this->create_principal_model->check_existing_principal_code($this->input->post('cp_principal_code'),$this->input->post('principal_id')))
        {
            return false;
        }

        return true;
    }


}
