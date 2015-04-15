<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$variety_types=$this->config->item('variety_type');
$dir=$this->config->item('dir');
$image_height=100;
$tool_tip_position='left';
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//return;
//echo "<pre>";
//print_r($fruit);
//echo "</pre>";
//return;


?>
<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="hidden-print">
            <tr>
                <th><?php echo $this->lang->line("SL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_YEAR"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRINCIPAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                <?php
                    for($i=1;$i<=$max_15_days;$i++)
                    {
                        ?>
                        <th class="text-center"><?php echo $i*15; ?></th>
                    <?php
                    }
                    foreach($this->config->item('fruit_image') as $key=>$text)
                    {
                        ?>
                        <td class="text-center"><?php echo $text; ?></td>
                    <?php
                    }
                ?>

                <th style="min-width: 200px;"><?php echo $this->lang->line("LABEL_FORTH_NIGHTLY_REMARK"); ?></th>
                <th style="min-width: 200px;"><?php echo $this->lang->line("LABEL_FRUIT_REMARK"); ?></th>
                <th style="min-width: 200px;"><?php echo $this->lang->line("LABEL_YIELD_REMARK"); ?></th>
                <th style="min-width: 200px;"><?php echo $this->lang->line("LABEL_FINAL_REMARK"); ?></th>
                <th style="min-width: 200px;"><?php echo $this->lang->line("LABEL_PRINCIPAL_REMARK"); ?></th>
            </tr>
            </thead>
            <tbody>
                <?php
                if(sizeof($varieties)>0)
                {
                    $i=0;
                    foreach($varieties as $variety)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$i;?></td>
                            <td><?php echo $variety['year'];?></td>
                            <td>
                                <?php
                                if($variety['variety_type']==3)//CKO
                                {
                                    echo $variety['comp_name'];

                                }
                                elseif($variety['variety_type']==2)//CKA
                                {
                                    echo $variety_types[2];
                                }
                                elseif($variety['variety_type']==1)//PRINCIPAL
                                {

                                    echo $variety['principal_name'];
                                }
                                ?>
                            </td>
                            <td><?php echo $variety['season_name'];?></td>
                            <td><?php echo $variety['crop_name'];?></td>
                            <td><?php echo $variety['type_name'];?></td>
                            <td><?php echo $variety['variety_name'];?></td>
                            <td><?php echo System_helper::get_rnd_code($variety);?></td>
                            <?php
                            for($i=1;$i<=$max_15_days;$i++)
                            {
                                $remarks=$this->lang->line('NOT_SET');
                                $image_link='';
                                if(isset($fortnightly[$variety['id']][$variety['season_id']][$i*15]))
                                {
                                    if(!empty($fortnightly[$variety['id']][$variety['season_id']][$i*15]['remarks']))
                                    {
                                        $remarks=$fortnightly[$variety['id']][$variety['season_id']][$i*15]['remarks'];
                                    }
                                    $images=json_decode($fortnightly[$variety['id']][$variety['season_id']][$i*15]['images'],true);
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
                            foreach($this->config->item('fruit_image') as $key=>$text)
                            {
                                $remarks=$this->lang->line('NOT_SET');
                                $image_link='';
                                if(isset($fruit[$variety['id']][$variety['season_id']][$key]))
                                {
                                    if(!empty($fruit[$variety['id']][$variety['season_id']][$key]['remarks']))
                                    {
                                        $remarks=$fruit[$variety['id']][$variety['season_id']][$key]['remarks'];
                                    }
                                    $images=json_decode($fruit[$variety['id']][$variety['season_id']][$key]['images'],true);
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
                            ?>
                            <td><?php echo $variety['forth_nightly_remark'];?></td>
                            <td><?php echo $variety['fruit_remark'];?></td>
                            <td><?php echo $variety['yield_remark'];?></td>
                            <td><?php echo $variety['final_remark'];?></td>
                            <td><?php echo $variety['principal_remark'];?></td>

                        </tr>
                        <?php
                    }

                }
                else
                {
                    ?>
                    <tr>
                        <td colspan="20" class="text-center alert-danger">
                            <?php echo $this->lang->line("NO_DATA_FOUND"); ?>
                        </td>
                    </tr>
                <?php
                }
                ?>


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