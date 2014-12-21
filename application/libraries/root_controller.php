<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class ROOT_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user=User_helper::get_user();
        if(!$user)
        {
            if($this->router->class!="home")
            {
                $this->login_page("Time out");
            }
        }


    }
    public function jsonReturn($array)
    {
        header('Content-type: application/json');
        echo json_encode($array);
        exit();
    }
    public function login_page($message="")
    {
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("login","",true));
        $ajax['content'][]=array("id"=>"#right_side","html"=>$this->load->view("login_right","",true));
        $this->jsonReturn($ajax);
    }
    public function dashboard_page($message="")
    {
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("dashboard","",true));
        $this->jsonReturn($ajax);
    }
}
