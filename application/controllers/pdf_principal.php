<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Pdf_principal extends CI_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->lang->load('rnd_report');
        $this->load->model("report_principal_model");
    }
    public function index()
    {

        $year = $this->input->post('year');
        $season_id = $this->input->post('season_id');
        $crop_id = $this->input->post('crop_id');
        $crop_type_id = $this->input->post('crop_type_id');
        $principal_id = $this->input->post('principal_id');
        $variety_ids=$this->input->post('varieties');

        $data['max_15_days']=$this->report_principal_model->get_max_15_days($year,$season_id,$crop_id,$crop_type_id);
        $data['fortnightly']=$this->report_principal_model->get_15_days_images($variety_ids,$season_id);
        $data['fruit']=$this->report_principal_model->get_fruit_images($variety_ids,$season_id);
        $data['varieties']=$this->report_principal_model->get_reports($variety_ids,$season_id);
        $data['year']='All Year';
        if($year>0)
        {
            $data['year']=$year;
        }
        $data['principal_name']='All Principal';
        if($principal_id>0)
        {
            $principal_info=Query_helper::get_info('rnd_principal', 'principal_name', array('id ='.$principal_id),1);
            $data['principal_name']=$principal_info['principal_name'];
        }
            $data['season_name']='All Season';
        if($season_id>0)
        {
            $principal_info=Query_helper::get_info('rnd_season', 'season_name', array('id ='.$season_id),1);
            $data['season_name']=$principal_info['season_name'];
        }
        $data['crop_name']='All Crop';
        $data['type_name']='';
        if($crop_id>0)
        {
            $principal_info=Query_helper::get_info('rnd_crop', 'crop_name', array('id ='.$crop_id),1);
            $data['crop_name']=$principal_info['crop_name'];
            if($crop_type_id>0)
            {
                $principal_info=Query_helper::get_info('rnd_crop_type', 'type_name', array('id ='.$crop_type_id),1);
                $data['type_name']=$principal_info['type_name'];
            }
        }
        $html=$this->load->view("pdf_principal/report", $data,true);

        include(FCPATH."mpdf60/mpdf.php");
        $mpdf=new mPDF();
        $mpdf->SetDisplayMode('fullpage');

        $mpdf->WriteHTML($html);

        $mpdf->Output();

        exit;

    }
}
