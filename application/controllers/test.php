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
