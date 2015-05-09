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
$fruit_type_name='curd';
$current_crop_id=0;
$fruit_types=$this->config->item('fruit_type');
if(sizeof($varieties)>0)
{
    $current_crop_id=$varieties[0]['crop_id'];
    $fruit_type = Query_helper::get_info("rnd_crop","fruit_type",array('id = '.$current_crop_id),1);
    $fruit_type_name=$fruit_types[$fruit_type['fruit_type']];
}


?>
<body style="background: linear-gradient(#FAFAFA , #ECECEC);">
    <div align="center;" style="width: 400px;margin: 0 auto;font-size: 5px;">
        <div>
            <img style="float: left;" alt="Logo" height="40" src="<?php echo base_url(); ?>images/logo.png">
            <h2 style="color: #008003;display: inline-block;margin-left: 10px;">A.R MALIK & Co. (PVT) LTD</h2>
        </div>
        <div>
            <span style="font-weight: bold;">Principal Name:</span>
            <span style=""><?php echo $principal_name; ?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Principal Name:</span>
            <span style=""><?php echo $year; ?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Principal Name:</span>
            <span style=""><?php echo $season_name; ?></span>
        </div>
        <div>
            <span style="font-weight: bold;">Crop Name:</span>
            <span style=""><?php echo $crop_name; ?></span>
        </div>
        <?php
            if($type_name)
            {
                ?>
                <div>
                    <span style="font-weight: bold;">Crop Type Name:</span>
                    <span style=""><?php echo $type_name; ?></span>
                </div>
                <?php
            }
        ?>
    </div>
    <table>
        <tr style="background-color: lightgray;">
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("SL"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_YEAR"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_PRINCIPAL"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_SEASON"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_RND_CODE"); ?></td>
            <?php
            for($i=1;$i<=$max_15_days;$i++)
            {
                ?>
                <td style="border: 1px solid #000000;font-weight: bold;" class="text-center"><?php echo $i*15; ?></td>
            <?php
            }
            $fruit_type = Query_helper::get_info("rnd_crop","fruit_type",array('id = '.$current_crop_id),1);
            $fruit_type_name=$fruit_types[$fruit_type['fruit_type']];
            foreach($this->config->item('fruit_image') as $key=>$text)
            {
                ?>
                <td style="border: 1px solid #000000;font-weight: bold;" class="text-center"><?php echo sprintf($text,$fruit_type_name); ?></td>
            <?php
            }
            ?>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_FORTH_NIGHTLY_REMARK"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_FRUIT_REMARK"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_YIELD_REMARK"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_FINAL_REMARK"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_RANKING"); ?></td>
            <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_PRINCIPAL_REMARK"); ?></td>
        </tr>
        <?php
        if(sizeof($varieties)>0)
        {
            $index=0;
            foreach($varieties as $variety)
            {
                if($variety['crop_id']!=$current_crop_id)
                {
                    $current_crop_id=$variety['crop_id'];
                    $index=0;
                    ?>
                    <tr style="background-color: lightgray;">
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("SL"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_YEAR"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_PRINCIPAL"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_SEASON"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_RND_CODE"); ?></td>
                        <?php
                        for($i=1;$i<=$max_15_days;$i++)
                        {
                            ?>
                            <td style="border: 1px solid #000000;font-weight: bold;" class="text-center"><?php echo $i*15; ?></td>
                        <?php
                        }
                        $fruit_type = Query_helper::get_info("rnd_crop","fruit_type",array('id = '.$current_crop_id),1);
                        $fruit_type_name=$fruit_types[$fruit_type['fruit_type']];
                        foreach($this->config->item('fruit_image') as $key=>$text)
                        {
                            ?>
                            <td style="border: 1px solid #000000;font-weight: bold;" class="text-center"><?php echo sprintf($text,$fruit_type_name); ?></td>
                        <?php
                        }
                        ?>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_FORTH_NIGHTLY_REMARK"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_FRUIT_REMARK"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_YIELD_REMARK"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_FINAL_REMARK"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_RANKING"); ?></td>
                        <td style="border: 1px solid #000000;font-weight: bold;"><?php echo $this->lang->line("LABEL_PRINCIPAL_REMARK"); ?></td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td style="border: 1px solid #000000"><?php echo ++$index;?></td>
                    <td style="border: 1px solid #000000"><?php echo $variety['year'];?></td>
                    <td style="border: 1px solid #000000">
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
                    <td style="border: 1px solid #000000"><?php echo $variety['season_name'];?></td>
                    <td style="border: 1px solid #000000"><?php echo $variety['crop_name'];?></td>
                    <td style="border: 1px solid #000000"><?php echo $variety['type_name'];?></td>
                    <td style="border: 1px solid #000000"><?php echo $variety['variety_name'];?></td>
                    <td style="border: 1px solid #000000"><?php echo System_helper::get_rnd_code($variety);?></td>
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
                        <td style="border: 1px solid #000000">
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
                        <td style="border: 1px solid #000000">
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
                    <td style="border: 1px solid #000000;width: 200px;"><?php echo $variety['forth_nightly_remark'];?></td>
                    <td style="border: 1px solid #000000;width: 200px;"><?php echo $variety['fruit_remark'];?></td>
                    <td style="border: 1px solid #000000;width: 200px;"><?php echo $variety['yield_remark'];?></td>
                    <td style="border: 1px solid #000000;width: 200px;"><?php echo $variety['final_remark'];?></td>
                    <td style="border: 1px solid #000000;"><?php echo $variety['ranking'];?></td>
                    <td style="border: 1px solid #000000;width: 200px;"><?php echo $variety['principal_remark'];?></td>

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
    </table>
</body>