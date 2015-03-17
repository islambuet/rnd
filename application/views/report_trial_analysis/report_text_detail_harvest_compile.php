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
echo "<pre>";
print_r($harvest);
echo "</pre>";
//echo "<pre>";
//print_r($harvest_compile);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";

$this->lang->load('rnd_harvest');
$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
    $info=array();
    if(isset($harvest_compile[$variety['id']]['info']))
    {
        $info=json_decode($harvest_compile[$variety['id']]['info'],true);
    }

    $data=array();
    $data['replica_status']=$variety['replica_status'];
    $data['id']=$variety['id'];

    //for rnd code
    $table_heads['rnd_code']='rnd_code';
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);
    if($options['initial_plants']==1)
    {
        $table_heads['initial_plants_during_trial_started']='initial_plants_during_trial_started';
        $data['initial_plants_during_trial_started']['normal']=$data['initial_plants_during_trial_started']['replica']=$variety['initial_plants'];

    }
    //global used
    $first_harvest_days=$last_harvest_days=$diff_last_first_days=$this->lang->line("NOT_SET");
    $total_harvest=0;
    $total_harvested_weight_normal=0;
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
    }



    $table_heads['first_harvest_days']='first_harvest_days';
    $table_heads['last_harvest_days']='last_harvest_days';
    $table_heads['interval_first_and_last_harvest']='interval_first_and_last_harvest';
    $table_heads['total_no_of_harvest']='total_no_of_harvest';
    $data['first_harvest_days']['normal']=$data['first_harvest_days']['replica']=$this->lang->line('NOT_SET');
    $data['last_harvest_days']['normal']=$data['last_harvest_days']['replica']=$this->lang->line('NOT_SET');
    $data['interval_first_and_last_harvest']['normal']=$data['interval_first_and_last_harvest']['replica']=$this->lang->line('CANNOT_CALCULATE');
    $data['total_no_of_harvest']['normal']=$data['total_no_of_harvest']['replica']=$this->lang->line('NOT_SET');;
    if($options['total_harv_curds']==1)
    {
        $table_heads['total_harv_curds']='total_harv_curds';
        $data['total_harv_curds']['normal']=$data['total_harv_curds']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_curd_wt']==1)
    {
        $table_heads['total_curd_wt']='total_curd_wt';
        $data['total_curd_wt']['normal']=$data['total_curd_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_curds']==1)
    {
        $table_heads['total_market_curds']='total_market_curds';
        $data['total_market_curds']['normal']=$data['total_market_curds']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_curd_wt']==1)
    {
        $table_heads['total_market_curd_wt']='total_market_curd_wt';
        $data['total_market_curd_wt']['normal']=$data['total_market_curd_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_curd']==1)
    {
        $table_heads['percentage_of_mrkt_curd']='percentage_of_mrkt_curd';
        $data['percentage_of_mrkt_curd']['normal']=$data['percentage_of_mrkt_curd']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if(isset($harvest[$variety['id']]))
    {
        $total_harvest=sizeof($harvest[$variety['id']]);
        $first_info=json_decode($harvest[$variety['id']][1],true);
        $last_info=json_decode($harvest[$variety['id']][$total_harvest],true);
        $first_harvest_time=System_helper::get_time($first_info['normal']['harvesting_date']);
        $last_harvest_time=System_helper::get_time($last_info['normal']['harvesting_date']);
        if($first_harvest_time>0)
        {
            $first_harvest_days=($first_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
        }
        if($last_harvest_time>0)
        {
            $last_harvest_days=($last_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
        }
        if(($first_harvest_time>0)&&($last_harvest_time>0))
        {
            $diff_last_first_days=($last_harvest_time-$first_harvest_time)/(3600*24);
        }


        $data['first_harvest_days']['normal']=$data['first_harvest_days']['replica']=$first_harvest_days;
        $data['last_harvest_days']['normal']=$data['last_harvest_days']['replica']=$last_harvest_days;
        $data['interval_first_and_last_harvest']['normal']=$data['interval_first_and_last_harvest']['replica']=$diff_last_first_days;
        $data['total_no_of_harvest']['normal']=$data['total_no_of_harvest']['replica']=$total_harvest;

        if($options['total_harv_curds']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_harv_curds']['normal']=$total_normal;
            $data['total_harv_curds']['replica']=$total_replica;
        }
        if($options['total_curd_wt']==1)
        {
            $data['total_curd_wt']['normal']=$total_harvested_weight_normal;
            $data['total_curd_wt']['replica']=$total_harvested_weight_replica;
        }
        if($options['total_market_curds']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_curds'];
                $value_replica = $detail['replica']['total_mrkt_curds'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_curds']['normal']=$total_normal;
            $data['total_market_curds']['replica']=$total_replica;
        }

        if($options['total_market_curd_wt']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_curd_wt'];
                $value_replica = $detail['replica']['total_mrkt_curd_wt'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_curd_wt']['normal']=$total_normal;
            $data['total_market_curd_wt']['replica']=$total_replica;
        }

//        if($options['percentage_of_mrkt_curd']==1)
//        {
//
//            $total_normal = 0;
//            $total_replica = 0;
//            foreach($harvest[$variety['id']] as $hcd)
//            {
//                $detail = json_decode($hcd,true);
//                $value_normal = $detail['normal']['total_mrkt_curd_wt'];
//                $value_replica = $detail['replica']['total_mrkt_curd_wt'];
//                $total_normal += $value_normal;
//                $total_replica += $value_replica;
//            }
//            if(($total_normal>0)&&
//            //$data['total_market_curd_wt']['normal']=$total_normal;
//            //$data['total_market_curd_wt']['replica']=$total_replica;
//        }
    }




    //accepted without option
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
    //accepted without option
    //remarks without option
    $table_heads['remarks']='remarks';
    $data['remarks']['normal']=$data['remarks']['replica']=$this->lang->line('NOT_SET');
    if(is_array($info)&& !empty($info['normal']['remarks']))
    {
        $data['remarks']['normal']=$data['remarks']['replica']=$info['normal']['remarks'];
    }

    //remarks without option

    //for ranking
    $table_heads['ranking']='ranking';
    $data['ranking']['normal']=$data['ranking']['replica']='';
    if(isset($harvest_compile[$variety['id']]['ranking']))
    {
        $data['ranking']['normal']=$data['ranking']['replica']=$harvest_compile[$variety['id']]['ranking'];
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