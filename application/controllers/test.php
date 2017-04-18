<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Test extends CI_Controller
{
    public function info()
    {

    }


    public function index()
    {

    }
    public function config_15_images()
    {
        $this->db->from('rnd_setup_image_fifteen_days');
        $this->db->limit(20,137);
        $items=$this->db->get()->result_array();
        $file_dir=FCPATH.'images/15_days_image_config/';

        foreach($items as $item)
        {
            echo '<b>'.$item['id'].'</b><br>';
            $images=json_decode($item['images'],true);
            foreach($images as $i=>$image)
            {

                if($image!='no_image.jpg')
                {
                    $source='http://armalikgroup.com.bd/rnd/images/15_days_image_config/'.$image;
                    $destination=$file_dir.$image;
                    if ( copy($source, $destination) )
                    {
                        echo $i." success!<br>";
                    }
                    else
                    {
                        echo $i." failed.<br>";
                    }
                }
                else
                {
                    echo $i.' no_image.jpg<br>';
                }

            }
        }

    }
}
?>
