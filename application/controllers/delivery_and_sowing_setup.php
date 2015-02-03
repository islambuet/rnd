<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Delivery_and_sowing_setup extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("delivery_and_sowing_setup_model");
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
        $config = System_helper::pagination_config(base_url() . "delivery_and_sowing_setup/index/list/",$this->delivery_and_sowing_setup_model->get_total_setup(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['samples'] = $this->delivery_and_sowing_setup_model->get_setups($page);
        $data['title']="Delivery And Sowing Setup List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("delivery_and_sowing_setup/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."delivery_and_sowing_setup/index/list/".($page+1);

        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id != 0)
        {
            $data['deliveryInfo'] = $this->delivery_and_sowing_setup_model->get_setup_row($id);
            $data['title']="Edit Setup";
            $ajax['page_url']=base_url()."delivery_and_sowing_setup/index/edit/".$id;
        }
        else
        {
            $data['title']="Delivery And Sowing Setup";
            $data["deliveryInfo"] = Array(
                'id' => 0,
                'year' => '',
                'season_id' => '',
                'crop_id' => '',
                'estimated_delivery_date' => '',
                'delivery_date' => '',
                'estimated_receive_date' => '',
                'receive_date' => '',
                'sowing_status' => 0,
                'sowing_date' => '',
                'season_end_status' => 0,
                'season_end_date' => ''
            );

            $ajax['page_url']=base_url()."delivery_and_sowing_setup/index/add";
        }

        $data['crops'] = Query_helper::get_info('rnd_crop', '*', array('status ='.$this->config->item('status_active')));
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("delivery_and_sowing_setup/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("delivery_id");
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

            if($id>0)
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $deliveryInfo = $this->delivery_and_sowing_setup_model->get_setup_row($id);

                if($deliveryInfo['sowing_status']==1)
                {
                    if(strlen($this->input->post('transplanting_date'))>0)
                    {
                        $data['transplanting_date'] = strtotime($this->input->post('transplanting_date'));
                    }
                    if($this->input->post('season_end_status')==1)
                    {
                        $data['season_end_status'] = $this->input->post('season_end_status');
                        $data['season_end_date'] = strtotime($this->input->post('season_end_date'));
                    }
                }
                else
                {
                    if($this->input->post('sowing_status')==1)
                    {
                        $data['sowing_status'] = $this->input->post('sowing_status');
                        $data['sowing_date'] = strtotime($this->input->post('sowing_date'));
                    }
                    else
                    {
                        $data['estimated_delivery_date'] = strtotime($this->input->post('estimated_delivery_date'));
                        $data['delivery_date'] = strtotime($this->input->post('delivery_date'));
                        $data['receive_date'] = strtotime($this->input->post('receive_date'));
                    }
                }

                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('delivery_and_sowing_setup',$data,array("id = ".$id));

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
            else
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $data['year'] = $this->input->post('year');
                $data['season_id'] = $this->input->post('season_id');
                $data['crop_id'] = $this->input->post('crop_id');
                $data['estimated_delivery_date'] = strtotime($this->input->post('estimated_delivery_date'));
                $data['delivery_date'] = strtotime($this->input->post('delivery_date'));
                $data['receive_date'] = strtotime($this->input->post('receive_date'));

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('delivery_and_sowing_setup',$data);

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
        if($this->input->post("delivery_id")>0)
        {
            return $this->check_validation_edit();
        }
        else
        {
            return $this->check_validation_add();
        }
    }

    private function check_validation_add()
    {
        $valid=true;

        if(Validation_helper::validate_empty($this->input->post('year')))
        {
            $valid=false;
            $this->message.="Please select a Year<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('season_id')))
        {
            $valid=false;
            $this->message.="Please select a Season<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('crop_id')))
        {
            $valid=false;
            $this->message.="Please select a Crop<br>";
        }

        if(Validation_helper::validate_empty($this->input->post('estimated_delivery_date')))
        {
            $valid=false;
            $this->message.="Please input Destined Delivery Date<br>";
        }

        if(!((Validation_helper::validate_empty($this->input->post('year'))) || (Validation_helper::validate_empty($this->input->post('season_id'))) || (Validation_helper::validate_empty($this->input->post('crop_id')))))
        {
            if($this->delivery_and_sowing_setup_model->check_setup_exists($this->input->post('year'),$this->input->post('season_id'),$this->input->post('crop_id'),$this->input->post('delivery_id')))
            {
                $valid=false;
                $this->message.="This Crop is delivered this Year and Season For R&D<br>";
            }

        }

        return $valid;
    }


    private function check_validation_edit()
    {
        $deliveryInfo = $this->delivery_and_sowing_setup_model->get_setup_row($this->input->post('delivery_id'));
        $valid=true;

        if($deliveryInfo['sowing_status']==1)
        {
            if($this->input->post('season_end_status')==1)
            {
                if(Validation_helper::validate_empty($this->input->post('season_end_date')))
                {
                    $valid=false;
                    $this->message.="Please input a Season End Date<br>";
                }
            }
        }
        else
        {
            if($this->input->post('sowing_status')==1)
            {
                if(Validation_helper::validate_empty($this->input->post('sowing_date')))
                {
                    $valid=false;
                    $this->message.="Please input a Sowing Date<br>";
                }
            }
        }

        return $valid;
    }


}
