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
        elseif ($task == "delete")
        {
            $this->rnd_change_status($id);
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
        $data['title']="Fertiliser Stock In List";

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
        if ($id > 0)
        {
            $data['fertiliserInfo'] = Query_helper::get_info('rnd_fertilizer_stock_out',array('id','fertilizer_id','fertilizer_quantity'),array('id ='.$id),1);
            $data['title']="Edit fertilizer Stock Out";
            $ajax['page_url']=base_url()."rnd_fertiliser_stock_out/index/edit/".$id;
        }
        else
        {
            $data["fertiliserInfo"] = Array(
                'id' => 0,
                'fertilizer_id'=>'',
                'fertilizer_quantity' => ''
            );
            $data['title']="New Fertiliser Stock Out";
            $ajax['page_url']=base_url()."rnd_fertiliser_stock_out/index/add";
        }

        $data['fertilisers']= Query_helper::get_info('rnd_fertilizer_info',array('id','fertilizer_name'),array('status = 1'));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_fertiliser_stock_out/add_edit",$data,true));
        $this->jsonReturn($ajax);
    } ///// add edit end

    public function rnd_save()
    {
        $id = $this->input->post("stock_out_id");
        $user = User_helper::get_user();

        $data = Array(
            'fertilizer_id'=>$this->input->post('fertiliser_id'),
            'fertilizer_quantity'=>$this->input->post('fertilizer_quantity')

        );

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {
            if($id>0)
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_fertilizer_stock_out',$data,array("id = ".$id));
                $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");

                $this->db->trans_complete();   //DB Transaction Handle END

                if ($this->db->trans_status() === TRUE)
                {
                    $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
                }
                else
                {
                    $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                }
            }
            else
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_fertilizer_stock_out',$data);
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
            }

            $this->rnd_list();//this is similar like redirect
        }

    }
    private function check_validation()
    {
        $valid=true;
        if(Validation_helper::validate_empty($this->input->post('fertiliser_id')))
        {
            $valid=false;
            $this->message.="SELECT a Fertilizer.<br>";
        }

        if(!Validation_helper::validate_numeric($this->input->post('fertilizer_quantity')))
        {
            $valid=false;
            $this->message.="Fertilizer Quantity should be a number.<br>";
        }


        /*$id = $this->input->post("stock_out_id");
        if($id>0)
        {
            if(!($this->rnd_fertiliser_stock_in_model->check_changeable($id,$this->input->post('fertilizer_quantity'),$this->input->post('fertiliser_id'))))
            {
                $this->message.=$this->lang->line("MSG_STACK_OUT_WILL_BE_BIGGER").'<br>';
                $valid=false;
            }

        }*/
        return $valid;
    }
}
