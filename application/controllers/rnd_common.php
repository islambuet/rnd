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


    public function dropDown_crop_type_by_name()
    {
        $crop_id = $this->input->post('crop_id');
        $data['selected'] = $this->input->post('product_type_id');
        $data['details'] = $this->rnd_common_model->dropDown_crop_type($crop_id);

        foreach($data['details'] as $ctype)
        {
            $data['value'][] = $ctype['id'];
            $data['name'][] = $ctype['product_type'];
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#crop_type","html"=>$this->load->view("dropdown",$data,true));
//        $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
        $this->jsonReturn($ajax);
    }

    public function load_variety_by_season()
    {
        $season = $this->input->post('season_id');
        $varieties = $this->rnd_common_model->get_variety_by_season($season);
//        return $varieties;
        $this->jsonReturn($varieties);
    }

}
