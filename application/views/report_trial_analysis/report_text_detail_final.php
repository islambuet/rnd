<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$trial_status_config=$this->config->item('trial_status');
$this->load->config('veg_config');
$plant_vigor_config=$this->config->item('vc_plant_vigor');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";
//echo "<pre>";
//print_r($options);
//echo "</pre>";
//echo "<pre>";
//print_r($final);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";

$this->lang->load('rnd_veg');
$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
    /*$total_harvested_weight_normal=0;
    $total_harvested_weight_replica=0;
    if(isset($harvest[$variety['id']]))
    {
        $total_normal = 0;
        $total_replica = 0;
        foreach($harvest[$variety['id']] as $hcd)
        {
            $detail = json_decode($hcd,true);
            $value_normal = $detail['normal']['total_harvested_wt'];
            $value_replica = $detail['replica']['total_harvested_wt'];
            $total_normal += $value_normal;
            $total_replica += $value_replica;
        }

        $total_harvested_weight_normal=$total_normal;
        $total_harvested_weight_replica=$total_replica;
    }*/
    $info=array();
    if(isset($final[$variety['id']]['info']))
    {
        $info=json_decode($final[$variety['id']]['info'],true);
    }
    $flower_info=array();
    if(isset($flowering[$variety['id']]['info']))
    {
        $flower_info=json_decode($flowering[$variety['id']]['info'],true);
    }



    $data=array();
    $data['replica_status']=$variety['replica_status'];
    $data['id']=$variety['id'];

    //for rnd code
    $table_heads['rnd_code']='rnd_code';
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);

    $table_heads['germination']='germination';
    $data['germination']['normal']=$data['germination']['replica']=$this->lang->line('NOT_SET');
    if(is_array($info)&& !empty($info['normal']['germination']))
    {
        $data['germination']['normal']=$info['normal']['germination'];
    }
    if($variety['replica_status']==1)
    {
        if(is_array($info)&& !empty($info['replica']['germination']))
        {
            $data['germination']['replica']=$info['replica']['germination'];
        }
    }

    $table_heads['plant_vigor']='plant_vigor';
    $data['plant_vigor']['normal']=$data['plant_vigor']['replica']=$this->lang->line('NOT_SET');
    if(is_array($info)&& !empty($info['normal']['plant_vigor']))
    {
        $data['plant_vigor']['normal']=$plant_vigor_config[$info['normal']['plant_vigor']];
    }
    if($variety['replica_status']==1)
    {
        if(is_array($info)&& !empty($info['replica']['plant_vigor']))
        {
            $data['plant_vigor']['replica']=$plant_vigor_config[$info['replica']['plant_vigor']];
        }
    }
    if($options['first_curd_formation']==1)
    {
        $table_heads['first_curd_formation']='first_curd_formation';
        $data['first_curd_formation']['normal']=$data['first_curd_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['1st_curd_formation']))
        {
            $data['first_curd_formation']['normal']=$flower_info['normal']['1st_curd_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['1st_curd_formation']))
            {
                $data['first_curd_formation']['replica']=$flower_info['replica']['1st_curd_formation'];
            }
        }
    }

    if($options['first_head_formation']==1)
    {
        $table_heads['first_head_formation']='first_head_formation';
        $data['first_head_formation']['normal']=$data['first_head_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['1st_head_formation']))
        {
            $data['first_head_formation']['normal']=$flower_info['normal']['1st_head_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['1st_head_formation']))
            {
                $data['first_head_formation']['replica']=$flower_info['replica']['1st_head_formation'];
            }
        }
    }
    if($options['first_flow']==1)
    {
        $table_heads['first_flow']='first_flow';
        $data['first_flow']['normal']=$data['first_flow']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['1st_flowering_days']))
        {
            $data['first_flow']['normal']=$flower_info['normal']['1st_flowering_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['1st_flowering_days']))
            {
                $data['first_flow']['replica']=$flower_info['replica']['1st_flowering_days'];
            }
        }
    }
    if($options['first_root']==1)
    {
        $table_heads['first_root']='first_root';
        $data['first_root']['normal']=$data['first_root']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['1st_root_formation']))
        {
            $data['first_root']['normal']=$flower_info['normal']['1st_root_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['1st_root_formation']))
            {
                $data['first_root']['replica']=$flower_info['replica']['1st_root_formation'];
            }
        }
    }
    if($options['first_cutting']==1)
    {
        $table_heads['first_cutting']='first_cutting';
        $data['first_cutting']['normal']=$data['first_cutting']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $first_info=json_decode($harvest[$variety['id']][1],true);
            $first_harvest_time=System_helper::get_time($first_info['normal']['harvesting_date']);
            if($first_harvest_time>0)
            {
                $data['first_cutting']['normal']=$data['first_cutting']['replica']=($first_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
            }

        }
    }
    if($options['last_cutting']==1)
    {
        $table_heads['last_cutting']='last_cutting';
        $data['last_cutting']['normal']=$data['last_cutting']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $total_harvest=sizeof($harvest[$variety['id']]);
            $last_info=json_decode($harvest[$variety['id']][$total_harvest],true);
            $last_harvest_time=System_helper::get_time($last_info['normal']['harvesting_date']);
            if($last_harvest_time>0)
            {
                $data['last_cutting']['normal']=$data['last_cutting']['replica']=($last_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
            }

        }
    }
    if($options['no_of_cutting']==1)
    {
        $table_heads['no_of_cutting']='no_of_cutting';
        $data['no_of_cutting']['normal']=$data['no_of_cutting']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $total_harvest=sizeof($harvest[$variety['id']]);
            $data['no_of_cutting']['normal']=$data['no_of_cutting']['replica']=$total_harvest;
        }
    }
    if($options['fifty_percent_curd_formation']==1)
    {
        $table_heads['fifty_percent_curd_formation']='fifty_percent_curd_formation';
        $data['fifty_percent_curd_formation']['normal']=$data['fifty_percent_curd_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['50_percent_curd_formation_days']))
        {
            $data['fifty_percent_curd_formation']['normal']=$flower_info['normal']['50_percent_curd_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['50_percent_curd_formation_days']))
            {
                $data['fifty_percent_curd_formation']['replica']=$info['replica']['50_percent_curd_formation_days'];
            }
        }
    }
    if($options['fifty_percent_head_formation']==1)
    {
        $table_heads['fifty_percent_head_formation']='fifty_percent_head_formation';
        $data['fifty_percent_head_formation']['normal']=$data['fifty_percent_head_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['50_percent_head_formation_days']))
        {
            $data['fifty_percent_head_formation']['normal']=$flower_info['normal']['50_percent_head_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['50_percent_head_formation_days']))
            {
                $data['fifty_percent_head_formation']['replica']=$info['replica']['50_percent_head_formation_days'];
            }
        }
    }
    if($options['fifty_percent_flow']==1)
    {
        $table_heads['fifty_percent_flow']='fifty_percent_flow';
        $data['fifty_percent_flow']['normal']=$data['fifty_percent_flow']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['50_percent_flowering_days']))
        {
            $data['fifty_percent_flow']['normal']=$flower_info['normal']['50_percent_flowering_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['50_percent_flowering_days']))
            {
                $data['fifty_percent_flow']['replica']=$info['replica']['50_percent_flowering_days'];
            }
        }
    }
    if($options['fifty_percent_root']==1)
    {
        $table_heads['fifty_percent_root']='fifty_percent_root';
        $data['fifty_percent_root']['normal']=$data['fifty_percent_root']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['50_percent_root_formation_days']))
        {
            $data['fifty_percent_root']['normal']=$flower_info['normal']['50_percent_root_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['50_percent_root_formation_days']))
            {
                $data['fifty_percent_root']['replica']=$info['replica']['50_percent_root_formation_days'];
            }
        }
    }
    if($options['first_harvest']==1)
    {
        $table_heads['first_harvest']='first_harvest';
        $data['first_harvest']['normal']=$data['first_harvest']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $first_info=json_decode($harvest[$variety['id']][1],true);
            $first_harvest_time=System_helper::get_time($first_info['normal']['harvesting_date']);
            if($first_harvest_time>0)
            {
                $data['first_harvest']['normal']=$data['first_harvest']['replica']=($first_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
            }

        }
    }
    if($options['last_harvest']==1)
    {
        $table_heads['last_harvest']='last_harvest';
        $data['last_harvest']['normal']=$data['last_harvest']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $total_harvest=sizeof($harvest[$variety['id']]);
            $last_info=json_decode($harvest[$variety['id']][$total_harvest],true);
            $last_harvest_time=System_helper::get_time($last_info['normal']['harvesting_date']);
            if($last_harvest_time>0)
            {
                $data['last_harvest']['normal']=$data['last_harvest']['replica']=($last_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
            }

        }
    }
    if($options['no_of_harvest']==1)
    {
        $table_heads['no_of_harvest']='no_of_harvest';
        $data['no_of_harvest']['normal']=$data['no_of_harvest']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $total_harvest=sizeof($harvest[$variety['id']]);
            $data['no_of_harvest']['normal']=$data['no_of_harvest']['replica']=$total_harvest;
        }
    }





    $table_heads['accepted']='accepted';
    $data['accepted']['normal']=$data['accepted']['replica']=$this->lang->line('NOT_SET');
    if(is_array($info)&& isset($info['normal']['accepted']))
    {
        if(($info['normal']['accepted'])==1)
        {
            $data['accepted']['normal']=$this->lang->line('YES');
        }
        else
        {
            $data['accepted']['normal']=$this->lang->line('NO');
        }

    }
    if($variety['replica_status']==1)
    {
        if(is_array($info)&& isset($info['replica']['accepted']))
        {
            if(($info['replica']['accepted'])==1)
            {
                $data['accepted']['replica']=$this->lang->line('YES');
            }
            else
            {
                $data['accepted']['replica']=$this->lang->line('NO');
            }

        }
    }


    $table_heads['remarks']='remarks';
    $data['remarks']['normal']=$data['remarks']['replica']=$this->lang->line('NOT_SET');
    if(is_array($info)&& !empty($info['normal']['remarks']))
    {
        $data['remarks']['normal']=$data['remarks']['replica']=$info['normal']['remarks'];
    }



    //for ranking
    $table_heads['ranking']='ranking';
    $data['ranking']['normal']=$data['ranking']['replica']='';
    if(isset($final[$variety['id']]['ranking']))
    {
        $data['ranking']['normal']=$data['ranking']['replica']=$final[$variety['id']]['ranking'];
    }
    //ranking finished
    $table_heads['trial_status']='trial_status';
    $data['trial_status']['normal']=$data['trial_status']['replica']=$this->lang->line('NOT_SET');
    if(isset($final[$variety['id']]['trial_status']))
    {
        $data['trial_status']['normal']=$data['trial_status']['replica']=$trial_status_config[$final[$variety['id']]['trial_status']];
    }

    $final_varieties[]=$data;
}
//sorting final variety
for($i=0;$i<(sizeof($final_varieties)-1);$i++)
{
    for($j=$i+1;$j<sizeof($final_varieties);$j++)
    {
        if(($final_varieties[$i]['ranking']['normal']=='')&&($final_varieties[$j]['ranking']['normal']==''))
        {

        }
        elseif($final_varieties[$i]['ranking']['normal']=='')
        {
            $temp=$final_varieties[$i];
            $final_varieties[$i]=$final_varieties[$j];
            $final_varieties[$j]=$temp;
        }
        elseif($final_varieties[$j]['ranking']['normal']=='')
        {

        }
        elseif(($final_varieties[$i]['ranking']['normal']>$final_varieties[$j]['ranking']['normal']))
        {
            $temp=$final_varieties[$i];
            $final_varieties[$i]=$final_varieties[$j];
            $final_varieties[$j]=$temp;
        }
    }
}
?>

<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="">
            <tr>
                <th><?php echo $this->lang->line("SL"); ?></th>
                <?php
                    foreach($table_heads as $th)
                    {
                        if($th=='remarks')
                        {
                            ?>
                            <th style="min-width: 300px;"><?php echo $this->lang->line(strtoupper($th)); ?></th>
                            <?php
                        }
                        else
                        {
                            ?>
                            <th><?php echo $this->lang->line(strtoupper($th)); ?></th>
                            <?php
                        }
                    }
                ?>

            </tr>
            </thead>
            <tbody>
                <?php
                    $index=0;
                    foreach($final_varieties as $variety)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$index;?></td>
                            <?php
                            foreach($table_heads as $th)
                            {
                                ?>
                                <td><?php echo $variety[$th]['normal']; ?></td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                        if($variety['replica_status'])
                        {
                            ?>
                            <tr style="color: red;">
                                <td><?php echo $index;?></td>
                                <?php
                                foreach($table_heads as $th)
                                {
                                    ?>
                                    <td><?php echo $variety[$th]['replica']; ?></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                    }
                ?>

            </tbody>
        </table>

    </div>
</div>