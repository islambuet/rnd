<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/root_controller.php';

class Rnd_labour_activities extends ROOT_Controller
{

    private $message;

    public function __construct()
    {
        parent::__construct();
        $this->message = "";
        $this->load->model("rnd_labour_activities_model");

    }

    public function index($task = "list", $id = 0)
    {
        if ($task == "list") {
            $this->rnd_list($id);
        } elseif ($task == "add" || $task == "edit") {
            $this->rnd_add_edit($id);
        } elseif ($task == "save") {
            $this->rnd_save($id);
        } elseif ($task == "delete") {
            $this->rnd_change_status($id);
        } else
            $this->rnd_list($id);
    }


    public function rnd_list($page = 0)
    {

        $config = System_helper::pagination_config(base_url() . "rnd_labour_activities/index/list/", $this->rnd_labour_activities_model->get_total_labour_activity(), 4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if ($page > 0) {
            $page = $page - 1;
        }

        $data['stock_in_info'] = $this->rnd_labour_activities_model->get_labour_activity_info($page);
        $data['title'] = "Labour Activity List";

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_labour_activities/list", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }

        $this->jsonReturn($ajax);
    } /////    Render list end

    public function rnd_add_edit($id)
    {
        if ($id != 0) {
            $data['pesticideInfo'] = $this->rnd_labour_activities_model->get_labour_activity_row($id);
            $data['title'] = "Edit Labour Activity (" . $data['pesticideInfo']['labor_activity_name'] . ")";
        } else {
            $data['pesticideInfo'] = Array(
                'id' => 0,
                'season_id'=>'',
                'crop_id' => '',
                'crop_type_id' => '',
                'labor_activity_name' => '',
                'activity_date' => '',
                'number_of_labor' => '',
                'remark' => '',
            );

            $data['title'] = "New Labour Activity";
        }

        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['types'] = Query_helper::get_info('rnd_product_type_info', '*', array('status ='.$this->config->item('active')));


        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_labour_activities/add_edit", $data, true));

        $this->jsonReturn($ajax);
    } ///// add edit end

    public function rnd_save()
    {

        $id = $this->input->post("labour_activity_id");
        $user = User_helper::get_user();

        $data = Array(

            'labor_activity_name' => $this->input->post('labour_activity_name'),
            'activity_date' => strtotime($this->input->post('labour_activity_date')),
            'number_of_labor' => $this->input->post('labour_activity_quantity'),
            'remark' => $this->input->post('labour_remark')

        );
        if (!$this->check_validation()) {
            $ajax['status'] = false;
            $ajax['message'] = $this->lang->line("MSG_INVALID_INPUT");
            $this->jsonReturn($ajax);
        } else {
            if ($id > 0) {
                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_labor_activity_info', $data, array("id = " . $id));
                $this->message = $this->lang->line("MSG_UPDATE_SUCCESS");
            }
            else
            {

                $this->db->trans_start();

                $data['season_id'] = $this->input->post('season_id');
                $data['crop_id'] = $this->input->post('crop_id');
                $data['crop_type_id'] = $this->input->post('labour_activity_variety');

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();


                $last_id = Query_helper::add('rnd_labor_activity_info', $data);

                $count = count($this->input->post('rnd_code'));

                if($count>0)

                {


                    $rnd_codes = $this->input->post('rnd_code');
                    foreach($rnd_codes as $rnd_code)
                    {


                        $data1 = Array(
                            'labor_activity_info_id'=>$last_id,
                            'rnd_code_id' => $rnd_code,
                            //'fruit_report_entry_type' => $this->config->item('fruit_report_before_harvest')

                        );

                        $data1['created_by'] = $user->user_id;
                        $data1['creation_date'] = time();
                        Query_helper::add('rnd_labor_activity_rndcode',$data1);
                    }
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
            $this->rnd_list();
        }
    } ////// save end


    public function rnd_change_status($id)
    {

        $data = array('status' => $this->config->item('inactive'));
        Query_helper::update('rnd_labor_activity_info', $data, array("id = " . $id));
        $this->message = $this->lang->line("MSG_DELETE_SUCCESS");
        $this->rnd_list();
    }


    private function check_validation()
    {

        if($this->input->post('season_id')){
        if (Validation_helper::validate_empty($this->input->post('season_id'))) {
            return false;
        }

        }

        if($this->input->post('crop_id')){
        if (Validation_helper::validate_empty($this->input->post('crop_id'))) {
            return false;
        }

        }

        if($this->input->post('labour_activity_varity')){

        if (Validation_helper::validate_empty($this->input->post('labour_activity_varity'))) {
            return false;
        }

        }
        if (Validation_helper::validate_empty($this->input->post('labour_activity_name'))) {
            return false;
        }
        if (!Validation_helper::validate_numeric($this->input->post('labour_activity_quantity'))) {
            return false;
        }


        return true;
    }
}
