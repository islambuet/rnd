<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_fertilizer_history_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function stocks_info($report_id,$date_from,$date_to,$fertilizer_id)
    {
        $stocks=array();

        //$result = $this->db->get()->result_array();
        return $stocks;
    }
}