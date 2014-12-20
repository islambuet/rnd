<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class ROOT_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function jsonReturn($array)
    {
        header('Content-type: application/json');
        echo json_encode($array);
        exit();
    }
}
