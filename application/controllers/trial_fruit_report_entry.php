<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Trial_fruit_report_entry extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("trial_fruit_report_entry_model");
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
        $config = System_helper::pagination_config(base_url() . "trail_fruit_report_entry/index/list/",$this->trial_fruit_report_entry_model->get_total_pictureReports(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['pictureReports'] = $this->trial_fruit_report_entry_model->get_pictureReportInfo($page);
        $data['title']="Fruit Picture Report List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("trial_fruit_report_entry/list",$data,true));
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
            $data['pictureInfo'] = $this->trial_fruit_report_entry_model->get_report_row($id);
            //$data['details'] = $this->trial_fruit_report_entry_model->get_report_image_detail($id);
            $data['images'][$this->config->item("fruit_report_before_harvest")]=$this->trial_fruit_report_entry_model->get_report_row_images($id,$this->config->item("fruit_report_before_harvest"));
            $data['images'][$this->config->item("fruit_report_after_harvest_single")]=$this->trial_fruit_report_entry_model->get_report_row_images($id,$this->config->item("fruit_report_after_harvest_single"));
            $data['images'][$this->config->item("fruit_report_after_harvest_several")]=$this->trial_fruit_report_entry_model->get_report_row_images($id,$this->config->item("fruit_report_after_harvest_several"));
            $data['images'][$this->config->item("fruit_report_after_harvest_cut")]=$this->trial_fruit_report_entry_model->get_report_row_images($id,$this->config->item("fruit_report_after_harvest_cut"));
            $data['title']="Edit Fruit Picture Report";
        }
        else
        {
            $data['title']="New Fruit Picture Report";
            $data["pictureInfo"] = Array(
                'id' => 0,
                'season_id' => '',
                'crop_id' => '',
                'product_type_id' => '',
                'rnd_code_id' => '',

            );
            $data['images']=array();

        }

        $data['seasons'] = Query_helper::get_info('rnd_season_info', '*', array('status ='.$this->config->item('active')));
        $data['crops'] = Query_helper::get_info('rnd_crop_info', '*', array('status ='.$this->config->item('active')));
        $data['types'] = Query_helper::get_info('rnd_product_type_info', '*', array('status ='.$this->config->item('active')));
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("trial_fruit_report_entry/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("fruit_report_id");
        $user = User_helper::get_user();

        //$new_file_name = time().'.jpg';
        //$img = System_helper::file_upload('rnd_image',$this->config->item('fifteen_days_picture_report_img_upload_folder'),$new_file_name,$this->config->item('fifteen_days_picture_report_img_type'),$this->config->item('fifteen_days_picture_report_img_size'),$this->config->item('fifteen_days_picture_report_img_allowed_types'));

        $data = Array(
            'season_id'=>$this->input->post('season_id'),
            'crop_id'=>$this->input->post('crop_id'),
            'product_type_id'=>$this->input->post('crop_type'),
            'rnd_code_id'=>$this->input->post('rnd_code'),
        );



        $data_img = Array(
           // 'image_name'=>$img,
            //'picture_date'=>$this->input->post('picture_date'),
           // 'actual_picture_date'=>time(),
            //'picture_day'=>$this->input->post('picture_day'),
            //'remarks'=>$this->input->post('remarks')
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

//                Query_helper::update('rnd_fifteen_days_picture_report',$data,array("id = ".$id));

                $data_img['picture_report_id']= $id;
                $data_img['created_by'] = $user->user_id;
                $data_img['creation_date'] = time();

                Query_helper::add('rnd_fruit_report_entry',$data_img);

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

                $last_id =Query_helper::add('rnd_fruit_report_entry',$data);

                $count = count($_FILES["before_harvest"]['name']);


 //               Before Harvest Loop Start  //


                if($count>0)
                {

                    $file_name = $_FILES["before_harvest"]['name'];
                    $file_temp = $_FILES['before_harvest']['tmp_name'];

                    for($i=0; $i<$count; $i++)
                    {
                        $ext = end(explode(".", @$file_name[$i]));

                        $size = @$file_name[$i]['size'];

                        $new_file_name = "bh".time().$i;
                        $save_file_name = "bh".time().$i.'.'.$ext;

                        if (@$file_name[$i] != "")
                        {
                            if(($ext == 'jpg') || ($ext == 'png') || ($ext == 'jpeg'))
                            {
                                if($size < $this->config->item('fruit_picture_report_img_size'))
                                {
                                    @$ext = end(explode(".", @$file_name[$i]));
                                    $file_url = $new_file_name . "." . $ext;
                                    copy(@$file_temp[$i], $this->config->item('fruit_picture_report_before_harvesting_img_upload_folder')."/".$file_url);

                                    $data1 = Array(
                                        'fruit_report_entry_id'=>$last_id,
                                        'image' => $save_file_name,
                                        'fruit_report_entry_type' => $this->config->item('fruit_report_before_harvest')

                                    );

                                    $data1['created_by'] = $user->user_id;
                                    $data1['creation_date'] = time();
                                    Query_helper::add('rnd_fruit_report_entry_image',$data1);

                                }
                                else
                                {
                                    $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                                }
                            }
                            else
                            {
                                $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                            }
                        }

                    }


                }

               /// Before Harvest Loop End ////

                /// After Harvest Single Fruit ////

                $count1 = count($_FILES["after_harvest_single"]['name']);

                if($count1>0)
                {

                    $file_name = $_FILES["after_harvest_single"]['name'];
                    $file_temp = $_FILES['after_harvest_single']['tmp_name'];

                    for($i=0; $i<$count1; $i++)
                    {
                        $ext = end(explode(".", @$file_name[$i]));

                        $size = @$file_name[$i]['size'];

                        $new_file_name = "ahs".time().$i;
                        $save_file_name = "ahs".time().$i.'.'.$ext;

                        if (@$file_name[$i] != "")
                        {
                            if(($ext == 'jpg') || ($ext == 'png') || ($ext == 'jpeg'))
                            {
                                if($size < $this->config->item('fruit_picture_report_img_size'))
                                {
                                    @$ext = end(explode(".", @$file_name[$i]));
                                    $file_url = $new_file_name . "." . $ext;
                                    copy(@$file_temp[$i], $this->config->item('fruit_picture_report_after_harvesting_img_upload_folder')."/".$file_url);

                                    $data2 = Array(
                                        'fruit_report_entry_id'=>$last_id,
                                        'image' => $save_file_name,
                                        'fruit_report_entry_type' => $this->config->item('fruit_report_after_harvest_single')

                                    );

                                    $data2['created_by'] = $user->user_id;
                                    $data2['creation_date'] = time();
                                    Query_helper::add('rnd_fruit_report_entry_image',$data2);

                                }
                                else
                                {
                                    $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                                }
                            }
                            else
                            {
                                $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                            }
                        }

                    }


                }

                /// After Harvest Several Fruit ////


                $count2 = count($_FILES["after_harvest_several"]['name']);

                if($count2>0)
                {

                    $file_name = $_FILES["after_harvest_several"]['name'];
                    $file_temp = $_FILES['after_harvest_several']['tmp_name'];

                    for($i=0; $i<$count2; $i++)
                    {
                        $ext = end(explode(".", @$file_name[$i]));

                        $size = @$file_name[$i]['size'];

                        $new_file_name = "ah_sv".time().$i;
                        $save_file_name = "ah_sv".time().$i.'.'.$ext;

                        if (@$file_name[$i] != "")
                        {
                            if(($ext == 'jpg') || ($ext == 'png') || ($ext == 'jpeg'))
                            {
                                if($size < $this->config->item('fruit_picture_report_img_size'))
                                {
                                    @$ext = end(explode(".", @$file_name[$i]));
                                    $file_url = $new_file_name . "." . $ext;
                                    copy(@$file_temp[$i], $this->config->item('fruit_picture_report_after_harvesting_img_upload_folder')."/".$file_url);

                                    $data3 = Array(
                                        'fruit_report_entry_id'=>$last_id,
                                        'image' => $save_file_name,
                                        'fruit_report_entry_type' => $this->config->item('fruit_report_after_harvest_several')

                                    );

                                    $data3['created_by'] = $user->user_id;
                                    $data3['creation_date'] = time();
                                    Query_helper::add('rnd_fruit_report_entry_image',$data3);

                                }
                                else
                                {
                                    $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                                }
                            }
                            else
                            {
                                $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                            }
                        }

                    }


                }


                /// After Harvest cut Fruit ////


                $count3 = count($_FILES["after_harvest_cut"]['name']);

                if($count3>0)
                {

                    $file_name = $_FILES["after_harvest_cut"]['name'];
                    $file_temp = $_FILES['after_harvest_cut']['tmp_name'];

                    for($i=0; $i<$count3; $i++)
                    {
                        $ext = end(explode(".", @$file_name[$i]));

                        $size = @$file_name[$i]['size'];

                        $new_file_name = "ah_cut".time().$i;
                        $save_file_name = "ah_cut".time().$i.'.'.$ext;

                        if (@$file_name[$i] != "")
                        {
                            if(($ext == 'jpg') || ($ext == 'png') || ($ext == 'jpeg'))
                            {
                                if($size < $this->config->item('fruit_picture_report_img_size'))
                                {
                                    @$ext = end(explode(".", @$file_name[$i]));
                                    $file_url = $new_file_name . "." . $ext;
                                    copy(@$file_temp[$i], $this->config->item('fruit_picture_report_after_harvesting_img_upload_folder')."/".$file_url);

                                    $data4 = Array(
                                        'fruit_report_entry_id'=>$last_id,
                                        'image' => $save_file_name,
                                        'fruit_report_entry_type' => $this->config->item('fruit_report_after_harvest_cut')

                                    );

                                    $data4['created_by'] = $user->user_id;
                                    $data4['creation_date'] = time();
                                    Query_helper::add('rnd_fruit_report_entry_image',$data4);

                                }
                                else
                                {
                                    $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                                }
                            }
                            else
                            {
                                $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                            }
                        }

                    }


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
        if($this->input->post('crop_id'))
        {

            if(Validation_helper::validate_empty($this->input->post('season_id')))

            {
            return false;

            }
        }
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

        return true;

    }


}
