<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Create_crop_variety extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("create_crop_variety_model");
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

        $config = System_helper::pagination_config(base_url() . "create_crop_variety/index/list/",$this->create_crop_variety_model->get_total_varieties(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['varietyInfo'] = $this->create_crop_variety_model->get_varieties($page);
        $data['title']="Crop Variety List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop_variety/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."create_crop_variety/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['varietyInfo'] = $this->create_crop_variety_model->get_variety_info($id);
            $data['cropTypes'] = $this->create_crop_variety_model->get_crop_types($data['varietyInfo']['crop_id']);
            $data['seasonInfo'] = $this->create_crop_variety_model->get_seasons_info($id);
            $data['title']="Edit Crop Variety (".$data['varietyInfo']['variety_name'].")";
            $ajax['page_url']=base_url()."create_crop_variety/index/edit/".$id;
        }
        else
        {
            $data['seasonInfo'] = Array();
            $data['cropTypes'] = Array();

            $data['title']="Add Crop Variety";
            $data["varietyInfo"] = Array(
                'id' => 0,
                'year'=>date("Y",time()),
                'crop_id' => '',
                'variety_name' => '',
                'variety_type' => 1,
                'principal_id' => '',
                'company_name' => '',
                'number_of_seeds' => '',
                'quantity' => '',
                'characteristics' => '',
                'replica_status'=>0

            );
            $ajax['page_url']=base_url()."create_crop_variety/index/add";
        }

        $data['crops'] = Query_helper::get_info('rnd_crop', '*', array('status !='.$this->config->item('status_delete')));
        $data['principals'] = Query_helper::get_info('rnd_principal', '*', array('status !='.$this->config->item('status_delete')));
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop_variety/add_edit",$data,true));

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
            $id = $this->input->post("variety_id");
            $time=time();
            $seasons = Query_helper::get_info('rnd_season', '*', array());
            if($id>0)
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = $time;

                $data['number_of_seeds']=$this->input->post("number_of_seeds");
                $data['characteristics']=$this->input->post("characteristics");
                Query_helper::update('rnd_variety',$data,array("id = ".$id));
                $variety_season=$this->input->post("season");

                $season_data=array();
                $season_data['modified_by'] = $user->user_id;
                $season_data['modification_date'] = $time;

                foreach($seasons as $season)
                {

                    $season_data['season_status'] =0;
                    if(is_array($variety_season))
                    {
                        $season_data['season_status']=(in_array($season['id'],$variety_season))?1:0;
                    }
                    Query_helper::update('rnd_variety_season',$season_data,array("season_id = ".$season['id'],"variety_id = ".$id,"sample_delivery_status != 1"));

                }


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
            else
            {

                $data['year']=$this->input->post("year");
                $data['crop_id']=$this->input->post("crop_id");
                $data['variety_index']=$this->create_crop_variety_model->get_varietyIndex($data['year'],$data['crop_id']);
                $data['crop_type_id']=$this->input->post("crop_type_id");
                $data['variety_name']=$this->input->post("variety_name");
                $data['variety_type']=$this->input->post("variety_type");
                if($data['variety_type']==1)
                {
                    $data['principal_id']=$this->input->post("principal_id");
                    $data['company_name']="";
                }
                elseif($data['variety_type']==2)
                {
                    $data['principal_id']="";
                    $data['company_name']="";
                }
                elseif($data['variety_type']==3)
                {
                    $data['principal_id']="";
                    $data['company_name']=$this->input->post("company_name");
                }
                $data['number_of_seeds']=$this->input->post("number_of_seeds");
                $data['quantity']=$this->input->post("quantity");
                $data['characteristics']=$this->input->post("characteristics");
                $data['replica_status']=$this->input->post("replica_status");
                $data['variety_no'] = $this->create_crop_variety_model->get_variety_no($data['crop_id'],$data['variety_name'],0);
                $data['status']=$this->config->item("status_active");
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = $time;

                $this->db->trans_start();
                $variety_id=Query_helper::add('rnd_variety',$data);
                $variety_season=$this->input->post("season");
                $season_data=array();
                $season_data['year']=$data['year'];
                $season_data['variety_id']=$variety_id;
                $season_data['sample_delivery_status']=0;
                $season_data['sample_size']=0;
                $season_data['status']=1;
                $season_data['created_by'] = $user->user_id;
                $season_data['creation_date'] = $time;
                foreach($seasons as $season)
                {
                    $season_data['season_id'] = $season['id'];
                    $season_data['season_status'] = (in_array($season['id'],$variety_season))?1:0;
                    Query_helper::add('rnd_variety_season',$season_data);

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

                $this->rnd_list();//this is similar like redirect

            }
        }

    }
    private function check_validation()
    {
        if($this->input->post("variety_id"))
        {
            return $this->check_validation_edit();
        }
        else
        {
            return $this->check_validation_add();
        }
    }
    private function check_validation_edit()
    {
        $valid=true;
        if(!Validation_helper::validate_numeric($this->input->post('number_of_seeds')))
        {
            $valid=false;
            $this->message.="Number of Seeds must be a number.<br>";
        }

        return $valid;
    }

    private function check_validation_add()
    {
        $valid=true;
        if(Validation_helper::validate_empty($this->input->post('crop_id')))
        {
            $valid=false;
            $this->message.="Select a Crop.<br>";
        }
        if(Validation_helper::validate_empty($this->input->post('crop_type_id')))
        {
            $valid=false;
            $this->message.="Select a Crop Type.<br>";
        }
        if(Validation_helper::validate_empty($this->input->post('variety_name')))
        {
            $valid=false;
            $this->message.="Variety Name Cannot be Empty.<br>";
        }
        if(!((Validation_helper::validate_empty($this->input->post('crop_id')))||(Validation_helper::validate_empty($this->input->post('variety_name')))))
        {
            if($this->create_crop_variety_model->check_variety_exists($this->input->post('year'),$this->input->post('crop_id'),$this->input->post('variety_name'),$this->input->post('variety_id')))
            {
                $valid=false;
                $this->message.="Variety Name Exists For this Year and Crop.<br>";
            }

        }
        $variety_type=$this->input->post("variety_type");
        if($variety_type==1)
        {

            if(Validation_helper::validate_empty($this->input->post('principal_id')))
            {
                $valid=false;
                $this->message.="Select a Principal.<br>";
            }
        }
        elseif($variety_type==2)
        {

        }
        elseif($variety_type==3)
        {
            if(Validation_helper::validate_empty($this->input->post('company_name')))
            {
                $valid=false;
                $this->message.="Write a Company Name.<br>";
            }
        }
        else
        {
            $valid=false;
            $this->message.="Select a variety Type.<br>";
        }

        $variety_season=$this->input->post("season");
        if(!(is_array($variety_season)>0))
        {
            $valid=false;
            $this->message.="Select minimum one Season.<br>";
        }
        if(!Validation_helper::validate_numeric($this->input->post('number_of_seeds')))
        {
            $valid=false;
            $this->message.="Number of Seeds must be a number.<br>";
        }
        if(!Validation_helper::validate_numeric($this->input->post('quantity')))
        {
            $valid=false;
            $this->message.="Quantity must be a number.<br>";
        }

        return $valid;
    }

}
