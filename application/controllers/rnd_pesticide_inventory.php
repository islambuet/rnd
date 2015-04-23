<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_pesticide_inventory extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_pesticide_inventory_model");
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
        $config = System_helper::pagination_config(base_url() . "rnd_pesticide_inventory/index/list/",$this->rnd_pesticide_inventory_model->get_total_inventory(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['inventories_info'] = $this->rnd_pesticide_inventory_model->get_inventories($page);
        $data['title']="Pesticide Inventory List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_pesticide_inventory/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."rnd_pesticide_inventory/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {

        $data['title']="Create New Pesticide Inventory";
        $ajax['page_url']=base_url()."rnd_pesticide_inventory/index/add";
        $data['pesticides']= Query_helper::get_info('rnd_pesticide_fungicide_info',array('id','pesticide_name'),array('status = 1'));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_pesticide_inventory/add_edit",$data,true));
        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $user = User_helper::get_user();

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {

            $this->db->trans_start();  //DB Transaction Handle START

            $data['pesticide_id'] = $this->input->post('pesticide_id');
            $data['pesticide_quantity'] = $this->input->post('pesticide_quantity');
            $data['inventory_type'] = $this->input->post('inventory_type');
            $data['status'] = 1;
            $data['remarks'] = $this->input->post('remarks');
            $data['inventory_date'] = System_helper::get_time($this->input->post('inventory_date'));
            $data['created_by'] = $user->user_id;
            $data['creation_date'] = time();

            Query_helper::add('rnd_pesticide_inventory',$data);

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

    }

    private function check_validation()
    {
        $valid=true;
        if(Validation_helper::validate_empty($this->input->post('pesticide_id')))
        {
            $valid=false;
            $this->message.="Select a Pesticide<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('inventory_type')))
        {
            $valid=false;
            $this->message.="Select Inventory Type<br>";
        }
        if(!Validation_helper::validate_numeric($this->input->post('pesticide_quantity')))
        {
            $valid=false;
            $this->message.="Pesticide Quantity should be a number.<br>";
        }
        if((strtotime($this->input->post('inventory_date'))===false))
        {
            $valid=false;
            $this->message.="Invalid Inventory date.<br>";
        }
        return $valid;
    }


}
