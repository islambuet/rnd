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
//print_r($flowering);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";

$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
    $info=array();
    if(isset($flowering[$variety['id']]['info']))
    {
        $info=json_decode($flowering[$variety['id']]['info'],true);
    }

    $data=array();
    $data['replica_status']=$variety['replica_status'];
    $data['id']=$variety['id'];

    //for rnd code
    $table_heads['rnd_code']='rnd_code';
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);

    if($options['1st_curd_formation']==1)
    {
        $table_heads['1st_curd_formation']='1st_curd_formation';
        $data['1st_curd_formation']['normal']=$data['1st_curd_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_curd_formation']))
        {
            $data['1st_curd_formation']['normal']=$info['normal']['1st_curd_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_curd_formation']))
            {
                $data['1st_curd_formation']['replica']=$info['replica']['1st_curd_formation'];
            }
        }
    }
    if($options['1st_root_formation']==1)
    {
        $table_heads['1st_root_formation']='1st_root_formation';
        $data['1st_root_formation']['normal']=$data['1st_root_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_root_formation']))
        {
            $data['1st_root_formation']['normal']=$info['normal']['1st_root_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_root_formation']))
            {
                $data['1st_root_formation']['replica']=$info['replica']['1st_root_formation'];
            }
        }
    }
    if($options['1st_head_formation']==1)
    {
        $table_heads['1st_head_formation']='1st_head_formation';
        $data['1st_head_formation']['normal']=$data['1st_head_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_head_formation']))
        {
            $data['1st_head_formation']['normal']=$info['normal']['1st_head_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_head_formation']))
            {
                $data['1st_head_formation']['replica']=$info['replica']['1st_head_formation'];
            }
        }
    }
    if($options['1st_flowering_days']==1)
    {
        $table_heads['1st_flowering_days']='1st_flowering_days';
        $data['1st_flowering_days']['normal']=$data['1st_flowering_days']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_flowering_days']))
        {
            $data['1st_flowering_days']['normal']=$info['normal']['1st_flowering_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_flowering_days']))
            {
                $data['1st_flowering_days']['replica']=$info['replica']['1st_flowering_days'];
            }
        }
    }
    if($options['50_percent_flowering_days']==1)
    {
        $table_heads['50_percent_flowering_days']='50_percent_flowering_days';
        $data['50_percent_flowering_days']['normal']=$data['50_percent_flowering_days']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['50_percent_flowering_days']))
        {
            $data['50_percent_flowering_days']['normal']=$info['normal']['50_percent_flowering_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['50_percent_flowering_days']))
            {
                $data['50_percent_flowering_days']['replica']=$info['replica']['50_percent_flowering_days'];
            }
        }
    }
    if($options['full_flowering_days']==1)
    {
        $table_heads['full_flowering_days']='full_flowering_days';
        $data['full_flowering_days']['normal']=$data['full_flowering_days']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['full_flowering_days']))
        {
            $data['full_flowering_days']['normal']=$info['normal']['full_flowering_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['full_flowering_days']))
            {
                $data['full_flowering_days']['replica']=$info['replica']['full_flowering_days'];
            }
        }
    }
    if($options['no_of_1st_curd_formation_plants']==1)
    {
        $table_heads['no_of_1st_curd_formation_plants']='no_of_1st_curd_formation_plants';
        $data['no_of_1st_curd_formation_plants']['normal']=$data['no_of_1st_curd_formation_plants']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['no_of_1st_curd_formation_plants']))
        {
            $data['no_of_1st_curd_formation_plants']['normal']=$info['normal']['no_of_1st_curd_formation_plants'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['no_of_1st_curd_formation_plants']))
            {
                $data['no_of_1st_curd_formation_plants']['replica']=$info['replica']['no_of_1st_curd_formation_plants'];
            }
        }
    }
    if($options['no_of_1st_root_formation_plants']==1)
    {
        $table_heads['no_of_1st_root_formation_plants']='no_of_1st_root_formation_plants';
        $data['no_of_1st_root_formation_plants']['normal']=$data['no_of_1st_root_formation_plants']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['no_of_1st_root_formation_plants']))
        {
            $data['no_of_1st_root_formation_plants']['normal']=$info['normal']['no_of_1st_root_formation_plants'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['no_of_1st_root_formation_plants']))
            {
                $data['no_of_1st_root_formation_plants']['replica']=$info['replica']['no_of_1st_root_formation_plants'];
            }
        }
    }
    if($options['no_of_1st_head_formation_plants']==1)
    {
        $table_heads['no_of_1st_head_formation_plants']='no_of_1st_head_formation_plants';
        $data['no_of_1st_head_formation_plants']['normal']=$data['no_of_1st_head_formation_plants']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['no_of_1st_head_formation_plants']))
        {
            $data['no_of_1st_head_formation_plants']['normal']=$info['normal']['no_of_1st_head_formation_plants'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['no_of_1st_head_formation_plants']))
            {
                $data['no_of_1st_head_formation_plants']['replica']=$info['replica']['no_of_1st_head_formation_plants'];
            }
        }
    }
    if($options['no_of_1st_flowering_plants']==1)
    {
        $table_heads['no_of_1st_flowering_plants']='no_of_1st_flowering_plants';
        $data['no_of_1st_flowering_plants']['normal']=$data['no_of_1st_flowering_plants']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['no_of_1st_flowering_plants']))
        {
            $data['no_of_1st_flowering_plants']['normal']=$info['normal']['no_of_1st_flowering_plants'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['no_of_1st_flowering_plants']))
            {
                $data['no_of_1st_flowering_plants']['replica']=$info['replica']['no_of_1st_flowering_plants'];
            }
        }
    }
    if($options['1st_flowering_to_full_flowering']==1)
    {
        $table_heads['1st_flowering_to_full_flowering']='1st_flowering_to_full_flowering';
        $data['1st_flowering_to_full_flowering']['normal']=$data['1st_flowering_to_full_flowering']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_flowering_to_full_flowering']))
        {
            $data['1st_flowering_to_full_flowering']['normal']=$info['normal']['1st_flowering_to_full_flowering'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_flowering_to_full_flowering']))
            {
                $data['1st_flowering_to_full_flowering']['replica']=$info['replica']['1st_flowering_to_full_flowering'];
            }
        }
    }
    if($options['50_percent_curd_formation_days']==1)
    {
        $table_heads['50_percent_curd_formation_days']='50_percent_curd_formation_days';
        $data['50_percent_curd_formation_days']['normal']=$data['50_percent_curd_formation_days']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['50_percent_curd_formation_days']))
        {
            $data['50_percent_curd_formation_days']['normal']=$info['normal']['50_percent_curd_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['50_percent_curd_formation_days']))
            {
                $data['50_percent_curd_formation_days']['replica']=$info['replica']['50_percent_curd_formation_days'];
            }
        }
    }
    if($options['50_percent_head_formation_days']==1)
    {
        $table_heads['50_percent_head_formation_days']='50_percent_head_formation_days';
        $data['50_percent_head_formation_days']['normal']=$data['50_percent_head_formation_days']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['50_percent_head_formation_days']))
        {
            $data['50_percent_head_formation_days']['normal']=$info['normal']['50_percent_head_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['50_percent_head_formation_days']))
            {
                $data['50_percent_head_formation_days']['replica']=$info['replica']['50_percent_head_formation_days'];
            }
        }
    }
    if($options['50_percent_root_formation_days']==1)
    {
        $table_heads['50_percent_root_formation_days']='50_percent_root_formation_days';
        $data['50_percent_root_formation_days']['normal']=$data['50_percent_root_formation_days']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['50_percent_root_formation_days']))
        {
            $data['50_percent_root_formation_days']['normal']=$info['normal']['50_percent_root_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['50_percent_root_formation_days']))
            {
                $data['50_percent_root_formation_days']['replica']=$info['replica']['50_percent_root_formation_days'];
            }
        }
    }
    if($options['1st_curd_formation_to_marketable_curd_formation']==1)
    {
        $table_heads['1st_curd_formation_to_marketable_curd_formation']='1st_curd_formation_to_marketable_curd_formation';
        $data['1st_curd_formation_to_marketable_curd_formation']['normal']=$data['1st_curd_formation_to_marketable_curd_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_curd_formation_to_marketable_curd_formation']))
        {
            $data['1st_curd_formation_to_marketable_curd_formation']['normal']=$info['normal']['1st_curd_formation_to_marketable_curd_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_curd_formation_to_marketable_curd_formation']))
            {
                $data['1st_curd_formation_to_marketable_curd_formation']['replica']=$info['replica']['1st_curd_formation_to_marketable_curd_formation'];
            }
        }
    }
    if($options['1st_head_formation_to_marketable_head_formation']==1)
    {
        $table_heads['1st_head_formation_to_marketable_head_formation']='1st_head_formation_to_marketable_head_formation';
        $data['1st_head_formation_to_marketable_head_formation']['normal']=$data['1st_head_formation_to_marketable_head_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_head_formation_to_marketable_head_formation']))
        {
            $data['1st_head_formation_to_marketable_head_formation']['normal']=$info['normal']['1st_head_formation_to_marketable_head_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_head_formation_to_marketable_head_formation']))
            {
                $data['1st_head_formation_to_marketable_head_formation']['replica']=$info['replica']['1st_head_formation_to_marketable_head_formation'];
            }
        }
    }
    if($options['1st_root_formation_to_marketable_root_formation']==1)
    {
        $table_heads['1st_root_formation_to_marketable_root_formation']='1st_root_formation_to_marketable_root_formation';
        $data['1st_root_formation_to_marketable_root_formation']['normal']=$data['1st_root_formation_to_marketable_root_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_root_formation_to_marketable_root_formation']))
        {
            $data['1st_root_formation_to_marketable_root_formation']['normal']=$info['normal']['1st_root_formation_to_marketable_root_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_root_formation_to_marketable_root_formation']))
            {
                $data['1st_root_formation_to_marketable_root_formation']['replica']=$info['replica']['1st_root_formation_to_marketable_root_formation'];
            }
        }
    }
    if($options['1st_flowering_to_first_fruit_setting']==1)
    {
        $table_heads['1st_flowering_to_first_fruit_setting']='1st_flowering_to_first_fruit_setting';
        $data['1st_flowering_to_first_fruit_setting']['normal']=$data['1st_flowering_to_first_fruit_setting']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_flowering_to_first_fruit_setting']))
        {
            $data['1st_flowering_to_first_fruit_setting']['normal']=$info['normal']['1st_flowering_to_first_fruit_setting'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_flowering_to_first_fruit_setting']))
            {
                $data['1st_flowering_to_first_fruit_setting']['replica']=$info['replica']['1st_flowering_to_first_fruit_setting'];
            }
        }
    }
    if($options['1st_curd_formation_to_1st_harvest']==1)
    {
        $table_heads['1st_curd_formation_to_1st_harvest']='1st_curd_formation_to_1st_harvest';
        $data['1st_curd_formation_to_1st_harvest']['normal']=$data['1st_curd_formation_to_1st_harvest']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_curd_formation_to_1st_harvest']))
        {
            $data['1st_curd_formation_to_1st_harvest']['normal']=$info['normal']['1st_curd_formation_to_1st_harvest'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_curd_formation_to_1st_harvest']))
            {
                $data['1st_curd_formation_to_1st_harvest']['replica']=$info['replica']['1st_curd_formation_to_1st_harvest'];
            }
        }
    }
    if($options['1st_head_formation_to_1st_harvest']==1)
    {
        $table_heads['1st_head_formation_to_1st_harvest']='1st_head_formation_to_1st_harvest';
        $data['1st_head_formation_to_1st_harvest']['normal']=$data['1st_head_formation_to_1st_harvest']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_head_formation_to_1st_harvest']))
        {
            $data['1st_head_formation_to_1st_harvest']['normal']=$info['normal']['1st_head_formation_to_1st_harvest'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_head_formation_to_1st_harvest']))
            {
                $data['1st_head_formation_to_1st_harvest']['replica']=$info['replica']['1st_head_formation_to_1st_harvest'];
            }
        }
    }
    if($options['1st_root_formation_to_1st_harvest']==1)
    {
        $table_heads['1st_root_formation_to_1st_harvest']='1st_root_formation_to_1st_harvest';
        $data['1st_root_formation_to_1st_harvest']['normal']=$data['1st_root_formation_to_1st_harvest']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_root_formation_to_1st_harvest']))
        {
            $data['1st_root_formation_to_1st_harvest']['normal']=$info['normal']['1st_root_formation_to_1st_harvest'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_root_formation_to_1st_harvest']))
            {
                $data['1st_root_formation_to_1st_harvest']['replica']=$info['replica']['1st_root_formation_to_1st_harvest'];
            }
        }
    }
    if($options['1st_fruit_setting_to_1st_harvest']==1)
    {
        $table_heads['1st_fruit_setting_to_1st_harvest']='1st_fruit_setting_to_1st_harvest';
        $data['1st_fruit_setting_to_1st_harvest']['normal']=$data['1st_fruit_setting_to_1st_harvest']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['1st_fruit_setting_to_1st_harvest']))
        {
            $data['1st_fruit_setting_to_1st_harvest']['normal']=$info['normal']['1st_fruit_setting_to_1st_harvest'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['1st_fruit_setting_to_1st_harvest']))
            {
                $data['1st_fruit_setting_to_1st_harvest']['replica']=$info['replica']['1st_fruit_setting_to_1st_harvest'];
            }
        }
    }
    if($options['number_of_female_flower']==1)
    {
        $table_heads['number_of_female_flower']='number_of_female_flower';
        $data['number_of_female_flower']['normal']=$data['number_of_female_flower']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['number_of_female_flower']))
        {
            $data['number_of_female_flower']['normal']=$info['normal']['number_of_female_flower'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['number_of_female_flower']))
            {
                $data['number_of_female_flower']['replica']=$info['replica']['number_of_female_flower'];
            }
        }
    }
    if($options['evaluation']==1)
    {
        $table_heads['evaluation']='evaluation';
        $data['evaluation']['normal']=$data['evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['evaluation']))
        {
            $data['evaluation']['normal']=$info['normal']['evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['evaluation']))
            {
                $data['evaluation']['replica']=$info['replica']['evaluation'];
            }
        }
    }
    if($options['special_characters']==1)
    {
        $table_heads['special_characters']='special_characters';
        $data['special_characters']['normal']=$data['special_characters']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['special_characters']))
        {
            $data['special_characters']['normal']=$info['normal']['special_characters'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['special_characters']))
            {
                $data['special_characters']['replica']=$info['replica']['special_characters'];
            }
        }
    }
    if($options['accepted']==1)
    {
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
    }
    if($options['remarks']==1)
    {
        $table_heads['remarks']='remarks';
        $data['remarks']['normal']=$data['remarks']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['remarks']))
        {
            $data['remarks']['normal']=$data['remarks']['replica']=$info['normal']['remarks'];
        }
    }
    //for ranking
    $table_heads['ranking']='ranking';
    $data['ranking']['normal']=$data['ranking']['replica']='';
    if(isset($flowering[$variety['id']]['ranking']))
    {
        $data['ranking']['normal']=$data['ranking']['replica']=$flowering[$variety['id']]['ranking'];
    }
    //ranking finished

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
            <thead class="hidden-print">
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <?php
                    foreach($table_heads as $th)
                    {
                        if($th=='remarks')
                        {
                            ?>
                            <th style="min-width: 300px;"><?php echo $this->lang->line('LABEL_'.strtoupper($th)); ?></th>
                            <?php
                        }
                        else
                        {
                            ?>
                            <th><?php echo $this->lang->line('LABEL_'.strtoupper($th)); ?></th>
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