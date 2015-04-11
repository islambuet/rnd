<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Setup_competitor extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("setup_competitor_model");
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
        $config = System_helper::pagination_config(base_url() . "setup_competitor/index/list/",$this->setup_competitor_model->get_total_competitors(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['principalInfo'] = $this->setup_competitor_model->get_competitorInfo($page);
        $data['title']="R&D Principal";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_competitor/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."setup_competitor/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['principalInfo'] = $this->setup_competitor_model->get_competitor_row($id);
            $data['title']="Edit Principal (".$data['principalInfo']['company_name'].")";
            $ajax['page_url']=base_url()."setup_competitor/index/edit/".$id;
        }
        else
        {
            $data['title']="Create New Competitor";
            $data["principalInfo"] = Array(
                'id' => 0,
                'company_name' => '',
                'company_code' => '',
                'contact_person_name' => '',
                'email' => '',
                'contact_number' => '',
                'address' => ''
            );
            $ajax['page_url']=base_url()."setup_competitor/index/add";
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_competitor/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("principal_id");
        $user = User_helper::get_user();

        $data = Array(
            'contact_person_name'=>$this->input->post('contact_person_name'),
            'company_name'=>$this->input->post('principal_name'),
            'email'=>$this->input->post('email_id'),
            'contact_number'=>$this->input->post('contact_number'),
            'address'=>$this->input->post('address')
        );

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

                Query_helper::update('rnd_competitor',$data,array("id = ".$id));

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

                
                $data['company_code'] = $this->input->post('principal_code');
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_competitor',$data);

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
        if(Validation_helper::validate_empty($this->input->post('principal_name')))
        {
            $valid=false;
            $this->message.="Company Name Cann't Be Empty<br>";
        }
        elseif($this->setup_competitor_model->check_existing_company_name($this->input->post('principal_name'),$this->input->post('principal_id')))
        {
            $valid=false;
            $this->message.="Company Name Exists<br>";
        }
        elseif($this->setup_competitor_model->check_existing_company_code($this->input->post('principal_code'),$this->input->post('principal_id')))
        {
            $valid=false;
            $this->message.="Company Code Exists<br>";
        }

        return $valid;
    }


}
