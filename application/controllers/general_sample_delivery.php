<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class General_sample_delivery extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("general_sample_delivery_model");
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
        $config = System_helper::pagination_config(base_url() . "general_sample_delivery/index/list/",$this->general_sample_delivery_model->get_total_crops(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['cropInfo'] = $this->general_sample_delivery_model->get_cropInfo($page);
        $data['title']="Sample Delivery List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("general_sample_delivery/list",$data,true));
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
            $data['cropInfo'] = $this->general_sample_delivery->get_crop_row($id);
            $data['title']="Edit Crop (".$data['cropInfo']['crop_name'].")";
        }
        else
        {
            $data["cropInfo"] = Array(
                'id' => 0,
                'crop_name' => '',
                'crop_code' => '',
                'crop_height' => '',
                'crop_width' => '',
                'status' => $this->config->item('active')
            );
            $data['title']="New Sample Delivery";
        }

        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array());
        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("general_sample_delivery/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("sample_id");
        $user = User_helper::get_user();
        $rndPost = $this->input->post('rnd_code');

        $data = Array(
            'season_id'=>$this->input->post('season_id'),
            'destined_delivery_date'=>$this->input->post('destined_delivery_date'),
            'delivered_status'=>$this->input->post('delivered'),
            'delivery_date'=>$this->input->post('delivery_date'),
            'received_status'=>$this->input->post('received'),
            'rnd_received_date'=>$this->input->post('rnd_receive_date'),
            'destined_sowing_date'=>$this->input->post('destined_sowing_date'),
            'sowing_status'=>$this->input->post('sowing'),
            'sowing_date'=>$this->input->post('sowing_date'),
            'remark'=>$this->input->post('remarks')
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

                Query_helper::update('rnd_crop_info',$data,array("id = ".$id));
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");

            }
            else
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                $last_id = Query_helper::add('rnd_sample_delivery_date',$data);

                $data_rnd = Array(
                  'sample_delivery_date_id'=>$last_id,
                  'created_by'=>$user->user_id,
                  'creation_date'=>time()
                );

                for($i=0; $i<sizeof($rndPost); $i++)
                {
                    $data_rnd['rnd_code_id'] = $rndPost[$i];
                    Query_helper::add('rnd_sample_delivery_date_crop',$data_rnd);

                }

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
        if(Validation_helper::validate_empty($this->input->post('crop_name')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('crop_code')))
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

        if(!Validation_helper::validate_numeric($this->input->post('status')))
        {
            return false;
        }
        return true;
    }


}
