<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Report_trial_analysis extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->config->load('report_config');;
        $this->load->model("report_trial_analysis_model");
    }

    public function index($task="search",$id=0)
    {
        if($task=="search")
        {
            $this->rnd_search();
        }
        elseif($task=="report")
        {
            $this->rnd_report();
        }
        elseif($task=="report_text_details")
        {
            $this->rnd_report_text_details($id);
        }
        else
        {
            $this->rnd_search();
        }
    }

    private function rnd_search()
    {
        $data['title'] = "Trial Analysis Report";

        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $data['crops'] = System_helper::get_ordered_crops();
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("report_trial_analysis/search", $data, true));

        if ($this->message) {
            $ajax['message'] = $this->message;
        }
        $ajax['page_url']=base_url()."report_trial_analysis/index/search/";

        $this->jsonReturn($ajax);
    }
    private function rnd_report_text_details($report_name)
    {
        $variety_ids=$this->input->post('varieties');
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $data['varieties']=$this->report_trial_analysis_model->get_varieties_by_ids($variety_ids);
        $data['delivery_and_sowing_info']=Query_helper::get_info('delivery_and_sowing_setup','*',array('crop_id ='.$crop_id,'year ='.$year,'season_id ='.$season_id),1);
        $ajax['status'] = true;
        if($report_name==1)
        {
            $data['options']=Query_helper::get_info('rnd_setup_text_fifteen_days','*',array('crop_id ='.$crop_id),1);
            $data['fortnightly']=$this->report_trial_analysis_model->get_details_fortnightly($variety_ids,$year,$season_id);
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_detail_fortnightly", $data, true));
        }
        elseif($report_name==2)
        {
            $data['options']=Query_helper::get_info('rnd_setup_text_flowering','*',array('crop_id ='.$crop_id),1);
            $data['flowering']=$this->report_trial_analysis_model->get_details_flowering($variety_ids,$year,$season_id);
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_detail_flowering", $data, true));
        }
        elseif($report_name==3)
        {
            $data['options']=Query_helper::get_info('rnd_setup_text_fruit','*',array('crop_id ='.$crop_id),1);
            $data['fruit']=$this->report_trial_analysis_model->get_details_fruit($variety_ids,$year,$season_id);
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_detail_fruit", $data, true));

        }
        elseif($report_name==4)
        {
            $data['options']=Query_helper::get_info('rnd_setup_text_harvest_cropwise','*',array('crop_id ='.$crop_id),1);
            $data['harvest']=$this->report_trial_analysis_model->get_details_harvest($variety_ids,$year,$season_id);
            $data['max_harvest']=$this->report_trial_analysis_model->get_max_harvest_days_text($year,$season_id,$crop_id,$crop_type_id);
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_detail_harvest", $data, true));
        }
        elseif($report_name==5)
        {
            $data['options']=Query_helper::get_info('rnd_setup_text_harvest_compile','*',array('crop_id ='.$crop_id),1);
            $data['harvest']=$this->report_trial_analysis_model->get_details_harvest($variety_ids,$year,$season_id);
            $data['harvest_compile']=$this->report_trial_analysis_model->get_details_harvest_compile($variety_ids,$year,$season_id);
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_detail_harvest_compile", $data, true));
        }
        elseif($report_name==6)
        {
            $data['options']=Query_helper::get_info('rnd_setup_text_yield','*',array('crop_id ='.$crop_id),1);
            $data['harvest']=$this->report_trial_analysis_model->get_details_harvest($variety_ids,$year,$season_id);
            $data['yield']=$this->report_trial_analysis_model->get_details_yeild($variety_ids,$year,$season_id);
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_detail_yield", $data, true));
        }
        elseif($report_name==7)
        {
            $data['options']=Query_helper::get_info('rnd_setup_text_veg_fruit','*',array('crop_id ='.$crop_id),1);
            $data['final']=$this->report_trial_analysis_model->get_details_final($variety_ids,$year,$season_id);
            $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_detail_final", $data, true));
        }
        else
        {
            $ajax['message']=$this->lang->line('INVALID_SELECTION');
        }
        $this->jsonReturn($ajax);
    }
    private function rnd_report_images()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $report_type=$this->input->post('report_type');//no need
        $report_name=$this->input->post('report_name');
        $variety_ids=$this->input->post('varieties');
        $data['report_name']=$report_name;
        $data['varieties']=$this->report_trial_analysis_model->get_varieties_by_ids($variety_ids);
        if(($report_name>4)||($report_name<0))
        {
            $ajax['status'] = false;
            $ajax['message'] = $this->lang->line('INVALID_REPORT_TYPE');
            $this->jsonReturn($ajax);
        }
        if(($report_name==0) ||($report_name==1))
        {
            $data['max_15_days']=$this->report_trial_analysis_model->get_max_15_days($year,$season_id,$crop_id,$crop_type_id);
            $data['fortnightly']=$this->report_trial_analysis_model->get_15_days_images($variety_ids,$year,$season_id);


        }
        if(($report_name==0) ||($report_name==2))
        {
            $data['flowering']=$this->report_trial_analysis_model->get_flowering_images($variety_ids,$year,$season_id);
        }
        if(($report_name==0) ||($report_name==3))
        {
            $fruit_type = Query_helper::get_info("rnd_crop","fruit_type",array('id = '.$crop_id),1);
            $fruit_types=$this->config->item('fruit_type');
            $data['fruit_type_name']=$fruit_types[$fruit_type['fruit_type']];
            $data['fruit']=$this->report_trial_analysis_model->get_fruit_images($variety_ids,$year,$season_id);

        }
        if(($report_name==4))
        {
            $data['max_harvest']=$this->report_trial_analysis_model->get_max_harvest_days_image($year,$season_id,$crop_id,$crop_type_id);
            $data['harvest']=$this->report_trial_analysis_model->get_harvest_images($variety_ids,$year,$season_id);

        }

        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_image", $data, true));
        $this->jsonReturn($ajax);
    }


    private function rnd_report()
    {
        $report_type=$this->input->post('report_type');
        $report_name=$this->input->post('report_name');
        $variety_ids=$this->input->post('varieties');
        $year = $this->input->post('year');

        $season_id = $this->input->post('season_id');
        if(is_array($variety_ids)&&(sizeof($variety_ids)>0))
        {
            if($report_type==2)
            {
                if($report_name==4)
                {
                    $this->rnd_report_text_details(4);
                }
                else
                {
                    $data['report_name']=$report_name;
                    $data['varieties']=$this->report_trial_analysis_model->get_varieties_by_ids($variety_ids);
                    if(($report_name==0)||($report_name==1))
                    {
                        $data['fortnightly']=$this->report_trial_analysis_model->get_remarks('rnd_data_text_fifteen_days',$variety_ids,$year,$season_id);
                    }
                    if(($report_name==0)||($report_name==2))
                    {
                        $data['flowering']=$this->report_trial_analysis_model->get_remarks('rnd_data_text_flowering',$variety_ids,$year,$season_id);
                    }
                    if(($report_name==0)||($report_name==3))
                    {
                        $data['fruit']=$this->report_trial_analysis_model->get_remarks('rnd_data_text_fruit',$variety_ids,$year,$season_id);
                    }
                    if(($report_name==0)||($report_name==5))
                    {
                        $data['harvest_compile']=$this->report_trial_analysis_model->get_remarks('rnd_data_text_harvest_compile',$variety_ids,$year,$season_id);
                    }
                    if(($report_name==0)||($report_name==6))
                    {
                        $data['yield']=$this->report_trial_analysis_model->get_remarks('rnd_data_text_yield',$variety_ids,$year,$season_id);
                    }
                    if(($report_name==0)||($report_name==7))
                    {
                        $data['veg_fruit']=$this->report_trial_analysis_model->get_remarks('rnd_data_text_veg_fruit',$variety_ids,$year,$season_id);
                    }
                    $ajax['status'] = true;
                    $ajax['content'][] = array("id" => "#report_list", "html" => $this->load->view("report_trial_analysis/report_text_summary", $data, true));
                    $this->jsonReturn($ajax);
                }

            }
            else if($report_type==1)
            {

                $this->rnd_report_images();
            }
            else
            {
                $ajax['status'] = false;
                $ajax['message'] = $this->lang->line('INVALID_REPORT_TYPE');
                $this->jsonReturn($ajax);
            }

        }
        else
        {
            $ajax['status'] = false;
            $ajax['message'] = $this->lang->line('LABEL_SELECT_VARIETY');
            $this->jsonReturn($ajax);
        }
    }

    public function load_varieties_for_trial_report()
    {
        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $data['varieties']=$this->report_trial_analysis_model->get_varieties($year,$season_id,$crop_id,$crop_type_id);
        $data['title'] = "Select varieties and report type";
        $data['year']=$year;
        $data['season_id']=$season_id;
        $data['crop_id']=$crop_id;
        $data['crop_type_id']=$crop_type_id;

        if($data['varieties'])
        {
            $ajax['status']=true;
            $ajax['content'][]=array("id"=>"#variety_list","html"=>$this->load->view("report_trial_analysis/variety_selection",$data,true));
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
