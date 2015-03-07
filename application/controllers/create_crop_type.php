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
        $ajax['page_url']=base_url()."create_crop_type/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['typeInfo'] = $this->create_type_model->get_type_row($id);
            $data['title']="Edit Crop Type (".$data['typeInfo']['crop_name'].'/ '.$data['typeInfo']['type_name'].")";
            $ajax['page_url']=base_url()."create_crop_type/index/edit/".$id;
        }
        else
        {
            $data['title']="Create New Crop Type";
            $data["typeInfo"] = Array(
                'id' => 0,
                'crop_id' => '',
                'type_name' => '',
                'type_code' => '',
                'terget_length' => '',
                'terget_weight' => '',
                'terget_yeild' => '',
                'expected_seed_per_gram' => ''
            );
            $ajax['page_url']=base_url()."create_crop_type/index/add";
        }

        $data['crops'] = System_helper::get_ordered_crops();
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_type/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("type_id");
        $user = User_helper::get_user();

        $data = Array(
            'terget_length'=>$this->input->post('target_length'),
            'terget_weight'=>$this->input->post('target_weight'),
            'terget_yeild'=>$this->input->post('target_yield'),
            'expected_seed_per_gram'=>$this->input->post('expected_seed_per_gram')
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

                Query_helper::update('rnd_crop_type',$data,array("id = ".$id));

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

                $data['crop_id'] = $this->input->post('crop_id');
                $data['type_name'] = $this->input->post('type_name');
                $data['type_code'] = $this->input->post('type_code');
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_crop_type',$data);

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
        if(Validation_helper::validate_empty($this->input->post('crop_id')))
        {
            $valid=false;
            $this->message.="Crop Name Cann't Be Empty<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('type_name')))
        {
            $valid=false;
            $this->message.="Type Name Cann't Be Empty<br>";
        }
        elseif($this->create_type_model->check_type_name_existence($this->input->post('type_name'),$this->input->post('crop_id'),$this->input->post('type_id')))
        {
            $valid=false;
            $this->message.="Type Name Exists<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('type_code')))
        {
            $valid=false;
            $this->message.="Type Code Cann't Be Empty<br>";
        }
        elseif($this->create_type_model->check_type_code_existence($this->input->post('type_code'),$this->input->post('crop_id'),$this->input->post('type_id')))
        {
            $valid=false;
            $this->message.="Type Code Exists<br>";
        }

        if(!Validation_helper::validate_numeric($this->input->post('target_length')))
        {
            $valid=false;
            $this->message.="Targeted Length Must be number<br>";
        }
        if(!Validation_helper::validate_numeric($this->input->post('target_weight')))
        {
            $valid=false;
            $this->message.="Targeted Weight Must be number<br>";
        }

        if(!Validation_helper::validate_numeric($this->input->post('target_yield')))
        {
            $valid=false;
            $this->message.="Targeted Yield Must be number<br>";
        }

        return $valid;
    }


}
