<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{
	public function index()
	{
        //$this->session->set_userdata("user_id", "");
        echo $this->session->userdata("user_id");
        $ar = array("az"=>"1","xy"=>"2");
        $ar2 = array("az2"=>"2","sa"=>4,"sds"=>5);
        $arkeys = array_keys($ar);
        $ar2keys=array_keys($ar2);

        for($i=0;$i<max(sizeof($ar),sizeof($ar2));$i++)
        {
            if(sizeof($ar)>$i)
            {
                echo $arkeys[$i];
                echo $ar[$arkeys[$i]];
            }
            if(sizeof($ar2)>$i)
            {
                echo $ar2keys[$i];
                echo $ar2[$ar2keys[$i]];
            }

        }
	}


}
