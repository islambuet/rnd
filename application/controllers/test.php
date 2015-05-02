<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{


    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        for($i=0;$i<5;$i++)
        {
            // print_r($skilldetails);
            $skillvalue=$i;
            $skill=array(
                'name'=>'editskill[]',
                'placeholder'=>'Skill',
                'class'=>'skills_text col-md-10 form-control autocomplete',
                'id'=>'skill_'.$i,
                'value'=>$skillvalue
            );
            echo form_input($skill);
        }

    }



}

