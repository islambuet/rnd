<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rnd_common_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function dropDown_crop_type($crop_id)
    {
        $this->db->select('rnd_product_type_info.*');
        $this->db->from('rnd_product_type_info');
        $this->db->where('crop_id',$crop_id);

        $query = $this->db->get();
        return $query->result_array();
    }

}