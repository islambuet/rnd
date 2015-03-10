<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$dir=$this->config->item('dir');
$image_height=100;
$tool_tip_position='left';
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//echo $max_15_days;
//echo "<pre>";
//print_r($fruit_type_name);
//echo "</pre>";
//echo "<pre>";
//print_r($fortnightly);
//echo "</pre>";

?>
<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="hidden-print">
            <tr>
                <th></th>
                <th></th>
                <?php
                if(($report_name==0)||($report_name==1))
                {
                    ?>
                    <th colspan="<?php echo $max_15_days; ?>" class="text-center"><?php echo 'Fortnightly Report'; ?></th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==2))
                {
                    $flowering_image_config=$this->config->item('flowering_image');
                    ?>
                    <th colspan="<?php echo sizeof($flowering_image_config); ?>" class="text-center"><?php echo 'Flowering Report'; ?></th>
                    <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==3))
                {
                    $fruit_image_config=$this->config->item('fruit_image');
                    ?>
                    <th colspan="<?php echo sizeof($fruit_image_config); ?>" class="text-center"><?php echo 'Fruit Report'; ?></th>
                <?php
                }
                ?>
                <?php
                if(($report_name==4))
                {
                    $harvest_cropwise_image_config=$this->config->item('harvest_cropwise_image');
                    ?>
                    <th colspan="<?php echo $max_harvest*sizeof($harvest_cropwise_image_config); ?>" class="text-center"><?php echo 'Harvest Report'; ?></th>

                <?php
                }
                ?>

            </tr>
            </thead>
            <tr style="font-weight: bold; font-size: 14px;">
                <td><?php echo $this->lang->line("SERIAL"); ?></td>
                <td><?php echo $this->lang->line("LABEL_RND_CODE"); ?></td>
                <?php
                if(($report_name==0)||($report_name==1))
                {
                    for($i=1;$i<=$max_15_days;$i++)
                    {
                        ?>
                        <td class="text-center"><?php echo $i*15; ?></td>
                        <?php
                    }
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==2))
                {
                    foreach($flowering_image_config as $key=>$text)
                    {
                        ?>
                        <td class="text-center"><?php echo $text; ?></td>

                        <?php
                    }
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==3))
                {
                    foreach($fruit_image_config as $key=>$text)
                    {
                        ?>
                        <td class="text-center"><?php echo sprintf($text,$fruit_type_name); ?></td>
                        <?php
                    }
                }
                ?>
                <?php
                if(($report_name==4))
                {
                    for($i=1;$i<=$max_harvest;$i++)
                    {
                        foreach($harvest_cropwise_image_config as $key=>$text)
                        {
                            ?>
                            <td class="text-center"><?php echo $text.'('.$i.')'; ?></td>
                            <?php
                        }
                    }
                }
                ?>


            </tr>
                <?php
                    $index=0;
                    foreach($varieties as $variety)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$index; ?></td>
                            <td><?php echo System_helper::get_rnd_code($variety); ?></td>
                            <?php
                            if(($report_name==0)||($report_name==1))
                            {
                                for($i=1;$i<=$max_15_days;$i++)
                                {
                                    $remarks=$this->lang->line('NOT_SET');
                                    $image_link='';
                                    if(isset($fortnightly[$variety['id']][$i*15]))
                                    {
                                        if(!empty($fortnightly[$variety['id']][$i*15]['remarks']))
                                        {
                                            $remarks=$fortnightly[$variety['id']][$i*15]['remarks'];
                                        }
                                        $images=json_decode($fortnightly[$variety['id']][$i*15]['images'],true);
                                        $image_link=base_url().$dir['15_days_image_data'].'/'.$images['normal'];


                                    }
                                    ?>
                                    <td>
                                        <div class="text-center" data-toggle="tooltip" data-placement="<?php echo $tool_tip_position;  ?>"  title="<?php echo $remarks; ?>">
                                            <?php
                                            if(!empty($image_link))
                                            {
                                                ?>
                                                <img src="<?php echo $image_link; ?>" height="<?php echo $image_height; ?>">
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if(($report_name==0)||($report_name==2))
                            {
                                foreach($flowering_image_config as $key=>$text)
                                {
                                    $remarks=$this->lang->line('NOT_SET');
                                    $image_link='';
                                    if(isset($flowering[$variety['id']][$key]))
                                    {
                                        if(!empty($flowering[$variety['id']][$key]['remarks']))
                                        {
                                            $remarks=$flowering[$variety['id']][$key]['remarks'];
                                        }
                                        $images=json_decode($flowering[$variety['id']][$key]['images'],true);
                                        $image_link=base_url().$dir['flowering_image_data'].'/'.$images['normal'];


                                    }
                                    ?>
                                    <td>
                                        <div class="text-center" data-toggle="tooltip" data-placement="<?php echo $tool_tip_position;  ?>"  title="<?php echo $remarks; ?>">
                                            <?php
                                            if(!empty($image_link))
                                            {
                                                ?>
                                                <img src="<?php echo $image_link; ?>" height="<?php echo $image_height; ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if(($report_name==0)||($report_name==3))
                            {
                                foreach($fruit_image_config as $key=>$text)
                                {
                                    $remarks=$this->lang->line('NOT_SET');
                                    $image_link='';
                                    if(isset($fruit[$variety['id']][$key]))
                                    {
                                        if(!empty($fruit[$variety['id']][$key]['remarks']))
                                        {
                                            $remarks=$fruit[$variety['id']][$key]['remarks'];
                                        }
                                        $images=json_decode($fruit[$variety['id']][$key]['images'],true);
                                        $image_link=base_url().$dir['fruit_image_data'].'/'.$images['normal'];


                                    }
                                    ?>
                                    <td>
                                        <div class="text-center" data-toggle="tooltip" data-placement="<?php echo $tool_tip_position;  ?>"  title="<?php echo $remarks; ?>">
                                            <?php
                                            if(!empty($image_link))
                                            {
                                                ?>
                                                <img src="<?php echo $image_link; ?>" height="<?php echo $image_height; ?>">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if(($report_name==4))
                            {
                                for($i=1;$i<=$max_harvest;$i++)
                                {
                                    $images_array=array();
                                    $remarks_array=array();
                                    if(isset($harvest[$variety['id']][$i]))
                                    {
                                        $harvest_info=$harvest[$variety['id']][$i];
                                        $images_array=json_decode($harvest[$variety['id']][$i]['images'],true);
                                        $remarks_array=json_decode($harvest[$variety['id']][$i]['remarks'],true);

                                    }
                                    foreach($harvest_cropwise_image_config as $key=>$text)
                                    {
                                        $remarks=$this->lang->line('NOT_SET');
                                        $image_link='';
                                        if(isset($remarks_array[$key]))
                                        {
                                            $remarks=$remarks_array[$key];
                                        }
                                        if(isset($images_array['normal'][$key]))
                                        {
                                            $image_link=base_url().$dir['harvest_cropwise_image_data'].'/'.$images_array['normal'][$key];
                                        }
                                        ?>
                                        <td>
                                            <div class="text-center" data-toggle="tooltip" data-placement="<?php echo $tool_tip_position;  ?>"  title="<?php echo $remarks; ?>">
                                                <?php
                                                if(!empty($image_link))
                                                {
                                                    ?>
                                                    <img src="<?php echo $image_link; ?>" height="<?php echo $image_height; ?>">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </tr>
                        <?php
                        if($variety['replica_status'])
                        {
                            ?>
                            <tr style="color: red;">
                                <td><?php echo ++$index; ?></td>
                                <td><?php echo System_helper::get_rnd_code($variety); ?></td>
                                <?php
                                if(($report_name==0)||($report_name==1))
                                {
                                    for($i=1;$i<=$max_15_days;$i++)
                                    {
                                        $remarks=$this->lang->line('NOT_SET');
                                        $image_link='';
                                        if(isset($fortnightly[$variety['id']][$i*15]))
                                        {
                                            if(!empty($fortnightly[$variety['id']][$i*15]['remarks']))
                                            {
                                                $remarks=$fortnightly[$variety['id']][$i*15]['remarks'];
                                            }
                                            $images=json_decode($fortnightly[$variety['id']][$i*15]['images'],true);
                                            $image_link=base_url().$dir['15_days_image_data'].'/'.$images['replica'];


                                        }
                                        ?>
                                        <td>
                                            <div class="text-center" data-toggle="tooltip" data-placement="<?php echo $tool_tip_position;  ?>"  title="<?php echo $remarks; ?>">
                                                <?php
                                                if(!empty($image_link))
                                                {
                                                    ?>
                                                    <img src="<?php echo $image_link; ?>" height="<?php echo $image_height; ?>">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                }
                                ?>
                                <?php
                                if(($report_name==0)||($report_name==2))
                                {
                                    foreach($flowering_image_config as $key=>$text)
                                    {
                                        $remarks=$this->lang->line('NOT_SET');
                                        $image_link='';
                                        if(isset($flowering[$variety['id']][$key]))
                                        {
                                            if(!empty($flowering[$variety['id']][$key]['remarks']))
                                            {
                                                $remarks=$flowering[$variety['id']][$key]['remarks'];
                                            }
                                            $images=json_decode($flowering[$variety['id']][$key]['images'],true);
                                            $image_link=base_url().$dir['flowering_image_data'].'/'.$images['replica'];


                                        }
                                        ?>
                                        <td>
                                            <div class="text-center" data-toggle="tooltip" data-placement="<?php echo $tool_tip_position;  ?>"  title="<?php echo $remarks; ?>">
                                                <?php
                                                if(!empty($image_link))
                                                {
                                                    ?>
                                                    <img src="<?php echo $image_link; ?>" height="<?php echo $image_height; ?>">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                }
                                ?>
                                <?php
                                if(($report_name==0)||($report_name==3))
                                {
                                    foreach($fruit_image_config as $key=>$text)
                                    {
                                        $remarks=$this->lang->line('NOT_SET');
                                        $image_link='';
                                        if(isset($fruit[$variety['id']][$key]))
                                        {
                                            if(!empty($fruit[$variety['id']][$key]['remarks']))
                                            {
                                                $remarks=$fruit[$variety['id']][$key]['remarks'];
                                            }
                                            $images=json_decode($fruit[$variety['id']][$key]['images'],true);
                                            $image_link=base_url().$dir['fruit_image_data'].'/'.$images['replica'];


                                        }
                                        ?>
                                        <td>
                                            <div class="text-center" data-toggle="tooltip" data-placement="<?php echo $tool_tip_position;  ?>"  title="<?php echo $remarks; ?>">
                                                <?php
                                                if(!empty($image_link))
                                                {
                                                    ?>
                                                    <img src="<?php echo $image_link; ?>" height="<?php echo $image_height; ?>">
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    <?php
                                    }
                                }
                                ?>
                                <?php
                                if(($report_name==4))
                                {
                                    for($i=1;$i<=$max_harvest;$i++)
                                    {
                                        $images_array=array();
                                        $remarks_array=array();
                                        if(isset($harvest[$variety['id']][$i]))
                                        {
                                            $harvest_info=$harvest[$variety['id']][$i];
                                            $images_array=json_decode($harvest[$variety['id']][$i]['images'],true);
                                            $remarks_array=json_decode($harvest[$variety['id']][$i]['remarks'],true);

                                        }
                                        foreach($harvest_cropwise_image_config as $key=>$text)
                                        {
                                            $remarks=$this->lang->line('NOT_SET');
                                            $image_link='';
                                            if(isset($remarks_array[$key]))
                                            {
                                                $remarks=$remarks_array[$key];
                                            }
                                            if(isset($images_array['replica'][$key]))
                                            {
                                                $image_link=base_url().$dir['harvest_cropwise_image_data'].'/'.$images_array['replica'][$key];
                                            }
                                            ?>
                                            <td>
                                                <div class="text-center" data-toggle="tooltip" data-placement="<?php echo $tool_tip_position;  ?>"  title="<?php echo $remarks; ?>">
                                                    <?php
                                                    if(!empty($image_link))
                                                    {
                                                        ?>
                                                        <img src="<?php echo $image_link; ?>" height="<?php echo $image_height; ?>">
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        <?php
                                        }
                                    }
                                }
                                ?>

                            </tr>
                            <?php
                        }
                    }
                ?>
            <tbody>
            </tbody>
        </table>

    </div>
</div>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $('[data-toggle="tooltip"]').tooltip();

    });
</script>