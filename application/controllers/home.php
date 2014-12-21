<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Home extends ROOT_Controller
{
	public function index()
	{
		$this->load->view("main");
	}
    public function login()
    {
        $user=User_helper::get_user();
        if($user)
        {
            $this->dashboard_page();
        }
        else
        {
            if($this->input->post())
            {
                if(User_helper::login($this->input->post("username"),$this->input->post("password")))
                {
                    $this->dashboard_page();
                }
                else
                {
                    $this->login_page("invalid login");
                }
            }
            else
            {
                $this->login_page();
            }

        }

    }
    /*public function get_sub_menu()
    {
        $menu_id=$this->input->post("menu_id");
        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#sub-menu","html"=>$this->load->view("sub_menu","",true));

        $this->jsonReturn($ajax);

    }*/

}
