<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_crop extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("create_crop_model");
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
        $config = System_helper::pagination_config(base_url() . "create_crop/index/list/",$this->create_crop_model->get_total_crops(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['cropInfo'] = $this->create_crop_model->get_cropInfo($page);
        $data['title']="Crop List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."create_crop/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['cropInfo'] = $this->create_crop_model->get_crop_row($id);
            $data['title']="Edit Crop (".$data['cropInfo']['crop_name'].")";
            $ajax['page_url']=base_url()."create_crop/index/edit/".$id;
        }
        else
        {
            $data["cropInfo"] = Array(
                'id' => 0,
                'crop_name' => '',
                'crop_code' => '',
                'crop_height' => '',
                'crop_width' => '',
                'fruit_type' => '',
                'sample_size' => '',
                'status' => $this->config->item('active')
            );
            $data['title']="Create New Crop";
            $ajax['page_url']=base_url()."create_crop/index/add";
        }



        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop/add_edit",$data,true));


        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {

        $id = $this->input->post("crop_id");
        $user = User_helper::get_user();

        $data = Array(
            'crop_name'=>$this->input->post('cc_crop_name'),
            'crop_code'=>$this->input->post('cc_crop_code'),
            'crop_width'=>$this->input->post('crop_width'),
            'crop_height'=>$this->input->post('crop_height'),
            'fruit_type'=>$this->input->post('fruit_type'),
            'sample_size'=>$this->input->post('sample_size'),
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

                Query_helper::update('rnd_crop_info',$data,array("id = ".$id));

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

                Query_helper::add('rnd_crop_info',$data);

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

    public function check_existing_crop_name()
    {

        if($this->create_crop_model->check_crop_name_existence($this->input->post('crop_name')))
        {
            $ajax['status']=true;
        }
        else
        {
            $ajax['status']=false;
        }

        if($ajax['status'])
        {
            $ajax['message'] = 'Crop Name Exists';
        }
        else
        {
            $ajax['message'] = '';
        }

        $this->jsonReturn($ajax);
    }

    public function check_existing_crop_code()
    {
        if($this->create_crop_model->check_crop_code_existence($this->input->post('crop_code')))
        {
            $ajax['status']=true;
        }
        else
        {
            $ajax['status']=false;
        }

        if($ajax['status'])
        {
            $ajax['message'] = 'Crop Code Exists';
        }
        else
        {
            $ajax['message'] = '';
        }

        $this->jsonReturn($ajax);
    }

    private function check_validation()
    {
        if(Validation_helper::validate_empty($this->input->post('cc_crop_name')) || $this->create_crop_model->check_crop_name_existence($this->input->post('cc_crop_name')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('cc_crop_code')) || $this->create_crop_model->check_crop_code_existence($this->input->post('cc_crop_code')))
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

        if(!Validation_helper::validate_numeric($this->input->post('fruit_type')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('sample_size')))
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
