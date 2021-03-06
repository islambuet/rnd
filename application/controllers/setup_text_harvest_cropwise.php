<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Setup_text_harvest_cropwise extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("setup_text_harvest_cropwise_model");
        $this->lang->load('rnd_harvest');
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list($id);
        }
        elseif($task=="edit")
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
        $config = System_helper::pagination_config(base_url() . "setup_text_harvest_cropwise/index/list/",$this->setup_text_harvest_cropwise_model->get_total_crops(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['cropInfo'] = $this->setup_text_harvest_cropwise_model->get_cropInfo($page);
        $data['title']="Harvest Text Setup List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_text_harvest_cropwise/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."setup_text_harvest_cropwise/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        $data = array();
        $data['typeInfo'] = $this->setup_text_harvest_cropwise_model->get_crop_info($id);
        $data['columns'] = $this->setup_text_harvest_cropwise_model->get_setup($id);
        $data['title']='Harvest Text Setup ('.$data['typeInfo']['crop_name'].')';

        $ajax['page_url']=base_url()."setup_text_harvest_cropwise/index/edit/".$id;

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_text_harvest_cropwise/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $crop_id = $this->input->post("crop_id");
        $columns=$this->input->post("columns");

        $data = $this->setup_text_harvest_cropwise_model->get_setup($crop_id);
        unset($data['id']);
        unset($data['crop_id']);
        unset($data['status']);
        unset($data['created_by']);
        unset($data['creation_date']);
        unset($data['modified_by']);
        unset($data['modification_date']);

        foreach($data as $key=>&$d)
        {
            if(is_array($columns)&&in_array($key,$columns))
            {
                $d=1;
            }
            else
            {
                $d=0;
            }
        }

        $user = User_helper::get_user();
        $data['modified_by'] = $user->user_id;
        $data['modification_date'] = time();

        $this->db->trans_start();  //DB Transaction Handle START

        Query_helper::update('rnd_setup_text_harvest_cropwise',$data,array("crop_id = ".$crop_id));

        $this->db->trans_complete();   //DB Transaction Handle END

        if ($this->db->trans_status() === TRUE)
        {
            $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
        }
        else
        {
            $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
        }
        $this->rnd_list();//this is similar like redirect
    }

}
