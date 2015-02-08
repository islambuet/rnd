<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{

    public function index()
	{
        $results[]=array('task_id' => "1",
            'name' => "do dishes",
            'user' => "bob");
        $results[]=array('task_id' => "1",
            'name' => "do dishes",
            'user' => "bob");
        $results[]=array('task_id' => "2",
            'name' => "do dishes",
            'user' => "liam");
        $results[]=array('task_id' => "3",
            'name' => "do dishes",
            'user' => "bob");
        $results[]=array('task_id' => "3",
            'name' => "do dishes",
            'user' => "liam");

        //print_r($results);
    $new_result=array();
    foreach($results as $key=>$result)
    {
        $index=$this->get_index($new_result,$result['task_id']);
        if($index===false)
        {
            $new_result[]=array('task_id'=>$result['task_id'],'name'=>$result['name'],'users'=>array($result['user']));
        }
        else
        {
            $new_result[$index]['users'][]=$result['user'];

        }

    }
        echo "<pre>";
        print_r($new_result);
        echo "</pre>";
    }
    public function get_index($array,$task_id)
    {
        foreach($array as $index=>$a)
        {
            if($a['task_id']==$task_id)
            {
                return $index;
            }
        }
        return false;
    }

}
