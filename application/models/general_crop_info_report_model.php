<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class General_crop_info_report_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_procurement($rndCode=null, $inputRndCode=null)
    {
        $this->db->select('vi.*');
        $this->db->from('rnd_variety_info vi');
        $this->db->where('vi.status',$this->config->item('active'));
        $this->db->select('cinfo.crop_name crop_name');
        $this->db->select('ti.product_type product_type');
        $this->db->select('pi.principal_name principal_name');

        $this->db->join('rnd_crop_info cinfo', 'cinfo.id = vi.crop_id', 'left');
        $this->db->join('rnd_product_type_info ti', 'ti.id = vi.product_type_id', 'left');
        $this->db->join('rnd_principal_info pi', 'pi.id = vi.principal_id', 'left');
        $this->db->order_by('vi.crop_id','vi.product_type_id');

        if($rndCode !='')
        {
            $this->db->where('vi.id',$rndCode);
        }

        if($inputRndCode !='')
        {
            $this->db->like('vi.rnd_code',$inputRndCode);
        }

        $result = $this->db->get()->result_array();
        return $result;
    }


}