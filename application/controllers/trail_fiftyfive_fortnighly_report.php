<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Trail_fiftyfive_fortnighly_report extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("trail_fiftyfive_fortnighly_report_model");
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
        $config = System_helper::pagination_config(base_url() . "trail_fiftyfive_fortnighly_report/index/list/",$this->trail_fiftyfive_fortnighly_report_model->get_total_fortnightly(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['fortnightlyReports'] = $this->trail_fiftyfive_fortnighly_report_model->get_fortnightlyInfo($page);
        $data['title']="Trial Analysis Fortnightly List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("trail_fiftyfive_fortnighly_report/list",$data,true));
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
            $data['fortnightlyInfo'] = $this->trail_fiftyfive_fortnighly_report_model->get_fortnightly_row($id);

            $data['title']="Edit Fortnightly Report (".$data['fortnightlyInfo']['rnd_code'].")";
        }
        else
        {
            $data["fortnightlyInfo"] = Array(
                'id' => 0,
                'rnd_code_id' => '',
                'sowing_date' => '',
                'transplanting_date' => '',
                'initial_plants_during_trial_start' => '',
                'fortnightly_reporting_date' => '',
                'plant_type' => '',
                'plant_uniformity' => '',
                'distance_from_ground_curd' => '',
                'crud_type' => '',
                'crud_color' => '',
                'crud_compactness' => '',
                'crud_uniformity' => '',
                'disease_severity' => '',
                'special_characters_status' => '',
                'accepted_status' => $this->config->item('accepted_code_yes'),
                'crud_type' => '',
                'special_characters' => '',
                'remark' => '',
                'status' => $this->config->item('active')
            );

            $data['title']="New Trial Analysis Fortnightly";
        }

        $data['rndCodes'] = $this->trail_fiftyfive_fortnighly_report_model->get_rndCodes();
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("trail_fiftyfive_fortnighly_report/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {

        $id = $this->input->post("fortnightly_id");
        $user = User_helper::get_user();


        $data = Array(
            'rnd_code_id'=>$this->input->post('rnd_code_id'),
            'sowing_date'=>strtotime($this->input->post('sowing_date')),
            'transplanting_date'=>strtotime($this->input->post('transplanting_date')),
            'initial_plants_during_trial_start'=>$this->input->post('initial_plants_during_trial'),
            'fortnightly_reporting_date'=>strtotime($this->input->post('fortnightly_reporting_date')),
            'plant_type'=>$this->input->post('plant_type_appearance'),
            'plant_uniformity'=>$this->input->post('plant_uniformity'),
            'distance_from_ground_curd'=>$this->input->post('distance_from_ground_to_curd'),
            'crud_type'=>$this->input->post('curd_type'),
            'crud_color'=>$this->input->post('curd_color'),
            'crud_compactness'=>$this->input->post('curd_compactness'),
            'crud_uniformity'=>$this->input->post('curd_uniformity'),
            'disease_severity'=>$this->input->post('disease_severity'),
            'special_characters_status'=>$this->input->post('special_characters_status'),
            'accepted_status'=>$this->input->post('accepted_status'),
            'special_characters'=>$this->input->post('special_characters'),
            'remark'=>$this->input->post('remarks'),
            'status'=>$this->input->post('status')
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

                Query_helper::update('rnd_fortnightly_report',$data,array("id = ".$id));
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
            }
            else
            {
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_fortnightly_report',$data);
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
            }

            $this->rnd_list();//this is similar like redirect
        }

    }

    private function check_validation()
    {

        if(Validation_helper::validate_empty($this->input->post('rnd_code_id')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('initial_plants_during_trial')))
        {
            return false;
        }

        return true;
    }


}
