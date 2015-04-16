<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'/libraries/root_controller.php';

class Setup_plot extends ROOT_Controller
{
    private  $message;
    public function __construct()
    {
        parent::__construct();
        $this->message="";
        $this->load->model("setup_plot_model");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->rnd_list($id);
        }
        elseif($task=="add" || $task=="edit")
        {
            $this->rnd_add_edit($id);
        }
        elseif($task=="save")
        {
            $this->rnd_save();
        }
        else
        {
            $this->rnd_list($id);
        }
    }

    public function rnd_list($page=0)
    {
        $config = System_helper::pagination_config(base_url() . "setup_plot/index/list/",$this->setup_plot_model->get_total_plots(),4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        if($page>0)
        {
            $page=$page-1;
        }

        $data['plots'] = $this->setup_plot_model->get_plotInfo($page);
        $data['title']="Plot Info";

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_plot/list",$data,true));

        if($this->message)
        {
            $ajax['message']=$this->message;
        }

        $ajax['page_url']=base_url()."setup_plot/index/list/".($page+1);
        $this->jsonReturn($ajax);
    }

    public function rnd_add_edit($id)
    {
        if ($id > 0)
        {
            $data['plotInfo'] = $this->setup_plot_model->get_plot_row($id);
            $data['title']="Edit Plot (".$data['plotInfo']['plot_name'].")";
            $ajax['page_url']=base_url()."setup_plot/index/edit/".$id;
        }
        else
        {
            $data['title']="Create New Plot";
            $data["plotInfo"] = Array
            (
                'id' => 0,
                'plot_name' => '',
                'plot_length' => '',
                'plot_width' => ''
            );

            $ajax['page_url']=base_url()."setup_plot/index/add";
        }

        $ajax['status']=true;
        $ajax['content'][]=array("id"=>"#content","html"=>$this->load->view("setup_plot/add_edit",$data,true));

        $this->jsonReturn($ajax);
    }

    public function rnd_save()
    {
        $id = $this->input->post("plot_id");
        $user = User_helper::get_user();

        $data = Array(
            'plot_name'=>$this->input->post('plot_name'),
            'plot_length'=>$this->input->post('plot_length'),
            'plot_width'=>$this->input->post('plot_width')
        );

        if(!$this->check_validation())
        {
            $ajax['status']=false;
            $ajax['message']=$this->lang->line("MSG_INVALID_INPUT");
            $this->jsonReturn($ajax);
        }
        else
        {
            if($id>0)
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $data['modified_by'] = $user->user_id;
                $data['modification_date'] = time();

                Query_helper::update('rnd_plot_info',$data,array("id = ".$id));

                $this->db->trans_complete();   //DB Transaction Handle END

                if($this->db->trans_status() === TRUE)
                {
                    $this->message=$this->lang->line("MSG_UPDATE_SUCCESS");
                }
                else
                {
                    $this->message=$this->lang->line("MSG_NOT_UPDATED_SUCCESS");
                }
            }
            else
            {
                $this->db->trans_start();  //DB Transaction Handle START

                $data['created_by'] = $user->user_id;
                $data['creation_date'] = time();

                Query_helper::add('rnd_plot_info',$data);

                $this->db->trans_complete();   //DB Transaction Handle END

                if ($this->db->trans_status() === TRUE)
                {
                    $this->message=$this->lang->line("MSG_CREATE_SUCCESS");
                }
                else
                {
                    $this->message=$this->lang->line("MSG_NOT_SAVED_SUCCESS");
                }
            }

            $this->rnd_list();//this is similar like redirect
        }

    }

    private function check_validation()
    {
        if(Validation_helper::validate_empty($this->input->post('plot_name')) || $this->setup_plot_model->check_plot_existence($this->input->post('plot_name'),$this->input->post('plot_id')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('plot_length')))
        {
            return false;
        }

        if(!Validation_helper::validate_numeric($this->input->post('plot_width')))
        {
            return false;
        }

        return true;
    }


}
