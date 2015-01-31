<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Delivery_and_sowing_setup extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("delivery_and_sowing_setup_model");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list($id);
        }
        elseif($task=="add")
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
        $config = System_helper::pagination_config(base_url() . "delivery_and_sowing_setup/index/list/",$this->delivery_and_sowing_setup_model->get_total_crops(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['cropInfo'] = $this->delivery_and_sowing_setup_model->get_cropInfo($page);
        $data['title']="Delivery And Sowing Setup List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("delivery_and_sowing_setup/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."delivery_and_sowing_setup/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
//            $data['typeInfo'] = $this->delivery_and_sowing_setup_model->get_type_row($id);
//            $data['title']="Edit Crop Type (".$data['typeInfo']['crop_name'].'/ '.$data['typeInfo']['type_name'].")";
//            $ajax['page_url']=base_url()."create_crop_type/index/edit/".$id;
        }
        else
        {
            $data['title']="Delivery And Sowing Setup";
            $data["typeInfo"] = Array(
                'id' => 0,
                'crop_id' => '',
                'type_name' => '',
                'type_code' => '',
                'terget_length' => '',
                'terget_weight' => '',
                'terget_yeild' => ''
            );
            $ajax['page_url']=base_url()."delivery_and_sowing_setup/index/add";
        }

        $data['crops'] = Query_helper::get_info('rnd_crop', '*', array('status ='.$this->config->item('status_active')));
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("delivery_and_sowing_setup/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {

        $id = $this->input->post("crop_id");
        $user = User_helper::get_user();

        $data = Array(
            'crop_name'=>$this->input->post('crop_name'),
            'crop_code'=>$this->input->post('crop_code'),
            'crop_width'=>$this->input->post('crop_width'),
            'crop_height'=>$this->input->post('crop_height'),
            'fruit_type'=>$this->input->post('fruit_type'),
            'sample_size'=>$this->input->post('sample_size'),
            'initial_plants'=>$this->input->post('initial_plants'),
            'plants_per_hectare'=>$this->input->post('plants_per_hectare'),
            'status'=>$this->config->item('status_active')
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

//                $this->db->trans_start();  //DB Transaction Handle START
//                $time=time();
//
//                $data['created_by'] = $user->user_id;
//                $data['creation_date'] = $time;
//
//                Query_helper::add('rnd_crop',$data);
//                $this->db->trans_complete();   //DB Transaction Handle END
//
//                if ($this->db->trans_status() === TRUE)
//                {
//                    $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
//                }
//                else
//                {
//                    $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
//                }
//
//                $this->rnd_list();//this is similar like redirect
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
        }

    }

    private function check_validation()
    {
        $valid=true;
        if(Validation_helper::validate_empty($this->input->post('crop_name')))
        {
            $valid=false;
            $this->message.="Crop Name Cannot Be Empty<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('crop_code')))
        {
            $valid=false;
            $this->message.="Crop Code Cannot Be Empty<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('crop_code')))
        {
            $valid=false;
            $this->message.="Crop Code Cannot Be Empty<br>";
        }

        return $valid;
    }


}
