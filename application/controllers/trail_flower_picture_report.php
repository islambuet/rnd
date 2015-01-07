<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Trail_flower_picture_report extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("trail_flower_picture_report_model");
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
        $config = System_helper::pagination_config(base_url() . "trail_flower_picture_report/index/list/",$this->trail_flower_picture_report_model->get_total_pictureReports(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['pictureReports'] = $this->trail_flower_picture_report_model->get_pictureReportInfo($page);
        $data['title']="Fruit Flowering Picture Report List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("trail_flower_picture_report/list",$data,true));
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
            $data['pictureInfo'] = $this->trail_flower_picture_report_model->get_report_row($id);
            $data['details'] = $this->trail_flower_picture_report_model->get_report_image_detail($id);
            $data['title']="Edit 15 Day Picture Report";
        }
        else
        {
            $data['title']="New Fruit Flowering Picture Report";
            $data["pictureInfo"] = Array(
                'id' => 0,
                'season_id' => '',
                'crop_id' => '',
                'type_id' => '',
                'rnd_code' => '',
                'sowing_date' => '',
                'picture_date' => '',
                'actual_picture_date' => '',
                'picture_day' => '',
                'remarks' => ''
            );
        }

        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['types'] = Query_helper::get_info('rnd_product_type_info', '*', array('status ='.$this->config->item('active')));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("trail_flower_picture_report/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("fifteen_id");
        $user = User_helper::get_user();

        $new_file_name1 = $this->config->item('first_flowering_pic_code').time().'.jpg';
        $new_file_name2 = $this->config->item('fifty_percent_flowering_pic_code').time().'.jpg';
        $new_file_name3 = $this->config->item('first_fruit_setting_pic_code').time().'.jpg';
        $new_file_name4 = $this->config->item('first_harvested_fruit_code').time().'.jpg';
        $new_file_name5 = $this->config->item('last_harvested_fruit_code').time().'.jpg';

        $img1 = System_helper::file_upload('first_flowering_pic',$this->config->item('flowering_picture_report_img_upload_folder'),$new_file_name1,$this->config->item('flowering_picture_report_img_type'),$this->config->item('flowering_picture_report_img_size'),$this->config->item('flowering_picture_report_img_allowed_types'));
        $img2 = System_helper::file_upload('fifty_percent_flowering_pic',$this->config->item('flowering_picture_report_img_upload_folder'),$new_file_name2,$this->config->item('flowering_picture_report_img_type'),$this->config->item('flowering_picture_report_img_size'),$this->config->item('flowering_picture_report_img_allowed_types'));
        $img3 = System_helper::file_upload('first_fruit_setting_pic',$this->config->item('flowering_picture_report_img_upload_folder'),$new_file_name3,$this->config->item('flowering_picture_report_img_type'),$this->config->item('flowering_picture_report_img_size'),$this->config->item('flowering_picture_report_img_allowed_types'));
        $img4 = System_helper::file_upload('first_harvested_fruit',$this->config->item('flowering_picture_report_img_upload_folder'),$new_file_name4,$this->config->item('flowering_picture_report_img_type'),$this->config->item('flowering_picture_report_img_size'),$this->config->item('flowering_picture_report_img_allowed_types'));
        $img5 = System_helper::file_upload('last_harvested_fruit',$this->config->item('flowering_picture_report_img_upload_folder'),$new_file_name5,$this->config->item('flowering_picture_report_img_type'),$this->config->item('flowering_picture_report_img_size'),$this->config->item('flowering_picture_report_img_allowed_types'));

        $data = Array(
            'rnd_code_id'=>$this->input->post('rnd_code'),
            'first_flowering_pic'=>$img1,
            'first_flowering_remark'=>$this->input->post('first_flowering_remark'),
            'fifty_flowering_pic'=>$img2,
            'fifty_flowering_remark'=>$this->input->post('fifty_percent_flowering_remark'),
            'first_setting_pic'=>$img3,
            'first_setting_remark'=>$this->input->post('first_fruit_setting_remark'),
            'first_harvested_pic'=>$img4,
            'first_harvested_remark'=>$this->input->post('first_harvested_fruit_remark'),
            'last_harvested_pic'=>$img5,
            'last_harvested_remark'=>$this->input->post('last_harvested_fruit_remark')
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

                Query_helper::update('rnd_flowering_picture_report',$data,array("id = ".$id));

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

                Query_helper::add('rnd_flowering_picture_report',$data);

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
        if($this->input->post('crop_id'))
        {
            if(Validation_helper::validate_empty($this->input->post('crop_id')))
            {
                return false;
            }
        }

        if($this->input->post('crop_type'))
        {
            if(Validation_helper::validate_empty($this->input->post('crop_type')))
            {
                return false;
            }
        }

        if($this->input->post('rnd_code'))
        {
            if(Validation_helper::validate_empty($this->input->post('rnd_code')))
            {
                return false;
            }
        }


        if(Validation_helper::validate_empty($this->input->post('picture_day')))
        {
            return false;
        }

        return true;

    }


}
