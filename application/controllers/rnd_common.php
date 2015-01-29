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
    //get crop types of a crop
    public function get_dropDown_cropType_by_cropId()
    {
        $crop_id = $this->input->post('crop_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->get_cropTypes_by_cropId($crop_id);

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['id'];
            $data['name'][] = $ctype['type_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#crop_type_id","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    //bellow code is not final

    //////////////////////////////////////////////// Variety START ////////////////////////////////////////

    public function variety_dropDown_crop_type_by_name()
    {
        $crop_id = $this->input->post('variety_crop_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->dropDown_crop_type($crop_id);

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['id'];
            $data['name'][] = $ctype['product_type'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#variety_crop_type","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    //////////////////////////////////////////////// Variety END ////////////////////////////////////////

    /////////////////////////////////////////////// Common START ////////////////////////////////////////

    public function common_dropDown_crop_by_season()
    {
        $season_id = $this->input->post('common_season_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->dropDown_crop($season_id);

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['crop_id'];
            $data['name'][] = $ctype['crop_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#common_crop_id","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }



    public function common_dropDown_rnd_code_by_name_type()
    {
        $crop_id = $this->input->post('common_crop_id');
        $type_id = $this->input->post('common_type_id');

        $data['details'] = $this->rnd_common_model->dropDown_rnd_code_by_name_type($crop_id,$type_id);
        $data['selected'] = '';

        foreach($data['details'] as $code)
        {
            $data['value'][] = $code['id'];
            $data['name'][] = $code['rnd_code'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#common_rnd_code","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

/////////////////////////////////////////////////// Common END /////////////////////////////////////////////


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

    /////////////////////////// Procurement Report START//////////////////

    public function procurement_dropDown_crop_by_season()
    {
        $season_id = $this->input->post('common_season_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->dropDown_crop($season_id);

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['crop_id'];
            $data['name'][] = $ctype['crop_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#procurement_crop_id","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    /////////////////////////// Procurement Report END//////////////////


    ///////// Pesticide & Fungicide Stock Out Start //////////
    public function pesticide_crop_by_season()
    {
        $season_id = $this->input->post('season_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->dropDown_crop($season_id);

        //print_r($data['details']);
        //exit;

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['crop_id'];
            $data['name'][] = $ctype['crop_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#pesticide_crop_id","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    public function pesticide_rnd_code_by_crop_name()
    {
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        //$type_id = $this->input->post('type_id');

        $data['details'] = $this->rnd_common_model->dropDown_rnd_code_by_crop_name($crop_id, $season_id);
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



    ///////// Pesticide & Fungicide Stock Out End //////////



    ///////// Fertilizer Stock Out Start ////////

    public function fertilizer_crop_by_season()
    {
        $season_id = $this->input->post('season_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->dropDown_crop($season_id);

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['crop_id'];
            $data['name'][] = $ctype['crop_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#fertilizer_crop_id","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    public function fertilizer_rnd_code_by_crop()
    {
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        //$type_id = $this->input->post('type_id');

        $data['details'] = $this->rnd_common_model->dropDown_rnd_code_by_crop_name($crop_id, $season_id);
        $data['selected'] = $this->input->post('selected');

        foreach($data['details'] as $code)
        {
            $data['value'][] = $code['id'];
            $data['name'][] = $code['rnd_code'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#fertilizer_out_rnd","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }


    ////////// Fertilizer Stock Out End //////////


    //////// Labour Activity Start //////////

    public function labour_activity_crop_by_season()
    {
        $season_id = $this->input->post('season_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->dropDown_crop($season_id);

        //print_r($data['details']);
        //exit;

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['crop_id'];
            $data['name'][] = $ctype['crop_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#labour_activity_crop_id","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }


    public function labour_activity_crop_type_by_crop()
    {
        $crop_id = $this->input->post('crop_id');
        //$type_id = $this->input->post('type_id');

        $data['details'] = $this->rnd_common_model->dropDown_crop_type($crop_id);
        $data['selected'] = $this->input->post('selected');

        foreach($data['details'] as $code)
        {
            $data['value'][] = $code['id'];
            $data['name'][] = $code['product_type'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#labour_activity_variety","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }


    public function labour_activity_rnd_by_crop_type()
    {
        $crop_type = $this->input->post('crop_type');
        //$type_id = $this->input->post('type_id');

        $rnd_result = $this->rnd_common_model->dropDown_rnd_code_by_type($crop_type);


        $this->jsonReturn($rnd_result);

    }


    /////// Labour Activity End /////////



    //////// Fruit Picture Report Start ////////

    public function picture_report_crop_by_season()
    {
        $season_id = $this->input->post('season_id');
        $data['selected'] = '';
        $data['details'] = $this->rnd_common_model->dropDown_crop($season_id);

        //print_r($data['details']);
        //exit;

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['crop_id'];
            $data['name'][] = $ctype['crop_name'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#picture_report_crop_id","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }
    public function picture_report_crop_type_by_name()
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
        $ajax['content'][]=array("id"=>"#picture_report_crop_type","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }
    public function picture_report_rnd_code_by_name()
    {
        $crop_id = $this->input->post('crop_id');
        $type_id = $this->input->post('type_id');

        $data['details'] = $this->rnd_common_model->dropDown_rnd_code_by_name_type($crop_id,$type_id);
        $data['selected'] = '';

        foreach($data['details'] as $code)
        {
            $data['value'][] = $code['id'];
            $data['name'][] = $code['rnd_code'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#picture_report_rnd_code","html"=>$this->load->view("dropdown",$data,true));
        $this->jsonReturn($ajax);
    }

    /////// Fruit Picture Report End //////////


}
