<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/root_controller.php';

class Rnd_fertiliser_stock_out extends ROOT_Controller
{

    private $message;

    public function __construct()
    {
        parent::__construct();
        $this->message = "";
        $this->load->model("rnd_fertiliser_stock_out_model");

    }

    public function index($task = "list", $id = 0)
    {
        if ($task == "list")
        {
            $this->rnd_list($id);
        }
        elseif ($task == "add" || $task == "edit")
        {
            $this->rnd_add_edit($id);
        }
        elseif ($task == "save")
        {
            $this->rnd_save($id);
        }
        else
        {
            $this->rnd_list($id);
        }
    }


    public function rnd_list($page = 0)
    {

        $config = System_helper::pagination_config(base_url() . "rnd_fertiliser_stock_out/index/list/",$this->rnd_fertiliser_stock_out_model->get_total_fertiliser_stock_out(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['stock_out_info'] = $this->rnd_fertiliser_stock_out_model->get_stock_out_info($page);
        $data['title']="Fertiliser Stock Out List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_fertiliser_stock_out/list",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."rnd_fertiliser_stock_out/index/list/".($page+1);
        $this->jsonReturn($ajax);
    } /////    Render list end

    public function rnd_add_edit($id)
    {
        $data['title']="Fertilizer Stock Out";
        $ajax['page_url']=base_url()."rnd_fertiliser_stock_out/index/add";


        $data['fertilisers']= Query_helper::get_info('rnd_fertilizer_info',array('id','fertilizer_name'),array('status = 1'));
        $data['crops'] = System_helper::get_ordered_crops();
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_fertiliser_stock_out/add_edit",$data,true));
        $this->jsonReturn($ajax);
    } ///// add edit end

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
            {
                $this->db->trans_start();  //DB Transaction Handle START
                $data=array();
                $time=time();

                $data['created_by'] = $user->user_id;
                $data['creation_date'] =$time;
                $data['fertilizer_id']=$this->input->post('fertilizer_id');
                $data['fertilizer_quantity']=$this->input->post('fertilizer_quantity');
                $data['stock_out_date']=System_helper::get_time($this->input->post('stock_out_date'));
                $data['year']=System_helper::get_time($this->input->post('year'));
                $data['season_id']=$this->input->post('season_id');
                $data['crop_id']=$this->input->post('crop_id');

                $stock_out_id=Query_helper::add('rnd_fertilizer_stock_out',$data);
                $variety_ids = $this->input->post('varieties');
                foreach($variety_ids as $id)
                {
                    $data=array();
                    $data['variety_id']=$id;
                    $data['stock_out_id']=$stock_out_id;
                    $data['created_by'] = $user->user_id;
                    $data['creation_date'] =$time;
                    Query_helper::add('rnd_fertilizer_stock_out_varieties',$data);

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

            $this->rnd_list();//this is similar like redirect
        }

    }
    private function check_validation()
    {
        $valid=true;
        if(Validation_helper::validate_empty($this->input->post('fertilizer_id')))
        {
            $valid=false;
            $this->message.="SELECT a Fertilizer.<br>";
        }

        if(!Validation_helper::validate_numeric($this->input->post('fertilizer_quantity')))
        {
            $valid=false;
            $this->message.="Fertilizer Quantity should be a number.<br>";
        }
        if((strtotime($this->input->post('stock_out_date'))===false))
        {
            $valid=false;
            $this->message.="Invalid date.<br>";
        }


        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');

        $variety_ids = $this->input->post('varieties');
        if(Validation_helper::validate_empty($year))
        {
            $valid=false;
            $this->message.="Select a Year<br>";
        }
        if(Validation_helper::validate_empty($season_id))
        {
            $valid=false;
            $this->message.="Select a Season<br>";
        }

        if(Validation_helper::validate_empty($crop_id))
        {
            $valid=false;
            $this->message.="Select a Crop<br>";
        }
        if(!(is_array($variety_ids)))
        {
            $valid=false;
            $this->message.="Select at least one RND code<br>";
        }
        return $valid;
    }
    public function get_varieties()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');

        $data['title'] = "Select varieties";
        $data['varieties']=$this->rnd_fertiliser_stock_out_model->get_varieties_info($year,$season_id,$crop_id);
        if($data['varieties'])
        {
            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#variety_list","html"=>$this->load->view("rnd_fertiliser_stock_out/variety_selection",$data,true));
            $this->jsonReturn($ajax);
        }
        else
        {

            $ajax['status']=false;
            $ajax['message']=$this->lang->line('NO_VARIETY_EXIST_FOR_YOUR_SELECTION');
            $this->jsonReturn($ajax);
        }
    }
}
