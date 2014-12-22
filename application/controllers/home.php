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
                    $this->dashboard_page($this->lang->line("MSG_LOGIN_SUCCESS"));
                }
                else
                {
                    $ajax['status']=false;
                    $ajax['message']=$this->lang->line("MSG_USERNAME_PASSWORD_INVALID");
                    $this->jsonReturn($ajax);
                }
            }
            else
            {
                $this->login_page();
            }

        }

    }
    public function logout()
    {
        $this->session->set_userdata("user_id", "");
        $this->login_page($this->lang->line("MSG_LOGOUT_SUCCESS"));
    }

}
