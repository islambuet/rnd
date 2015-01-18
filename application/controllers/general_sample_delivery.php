<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class General_sample_delivery extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("general_sample_delivery_model");
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
        $config = System_helper::pagination_config(base_url() . "general_sample_delivery/index/list/",$this->general_sample_delivery_model->get_total_samples(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['sampleInfo'] = $this->general_sample_delivery_model->get_sampleInfo($page);
        $data['title']="Sample Delivery List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("general_sample_delivery/list",$data,true));
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
            $data['sampleInfo'] = $this->general_sample_delivery_model->get_sample_row($id);
            $data['rndCodes'] = $this->general_sample_delivery_model->get_rnd_codes_by_season($data['sampleInfo']['season_id']);
            $data['sampleRndCodes'] = $this->general_sample_delivery_model->get_sample_rnd_codes_by_season($data['sampleInfo']['season_id']);

            $data['title']="Edit Sample Delivery (".$data['sampleInfo']['season_name'].")";
        }
        else
        {
            $data["sampleInfo"] = Array(
                'id' => 0,
                'season_id' => '',
                'rnd_year' => '',
                'destined_delivery_date' => '',
                'delivered_status' => 0,
                'delivery_date' => '',
                'received_status' => 0,
                'rnd_received_date' => '',
                'destined_sowing_date' => '',
                'sowing_status' => 0,
                'sowing_date' => '',
                'remark' => ''
            );
            $data['title']="New Sample Delivery";
        }

        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $data['years'] = Query_helper::get_info('rnd_year', '*', array());
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("general_sample_delivery/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
//        print_r($this->input->post());
//        exit;
        $id = $this->input->post("sample_id");
        $user = User_helper::get_user();

        $rndPost = $this->input->post('rnd_code');
        $sowingPost = $this->input->post('specific_sowing_date');
        $transplantingPost = $this->input->post('specific_transplanting_date');
        $elmPost = $this->input->post('elm_id');

        $data = Array(
            'destined_delivery_date'=>strtotime($this->input->post('destined_delivery_date')),
            'delivered_status'=>$this->input->post('delivered'),
            'received_status'=>$this->input->post('received'),
            'destined_sowing_date'=>strtotime($this->input->post('destined_sowing_date')),
            'sowing_status'=>$this->input->post('sowing'),
            'remark'=>$this->input->post('remarks')
        );

        if($this->input->post('delivered')==$this->config->item('sample_delivery_delivered_status_yes'))
        {
            $data['delivery_date'] = strtotime($this->input->post('delivery_date'));
        }
        else
        {
            $data['delivery_date'] = '';
        }

        if($this->input->post('received')==$this->config->item('sample_delivery_received_status_yes'))
        {
            $data['rnd_received_date'] = strtotime($this->input->post('rnd_receive_date'));
        }
        else
        {
            $data['rnd_received_date'] = '';
        }

        if($this->input->post('sowing')==$this->config->item('sample_delivery_sowing_status_yes'))
        {
            $data['sowing_date'] = strtotime($this->input->post('sowing_date'));
        }
        else
        {
            $data['sowing_date'] = '';
        }

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
//                $this->db->trans_start();  //DB Transaction Handle START

                $data_rnd = Array(
                    'sample_delivery_date_id'=>$id,
                    'created_by'=>$user->user_id,
                    'creation_date'=>time()
                );

                $season_id = $this->input->post('old_season_id');
                $oldRndCodes = $this->general_sample_delivery_model->get_sample_rnd_codes_by_season($season_id);

                // Quantity plus (for UNCHECKED codes only)
                if(!empty($oldRndCodes))
                {
                    foreach($oldRndCodes as $oldcode)
                    {
                        $varietyInfo_update = $this->general_sample_delivery_model->get_crop_id_by_rnd_code($oldcode['rnd_code_id']);
                        $crop_id_update = $varietyInfo_update['crop_id'];
                        $quantity_update = $varietyInfo_update['quantity'];
                        $crop_sample_size_update = $this->general_sample_delivery_model->get_crop_sample_size($crop_id_update);
                        $revised_quantity_update = $quantity_update+$crop_sample_size_update;

                        $data_revised_update = array('quantity'=>$revised_quantity_update);
                        Query_helper::update('rnd_variety_info',$data_revised_update,array("id = ".$oldcode['rnd_code_id']));
                    }
                }


                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_sample_delivery_date',$data,array("id = ".$id));
                $this->general_sample_delivery_model->delete_from_sample_crop_by_id($id);

                // Quantity minus (for CHECKED codes only)
                for($i=0; $i<sizeof($rndPost); $i++)
                {
                    echo $elmPost[$i];
                    $data_rnd['rnd_code_id'] = $rndPost[$i];

//                    if($rndPost[$i])
//                    {
//                        $data_rnd['transplanting_date'] = strtotime($transplantingPost[$i]);
//
//                        if($sowingPost[$i])
//                        {
//                            $data_rnd['sowing_date'] = strtotime($sowingPost[$i]);
//                        }
//                        else
//                        {
//                            $data_rnd['sowing_date'] = strtotime($this->input->post('sowing_date'));
//                        }
//                    }
//
//                    Query_helper::add('rnd_sample_delivery_date_crop',$data_rnd);
//
//                    $varietyInfo = $this->general_sample_delivery_model->get_crop_id_by_rnd_code($rndPost[$i]);
//                    $crop_id = $varietyInfo['crop_id'];
//                    $quantity = $varietyInfo['quantity'];
//                    $crop_sample_size = $this->general_sample_delivery_model->get_crop_sample_size($crop_id);
//                    $revised_quantity = $quantity-$crop_sample_size;
//
//                    $data_revised = Array('quantity'=>$revised_quantity);
//                    Query_helper::update('rnd_variety_info',$data_revised,array("id = ".$rndPost[$i]));
                }


//                $this->db->trans_complete();   //DB Transaction Handle END
//
//                if ($this->db->trans_status() === TRUE)
//                {
//                    $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
//                }
//                else
//                {
//                    $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
//                }
                exit;
            }
            else
            {
//                $this->db->trans_start();  //DB Transaction Handle START

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();
                $data['season_id'] = $this->input->post('sample_season_id');
                $data['rnd_year'] = $this->input->post('sample_rnd_year');

                //$last_id = Query_helper::add('rnd_sample_delivery_date',$data);

//                $data_rnd = Array(
//                  'sample_delivery_date_id'=>$last_id,
//                  'created_by'=>$user->user_id,
//                  'creation_date'=>time()
//                );

                for($i=0; $i<sizeof($rndPost); $i++)
                {
                    echo $elmPost[$i].'-';
//                    if($rndPost[$i]==$elmPost[$i])
//                    {
//                        echo $rndPost[$i].'- '.$i;
//                    }
                    //$data_rnd['rnd_code_id'] = $rndPost[$i];

//                    if($rndPost[$i]==$elmPost[$i])
//                    {
//                        $data_rnd['transplanting_date'] = strtotime($transplantingPost[$i]);
//
//                        if($sowingPost[$i])
//                        {
//                            $data_rnd['sowing_date'] = strtotime($sowingPost[$i]);
//                        }
//                        else
//                        {
//                            $data_rnd['sowing_date'] = strtotime($this->input->post('sowing_date'));
//                        }
//                    }
//
//                    Query_helper::add('rnd_sample_delivery_date_crop',$data_rnd);
//
//                    $varietyInfo = $this->general_sample_delivery_model->get_crop_id_by_rnd_code($rndPost[$i]);
//                    $crop_id = $varietyInfo['crop_id'];
//                    $quantity = $varietyInfo['quantity'];
//                    $crop_sample_size = $this->general_sample_delivery_model->get_crop_sample_size($crop_id);
//                    $revised_quantity = $quantity-$crop_sample_size;
//
//                    $data_revised = Array('quantity'=>$revised_quantity);
//                    Query_helper::update('rnd_variety_info',$data_revised,array("id = ".$rndPost[$i]));
                }
exit;
//                $this->db->trans_complete();   //DB Transaction Handle END
//
//                if ($this->db->trans_status() === TRUE)
//                {
//                    $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
//                }
//                else
//                {
//                    $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
//                }
            }

            $this->rnd_list();//this is similar like redirect
        }

    }


    public function check_existing_season()
    {
        if($this->general_sample_delivery_model->check_existing_season($this->input->post('sample_season_id'), $this->input->post('sample_rnd_year')))
        {
            $ajax['status']=true;
        }
        else
        {
            $ajax['status']=false;
        }

        if($ajax['status'])
        {
            $ajax['message'] = 'Season Exists for the selected year';
        }
        else
        {
            $ajax['message'] = '';

        }

        $this->jsonReturn($ajax);
    }

    private function check_validation()
    {
        // Will be Modified

        if($this->input->post('sample_season_id'))
        {
            if(Validation_helper::validate_empty($this->input->post('sample_season_id')))
            {
                return false;
            }
        }

        if($this->input->post('sample_rnd_year'))
        {
            if(Validation_helper::validate_empty($this->input->post('sample_rnd_year')) || $this->general_sample_delivery_model->check_existing_season($this->input->post('sample_season_id'), $this->input->post('sample_rnd_year')))
            {
                return false;
            }
        }

        if(Validation_helper::validate_empty($this->input->post('destined_delivery_date')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('delivered')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('received')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('destined_sowing_date')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('sowing')))
        {
            return false;
        }

        return true;
    }


}
