<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_common extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_common_model");
    }


    public function dropDown_crop_by_season()
    {
        $season_id = $this->input->post('season_id');
        $data['selected'] = $this->input->post('crop_selected');
        $data['details'] = $this->rnd_common_model->dropDown_crop($season_id);

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['crop_id'];
            $data['name'][] = $ctype['crop_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#crop_id","html"=>$this->load->view("dropdown",$data,true));
//        $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
        $this->jsonReturn($ajax);
    }

    public function dropDown_crop_type_by_name()
    {
        $crop_id = $this->input->post('crop_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->dropDown_crop_type($crop_id);

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['id'];
            $data['name'][] = $ctype['product_type'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#crop_type","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    public function dropDown_rnd_code_by_name_type()
    {
        $crop_id = $this->input->post('crop_id');
        $type_id = $this->input->post('type_id');

        $data['details'] = $this->rnd_common_model->dropDown_rnd_code_by_name_type($crop_id,$type_id);
        $data['selected'] = $this->input->post('selected');

        foreach($data['details'] as $code)
        {
            $data['value'][] = $code['id'];
            $data['name'][] = $code['rnd_code'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#rnd_code","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    public function dropDown_rnd_code_by_crop_name()
    {
        $crop_id = $this->input->post('crop_id');
        //$type_id = $this->input->post('type_id');

        $data['details'] = $this->rnd_common_model->dropDown_rnd_code_by_crop_name($crop_id);
        $data['selected'] = $this->input->post('selected');

        foreach($data['details'] as $code)
        {
            $data['value'][] = $code['id'];
            $data['name'][] = $code['rnd_code'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#pesticide_out_rnd","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    public function dropDown_rnd_code_by_fertilizer_crop_name()
    {
        $crop_id = $this->input->post('crop_id');
        //$type_id = $this->input->post('type_id');

        $data['details'] = $this->rnd_common_model->dropDown_rnd_code_by_crop_name($crop_id);
        $data['selected'] = $this->input->post('selected');

        foreach($data['details'] as $code)
        {
            $data['value'][] = $code['id'];
            $data['name'][] = $code['rnd_code'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#feriliser_out_rnd","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    public function dropDown_varity_name_by_crop_name()
    {
        $crop_id = $this->input->post('crop_id');
        //$type_id = $this->input->post('type_id');

        $data['details'] = $this->rnd_common_model->dropDown_rnd_code_by_crop_name($crop_id);
        $data['selected'] = $this->input->post('selected');

        foreach($data['details'] as $code)
        {
            $data['value'][] = $code['id'];
            $data['name'][] = $code['variety_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#labour_activity_varity","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    public function load_rnd_codes_by_season()
    {
        $season = $this->input->post('season_id');
        $varieties = $this->rnd_common_model->get_variety_by_season($season);

        $this->jsonReturn($varieties);
    }

    public function sowing_date_by_season()
    {
        $season = $this->input->post('season_id');
        $sowing_date = $this->rnd_common_model->get_sowing_date_by_season($season);
        $this->jsonReturn($sowing_date);
    }

}
