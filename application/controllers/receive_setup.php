<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Receive_setup extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("receive_setup_model");
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
        $config = System_helper::pagination_config(base_url() . "receive_setup/index/list/",$this->receive_setup_model->get_total_setup(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['samples'] = $this->receive_setup_model->get_setups($page);
        $data['title']="Receive Setup List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("receive_setup/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."receive_setup/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['deliveryInfo'] = $this->receive_setup_model->get_setup_row($id);
            $data['title']="Edit Setup";
            $ajax['page_url']=base_url()."receive_setup/index/edit/".$id;
        }
        else
        {

        }

        $data['crops'] = Query_helper::get_info('rnd_crop', '*', array('status ='.$this->config->item('status_active')));
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("receive_setup/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("delivery_id");
        $user = User_helper::get_user();

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {
            $data = array();

            if($id>0)
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $deliveryInfo = $this->receive_setup_model->get_setup_row($id);

                if($deliveryInfo['delivery_date'])
                {
                    $data['receive_date'] = strtotime($this->input->post('receive_date'));
                }

                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('delivery_and_sowing_setup',$data,array("id = ".$id));

                $this->db->trans_complete();   //DB Transaction Handle END

                if ($this->db->trans_status() === TRUE)
                {
                    $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
                }
                else
                {
                    $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
                }

                $this->rnd_list();//this is similar like redirect
            }
            else
            {

            }
        }

    }


    private function check_validation()
    {
        $deliveryInfo = $this->receive_setup_model->get_setup_row($this->input->post('delivery_id'));
        $valid=true;

        if($deliveryInfo['sowing_status'] != 1)
        {
            if(Validation_helper::validate_empty($this->input->post('receive_date')))
            {
                $valid=false;
                $this->message.="Please input Receive Date!<br>";
            }
        }
        else
        {
            $valid=false;
            $this->message.="Sowing started. You cann't change the Receive Date now!<br>";
        }

        return $valid;
    }

}
