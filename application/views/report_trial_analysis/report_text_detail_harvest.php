<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
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
//print_r($harvest);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";
$this->lang->load('rnd_harvest');
$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
//    $info=array();
//    if(isset($harvest[$variety['id']]['info']))
//    {
//        $info=json_decode($harvest[$variety['id']]['info'],true);
//    }

    $data=array();
    $data['replica_status']=$variety['replica_status'];
    $data['id']=$variety['id'];
    $data['initial_plants']=$variety['initial_plants'];

    //for rnd code
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);
    for($i=1;$i<=$max_harvest;$i++)
    {
        $info=array();
        if(isset($harvest[$variety['id']][$i]))
        {
            $info=json_decode($harvest[$variety['id']][$i],true);
        }
        if($options['harvesting_date']==1)
        {
            $table_heads['harvesting_date']='harvesting_date';
            $data['harvesting_date']['normal'][$i]=$data['harvesting_date']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['harvesting_date']))
            {
                $data['harvesting_date']['normal'][$i]=$info['normal']['harvesting_date'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['harvesting_date']))
                {
                    $data['harvesting_date']['replica'][$i]=$info['replica']['harvesting_date'];
                }
            }
        }
        //without option INITIAL_PLANTS_DURING_TRIAL_STARTED added as common
        if($options['no_of_plants_harvested']==1)
        {
            $table_heads['no_of_plants_harvested']='no_of_plants_harvested';
            $data['no_of_plants_harvested']['normal'][$i]=$data['no_of_plants_harvested']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['no_of_plants_harvested']))
            {
                $data['no_of_plants_harvested']['normal'][$i]=$info['normal']['no_of_plants_harvested'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['no_of_plants_harvested']))
                {
                    $data['no_of_plants_harvested']['replica'][$i]=$info['replica']['no_of_plants_harvested'];
                }
            }
        }
        if($options['total_harvested_wt']==1)
        {
            $table_heads['total_harvested_wt']='total_harvested_wt';
            $data['total_harvested_wt']['normal'][$i]=$data['total_harvested_wt']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_harvested_wt']))
            {
                $data['total_harvested_wt']['normal'][$i]=$info['normal']['total_harvested_wt'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_harvested_wt']))
                {
                    $data['total_harvested_wt']['replica'][$i]=$info['replica']['total_harvested_wt'];
                }
            }
        }
        if($options['total_mrkt_curds']==1)
        {
            $table_heads['total_mrkt_curds']='total_mrkt_curds';
            $data['total_mrkt_curds']['normal'][$i]=$data['total_mrkt_curds']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_curds']))
            {
                $data['total_mrkt_curds']['normal'][$i]=$info['normal']['total_mrkt_curds'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_curds']))
                {
                    $data['total_mrkt_curds']['replica'][$i]=$info['replica']['total_mrkt_curds'];
                }
            }
        }
        if($options['total_mrkt_curd_wt']==1)
        {
            $table_heads['total_mrkt_curd_wt']='total_mrkt_curd_wt';
            $data['total_mrkt_curd_wt']['normal'][$i]=$data['total_mrkt_curd_wt']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_curd_wt']))
            {
                $data['total_mrkt_curd_wt']['normal'][$i]=$info['normal']['total_mrkt_curd_wt'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_curd_wt']))
                {
                    $data['total_mrkt_curd_wt']['replica'][$i]=$info['replica']['total_mrkt_curd_wt'];
                }
            }
        }
        if($options['curd_uniformity']==1)
        {
            $table_heads['curd_uniformity']='curd_uniformity';
            $data['curd_uniformity']['normal'][$i]=$data['curd_uniformity']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['curd_uniformity']))
            {
                $data['curd_uniformity']['normal'][$i]=$info['normal']['curd_uniformity'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['curd_uniformity']))
                {
                    $data['curd_uniformity']['replica'][$i]=$info['replica']['curd_uniformity'];
                }
            }
        }
        if($options['total_mrkt_heads']==1)
        {
            $table_heads['total_mrkt_heads']='total_mrkt_heads';
            $data['total_mrkt_heads']['normal'][$i]=$data['total_mrkt_heads']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_heads']))
            {
                $data['total_mrkt_heads']['normal'][$i]=$info['normal']['total_mrkt_heads'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_heads']))
                {
                    $data['total_mrkt_heads']['replica'][$i]=$info['replica']['total_mrkt_heads'];
                }
            }
        }
        if($options['total_mrkt_head_wt']==1)
        {
            $table_heads['total_mrkt_head_wt']='total_mrkt_head_wt';
            $data['total_mrkt_head_wt']['normal'][$i]=$data['total_mrkt_head_wt']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_head_wt']))
            {
                $data['total_mrkt_head_wt']['normal'][$i]=$info['normal']['total_mrkt_head_wt'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_head_wt']))
                {
                    $data['total_mrkt_head_wt']['replica'][$i]=$info['replica']['total_mrkt_head_wt'];
                }
            }
        }
        if($options['head_uniformity']==1)
        {
            $table_heads['head_uniformity']='head_uniformity';
            $data['head_uniformity']['normal'][$i]=$data['head_uniformity']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['head_uniformity']))
            {
                $data['head_uniformity']['normal'][$i]=$info['normal']['head_uniformity'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['head_uniformity']))
                {
                    $data['head_uniformity']['replica'][$i]=$info['replica']['head_uniformity'];
                }
            }
        }
        if($options['no_of_fruits']==1)
        {
            $table_heads['no_of_fruits']='no_of_fruits';
            $data['no_of_fruits']['normal'][$i]=$data['no_of_fruits']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['no_of_fruits']))
            {
                $data['no_of_fruits']['normal'][$i]=$info['normal']['no_of_fruits'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['no_of_fruits']))
                {
                    $data['no_of_fruits']['replica'][$i]=$info['replica']['no_of_fruits'];
                }
            }
        }
        if($options['total_mrkt_fruits']==1)
        {
            $table_heads['total_mrkt_fruits']='total_mrkt_fruits';
            $data['total_mrkt_fruits']['normal'][$i]=$data['total_mrkt_fruits']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_fruits']))
            {
                $data['total_mrkt_fruits']['normal'][$i]=$info['normal']['total_mrkt_fruits'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_fruits']))
                {
                    $data['total_mrkt_fruits']['replica'][$i]=$info['replica']['total_mrkt_fruits'];
                }
            }
        }
        if($options['total_mrkt_fruit_wt']==1)
        {
            $table_heads['total_mrkt_fruit_wt']='total_mrkt_fruit_wt';
            $data['total_mrkt_fruit_wt']['normal'][$i]=$data['total_mrkt_fruit_wt']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_fruit_wt']))
            {
                $data['total_mrkt_fruit_wt']['normal'][$i]=$info['normal']['total_mrkt_fruit_wt'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_fruit_wt']))
                {
                    $data['total_mrkt_fruit_wt']['replica'][$i]=$info['replica']['total_mrkt_fruit_wt'];
                }
            }
        }
        if($options['fruit_uniformity']==1)
        {
            $table_heads['fruit_uniformity']='fruit_uniformity';
            $data['fruit_uniformity']['normal'][$i]=$data['fruit_uniformity']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['fruit_uniformity']))
            {
                $data['fruit_uniformity']['normal'][$i]=$info['normal']['fruit_uniformity'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['fruit_uniformity']))
                {
                    $data['fruit_uniformity']['replica'][$i]=$info['replica']['fruit_uniformity'];
                }
            }
        }
        if($options['no_of_roots_harvested']==1)
        {
            $table_heads['no_of_roots_harvested']='no_of_roots_harvested';
            $data['no_of_roots_harvested']['normal'][$i]=$data['no_of_roots_harvested']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['no_of_roots_harvested']))
            {
                $data['no_of_roots_harvested']['normal'][$i]=$info['normal']['no_of_roots_harvested'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['no_of_roots_harvested']))
                {
                    $data['no_of_roots_harvested']['replica'][$i]=$info['replica']['no_of_roots_harvested'];
                }
            }
        }
        if($options['total_mrkt_roots']==1)
        {
            $table_heads['total_mrkt_roots']='total_mrkt_roots';
            $data['total_mrkt_roots']['normal'][$i]=$data['total_mrkt_roots']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_roots']))
            {
                $data['total_mrkt_roots']['normal'][$i]=$info['normal']['total_mrkt_roots'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_roots']))
                {
                    $data['total_mrkt_roots']['replica'][$i]=$info['replica']['total_mrkt_roots'];
                }
            }
        }
        if($options['total_mrkt_roots_wt']==1)
        {
            $table_heads['total_mrkt_roots_wt']='total_mrkt_roots_wt';
            $data['total_mrkt_roots_wt']['normal'][$i]=$data['total_mrkt_roots_wt']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_roots_wt']))
            {
                $data['total_mrkt_roots_wt']['normal'][$i]=$info['normal']['total_mrkt_roots_wt'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_roots_wt']))
                {
                    $data['total_mrkt_roots_wt']['replica'][$i]=$info['replica']['total_mrkt_roots_wt'];
                }
            }
        }
        if($options['roots_uniformity']==1)
        {
            $table_heads['roots_uniformity']='roots_uniformity';
            $data['roots_uniformity']['normal'][$i]=$data['roots_uniformity']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['roots_uniformity']))
            {
                $data['roots_uniformity']['normal'][$i]=$info['normal']['roots_uniformity'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['roots_uniformity']))
                {
                    $data['roots_uniformity']['replica'][$i]=$info['replica']['roots_uniformity'];
                }
            }
        }
        if($options['total_no_of_leaves']==1)
        {
            $table_heads['total_no_of_leaves']='total_no_of_leaves';
            $data['total_no_of_leaves']['normal'][$i]=$data['total_no_of_leaves']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_no_of_leaves']))
            {
                $data['total_no_of_leaves']['normal'][$i]=$info['normal']['total_no_of_leaves'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_no_of_leaves']))
                {
                    $data['total_no_of_leaves']['replica'][$i]=$info['replica']['total_no_of_leaves'];
                }
            }
        }
        if($options['total_mrkt_leaf']==1)
        {
            $table_heads['total_mrkt_leaf']='total_mrkt_leaf';
            $data['total_mrkt_leaf']['normal'][$i]=$data['total_mrkt_leaf']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_leaf']))
            {
                $data['total_mrkt_leaf']['normal'][$i]=$info['normal']['total_mrkt_leaf'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_leaf']))
                {
                    $data['total_mrkt_leaf']['replica'][$i]=$info['replica']['total_mrkt_leaf'];
                }
            }
        }
        if($options['total_mrkt_leaf_wt']==1)
        {
            $table_heads['total_mrkt_leaf_wt']='total_mrkt_leaf_wt';
            $data['total_mrkt_leaf_wt']['normal'][$i]=$data['total_mrkt_leaf_wt']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['total_mrkt_leaf_wt']))
            {
                $data['total_mrkt_leaf_wt']['normal'][$i]=$info['normal']['total_mrkt_leaf_wt'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['total_mrkt_leaf_wt']))
                {
                    $data['total_mrkt_leaf_wt']['replica'][$i]=$info['replica']['total_mrkt_leaf_wt'];
                }
            }
        }
        if($options['leaf_uniformity']==1)
        {
            $table_heads['leaf_uniformity']='leaf_uniformity';
            $data['leaf_uniformity']['normal'][$i]=$data['leaf_uniformity']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['leaf_uniformity']))
            {
                $data['leaf_uniformity']['normal'][$i]=$info['normal']['leaf_uniformity'];
            }
            if($variety['replica_status']==1)
            {
                if(is_array($info)&& !empty($info['replica']['leaf_uniformity']))
                {
                    $data['leaf_uniformity']['replica'][$i]=$info['replica']['leaf_uniformity'];
                }
            }
        }
        if($options['remarks']==1)
        {
            $table_heads['remarks']='remarks';
            $data['remarks']['normal'][$i]=$data['remarks']['replica'][$i]=$this->lang->line('NOT_SET');
            if(is_array($info)&& !empty($info['normal']['remarks']))
            {
                $data['remarks']['normal'][$i]=$data['remarks']['replica'][$i]=$info['normal']['remarks'];
            }
        }
    }
    $final_varieties[]=$data;
}
?>
<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="">
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                <th><?php echo $this->lang->line("INITIAL_PLANTS_DURING_TRIAL_STARTED"); ?></th>
                <?php
                for($i=1;$i<=$max_harvest;$i++)
                {
                    foreach($table_heads as $th)
                    {
                        if($th=='remarks')
                        {
                            ?>
                            <th style="min-width: 300px;"><?php echo $this->lang->line(strtoupper($th)).'('.$i.')'; ?></th>
                        <?php
                        }
                        else
                        {
                            ?>
                            <th><?php echo $this->lang->line(strtoupper($th)).'('.$i.')';?></th>
                        <?php
                        }
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
                            <td><?php echo $variety['rnd_code']['normal']; ?></td>
                            <td><?php echo $variety['initial_plants']; ?></td>
                            <?php
                            for($i=1;$i<=$max_harvest;$i++)
                            {
                                foreach($table_heads as $th)
                                {
                                    ?>
                                    <td><?php echo $variety[$th]['normal'][$i]; ?></td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                        if($variety['replica_status'])
                        {
                            ?>
                            <tr style="color: red;">
                                <td><?php echo $index;?></td>
                                <td><?php echo $variety['rnd_code']['replica']; ?></td>
                                <td><?php echo $variety['initial_plants']; ?></td>
                                <?php
                                for($i=1;$i<=$max_harvest;$i++)
                                {
                                    foreach($table_heads as $th)
                                    {
                                        ?>
                                        <td><?php echo $variety[$th]['replica'][$i]; ?></td>
                                    <?php
                                    }
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