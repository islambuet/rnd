<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_plot_design extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_plot_design_model");
    }

    public function index($task="add_edit",$id=0)
    {
        if($task=="add_edit")
        {
            $this->rnd_add_edit();
        }
        elseif($task=="list")
        {
            $this->rnd_list();
        }
        elseif($task=="save")
        {
            $this->rnd_save();
        }
    }

    public function rnd_add_edit()
    {
        $data['title'] = "Plot Design";
        $data['plots'] = Query_helper::get_info('rnd_setup_plot_info', '*', array('status =1'));
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_plot_design/add_edit", $data, true));

        if ($this->message)
        {
            $ajax['message'] = $this->message;
        }

        $ajax['page_url']=base_url()."rnd_plot_design/index/add_edit/";
        $this->jsonReturn($ajax);
    }
    public function rnd_save()
    {

        $ajax['status'] = true;


        $ajax['message']="under construction";


        $this->jsonReturn($ajax);
    }

}
