<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//echo "<pre>";
//print_r($variety_info);
//echo "</pre>";
////echo "<pre>";
////print_r($options);
////echo "</pre>";
$info=json_decode($variety_info['info'],true);
//
//echo "<pre>";
//print_r($info);
//echo "</pre>";
?>
<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<input type="hidden" name="data_text_id" value="<?php echo $variety_info['data_text_id'];?>">
<?php
if($variety_info['replica_status']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-3">
            <label class="form-control btn-primary"><?php echo $this->lang->line('LABEL_NORMAL');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control btn-danger"><?php echo $this->lang->line('LABEL_REPLICA');?></label>
        </div>
        </di
    </div>
<?php
}
?>


<?php
if($options['fruit_size']==1)
{
    $fruit_size_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_size']))
    {
        $fruit_size_normal=$info['normal']['fruit_size'];
    }
    $fruit_size_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_size']))
    {
        $fruit_size_replica=$info['replica']['fruit_size'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_SIZE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_size]">
                <?php foreach($this->config->item('fruit_size') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_size_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_size]">
                    <?php foreach($this->config->item('fruit_size') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_size_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_size]" value="<?php echo $fruit_size_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_size_evaluation']==1)
{
    $fruit_size_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_size_evaluation']))
    {
        $fruit_size_evaluation_normal=$info['normal']['fruit_size_evaluation'];
    }
    $fruit_size_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_size_evaluation']))
    {
        $fruit_size_evaluation_replica=$info['replica']['fruit_size_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_size_evaluation]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_size_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_size_evaluation]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_size_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_size_evaluation]" value="<?php echo $fruit_size_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_shape']==1)
{
    $fruit_shape_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_shape']))
    {
        $fruit_shape_normal=$info['normal']['fruit_shape'];
    }
    $fruit_shape_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_shape']))
    {
        $fruit_shape_replica=$info['replica']['fruit_shape'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_shape]">
                <?php foreach($this->config->item('fruit_shape_'.$crop_id) as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_shape_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_shape]">
                    <?php foreach($this->config->item('fruit_shape_'.$crop_id) as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_shape_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_shape]" value="<?php echo $fruit_shape_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_shape_evaluation']==1)
{
    $fruit_shape_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_shape_evaluation']))
    {
        $fruit_shape_evaluation_normal=$info['normal']['fruit_shape_evaluation'];
    }
    $fruit_shape_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_shape_evaluation']))
    {
        $fruit_shape_evaluation_replica=$info['replica']['fruit_shape_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_shape_evaluation]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_shape_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_shape_evaluation]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_shape_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_shape_evaluation]" value="<?php echo $fruit_shape_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_colour']==1)
{
    $fruit_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_colour']))
    {
        $fruit_colour_normal=$info['normal']['fruit_colour'];
    }
    $$fruit_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_colour']))
    {
        $fruit_colour_replica=$info['replica']['fruit_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_colour]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_colour_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_colour]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_colour_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_colour]" value="<?php echo $fruit_colour_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>













