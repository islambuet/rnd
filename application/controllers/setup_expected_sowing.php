<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Setup_expected_sowing extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        //$this->load->model("setup_expected_sowing_model");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list();
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

    public function rnd_list()
    {
        $data['title']="Expected Sowing";
        $data['seasons']=Query_helper::get_info('rnd_season','*',array('id !=0'));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_expected_sowing/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."setup_expected_sowing/index/list";

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {

        $data['season_info']=Query_helper::get_info('rnd_season','*',array('id ='.$id),1);
        $data['title']="Edit Expected Sowing Date";
        $ajax['page_url']=base_url()."setup_expected_sowing/index/edit/".$id;
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_expected_sowing/add_edit",$data,true));
        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("season_id");
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
            $data['expected_sowing_start']=System_helper::get_time($this->input->post("expected_sowing_start"));
            $data['expected_sowing_end']=System_helper::get_time($this->input->post("expected_sowing_end"));
            $data['estimated_delivery_date']=System_helper::get_time($this->input->post("estimated_delivery_date"));


            $this->db->trans_start();  //DB Transaction Handle START

            $data['modified_by'] = $user->user_id;
            $data['modification_date'] = time();

            Query_helper::update('rnd_season',$data,array("id = ".$id));

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
        if(System_helper::get_time($this->input->post("expected_sowing_start"))==0)
        {
            $this->message.="Set Expected Start Time<br>";
            $valid=false;
        }
        if(System_helper::get_time($this->input->post("expected_sowing_end"))==0)
        {
            $this->message.="Set Expected End Time<br>";
            $valid=false;
        }
        return $valid;

    }


}
