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
            $data['title']="Edit Flowering Picture Report";
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
        $id = $this->input->post("pic_report_id");
        $user = User_helper::get_user();

        $file_name1 = $_FILES['first_flowering_pic']['name'];
        $file_name2 = $_FILES['fifty_percent_flowering_pic']['name'];
        $file_name3 = $_FILES['first_fruit_setting_pic']['name'];
        $file_name4 = $_FILES['first_harvested_fruit']['name'];
        $file_name5 = $_FILES['last_harvested_fruit']['name'];

        $file_temp1 = $_FILES['first_flowering_pic']['tmp_name'];
        $file_temp2 = $_FILES['fifty_percent_flowering_pic']['tmp_name'];
        $file_temp3 = $_FILES['first_fruit_setting_pic']['tmp_name'];
        $file_temp4 = $_FILES['first_harvested_fruit']['tmp_name'];
        $file_temp5 = $_FILES['last_harvested_fruit']['tmp_name'];

        $ext1 = end(explode(".", @$file_name1));
        $ext2 = end(explode(".", @$file_name2));
        $ext3 = end(explode(".", @$file_name3));
        $ext4 = end(explode(".", @$file_name4));
        $ext5 = end(explode(".", @$file_name5));

        $size1 = @$file_name1['size'];
        $size2 = @$file_name2['size'];
        $size3 = @$file_name3['size'];
        $size4 = @$file_name4['size'];
        $size5 = @$file_name5['size'];

        $new_file_name1 = $this->config->item('first_flowering_pic_code').time();
        $new_file_name2 = $this->config->item('fifty_percent_flowering_pic_code').time();
        $new_file_name3 = $this->config->item('first_fruit_setting_pic_code').time();
        $new_file_name4 = $this->config->item('first_harvested_fruit_code').time();
        $new_file_name5 = $this->config->item('last_harvested_fruit_code').time();

        if (@$file_name1 != "")
        {
            if(($ext1 == 'jpg') || ($ext1 == 'png') || ($ext1 == 'jpeg'))
            {
                if($size1 < $this->config->item('flowering_picture_report_img_size'))
                {
                    @$ext1 = end(explode(".", @$file_name1));
                    $file_url1 = $new_file_name1 . "." . $ext1;
                    copy(@$file_temp1, $this->config->item('flowering_picture_report_img_upload_folder')."/".$file_url1);
                }
                else
                {
                    $this->message=$this->lang->line("MSG_FILE_SIZE_ERROR");
                }
            }
            else
            {
                $this->message=$this->lang->line("MSG_FILE_TYPE_ERROR");
            }
        }

        if (@$file_name2 != "")
        {
            if(($ext2 == 'jpg') || ($ext2 == 'png') || ($ext2 == 'jpeg'))
            {
                if($size2 < $this->config->item('flowering_picture_report_img_size'))
                {
                    @$ext2 = end(explode(".", @$file_name2));
                    $file_url2 = $new_file_name2 . "." . $ext2;
                    copy(@$file_temp2, $this->config->item('flowering_picture_report_img_upload_folder')."/".$file_url2);
                }
                else
                {
                    $this->message=$this->lang->line("MSG_FILE_SIZE_ERROR");
                }
            }
            else
            {
                $this->message=$this->lang->line("MSG_FILE_TYPE_ERROR");
            }
        }

        if (@$file_name3 != "")
        {
            if(($ext3 == 'jpg') || ($ext3 == 'png') || ($ext3 == 'jpeg'))
            {
                if($size3 < $this->config->item('flowering_picture_report_img_size'))
                {
                    @$ext3 = end(explode(".", @$file_name3));
                    $file_url3 = $new_file_name3 . "." . $ext3;
                    copy(@$file_temp3, $this->config->item('flowering_picture_report_img_upload_folder')."/".$file_url3);
                }
                else
                {
                    $this->message=$this->lang->line("MSG_FILE_SIZE_ERROR");
                }
            }
            else
            {
                $this->message=$this->lang->line("MSG_FILE_TYPE_ERROR");
            }
        }

        if (@$file_name4 != "")
        {
            if(($ext4 == 'jpg') || ($ext4 == 'png') || ($ext4 == 'jpeg'))
            {
                if($size4 < $this->config->item('flowering_picture_report_img_size'))
                {
                    @$ext4 = end(explode(".", @$file_name4));
                    $file_url4 = $new_file_name4 . "." . $ext4;
                    copy(@$file_temp4, $this->config->item('flowering_picture_report_img_upload_folder')."/".$file_url4);
                }
                else
                {
                    $this->message=$this->lang->line("MSG_FILE_SIZE_ERROR");
                }
            }
            else
            {
                $this->message=$this->lang->line("MSG_FILE_TYPE_ERROR");
            }
        }

        if (@$file_name5 != "")
        {
            if(($ext5 == 'jpg') || ($ext5 == 'png') || ($ext5 == 'jpeg'))
            {
                if($size5 < $this->config->item('flowering_picture_report_img_size'))
                {
                    @$ext5 = end(explode(".", @$file_name5));
                    $file_url5 = $new_file_name5 . "." . $ext5;
                    copy(@$file_temp5, $this->config->item('flowering_picture_report_img_upload_folder')."/".$file_url5);
                }
                else
                {
                    $this->message=$this->lang->line("MSG_FILE_SIZE_ERROR");
                }
            }
            else
            {
                $this->message=$this->lang->line("MSG_FILE_TYPE_ERROR");
            }
        }

        $data = Array(
            'season_id'=>$this->input->post('season_id'),
            'crop_id'=>$this->input->post('crop_id'),
            'type_id'=>$this->input->post('crop_type'),
            'rnd_code_id'=>$this->input->post('rnd_code'),
            'first_flowering_pic'=>$file_url1,
            'first_flowering_remark'=>$this->input->post('first_flowering_remark'),
            'fifty_flowering_pic'=>$file_url2,
            'fifty_flowering_remark'=>$this->input->post('fifty_percent_flowering_remark'),
            'first_setting_pic'=>$file_url3,
            'first_setting_remark'=>$this->input->post('first_fruit_setting_remark'),
            'first_harvested_pic'=>$file_url4,
            'first_harvested_remark'=>$this->input->post('first_harvested_fruit_remark'),
            'last_harvested_pic'=>$file_url5,
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
        if(Validation_helper::validate_empty($this->input->post('rnd_code')))
        {
            return false;
        }

        return true;

    }


}
