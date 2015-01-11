<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_pesticide extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("create_pesticide_model");
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
        $config = System_helper::pagination_config(base_url() . "create_pesticide/index/list/",$this->create_pesticide_model->get_total_pesticides(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['pesticideInfo'] = $this->create_pesticide_model->get_pesticideInfo($page);
        $data['title']="Pesticides & Fungicides";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_pesticide/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."create_pesticide/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['pesticideInfo'] = $this->create_pesticide_model->get_pesticide_row($id);
            $data['title']="Edit Pesticide (".$data['pesticideInfo']['pesticide_name'].")";
            $ajax['page_url']=base_url()."create_pesticide/index/edit/".$id;
        }
        else
        {
            $data['title']="Create New Pesticide & Fungicides";
            $data["pesticideInfo"] = Array(
                'id' => 0,
                'pesticide_name' => '',
                'status' =>$this->config->item('active')
            );
            $ajax['page_url']=base_url()."create_pesticide/index/add";
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_pesticide/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("pesticide_id");
        $user = User_helper::get_user();

        $data = Array(
            'pesticide_name'=>$this->input->post('pesticide_name'),
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

                Query_helper::update('rnd_pesticide_fungicide_info',$data,array("id = ".$id));

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

                Query_helper::add('rnd_pesticide_fungicide_info',$data);

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
        if(Validation_helper::validate_empty($this->input->post('pesticide_name')))
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
