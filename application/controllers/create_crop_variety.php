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

        $data['varietyInfo'] = $this->create_crop_variety_model->get_varietyInfo($page);
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
            $data['varietyInfo'] = $this->create_crop_variety_model->get_type_row($id);
            $data['cropTypes'] = $this->create_crop_variety_model->get_product_type($data['varietyInfo']['crop_id']);
            $data['seasonInfo'] = $this->create_crop_variety_model->get_seasons($id);
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
                'principal_id' => '',
                'crop_id' => '',
                'product_type_id' => 0,
                'variety_name' => '',
                'variety_type' => '',
                'company_name' => '',
                'number_of_seeds' => '',
                'quantity' => '',
                'characteristics' => '',
                'new_old_status' => 1,
                'status' => 1
            );
            $ajax['page_url']=base_url()."create_crop_variety/index/add";
        }

        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['principals'] = Query_helper::get_info('rnd_principal_info', '*', array('status ='.$this->config->item('active')));
        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("create_crop_variety/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("variety_id");
        $user = User_helper::get_user();

        $seasonPost = $this->input->post('season');

        $data = Array(
            'number_of_seeds'=>$this->input->post('seed_per_gram'),
            'quantity'=>$this->input->post('quantity_in_gram'),
            'characteristics'=>$this->input->post('characteristics'),
            'status'=>$this->input->post('status')
        );

        if($this->input->post('variety_type')==$this->config->item('variety_type_arm') || $this->input->post('variety_type')==$this->config->item('variety_type_principal'))
        {
            $data['company_name'] = '';
        }
        else
        {
            $data['company_name'] = $this->input->post('company_name');
        }

        if($this->input->post('variety_type')==$this->config->item('variety_type_arm') || $this->input->post('variety_type')==$this->config->item('variety_type_company'))
        {
            $data['principal_id'] = '';
        }
        else
        {
            $data['principal_id'] = $this->input->post('principal_id');
        }



        $seasonData = Array(
            'crop_id'=>$this->input->post('crop_select'),
            'product_type_id'=>$this->input->post('crop_type')
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
                $this->db->trans_start();  //DB Transaction Handle START

                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_variety_info',$data,array("id = ".$id));
                $this->create_crop_variety_model->delete_variety_season($id);

                for($i=0; $i<sizeof($seasonPost); $i++)
                {
                    $seasonData['variety_id'] = $id;
                    $seasonData['created_by'] = $user->user_id;
                    $seasonData['creation_date'] = time();
                    $seasonData['season_id'] = $seasonPost[$i];
                    Query_helper::add('rnd_variety_season',$seasonData);
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

            }
            else
            {
                $this->db->trans_start();  //DB Transaction Handle START

                ///////////////////// START Generating R&D Code ////////////////////

                $crop_code = $this->create_crop_variety_model->get_crop_code_by_id($this->input->post('crop_select'));
                $type_code = $this->create_crop_variety_model->get_type_code_by_id($this->input->post('crop_type'));
                $variety_last_id = $this->create_crop_variety_model->get_variety_last_id($this->input->post('crop_select'));

                if($this->input->post('variety_type')==$this->config->item('variety_type_arm'))
                {
                    $fourthPortion = 'CKA';
                }
                elseif($this->input->post('variety_type')==$this->config->item('variety_type_company'))
                {
                    $fourthPortion = 'CKO';
                }
                else
                {
                    $principal_code = $this->create_crop_variety_model->get_principal_code_by_id($this->input->post('principal_id'));
                    $fourthPortion = $principal_code;
                }

                $lastPortion = substr(date('Y',time()),-2);

                if($this->input->post('new_old_status')==$this->config->item('variety_old_code'))
                {
                    $RnDCode = $crop_code.'-'.$type_code.'-'.$variety_last_id.'-'.$fourthPortion.'-'.$this->lang->line('LABEL_OLD').'-'.$lastPortion;
                }
                else
                {
                    $RnDCode = $crop_code.'-'.$type_code.'-'.$variety_last_id.'-'.$fourthPortion.'-'.$lastPortion;
                }

                ////////////////////// END Generating R&D Code ////////////////////////

                $data['crop_id'] = $this->input->post('crop_select');
                $data['product_type_id'] = $this->input->post('crop_type');
                $data['variety_name'] = $this->input->post('variety_name');
                $data['variety_type'] = $this->input->post('variety_type');
                $data['new_old_status'] = $this->input->post('new_old_status');

                $data['rnd_code'] = $RnDCode;
                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                $last_id = Query_helper::add('rnd_variety_info',$data);

                for($i=0; $i<sizeof($seasonPost); $i++)
                {
                    $seasonData['variety_id'] = $last_id;
                    $seasonData['season_id'] = $seasonPost[$i];
                    $seasonData['created_by'] = $user->user_id;
                    $seasonData['creation_date'] = time();
                    Query_helper::add('rnd_variety_season',$seasonData);
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
        if($this->input->post('principal_id'))
        {
            if(!Validation_helper::validate_numeric($this->input->post('principal_id')))
            {
                return false;
            }
        }

        if($this->input->post('crop_select'))
        {
            if(!Validation_helper::validate_numeric($this->input->post('crop_select')))
            {
                return false;
            }
        }

        if($this->input->post('crop_type'))
        {
            if(!Validation_helper::validate_numeric($this->input->post('crop_type')))
            {
                return false;
            }
        }

        if($this->input->post('variety_name'))
        {
            if(Validation_helper::validate_empty($this->input->post('variety_name')))
            {
                return false;
            }
        }

        if($this->input->post('variety_type'))
        {
            if(!Validation_helper::validate_numeric($this->input->post('variety_type')))
            {
                return false;
            }
        }

        if(!Validation_helper::validate_numeric($this->input->post('seed_per_gram')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('quantity_in_gram')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('status')))
        {
            return false;
        }

        return true;
    }

}
