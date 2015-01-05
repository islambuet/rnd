<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Trail_fiftyfive_picture_report extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("trail_fiftyfive_picture_report_model");
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
        $config = System_helper::pagination_config(base_url() . "trail_fiftyfive_picture_report/index/list/",$this->trail_fiftyfive_picture_report_model->get_total_pictureReports(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['pictureReports'] = $this->trail_fiftyfive_picture_report_model->get_pictureReportInfo($page);
        $data['title']="15 Days Picture Report List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("trail_fiftyfive_picture_report/list",$data,true));
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
            $data['pictureInfo'] = $this->trail_fiftyfive_picture_report_model->get_report_row($id);
            $data['details'] = $this->trail_fiftyfive_picture_report_model->get_report_image_detail($id);
            $data['title']="Edit 15 Day Picture Report";
        }
        else
        {
            $data['title']="New 15 Days Picture Report";
            $data["pictureInfo"] = Array(
                'id' => 0,
                'crop_id' => '',
                'type_id' => '',
                'rnd_code' => '',
                'sowing_date' => '',
                'picture_date' => '',
                'picture_day' => '',
                'remarks' => ''
            );
        }

        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['types'] = Query_helper::get_info('rnd_product_type_info', '*', array('status ='.$this->config->item('active')));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("trail_fiftyfive_picture_report/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("type_id");
        $user = User_helper::get_user();

        $new_file_name = time().'.jpg';
        $img = System_helper::file_upload('rnd_image',$this->config->item('fifteen_days_picture_report_img_upload_folder'),$new_file_name,$this->config->item('fifteen_days_picture_report_img_type'),$this->config->item('fifteen_days_picture_report_img_size'),$this->config->item('fifteen_days_picture_report_img_allowed_types'));

        $data = Array(
            'crop_id'=>$this->input->post('crop_id'),
            'type_id'=>$this->input->post('crop_type'),
            'rnd_code'=>$this->input->post('rnd_code'),
            'sowing_date'=>strtotime($this->input->post('sowing_date'))
        );

        $data_img = Array(
          'image_name'=>$img,
          'picture_date'=>time(),
          'picture_day'=>$this->input->post('picture_day'),
          'remarks'=>$this->input->post('remarks')
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

                $data_img['modified_by'] = $user->user_id;
                $data_img['modification_date'] = time();

                Query_helper::update('rnd_fifteen_days_picture_report',$data,array("id = ".$id));

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

                $last_id = Query_helper::add('rnd_fifteen_days_picture_report',$data);

                $data_img['picture_report_id']= $last_id;
                $data_img['created_by'] = $user->user_id;
                $data_img['creation_date'] = time();

                Query_helper::add('rnd_fifteen_days_picture_report_images',$data_img);

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
        if(Validation_helper::validate_empty($this->input->post('crop_id')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('crop_type')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('rnd_code')))
        {
            return false;
        }

        if(Validation_helper::validate_empty($this->input->post('picture_day')))
        {
            return false;
        }

        return true;

    }


}
