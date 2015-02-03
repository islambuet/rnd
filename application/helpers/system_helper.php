<?php
class System_helper
{
    public static function pagination_config($base_url, $total_rows, $segment)
    {
        $CI =& get_instance();

        $config["base_url"] = $base_url;
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $CI->config->item('view_per_page');
        $config['num_links'] = $CI->config->item('links_per_page');
        $config['use_page_numbers'] = true;
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';

        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['uri_segment'] = $segment;
        return $config;
    }
    public static function get_rnd_code($variety)
    {
        $CI = & get_instance();

        $rndCode = $variety['crop_code'].'-'.$variety['type_code'].'-'.str_pad($variety['variety_index'],3,'0',STR_PAD_LEFT);

        $varietyConfig = $CI->config->item('variety_type');
        if($variety['variety_type']==1)
        {
            $rndCode = $rndCode.'-'.$variety['principal_code'];
        }
        else
        {
            $rndCode = $rndCode.'-'.$varietyConfig[$variety['variety_type']];
        }

        $rndCode = $rndCode.'-'.$variety['year'];

        if($variety['new_status']==1)
        {
            $rndCode = $rndCode.'-NEW';
        }
        else
        {
            $rndCode = $rndCode.'-OLD';
        }

        if($variety['replica_status']==1)
        {
            $rndCode = $rndCode.'-R';
        }
        else
        {
            $rndCode = $rndCode.'-N';
        }

        return $rndCode;
    }

    public static function display_date($date)
    {
        return date('Y-m-d',$date);
    }
    
    public static function get_ordered_crops()
    {
        $CI = & get_instance();
        $CI->db->select('rnd_crop.id, rnd_crop.crop_name');
        $CI->db->from('rnd_crop');
        $CI->db->order_by('ordering');
        $CI->db->where('status != ',$CI->config->item('status_delete'));
        return $CI->db->get()->result_array();
    }
    /*public static function file_upload($post_file_name,$save_dir,$fileName,$filetype,$filesize,$allowedtypes)
    {
        $CI = & get_instance();
        $ext = explode("/", @$_FILES[$post_file_name]['type']);
        $size = @$_FILES[$post_file_name]['size'];


        if($ext['0'] !='')
        {

            if($ext['0'] == $filetype)
            {

                if($size < $filesize){

                    $CI->load->library('upload');

                    $config['upload_path'] = $save_dir;
                    $config['allowed_types'] = $allowedtypes;
                    $config['max_size'] = $filesize;
                    $config['file_name'] = $fileName;
                    $CI->load->library('upload', $config);

                    foreach ($_FILES as $key => $value) {
                        $CI->upload->initialize($config);
                        if (!$CI->upload->do_upload($key)) {

                            $errors[] = $CI->upload->display_errors();
//                            System_helper::set_system_message($CI->lang->line("IMG_ERROR"),0);
//                            redirect(base_url());
                        }
                        else
                        {
                            $temp = array('upload_data' => $CI->upload->data());
                            $info = $CI->upload->data();
                            return $fileName;
                        }
                    }
                }
                else
                {
                    System_helper::set_system_message($CI->lang->line("IMG_SIZE_ERROR"),0);
                    redirect(base_url());
                }
            }
            else
            {
                System_helper::set_system_message($CI->lang->line("IMG_TYPE_ERROR"),0);
                redirect(base_url());
            }
        }
        else
        {
            return '';
        }
    }*/
    public static function upload_file($save_dir="images")
    {
        $CI = & get_instance();
        /*$CI->load->library('upload');
        $config=array();
        $config['upload_path'] = FCPATH.$save_dir;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = $CI->config->item("max_file_size");
        $config['overwrite'] = false;
        $config['remove_spaces'] = true;
        $CI->upload->initialize($config);*/
        $uploaded_files=array();
        foreach ($_FILES as $key => $value)
        {
            if($value['name'])
            {
                $uploaded_files[$key]=$value;
            }

        }
        echo "<pre>";
        print_r($uploaded_files);
        echo "</pre>";

    }

}