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
    $fruit_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_colour']))
    {
        $fruit_colour_replica=$info['replica']['fruit_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_colour]">
                <?php foreach($this->config->item('fruit_colour_'.$crop_id) as $val=>$name){?>
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
                    <?php foreach($this->config->item('fruit_colour_'.$crop_id) as $val=>$name){?>
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

<?php
if($options['fruit_colour_evaluation']==1)
{
    $fruit_colour_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_colour_evaluation']))
    {
        $fruit_colour_evaluation_normal=$info['normal']['fruit_colour_evaluation'];
    }
    $fruit_colour_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_colour_evaluation']))
    {
        $fruit_colour_evaluation_replica=$info['replica']['fruit_colour_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_colour_evaluation]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_colour_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_colour_evaluation]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_colour_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_colour_evaluation]" value="<?php echo $fruit_colour_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_weight']==1)
{
    $fruit_weight_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_weight']))
    {
        $fruit_weight_normal=$info['normal']['fruit_weight'];
    }
    $fruit_weight_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_weight']))
    {
        $fruit_weight_replica=$info['replica']['fruit_weight'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_WEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[fruit_weight]" class="form-control" value=""/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[fruit_weight]" class="form-control" value=""/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_weight]" value="" />
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_weight_evaluation']==1)
{
    $fruit_weight_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_weight_evaluation']))
    {
        $fruit_weight_evaluation_normal=$info['normal']['fruit_weight_evaluation'];
    }
    $fruit_weight_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_weight_evaluation']))
    {
        $fruit_weight_evaluation_replica=$info['replica']['fruit_weight_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_weight_evaluation]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_weight_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_weight_evaluation]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_weight_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_weight_evaluation]" value="<?php echo $fruit_weight_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_diameter']==1)
{
    $fruit_diameter_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_diameter']))
    {
        $fruit_diameter_normal=$info['normal']['fruit_diameter'];
    }
    $fruit_diameter_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_diameter']))
    {
        $fruit_diameter_replica=$info['replica']['fruit_diameter'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_DIAMETER');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[fruit_diameter]" value="<?php echo $fruit_diameter_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[fruit_diameter]" value="<?php echo $fruit_diameter_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_diameter]" value="<?php echo $fruit_diameter_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_diameter_evaluation']==1)
{
    $fruit_diameter_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_diameter_evaluation']))
    {
        $fruit_diameter_evaluation_normal=$info['normal']['fruit_diameter_evaluation'];
    }
    $fruit_diameter_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_diameter_evaluation']))
    {
        $fruit_diameter_evaluation_replica=$info['replica']['fruit_diameter_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_diameter_evaluation]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_weight_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_diameter_evaluation]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_weight_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_diameter_evaluation]" value="<?php echo $fruit_weight_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_height']==1)
{
    $fruit_height_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_height']))
    {
        $fruit_height_normal=$info['normal']['fruit_height'];
    }
    $fruit_height_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_height']))
    {
        $fruit_height_replica=$info['replica']['fruit_height'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[fruit_height]" value="<?php echo $fruit_height_replica;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[fruit_height]" value="<?php echo $fruit_height_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_height]" value="<?php echo $fruit_height_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_height_evaluation']==1)
{
    $fruit_height_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_height_evaluation']))
    {
        $fruit_height_evaluation_normal=$info['normal']['fruit_height_evaluation'];
    }
    $fruit_height_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_height_evaluation']))
    {
        $fruit_height_evaluation_replica=$info['replica']['fruit_height_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_height_evaluation]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_height_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_height_evaluation]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_height_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_height_evaluation]" value="<?php echo $fruit_height_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_firmness']==1)
{
    $fruit_firmness_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_firmness']))
    {
        $fruit_firmness_normal=$info['normal']['fruit_firmness'];
    }
    $fruit_firmness_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_firmness']))
    {
        $fruit_firmness_replica=$info['replica']['fruit_firmness'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_FIRMNESS');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_firmness]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_firmness_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_firmness]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_firmness_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_firmness]" value="<?php echo $fruit_firmness_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_taste']==1)
{
    $fruit_taste_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_taste']))
    {
        $fruit_taste_normal=$info['normal']['fruit_taste'];
    }
    $fruit_taste_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_taste']))
    {
        $fruit_taste_replica=$info['replica']['fruit_taste'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_TASTE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_taste]">
                <?php foreach($this->config->item('fruit_taste') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_taste_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_taste]">
                    <?php foreach($this->config->item('fruit_taste') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_taste_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_taste]" value="<?php echo $fruit_taste_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_type']==1)
{
    $fruit_type_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_type']))
    {
        $fruit_type_normal=$info['normal']['fruit_type'];
    }
    $fruit_type_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_type']))
    {
        $fruit_type_replica=$info['replica']['fruit_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_type]">
                <?php foreach($this->config->item('fruit_type') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_type_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_type]">
                    <?php foreach($this->config->item('fruit_type') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_type_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_type]" value="<?php echo $fruit_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_type_evaluation']==1)
{
    $fruit_type_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_type_evaluation']))
    {
        $fruit_type_evaluation_normal=$info['normal']['fruit_type_evaluation'];
    }
    $fruit_type_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_type_evaluation']))
    {
        $fruit_type_evaluation_replica=$info['replica']['fruit_type_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_type_evaluation]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_type_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_type_evaluation]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_type_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_type_evaluation]" value="<?php echo $fruit_type_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_bearing_type']==1)
{
    $fruit_bearing_type_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_bearing_type']))
    {
        $fruit_bearing_type_normal=$info['normal']['fruit_bearing_type'];
    }
    $fruit_bearing_type_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_bearing_type']))
    {
        $fruit_bearing_type_replica=$info['replica']['fruit_bearing_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_BEARING_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_bearing_type]">
                <?php foreach($this->config->item('fruit_bearing_type') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_bearing_type_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_bearing_type]">
                    <?php foreach($this->config->item('fruit_bearing_type') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_bearing_type_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_bearing_type]" value="<?php echo $fruit_bearing_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_bearing_type_evaluation']==1)
{
    $fruit_bearing_type_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_bearing_type_evaluation']))
    {
        $fruit_bearing_type_evaluation_normal=$info['normal']['fruit_bearing_type_evaluation'];
    }
    $fruit_bearing_type_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_bearing_type_evaluation']))
    {
        $fruit_bearing_type_evaluation_replica=$info['replica']['fruit_bearing_type_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_bearing_type_evaluation]">
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_bearing_type_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_bearing_type_evaluation]">
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_bearing_type_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_bearing_type_evaluation]" value="<?php echo $fruit_bearing_type_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>













