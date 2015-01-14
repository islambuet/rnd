<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/root_controller.php';

class Rnd_feriliser_stock_out extends ROOT_Controller
{

    private $message;

    public function __construct()
    {
        parent::__construct();
        $this->message = "";
        $this->load->model("rnd_feriliser_stock_out_model");

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

        $config = System_helper::pagination_config(base_url() . "rnd_feriliser_stock_out/index/list/", $this->rnd_feriliser_stock_out_model->get_total_feriliser_stock_out(), 4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if ($page > 0) {
            $page = $page - 1;
        }

        $data['stock_in_info'] = $this->rnd_feriliser_stock_out_model->get_stock_out_info($page);
        $data['title'] = "Fertilizer Stock Out List";

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_feriliser_stock_out/list", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }

        $this->jsonReturn($ajax);
    } /////    Render list end

    public function rnd_add_edit($id)
    {
        if ($id != 0) {
            $data['feriliserInfo'] = $this->rnd_feriliser_stock_out_model->get_feriliser_row($id);
            $data['title'] = "Edit fertilizer Stock (" . $data['feriliserInfo']['fertilizer_name'] . ")";
        } else {
            $data['feriliserInfo'] = Array(
                'id' => 0,
                'season_id' =>'',
                'crop_id' =>'',
                'fertilizer_id' => '',
                'rnd_code_id' => '',
                //'pesticide_name' => '',
                'fertilizer_quantity' => '',
            );

            $data['title'] = "New Fertilizer Stock Out";
        }
        $data['feriliser_info'] = $this->rnd_feriliser_stock_out_model->get_ferilisers();
        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['types'] = Query_helper::get_info('rnd_variety_info', '*', array('status ='.$this->config->item('active')));
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_feriliser_stock_out/add_edit", $data, true));

        $this->jsonReturn($ajax);
    } ///// add edit end

    public function rnd_save()
    {

        $id = $this->input->post("feriliser_stock_out_id");
        $user = User_helper::get_user();

        $data = Array(
            'fertilizer_id' => $this->input->post('feriliser_in'),
            'fertilizer_quantity' => $this->input->post('feriliser_out_quantity'),
            //'feriliser_price'=>$this->input->post('pesticide_out_price'),

        );
        if (!$this->check_validation())
        {
            $ajax['status'] = false;
            $ajax['message'] = $this->lang->line("MSG_INVALID_INPUT");
            $this->jsonReturn($ajax);
        }
        else
        {
            if ($id > 0)
            {
                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_fertilizer_stock_out', $data, array("id = " . $id));
                $this->message = $this->lang->line("MSG_UPDATE_SUCCESS");
            }
            else
            {
                $data['season_id'] = $this->input->post('season_id');
                $data['crop_id'] = $this->input->post('crop_id');
                $data['rnd_code_id'] = $this->input->post('feriliser_out_rnd');
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_fertilizer_stock_out', $data);
                $this->message = $this->lang->line("MSG_CREATE_SUCCESS");
            }
            $this->rnd_list();
        }
    } ////// save end


    public function rnd_change_status($id)
    {

        $data = array('status' => $this->config->item('inactive'));
        Query_helper::update('rnd_fertilizer_stock_out', $data, array("id = " . $id));
        $this->message = $this->lang->line("MSG_DELETE_SUCCESS");
        redirect(base_url() . "rnd_feriliser_stock_out/index/list/");
       // $this->rnd_list();
    }

    public function check_fertilizer_stock()
    {
        if($this->input->post('feriliser_id'))
        {
            if($this->rnd_feriliser_stock_out_model->check_existing_fertilizer($this->input->post('feriliser_id')))
            {
                $ajax['status']=true;
            }
            else
            {
                $ajax['status']=false;
            }

            if(!$ajax['status'])
            {
                $ajax['message'] = 'This Fertilizer is not Available in Stock';
            }

        }
        else
        {
            $ajax['message'] = 'Please Select Fertilizer';
        }

        $this->jsonReturn($ajax);
    }
    public function check_current_stock()
    {
        if($this->input->post('common_fertilizer_id'))
        {

            if($this->rnd_feriliser_stock_out_model->check_existing_stock($this->input->post('common_fertilizer_id'),$this->input->post('common_fertilizer_quantity')))
            {
                $ajax['status']=true;
            }
            else
            {
                $ajax['status']=false;
            }

            if(!$ajax['status'])
            {
                $ajax['message'] = 'Stock Unavailable';
            }
            else
            {
                $ajax['message'] = 'Stock Available';
            }
        }
        else
        {
            $ajax['message'] = 'Please Select Fertilizer';
        }

        $this->jsonReturn($ajax);
    }

    private function check_validation()
    {

        if (Validation_helper::validate_empty($this->input->post('feriliser_in')))
        {
            return false;
        }

        if (!Validation_helper::validate_numeric($this->input->post('feriliser_out_quantity')) || !$this->rnd_feriliser_stock_out_model->check_existing_stock($this->input->post('feriliser_in'),$this->input->post('feriliser_out_quantity')))
        {
            return false;
        }


        return true;
    }
}
