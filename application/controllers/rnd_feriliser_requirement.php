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
        $config = System_helper::pagination_config(base_url() . "rnd_feriliser_requirement/index/list/",$this->rnd_feriliser_requirement_model->get_total_row(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['row_list'] = $this->rnd_feriliser_requirement_model->get_record_list($page);
        $data['title']="Fertilizer Requirement List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_feriliser_requirement/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."rnd_feriliser_requirement/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['row_info'] = $this->rnd_feriliser_requirement_model->get_row_info($id);
            $data['title']="Edit Fertilizer Requirement";
            $ajax['page_url']=base_url()."rnd_feriliser_requirement/index/edit/".$id;
        }
        else
        {
            $data["row_info"] = Array
            (
                'id' => 0,
                'fertilizer_id' => '',
                'seed_bed_id' => '',
                'fertilizer_quantity' => '',
                'fertilizer_price' => ''
            );
            $data['title']="New Fertilizer Requirements";
            $ajax['page_url']=base_url()."rnd_feriliser_requirement/index/add";
        }

        $data['fertilizers']= Query_helper::get_info('rnd_fertilizer_info', '*', array());
        $data['seedbeds']= Query_helper::get_info('rnd_seed_bed_info', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_feriliser_requirement/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("row_elm_id");
        $user = User_helper::get_user();

        $data = Array(
            'fertilizer_id'=>$this->input->post('fertilizer_id'),
            'seed_bed_id'=>$this->input->post('seed_bed_id'),
            'fertilizer_quantity'=>$this->input->post('fertilizer_quantity'),
            'fertilizer_price'=>$this->input->post('fertilizer_price'),
            'requirement_date'=>time()
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

                Query_helper::update('rnd_fertilizer_requirement_info',$data,array("id = ".$id));
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");

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

                Query_helper::add('rnd_fertilizer_requirement_info',$data);
                //$this->message=$this->lang->line("MSG_CREATE_SUCCESS");

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
        if(Validation_helper::validate_empty($this->input->post('fertilizer_id')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('seed_bed_id')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('fertilizer_quantity')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('fertilizer_price')))
        {
            return false;
        }

        return true;
    }


}
