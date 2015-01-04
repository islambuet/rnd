<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_pesticide_stock_out extends ROOT_Controller
{

    private $message;
    public function __construct()
    {
      parent::__construct();
      $this->$message="";
      $this->load->model("rnd_pesticide_stock_out_model");

    }
    public function index($task="list",$id=0)
    {
      if($task == "list"){
      $this->rnd_list($id);
    }
      elseif ($task=="add" || $task == "edit")
    {
      $this->rnd_add_edit($id);
    }
      elseif($task=="save")
    {
      $this->rnd_save($id);
    }
      elseif($task=="delete")
    {
      $this->rnd_change_status($id);
    }
      else
      $this->rnd_list($id);
    }


    public function rnd_list($page=0)
    {

        $config = System_helper::pagination_config(base_url() . "rnd_pesticide_stock_out/index/list/",$this->rnd_pesticide_stock_out_model->get_total_pesticide_stock_out(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['stock_in_info'] = $this->rnd_pesticide_stock_out_model->get_stock_out_info($page);
        $data['title']="Pesticide & Fungicide Stock Out List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_pesticide_stock_out/list",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $this->jsonReturn($ajax);
    }   /////    Render list end

    public function rnd_add_edit($id)
    {
        if($id != 0)
        {
            $data['pesticideInfo']= $this->rnd_pesticide_stock_out_model->get_pesticide_row($id);
            $data['title']="Edit Pesticide & Fungicide Stock (".$data['pesticideInfo']['pesticide_name'].")";
        }
        else
        {
            $data['pesticideInfo']= Array(
                'id'=>0,
                'pesticide_id'=>'',
                'rnd_code_id'=>'',
                'pesticide_name' => '',
                'pesticide_quantity' => '',
            );

            $data['title']="New Pesticide & Fungicide Stock Out";
        }
        $data['pesticide_info']= $this->rnd_pesticide_stock_out_model->get_pesticides();
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_pesticide_stock_in/list",$data,true));

        $this->jsonReturn($ajax);
    }     ///// add edit end

    public function rnd_save()
    {

        $id = $this->input->post("pesticide_stock_out_id");
        $user = User_helper::get_user();

        $data = Array(
            'pesticide_id'=>$this->input->post('pesticide_in'),
            'pesticide_quantity'=>$this->input->post('pesticide_out_quantity'),
            //'pesticide_price'=>$this->input->post('pesticide_out_price'),

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

                Query_helper::update('rnd_pesticide_fungicide_stock_out',$data,array("id = ".$id));
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
            }
            else
            {

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_pesticide_fungicide_stock_out',$data);
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
            }
            $this->rnd_list();
        }
    }      ////// save end


    public function rnd_change_status()
    {

    }


    private function check_validation()
    {

        if(Validation_helper::validate_empty($this->input->post('pesticide_in')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('pesticide_out_quantity')))
        {
            return false;
        }


        return true;
    }
}
