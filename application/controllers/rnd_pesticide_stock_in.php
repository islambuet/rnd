<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_pesticide_stock_in extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_pesticide_stock_in_model");
    }

    public function index($task="list",$id=0, $pesticide_id=0)
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

        elseif($task=="delete")
        {
           $this->rnd_change_status($id, $pesticide_id);
        }

        else
        {
            $this->rnd_list($id);
        }
    }

    public function rnd_list($page=0)
    {
        $config = System_helper::pagination_config(base_url() . "rnd_pesticide_stock_in/index/list/",$this->rnd_pesticide_stock_in_model->get_total_pesticide_stock_in(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['stock_in_info'] = $this->rnd_pesticide_stock_in_model->get_stock_in_info($page);
        $data['title']="Pesticide Stock In List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_pesticide_stock_in/list",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."rnd_pesticide_stock_in/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        $data["pesticide_info"] = Array(
            'id' => 0,
            'pesticide_id'=>'',
            'pesticide_quantity' => '',
            'pesticide_price' => '',
            'stock_in_date'=>''
        );
        $data['title']="Pesticide Stock In";
        $ajax['page_url']=base_url()."rnd_pesticide_stock_in/index/add";


        $data['pesticides']= Query_helper::get_info('rnd_pesticide_fungicide_info',array('id','pesticide_name'),array('status = 1'));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_pesticide_stock_in/add_edit",$data,true));
        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $user = User_helper::get_user();
        $data = Array(
            'pesticide_id'=>$this->input->post('pesticide_id'),
            'pesticide_quantity'=>$this->input->post('pesticide_quantity'),
            'pesticide_price'=>$this->input->post('pesticide_price'),
            'stock_in_date'=>System_helper::get_time($this->input->post('stock_in_date'))

        );

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {

            $this->db->trans_start();  //DB Transaction Handle START

            $data['created_by'] = $user->user_id;
            $data['creation_date'] = time();

            Query_helper::add('rnd_pesticide_fungicide_in',$data);
            $this->message=$this->lang->line("MSG_CREATE_SUCCESS");

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
            $this->message.="Select a Pesticide.<br>";
        }

        if(!Validation_helper::validate_numeric($this->input->post('pesticide_quantity')))
        {
            $valid=false;
            $this->message.="Pesticide Quantity should be a number.<br>";
        }
        if(!Validation_helper::validate_numeric($this->input->post('pesticide_price')))
        {
            $valid=false;
            $this->message.="Pesticide Price should be a number.<br>";
        }
        if((strtotime($this->input->post('stock_in_date'))===false))
        {
            $valid=false;
            $this->message.="Invalid date.<br>";
        }

        return $valid;
    }


}
