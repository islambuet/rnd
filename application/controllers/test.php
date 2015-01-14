<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{
    static private $person = 1;

    public function sum(&$a,$b)
    {
        $a++;
        return $a+$b;

    }


    public function index()
	{

        $this->load->model('general_sample_delivery_model');
        $season_id = 1;
        $oldRndCodes = $this->general_sample_delivery_model->get_sample_rnd_codes_by_season($season_id);

        if(!empty($oldRndCodes))
        {
            foreach($oldRndCodes as $oldcode)
            {
//                echo $oldcode['rnd_code_id'];
                $varietyInfo_update = $this->general_sample_delivery_model->get_crop_id_by_rnd_code($oldcode['rnd_code_id']);
                $crop_id_update = $varietyInfo_update['crop_id'];
                $quantity_update = $varietyInfo_update['quantity'];
                $crop_sample_size_update = $this->general_sample_delivery_model->get_crop_sample_size($crop_id_update);
                $revised_quantity_update = $quantity_update+$crop_sample_size_update;

                $data_revised_update = Array('quantity'=>$revised_quantity_update);
//                print_r($data_revised_update);
                Query_helper::update('rnd_variety_info',$data_revised_update,array("id = ".$oldcode['rnd_code_id']));
            }
        }


    }



    public function geta()
    {
        return 5;
    }
    public function string_sub($a,$b)
    {
        echo $b;

    }
    public function string_sum($a,$b,$base)
    {
        $a=strrev($a);
        $b=strrev($b);
        $result="";
        $carry=0;

        for($i=0;$i<max(strlen($a),strlen($b));$i++)
        {
            $x=$y=0;
            if($i<strlen($a))
            {
                $x=substr($a,$i,1);
            }
            if($i<strlen($b))
            {
                $y=substr($b,$i,1);
            }
            $sum=$x+$y+$carry;
            $result=$sum%$base.$result;
            $carry= intval($sum/$base);
        }
        if($carry)
        {
            $result=$carry.$result;
        }
        return $result;

    }


}
