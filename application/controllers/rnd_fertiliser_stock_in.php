<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_fertiliser_stock_in extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_fertiliser_stock_in_model");
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
        $config = System_helper::pagination_config(base_url() . "rnd_fertiliser_stock_in/index/list/",$this->rnd_fertiliser_stock_in_model->get_total_fertiliser_stock_in(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['stock_in_info'] = $this->rnd_fertiliser_stock_in_model->get_stock_in_info($page);
        $data['title']="Fertiliser Stock In List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_fertiliser_stock_in/list",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."rnd_fertiliser_stock_in/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id > 0)
        {
            $data['fertiliserInfo'] = Query_helper::get_info('rnd_fertilizer_stock_in',array('id','fertilizer_id','fertilizer_quantity','fertilizer_price'),array('id ='.$id),1);
            $data['title']="Edit fertilizer Stock";
            $ajax['page_url']=base_url()."rnd_fertiliser_stock_in/index/edit/".$id;
        }
        else
        {
            $data["fertiliserInfo"] = Array(
                'id' => 0,
                'fertilizer_id'=>'',
                'fertilizer_quantity' => '',
                'fertilizer_price' => ''
            );
            $data['title']="New Fertiliser Stock";
            $ajax['page_url']=base_url()."rnd_fertiliser_stock_in/index/add";
        }

        $data['fertilisers']= Query_helper::get_info('rnd_fertilizer_info',array('id','fertilizer_name'),array('status = 1'));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_fertiliser_stock_in/add_edit",$data,true));
        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("stock_in_id");
        $user = User_helper::get_user();

        $data = Array(
            'fertilizer_id'=>$this->input->post('fertiliser_id'),
            'fertilizer_quantity'=>$this->input->post('fertilizer_quantity'),
            'fertilizer_price'=>$this->input->post('fertiliser_price'),

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

                Query_helper::update('rnd_fertilizer_stock_in',$data,array("id = ".$id));
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

                Query_helper::add('rnd_fertilizer_stock_in',$data);
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

    /*public function rnd_change_status($id, $fertiliser_id)
    {
        $check = $this->rnd_feriliser_stock_in_model->check_fertiliser_stock_out($fertiliser_id);
        if($check)
        {
            $this->message=$this->lang->line("MSG_THIS_FERTILISER_OUT_OF_STOCK");
        }
        else
        {
            $data=array('status'=>$this->config->item('inactive'));
            Query_helper::update('rnd_fertilizer_stock_in',$data,array("id = ".$id));
            $this->rnd_list();//this is similar like redirect
        }

        $this->rnd_list();//this is similar like redirect
    }
*/
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

        if(!Validation_helper::validate_numeric($this->input->post('fertiliser_price')))
        {
            $valid=false;
            $this->message.="Fertilizer Price should be a number.<br>";
        }
        $id = $this->input->post("stock_in_id");
        if($id>0)
        {
            $this->message="validation not checked";
            $valid=false;
        }

        return $valid;
    }


}
