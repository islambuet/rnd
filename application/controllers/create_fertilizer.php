<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_fertilizer extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("create_fertilizer_model");
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
        $config = System_helper::pagination_config(base_url() . "create_fertilizer/index/list/",$this->create_fertilizer_model->get_total_fertilizers(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['fertilizerInfo'] = $this->create_fertilizer_model->get_fertilizerInfo($page);
        $data['title']="Fertilizer";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_fertilizer/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."create_fertilizer/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['fertilizerInfo'] = $this->create_fertilizer_model->get_fertilizer_row($id);
            $data['title']="Edit Fertilizer (".$data['fertilizerInfo']['fertilizer_name'].")";
            $ajax['page_url']=base_url()."create_fertilizer/index/edit/".$id;
        }
        else
        {
            $data['title']="Create New Fertilizer";
            $data["fertilizerInfo"] = Array(
                'id' => 1,
                'fertilizer_name' => '',
                'status' =>$this->config->item('active')
            );

            $ajax['page_url']=base_url()."create_fertilizer/index/add";
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_fertilizer/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("fertilizer_id");
        $user = User_helper::get_user();

        $data = Array(
            'fertilizer_name'=>$this->input->post('fertilizer_name'),
            'status'=>$this->input->post('status')
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

                Query_helper::update('rnd_fertilizer_info',$data,array("id = ".$id));

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

                Query_helper::add('rnd_fertilizer_info',$data);

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

    public function check_existing_fertilizer_name()
    {
        if($this->create_fertilizer_model->check_fertilizer_existence($this->input->post('fertilizer_name'),$this->input->post('fertilizer_id')))
        {
            $ajax['status']=true;
        }
        else
        {
            $ajax['status']=false;
        }

        if($ajax['status'])
        {
            $ajax['message'] = 'Fertilizer Name Exists';
        }
        else
        {
            $ajax['message'] = '';
        }

        $this->jsonReturn($ajax);
    }

    private function check_validation()
    {
        if(Validation_helper::validate_empty($this->input->post('fertilizer_name')) || $this->create_fertilizer_model->check_fertilizer_existence($this->input->post('fertilizer_name'),$this->input->post('fertilizer_id')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('status')))
        {
            return false;
        }

        return true;
    }


}
