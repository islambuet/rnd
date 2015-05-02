<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Rnd_plot_design extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("rnd_plot_design_model");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list($id);
        }
        else if($task=="add")
        {
            $this->rnd_add();
        }
        elseif($task=="save")
        {
            $this->rnd_save();
        }
        else
        {
            $this->rnd_list();
        }
    }
    public function rnd_list($page=0)
    {

        //$config = System_helper::pagination_config(base_url() . "rnd_plot_design/index/list/",$this->create_crop_variety_model->get_total_varieties(),4);
        $config = System_helper::pagination_config(base_url() . "rnd_plot_design/index/list/",200,4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        //$data['plots'] = $this->create_crop_variety_model->get_varieties($page);
        $data['designed_plots'] = array();
        $data['title']="Designed Plot List";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("rnd_plot_design/list",$data,true));
        if($this->message)
        {
            $ajax['message']=$this->message;
        }
        $ajax['page_url']=base_url()."rnd_plot_design/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add()
    {
        $data['title'] = "Select Plot";
        $data['plots'] = Query_helper::get_info('rnd_setup_plot_info', '*', array('status =1'));
        $data['seasons'] = Query_helper::get_info('rnd_season', '*', array());
        $ajax['status'] = true;
        $ajax['content'][] = array("id" => "#content", "html" => $this->load->view("rnd_plot_design/add", $data, true));

        if ($this->message)
        {
            $ajax['message'] = $this->message;
        }

        $ajax['page_url']=base_url()."rnd_plot_design/index/add/";
        $this->jsonReturn($ajax);
    }
    public function load_crop_ordering()
    {
        $data['title']='Select Crop ordering';
        $data['year']=$this->input->post('year');
        $data['season_id']=$this->input->post('season_id');
        $data['plot_id']=$this->input->post('plot_id');
        $data['num_rows']=$this->input->post('num_rows');
        //check validation for those inputs and already exits at data base;
        //if invalid or exits show message
        //else
        $data['crops']=$this->rnd_plot_design_model->get_crops($data['year'],$data['season_id']);
        $ajax['status'] = true;
        $ajax['content'][]=array("id"=>"#variety_list","html"=>$this->load->view("rnd_plot_design/crops_ordering",$data,true));
        $this->jsonReturn($ajax);

    }
    public function load_plot()
    {
        $data['title']='Design plot';
        $data['year']=$this->input->post('year');
        $data['season_id']=$this->input->post('season_id');
        $data['plot_id']=$this->input->post('plot_id');
        $data['num_rows']=$this->input->post('num_rows');
        $crops=$this->rnd_plot_design_model->get_crops_variety($data['year'],$data['season_id']);
        $plot_setup=$this->input->post('plot_setup');
        for($i=1;$i<=$data['num_rows'];$i++)
        {
            for($j=1;$j<=$plot_setup[$i]['col_num'];$j++)
            {

                $plot_setup[$i]['varieties_selected'][$j]='';
                //$variety_available=&$crops[$plot_setup[$i]['crop_id']]['varieties_selected'];
                if(sizeof($crops[$plot_setup[$i]['crop_id']]['varieties_selected'])>0)
                {
                    //$plot_setup[$i]['varieties_selected'][$j]=$variety_available[sizeof($variety_available)-1];
                    $plot_setup[$i]['varieties_selected'][$j]=array_shift($crops[$plot_setup[$i]['crop_id']]['varieties_selected']);
                    //unset ($variety_available[sizeof($variety_available)-1]);
                }



            }


        }
        $data['plot_setup']=$plot_setup;
        $data['crops']=$crops;
        $ajax['status'] = true;
        $ajax['content'][]=array("id"=>"#report_list","html"=>$this->load->view("rnd_plot_design/plot",$data,true));
        $this->jsonReturn($ajax);
    }
    public function rnd_save()
    {

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->message;
            $this->jsonReturn($ajax);
        }
        else
        {
            $user=User_helper::get_user();
            $year=$this->input->post('year');
            $season_id=$this->input->post('season_id');
            $plot_id=$this->input->post('plot_id');
            $num_rows=$this->input->post('num_rows');
            $plot=$this->input->post('plot');
            $time=time();


            $data=array();
            $data['year']=$year;
            $data['season_id']=$season_id;
            $data['plot_id']=$plot_id;
            $data['num_rows']=$num_rows;
            $data['created_by'] = $user->user_id;
            $data['creation_date'] =$time;
            $data['plot_info']=json_encode($plot);
            $this->db->trans_start();  //DB Transaction Handle START
            Query_helper::add('rnd_plot_design',$data);
            $this->db->trans_complete();   //DB Transaction Handle END

            if ($this->db->trans_status() === TRUE)
            {
                $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
            }
            else
            {
                $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
            }
            $this->rnd_list();//this is similar like redirect
        }
    }
    private function check_validation()
    {
        $valid=true;
        $year=$this->input->post('year');
        $season_id=$this->input->post('season_id');
        $plot_id=$this->input->post('plot_id');
        $num_rows=$this->input->post('num_rows');

        $plot=$this->input->post('plot');
        if(!(is_array($plot)))
        {
            $valid=false;
            $this->message.="Design a plot first.<br>";
            return $valid;

        }
        foreach($plot as $p)
        {
            if(!($p['col_num']>0))
            {
                $valid=false;
                $this->message.="Invalid number of varities.<br>";
                return $valid;
            }

        }
        if(Validation_helper::validate_empty($year))
        {
            $valid=false;
            $this->message.="Invalid year.<br>";
        }
        if(Validation_helper::validate_empty($season_id))
        {
            $valid=false;
            $this->message.="Invalid Season<br>";
        }
        if(Validation_helper::validate_empty($plot_id))
        {
            $valid=false;
            $this->message.="Invalid part<br>";
        }
        if(!($num_rows>0))
        {
            $valid=false;
            $this->message.="Invalid rows<br>";
        }
        return $valid;
    }


}
