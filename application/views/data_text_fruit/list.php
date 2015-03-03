<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$info=json_decode($variety_info['info'],true);
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
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_fruit_size') as $val=>$name){?>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_fruit_size') as $val=>$name){?>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_SIZE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_size_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_fruit_shape_'.$crop_id) as $val=>$name){?>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_fruit_shape_'.$crop_id) as $val=>$name){?>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_SHAPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_shape_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_fruit_colour_'.$crop_id) as $val=>$name){?>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_fruit_colour_'.$crop_id) as $val=>$name){?>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_colour_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
            <input type="text" name="normal[fruit_weight]" class="form-control" value="<?php echo $fruit_weight_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[fruit_weight]" class="form-control" value="<?php echo $fruit_weight_replica;?>"/>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_WEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_weight_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_DIAMETER_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_diameter_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
            <input type="text" class="form-control" name="normal[fruit_height]" value="<?php echo $fruit_height_normal;?>" />
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_HEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_height_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_fruit_taste') as $val=>$name){?>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_fruit_taste') as $val=>$name){?>
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
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_fruit_type') as $val=>$name){?>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_fruit_type') as $val=>$name){?>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_TYPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_type_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_fruit_bearing_type') as $val=>$name){?>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_fruit_bearing_type') as $val=>$name){?>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_BEARING_TYPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_bearing_type_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_bearing_type_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
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

<?php
if($options['curd_type']==1)
{
    $curd_type_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_type']))
    {
        $curd_type_normal=$info['normal']['curd_type'];
    }
    $curd_type_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_type']))
    {
        $curd_type_replica=$info['replica']['curd_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_type]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_curd_type') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_type_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_type]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_curd_type') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_type_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_type]" value="<?php echo $curd_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_type_evaluation']==1)
{
    $curd_type_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_type_evaluation']))
    {
        $curd_type_evaluation_normal=$info['normal']['curd_type_evaluation'];
    }
    $curd_type_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_type_evaluation']))
    {
        $curd_type_evaluation_replica=$info['replica']['curd_type_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_TYPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_type_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_type_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_type_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_type_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_type_evaluation]" value="<?php echo $curd_type_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_colour']==1)
{
    $curd_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_colour']))
    {
        $curd_colour_normal=$info['normal']['curd_colour'];
    }
    $curd_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_colour']))
    {
        $curd_colour_replica=$info['replica']['curd_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_colour]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_curd_colour_'.$crop_id) as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_colour_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_colour]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_curd_colour_'.$crop_id) as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_colour_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_colour]" value="<?php echo $curd_colour_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_colour_evaluation']==1)
{
    $curd_colour_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_colour_evaluation']))
    {
        $curd_colour_evaluation_normal=$info['normal']['curd_colour_evaluation'];
    }
    $curd_colour_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_colour_evaluation']))
    {
        $curd_colour_evaluation_replica=$info['replica']['curd_colour_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_colour_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_colour_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_colour_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_colour_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_colour_evaluation]" value="<?php echo $curd_colour_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_weight']==1)
{
    $curd_weight_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_weight']))
    {
        $curd_weight_normal=$info['normal']['curd_weight'];
    }
    $curd_weight_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_weight']))
    {
        $curd_weight_replica=$info['replica']['curd_weight'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_WEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[curd_weight]" class="form-control" value="<?php echo $curd_weight_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[curd_weight]" class="form-control" value="<?php echo $curd_weight_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_weight]" value="<?php echo $curd_weight_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_weight_evaluation']==1)
{
    $curd_weight_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_weight_evaluation']))
    {
        $curd_weight_evaluation_normal=$info['normal']['curd_weight_evaluation'];
    }
    $curd_weight_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_weight_evaluation']))
    {
        $curd_weight_evaluation_replica=$info['replica']['curd_weight_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_WEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_weight_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_weight_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_weight_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_weight_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_weight_evaluation]" value="<?php echo $curd_weight_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_diameter']==1)
{
    $curd_diameter_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_diameter']))
    {
        $curd_diameter_normal=$info['normal']['curd_diameter'];
    }
    $curd_diameter_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_diameter']))
    {
        $curd_diameter_replica=$info['replica']['curd_diameter'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_DIAMETER');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[curd_diameter]" class="form-control" value="<?php echo $curd_diameter_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[curd_diameter]" class="form-control" value="<?php echo $curd_diameter_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_diameter]" value="<?php echo $curd_diameter_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_diameter_evaluation']==1)
{
    $curd_diameter_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_diameter_evaluation']))
    {
        $curd_diameter_evaluation_normal=$info['normal']['curd_diameter_evaluation'];
    }
    $curd_diameter_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_diameter_evaluation']))
    {
        $curd_diameter_evaluation_replica=$info['replica']['curd_diameter_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_DIAMETER_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_diameter_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_diameter_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_diameter_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_diameter_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_diameter_evaluation]" value="<?php echo $curd_diameter_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_height']==1)
{
    $curd_height_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_height']))
    {
        $curd_height_normal=$info['normal']['curd_height'];
    }
    $curd_height_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_height']))
    {
        $curd_height_replica=$info['replica']['curd_height'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[curd_height]" class="form-control" value="<?php echo $curd_height_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[curd_height]" class="form-control" value="<?php echo $curd_height_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_height]" value="<?php echo $curd_height_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_height_evaluation']==1)
{
    $curd_height_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_height_evaluation']))
    {
        $curd_height_evaluation_normal=$info['normal']['curd_height_evaluation'];
    }
    $curd_height_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_height_evaluation']))
    {
        $curd_height_evaluation_replica=$info['replica']['curd_height_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_HEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_height_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_height_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_height_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_height_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_height_evaluation]" value="<?php echo $curd_height_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_compactness']==1)
{
    $curd_compactness_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_compactness']))
    {
        $curd_compactness_normal=$info['normal']['curd_compactness'];
    }
    $curd_compactness_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_compactness']))
    {
        $curd_compactness_replica=$info['replica']['curd_compactness'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_COMPACTNESS');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_compactness]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_compactness_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_compactness]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_compactness_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_compactness]" value="<?php echo $curd_compactness_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_type']==1)
{
    $head_type_normal="";
    if(is_array($info)&& !empty($info['normal']['head_type']))
    {
        $head_type_normal=$info['normal']['head_type'];
    }
    $head_type_replica="";
    if(is_array($info)&& !empty($info['replica']['head_type']))
    {
        $head_type_replica=$info['replica']['head_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_type]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_head_type') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_type_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_type]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_head_type') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_type_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_type]" value="<?php echo $head_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_type_evaluation']==1)
{
    $head_type_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['head_type_evaluation']))
    {
        $head_type_evaluation_normal=$info['normal']['head_type_evaluation'];
    }
    $head_type_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['head_type_evaluation']))
    {
        $head_type_evaluation_replica=$info['replica']['head_type_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_TYPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_type_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_type_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_type_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_type_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_type_evaluation]" value="<?php echo $head_type_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_colour']==1)
{
    $head_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['head_colour']))
    {
        $head_colour_normal=$info['normal']['head_colour'];
    }
    $head_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['head_colour']))
    {
        $head_colour_replica=$info['replica']['head_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_colour]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_head_colour') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_colour_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_colour]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_head_colour') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_colour_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_colour]" value="<?php echo $head_colour_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_colour_evaluation']==1)
{
    $head_colour_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['head_colour_evaluation']))
    {
        $head_colour_evaluation_normal=$info['normal']['head_colour_evaluation'];
    }
    $head_colour_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['head_colour_evaluation']))
    {
        $head_colour_evaluation_replica=$info['replica']['head_colour_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_colour_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_colour_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_colour_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_colour_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_colour_evaluation]" value="<?php echo $head_colour_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_weight']==1)
{
    $head_weight_normal="";
    if(is_array($info)&& !empty($info['normal']['head_weight']))
    {
        $head_weight_normal=$info['normal']['head_weight'];
    }
    $head_weight_replica="";
    if(is_array($info)&& !empty($info['replica']['head_weight']))
    {
        $head_weight_replica=$info['replica']['head_weight'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_WEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[head_weight]" class="form-control" value="<?php echo $head_weight_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[head_weight]" class="form-control" value="<?php echo $head_weight_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_weight]" value="<?php echo $head_weight_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_weight_evaluation']==1)
{
    $head_weight_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['head_weight_evaluation']))
    {
        $head_weight_evaluation_normal=$info['normal']['head_weight_evaluation'];
    }
    $head_weight_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['head_weight_evaluation']))
    {
        $head_weight_evaluation_replica=$info['replica']['head_weight_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_WEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_weight_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_weight_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_weight_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_weight_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_weight_evaluation]" value="<?php echo $head_weight_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_diameter']==1)
{
    $head_diameter_normal="";
    if(is_array($info)&& !empty($info['normal']['head_diameter']))
    {
        $head_diameter_normal=$info['normal']['head_diameter'];
    }
    $head_diameter_replica="";
    if(is_array($info)&& !empty($info['replica']['head_diameter']))
    {
        $head_diameter_replica=$info['replica']['head_diameter'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_DIAMETER');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[head_diameter]" class="form-control" value="<?php echo $head_diameter_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[head_diameter]" class="form-control" value="<?php echo $head_diameter_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_diameter]" value="<?php echo $head_diameter_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_diameter_evaluation']==1)
{
    $head_diameter_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['head_diameter_evaluation']))
    {
        $head_diameter_evaluation_normal=$info['normal']['head_diameter_evaluation'];
    }
    $head_diameter_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['head_diameter_evaluation']))
    {
        $head_diameter_evaluation_replica=$info['replica']['head_diameter_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_DIAMETER_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_diameter_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_diameter_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_diameter_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_diameter_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_diameter_evaluation]" value="<?php echo $head_diameter_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_height']==1)
{
    $head_height_normal="";
    if(is_array($info)&& !empty($info['normal']['head_height']))
    {
        $head_height_normal=$info['normal']['head_height'];
    }
    $head_height_replica="";
    if(is_array($info)&& !empty($info['replica']['head_height']))
    {
        $head_height_replica=$info['replica']['head_height'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[head_height]" class="form-control" value="<?php echo $head_height_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[head_height]" class="form-control" value="<?php echo $head_height_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_height]" value="<?php echo $head_height_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_height_evaluation']==1)
{
    $head_height_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['head_height_evaluation']))
    {
        $head_height_evaluation_normal=$info['normal']['head_height_evaluation'];
    }
    $head_height_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['head_height_evaluation']))
    {
        $head_height_evaluation_replica=$info['replica']['head_height_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_HEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_height_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_height_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_height_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_height_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_height_evaluation]" value="<?php echo $head_height_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['targeted_weight']==1)
{

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TARGETED_WEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $targeted_weight;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $targeted_weight;?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['targeted_height']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TARGETED_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $targeted_height;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $targeted_height;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['head_compactness']==1)
{
    $head_compactness_normal="";
    if(is_array($info)&& !empty($info['normal']['head_compactness']))
    {
        $head_compactness_normal=$info['normal']['head_compactness'];
    }
    $head_compactness_replica="";
    if(is_array($info)&& !empty($info['replica']['head_compactness']))
    {
        $head_compactness_replica=$info['replica']['head_compactness'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_COMPACTNESS');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_compactness]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_compactness_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_compactness]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_compactness_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_compactness]" value="<?php echo $head_compactness_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['leaf_length']==1)
{
    $leaf_length_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_length']))
    {
        $leaf_length_normal=$info['normal']['leaf_length'];
    }
    $leaf_length_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_length']))
    {
        $leaf_length_replica=$info['replica']['leaf_length'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_LENGTH');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[leaf_length]" class="form-control" value="<?php echo $leaf_length_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[leaf_length]" class="form-control" value="<?php echo $leaf_length_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_length]" value="<?php echo $leaf_length_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['leaf_length_evaluation']==1)
{
    $leaf_length_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_length_evaluation']))
    {
        $leaf_length_evaluation_normal=$info['normal']['leaf_length_evaluation'];
    }
    $leaf_length_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_length_evaluation']))
    {
        $leaf_length_evaluation_replica=$info['replica']['leaf_length_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_LENGTH_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_length_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_length_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_length_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$leaf_length_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_length_evaluation]" value="<?php echo $leaf_length_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['leaf_type']==1)
{
    $leaf_type_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_type']))
    {
        $leaf_type_normal=$info['normal']['leaf_type'];
    }
    $leaf_type_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_type']))
    {
        $leaf_type_replica=$info['replica']['leaf_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_type]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_leaf_type') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_type_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_type]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_leaf_type') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$leaf_type_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_type]" value="<?php echo $leaf_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['leaf_type_evaluation']==1)
{
    $leaf_type_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_type_evaluation']))
    {
        $leaf_type_evaluation_normal=$info['normal']['leaf_type_evaluation'];
    }
    $leaf_type_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_type_evaluation']))
    {
        $leaf_type_evaluation_replica=$info['replica']['leaf_type_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_TYPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_type_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_type_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_type_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$leaf_type_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_type_evaluation]" value="<?php echo $leaf_type_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['leaf_colour']==1)
{
    $leaf_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_colour']))
    {
        $leaf_colour_normal=$info['normal']['leaf_colour'];
    }
    $leaf_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_colour']))
    {
        $leaf_colour_replica=$info['replica']['leaf_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_colour]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_leaf_colour') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_colour_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_colour]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_leaf_colour') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$leaf_colour_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_colour]" value="<?php echo $leaf_colour_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['leaf_colour_evaluation']==1)
{
    $leaf_colour_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_colour_evaluation']))
    {
        $leaf_colour_evaluation_normal=$info['normal']['leaf_colour_evaluation'];
    }
    $leaf_colour_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_colour_evaluation']))
    {
        $leaf_colour_evaluation_replica=$info['replica']['leaf_colour_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_colour_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_colour_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_colour_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$leaf_colour_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_colour_evaluation]" value="<?php echo $leaf_colour_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_above_ground']==1)
{
    $root_above_ground_normal="";
    if(is_array($info)&& !empty($info['normal']['root_above_ground']))
    {
        $root_above_ground_normal=$info['normal']['root_above_ground'];
    }
    $root_above_ground_replica="";
    if(is_array($info)&& !empty($info['replica']['root_above_ground']))
    {
        $root_above_ground_replica=$info['replica']['root_above_ground'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_ABOVE_GROUND');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[root_above_ground]" class="form-control" value="<?php echo $root_above_ground_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[root_above_ground]" class="form-control" value="<?php echo $root_above_ground_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_above_ground]" value="<?php echo $root_above_ground_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_above_ground_evaluation']==1)
{
    $root_above_ground_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['root_above_ground_evaluation']))
    {
        $root_above_ground_evaluation_normal=$info['normal']['root_above_ground_evaluation'];
    }
    $root_above_ground_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['root_above_ground_evaluation']))
    {
        $root_above_ground_evaluation_replica=$info['replica']['root_above_ground_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_ABOVE_GROUND_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_above_ground_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_above_ground_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_above_ground_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_above_ground_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_above_ground_evaluation]" value="<?php echo $root_above_ground_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_colour']==1)
{
    $root_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['root_colour']))
    {
        $root_colour_normal=$info['normal']['root_colour'];
    }
    $root_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['root_colour']))
    {
        $root_colour_replica=$info['replica']['root_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_colour]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_root_colour_'.$crop_id) as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_colour_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_colour]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_root_colour_'.$crop_id) as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_colour_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_colour]" value="<?php echo $root_colour_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_colour_evaluation']==1)
{
    $root_colour_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['root_colour_evaluation']))
    {
        $root_colour_evaluation_normal=$info['normal']['root_colour_evaluation'];
    }
    $root_colour_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['root_colour_evaluation']))
    {
        $root_colour_evaluation_replica=$info['replica']['root_colour_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_colour_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_colour_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_colour_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_colour_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_colour_evaluation]" value="<?php echo $root_colour_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_weight']==1)
{
    $root_weight_normal="";
    if(is_array($info)&& !empty($info['normal']['root_weight']))
    {
        $root_weight_normal=$info['normal']['root_weight'];
    }
    $root_weight_replica="";
    if(is_array($info)&& !empty($info['replica']['root_weight']))
    {
        $root_weight_replica=$info['replica']['root_weight'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_WEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[root_weight]" class="form-control" value="<?php echo $root_weight_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[root_weight]" class="form-control" value="<?php echo $root_weight_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_weight]" value="<?php echo $root_weight_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_weight_evaluation']==1)
{
    $root_weight_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['root_weight_evaluation']))
    {
        $root_weight_evaluation_normal=$info['normal']['root_weight_evaluation'];
    }
    $root_weight_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['root_weight_evaluation']))
    {
        $root_weight_evaluation_replica=$info['replica']['root_weight_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_WEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_weight_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_weight_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_weight_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_weight_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_weight_evaluation]" value="<?php echo $root_weight_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_diameter']==1)
{
    $root_diameter_normal="";
    if(is_array($info)&& !empty($info['normal']['root_diameter']))
    {
        $root_diameter_normal=$info['normal']['root_diameter'];
    }
    $root_diameter_replica="";
    if(is_array($info)&& !empty($info['replica']['root_diameter']))
    {
        $root_diameter_replica=$info['replica']['root_diameter'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_DIAMETER');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[root_diameter]" class="form-control" value="<?php echo $root_diameter_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[root_diameter]" class="form-control" value="<?php echo $root_diameter_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_diameter]" value="<?php echo $root_diameter_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_diameter_evaluation']==1)
{
    $root_diameter_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['root_diameter_evaluation']))
    {
        $root_diameter_evaluation_normal=$info['normal']['root_diameter_evaluation'];
    }
    $root_diameter_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['root_diameter_evaluation']))
    {
        $root_diameter_evaluation_replica=$info['replica']['root_diameter_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_DIAMETER_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_diameter_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_diameter_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_diameter_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_diameter_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_diameter_evaluation]" value="<?php echo $root_diameter_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['targeted_root_height']==1)
{
    $targeted_root_height_normal="";
    if(is_array($info)&& !empty($info['normal']['targeted_root_height']))
    {
        $targeted_root_height_normal=$info['normal']['targeted_root_height'];
    }
    $targeted_root_height_replica="";
    if(is_array($info)&& !empty($info['replica']['targeted_root_height']))
    {
        $targeted_root_height_replica=$info['replica']['targeted_root_height'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TARGETED_ROOT_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[targeted_root_height]" class="form-control" value="<?php echo $targeted_height;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[targeted_root_height]" class="form-control" value="<?php echo $targeted_height;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[targeted_root_height]" value="<?php echo $targeted_height;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_height']==1)
{
    $root_height_normal="";
    if(is_array($info)&& !empty($info['normal']['root_height']))
    {
        $root_height_normal=$info['normal']['root_height'];
    }
    $root_height_replica="";
    if(is_array($info)&& !empty($info['replica']['root_height']))
    {
        $root_height_replica=$info['replica']['root_height'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[root_height]" class="form-control" value="<?php echo $root_height_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[root_height]" class="form-control" value="<?php echo $root_height_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_height]" value="<?php echo $root_height_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['root_height_evaluation']==1)
{
    $root_height_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['root_height_evaluation']))
    {
        $root_height_evaluation_normal=$info['normal']['root_height_evaluation'];
    }
    $root_height_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['root_height_evaluation']))
    {
        $root_height_evaluation_replica=$info['replica']['root_height_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_HEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_height_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_height_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_height_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_height_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_height_evaluation]" value="<?php echo $root_height_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['root_taste']==1)
{
    $root_taste_normal="";
    if(is_array($info)&& !empty($info['normal']['root_taste']))
    {
        $root_taste_normal=$info['normal']['root_taste'];
    }
    $root_taste_replica="";
    if(is_array($info)&& !empty($info['replica']['root_taste']))
    {
        $root_taste_replica=$info['replica']['root_taste'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_TASTE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_taste]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_root_taste') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_taste_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_taste]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_root_taste') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_taste_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_taste]" value="<?php echo $root_taste_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['root_shape']==1)
{
    $root_shape_normal="";
    if(is_array($info)&& !empty($info['normal']['root_shape']))
    {
        $root_shape_normal=$info['normal']['root_shape'];
    }
    $root_shape_replica="";
    if(is_array($info)&& !empty($info['replica']['root_shape']))
    {
        $root_shape_replica=$info['replica']['root_shape'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_shape]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_root_shape') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_shape_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_shape]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_root_shape') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_shape_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_shape]" value="<?php echo $root_shape_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['root_shape_evaluation']==1)
{
    $root_shape_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['root_shape_evaluation']))
    {
        $root_shape_evaluation_normal=$info['normal']['root_shape_evaluation'];
    }
    $root_shape_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['root_shape_evaluation']))
    {
        $root_shape_evaluation_replica=$info['replica']['root_shape_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_SHAPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_shape_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_shape_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_shape_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$root_shape_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_shape_evaluation]" value="<?php echo $root_shape_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['taste']==1)
{
    $taste_normal="";
    if(is_array($info)&& !empty($info['normal']['taste']))
    {
        $taste_normal=$info['normal']['taste'];
    }
    $taste_replica="";
    if(is_array($info)&& !empty($info['replica']['taste']))
    {
        $taste_replica=$info['replica']['taste'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TASTE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[taste]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_taste') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$taste_normal){echo "selected";}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[taste]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_taste') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$taste_replica){echo "selected";}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[taste]" value="<?php echo $taste_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['keeping_quality']==1)
{
    $keeping_quality_normal="";
    if(is_array($info)&& !empty($info['normal']['keeping_quality']))
    {
        $keeping_quality_normal=$info['normal']['keeping_quality'];
    }
    $keeping_quality_replica="";
    if(is_array($info)&& !empty($info['replica']['keeping_quality']))
    {
        $keeping_quality_replica=$info['replica']['keeping_quality'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('KEEPING_QUALITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[keeping_quality]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('keeping_quality') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$keeping_quality_normal){echo "selected";}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[keeping_quality]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('keeping_quality') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$keeping_quality_replica){echo "selected";}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[keeping_quality]" value="<?php echo $keeping_quality_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['pungency']==1)
{
    $pungency_normal="";
    if(is_array($info)&& !empty($info['normal']['pungency']))
    {
        $pungency_normal=$info['normal']['pungency'];
    }
    $pungency_replica="";
    if(is_array($info)&& !empty($info['replica']['pungency']))
    {
        $pungency_replica=$info['replica']['pungency'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PUNGENCY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[pungency]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$pungency_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[pungency]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$pungency_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[pungency]" value="<?php echo $pungency_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['seed_maturity_during_harvest']==1)
{
    $seed_maturity_during_harvest_normal="";
    if(is_array($info)&& !empty($info['normal']['seed_maturity_during_harvest']))
    {
        $seed_maturity_during_harvest_normal=$info['normal']['seed_maturity_during_harvest'];
    }
    $seed_maturity_during_harvest_replica="";
    if(is_array($info)&& !empty($info['replica']['seed_maturity_during_harvest']))
    {
        $seed_maturity_during_harvest_replica=$info['replica']['seed_maturity_during_harvest'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SEED_MATURITY_DURING_HARVEST');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[seed_maturity_during_harvest]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_seed_maturity_during_harvest') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$seed_maturity_during_harvest_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[seed_maturity_during_harvest]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_seed_maturity_during_harvest') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$seed_maturity_during_harvest_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[seed_maturity_during_harvest]" value="<?php echo $seed_maturity_during_harvest_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['seed_density']==1)
{
    $seed_density_normal="";
    if(is_array($info)&& !empty($info['normal']['seed_density']))
    {
        $seed_density_normal=$info['normal']['seed_density'];
    }
    $seed_density_replica="";
    if(is_array($info)&& !empty($info['replica']['seed_density']))
    {
        $seed_density_replica=$info['replica']['seed_density'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SEED_DENSITY');?></label>
        </div>
        <div class="col-xs-3">
            <textarea name="normal[seed_density]" class="form-control"><?php echo $seed_density_normal;?></textarea>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <textarea name="replica[seed_density]" class="form-control"><?php echo $seed_density_replica;?></textarea>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[seed_density]" value="<?php echo $seed_density_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['spine_type']==1)
{
    $spine_type_normal="";
    if(is_array($info)&& !empty($info['normal']['spine_type']))
    {
        $spine_type_normal=$info['normal']['spine_type'];
    }
    $spine_type_replica="";
    if(is_array($info)&& !empty($info['replica']['spine_type']))
    {
        $spine_type_replica=$info['replica']['spine_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SPINE_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[spine_type]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_spine_type') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$spine_type_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[spine_type]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_spine_type') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$spine_type_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[spine_type]" value="<?php echo $spine_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['spine_type_evaluation']==1)
{
    $spine_type_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['spine_type_evaluation']))
    {
        $spine_type_evaluation_normal=$info['normal']['spine_type_evaluation'];
    }
    $spine_type_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['spine_type_evaluation']))
    {
        $spine_type_evaluation_replica=$info['replica']['spine_type_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SPINE_TYPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[spine_type_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$spine_type_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[spine_type_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$spine_type_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[spine_type_evaluation]" value="<?php echo $spine_type_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['hardness_of_spines']==1)
{
    $hardness_of_spines_normal="";
    if(is_array($info)&& !empty($info['normal']['hardness_of_spines']))
    {
        $hardness_of_spines_normal=$info['normal']['hardness_of_spines'];
    }
    $hardness_of_spines_replica="";
    if(is_array($info)&& !empty($info['replica']['hardness_of_spines']))
    {
        $hardness_of_spines_replica=$info['replica']['hardness_of_spines'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('hardness_of_spines');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[hardness_of_spines]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$hardness_of_spines_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[hardness_of_spines]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$hardness_of_spines_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[hardness_of_spines]" value="<?php echo $hardness_of_spines_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['core_diameter']==1)
{
    $core_diameter_normal="";
    if(is_array($info)&& !empty($info['normal']['core_diameter']))
    {
        $core_diameter_normal=$info['normal']['core_diameter'];
    }
    $core_diameter_replica="";
    if(is_array($info)&& !empty($info['replica']['core_diameter']))
    {
        $core_diameter_replica=$info['replica']['core_diameter'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CORE_DIAMETER');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" name="normal[core_diameter]" class="form-control" value="<?php echo $core_diameter_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[core_diameter]" class="form-control" value="<?php echo $core_diameter_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[core_diameter]" value="<?php echo $core_diameter_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['core_diameter_evaluation']==1)
{
    $core_diameter_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['core_diameter_evaluation']))
    {
        $core_diameter_evaluation_normal=$info['normal']['core_diameter_evaluation'];
    }
    $core_diameter_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['core_diameter_evaluation']))
    {
        $core_diameter_evaluation_replica=$info['replica']['core_diameter_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CORE_DIAMETER_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[core_diameter_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$core_diameter_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[core_diameter_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$core_diameter_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[core_diameter_evaluation]" value="<?php echo $core_diameter_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['flesh_colour']==1)
{
    $flesh_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['flesh_colour']))
    {
        $flesh_colour_normal=$info['normal']['flesh_colour'];
    }
    $flesh_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['flesh_colour']))
    {
        $flesh_colour_replica=$info['replica']['flesh_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FLESH_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[flesh_colour]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_flesh_colour_'.$crop_id) as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$flesh_colour_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[flesh_colour]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_flesh_colour_'.$crop_id) as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$flesh_colour_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[flesh_colour]" value="<?php echo $flesh_colour_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['flesh_colour_evaluation']==1)
{
    $flesh_colour_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['flesh_colour_evaluation']))
    {
        $flesh_colour_evaluation_normal=$info['normal']['flesh_colour_evaluation'];
    }
    $flesh_colour_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['flesh_colour_evaluation']))
    {
        $flesh_colour_evaluation_replica=$info['replica']['flesh_colour_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FLESH_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[flesh_colour_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$flesh_colour_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[flesh_colour_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$flesh_colour_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[flesh_colour_evaluation]" value="<?php echo $flesh_colour_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['smoothness_of_skin']==1)
{
    $smoothness_of_skin_normal="";
    if(is_array($info)&& !empty($info['normal']['smoothness_of_skin']))
    {
        $smoothness_of_skin_normal=$info['normal']['smoothness_of_skin'];
    }
    $smoothness_of_skin_replica="";
    if(is_array($info)&& !empty($info['replica']['smoothness_of_skin']))
    {
        $smoothness_of_skin_replica=$info['replica']['smoothness_of_skin'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SMOOTHNESS_OF_SKIN');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[smoothness_of_skin]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$smoothness_of_skin_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[smoothness_of_skin]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$smoothness_of_skin_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[smoothness_of_skin]" value="<?php echo $smoothness_of_skin_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['ridge_type']==1)
{
    $ridge_type_normal="";
    if(is_array($info)&& !empty($info['normal']['ridge_type']))
    {
        $ridge_type_normal=$info['normal']['ridge_type'];
    }
    $ridge_type_replica="";
    if(is_array($info)&& !empty($info['replica']['ridge_type']))
    {
        $ridge_type_replica=$info['replica']['ridge_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('RIDGE_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[ridge_type]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_ridge_type') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$ridge_type_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[ridge_type]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_ridge_type') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$ridge_type_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[ridge_type]" value="<?php echo $ridge_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['ridge_strength']==1)
{
    $ridge_strength_normal="";
    if(is_array($info)&& !empty($info['normal']['ridge_strength']))
    {
        $ridge_strength_normal=$info['normal']['ridge_strength'];
    }
    $ridge_strength_replica="";
    if(is_array($info)&& !empty($info['replica']['ridge_strength']))
    {
        $ridge_strength_replica=$info['replica']['ridge_strength'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('RIDGE_STRENGTH');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[ridge_strength]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$ridge_strength_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[ridge_strength]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$ridge_strength_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[ridge_strength]" value="<?php echo $ridge_strength_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['waxiness_of_skin']==1)
{
    $waxiness_of_skin_normal="";
    if(is_array($info)&& !empty($info['normal']['waxiness_of_skin']))
    {
        $waxiness_of_skin_normal=$info['normal']['waxiness_of_skin'];
    }
    $waxiness_of_skin_replica="";
    if(is_array($info)&& !empty($info['replica']['waxiness_of_skin']))
    {
        $waxiness_of_skin_replica=$info['replica']['waxiness_of_skin'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('WAXINESS_OF_SKIN');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[waxiness_of_skin]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$waxiness_of_skin_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[waxiness_of_skin]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$waxiness_of_skin_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[waxiness_of_skin]" value="<?php echo $waxiness_of_skin_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['no_of_edges_in_fruit']==1)
{
    $no_of_edges_in_fruit_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_edges_in_fruit']))
    {
        $no_of_edges_in_fruit_normal=$info['normal']['no_of_edges_in_fruit'];
    }
    $no_of_edges_in_fruit_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_edges_in_fruit']))
    {
        $no_of_edges_in_fruit_replica=$info['replica']['no_of_edges_in_fruit'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('no_of_edges_in_fruit');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[no_of_edges_in_fruit]" value="<?php echo $no_of_edges_in_fruit_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[no_of_edges_in_fruit]" value="<?php echo $no_of_edges_in_fruit_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_edges_in_fruit]" value="<?php echo $no_of_edges_in_fruit_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['no_of_edges_in_fruit_evaluation']==1)
{
    $no_of_edges_in_fruit_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_edges_in_fruit_evaluation']))
    {
        $no_of_edges_in_fruit_evaluation_normal=$info['normal']['no_of_edges_in_fruit_evaluation'];
    }
    $no_of_edges_in_fruit_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_edges_in_fruit_evaluation']))
    {
        $no_of_edges_in_fruit_evaluation_replica=$info['replica']['no_of_edges_in_fruit_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_EDGES_IN_FRUIT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[no_of_edges_in_fruit_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$no_of_edges_in_fruit_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[no_of_edges_in_fruit_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$no_of_edges_in_fruit_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_edges_in_fruit_evaluation]" value="<?php echo $no_of_edges_in_fruit_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['tenderness_of_fruit']==1)
{
    $tenderness_of_fruit_normal="";
    if(is_array($info)&& !empty($info['normal']['tenderness_of_fruit']))
    {
        $tenderness_of_fruit_normal=$info['normal']['tenderness_of_fruit'];
    }
    $tenderness_of_fruit_replica="";
    if(is_array($info)&& !empty($info['replica']['tenderness_of_fruit']))
    {
        $tenderness_of_fruit_replica=$info['replica']['tenderness_of_fruit'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TENDERNESS_OF_FRUIT');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[tenderness_of_fruit]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$tenderness_of_fruit_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[tenderness_of_fruit]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$tenderness_of_fruit_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[tenderness_of_fruit]" value="<?php echo $tenderness_of_fruit_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['plant_height']==1)
{
    $plant_height_normal="";
    if(is_array($info)&& !empty($info['normal']['plant_height']))
    {
        $plant_height_normal=$info['normal']['plant_height'];
    }
    $plant_height_replica="";
    if(is_array($info)&& !empty($info['replica']['plant_height']))
    {
        $plant_height_replica=$info['replica']['plant_height'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PLANT_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[plant_height]" value="<?php echo $plant_height_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[plant_height]" value="<?php echo $plant_height_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[plant_height]" value="<?php echo $plant_height_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['plant_height_evaluation']==1)
{
    $plant_height_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['plant_height_evaluation']))
    {
        $plant_height_evaluation_normal=$info['normal']['plant_height_evaluation'];
    }
    $plant_height_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['plant_height_evaluation']))
    {
        $plant_height_evaluation_replica=$info['replica']['plant_height_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PLANT_HEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[plant_height_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$plant_height_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[plant_height_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$plant_height_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[plant_height_evaluation]" value="<?php echo $plant_height_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['brix_percent']==1)
{
    $brix_percent_normal="";
    if(is_array($info)&& !empty($info['normal']['brix_percent']))
    {
        $brix_percent_normal=$info['normal']['brix_percent'];
    }
    $brix_percent_replica="";
    if(is_array($info)&& !empty($info['replica']['brix_percent']))
    {
        $brix_percent_replica=$info['replica']['brix_percent'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('BRIX_PERCENT');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[brix_percent]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$brix_percent_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[brix_percent]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$brix_percent_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[brix_percent]" value="<?php echo $brix_percent_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['flavor']==1)
{
    $flavor_normal="";
    if(is_array($info)&& !empty($info['normal']['flavor']))
    {
        $flavor_normal=$info['normal']['flavor'];
    }
    $flavor_replica="";
    if(is_array($info)&& !empty($info['replica']['flavor']))
    {
        $flavor_replica=$info['replica']['flavor'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FLAVOR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[flavor]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$flavor_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[flavor]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$flavor_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[flavor]" value="<?php echo $flavor_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['seed_percentage']==1)
{
    $seed_percentage_normal="";
    if(is_array($info)&& !empty($info['normal']['seed_percentage']))
    {
        $seed_percentage_normal=$info['normal']['seed_percentage'];
    }
    $seed_percentage_replica="";
    if(is_array($info)&& !empty($info['replica']['seed_percentage']))
    {
        $seed_percentage_replica=$info['replica']['seed_percentage'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SEED_PERCENTAGE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[seed_percentage]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('fc_seed_percentage') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$seed_percentage_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[seed_percentage]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('fc_seed_percentage') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$seed_percentage_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[seed_percentage]" value="<?php echo $seed_percentage_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['seed_percentage_evaluation']==1)
{
    $seed_percentage_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['seed_percentage_evaluation']))
    {
        $seed_percentage_evaluation_normal=$info['normal']['seed_percentage_evaluation'];
    }
    $seed_percentage_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['seed_percentage_evaluation']))
    {
        $seed_percentage_evaluation_replica=$info['replica']['seed_percentage_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SEED_PERCENTAGE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[seed_percentage_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$seed_percentage_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[seed_percentage_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$seed_percentage_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[seed_percentage_evaluation]" value="<?php echo $seed_percentage_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>



<?php
if($options['special_characters']==1)
{
    $special_characters_normal="";
    if(is_array($info)&& !empty($info['normal']['special_characters']))
    {
        $special_characters_normal=$info['normal']['special_characters'];
    }
    $special_characters_replica="";
    if(is_array($info)&& !empty($info['replica']['special_characters']))
    {
        $special_characters_replica=$info['replica']['special_characters'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SPECIAL_CHARACTERS');?></label>
        </div>
        <div class="col-xs-3">
            <textarea class="form-control" name="normal[special_characters]"><?php echo $special_characters_normal; ?></textarea>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <textarea class="form-control" name="replica[special_characters]"><?php echo $special_characters_replica; ?></textarea>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[special_characters]" value="<?php echo $special_characters_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['accepted']==1)
{
    $accepted_normal="";
    if(is_array($info)&& !empty($info['normal']['accepted']))
    {
        $accepted_normal=$info['normal']['accepted'];
    }
    $accepted_replica="";
    if(is_array($info)&& !empty($info['replica']['accepted']))
    {
        $accepted_replica=$info['replica']['accepted'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ACCEPTED');?></label>
        </div>
        <div class="col-xs-3">
            <input type="radio" name="normal[accepted]" value="1" <?php if($accepted_normal!=0){echo 'checked';} ?>><?php echo $this->lang->line('YES');?>
            <input type="radio" name="normal[accepted]" value="0" <?php if($accepted_normal==0){echo 'checked';} ?>><?php echo $this->lang->line('NO');?>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="radio" name="replica[accepted]" value="1" <?php if($accepted_replica!=0){echo 'checked';} ?>><?php echo $this->lang->line('YES');?>
                <input type="radio" name="replica[accepted]" value="0" <?php if($accepted_replica==0){echo 'checked';} ?>><?php echo $this->lang->line('NO');?>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[accepted]" value="<?php echo $accepted_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['remarks']==1)
{
    $remarks_normal="";
    if(is_array($info)&& !empty($info['normal']['remarks']))
    {
        $remarks_normal=$info['normal']['remarks'];
    }
    $remarks_replica="";
    if(is_array($info)&& !empty($info['replica']['remarks']))
    {
        $remarks_replica=$info['replica']['remarks'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <textarea class="form-control" name="replica[remarks]"><?php echo $remarks_replica; ?></textarea>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <textarea class="form-control" name="normal[remarks]"><?php echo $remarks_normal; ?></textarea>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php

    $ranking_normal="";
    if(is_array($info)&& !empty($info['normal']['ranking']))
    {
        $ranking_normal=$info['normal']['ranking'];
    }
    $ranking_replica="";
    if(is_array($info)&& !empty($info['replica']['ranking']))
    {
        $ranking_replica=$info['replica']['ranking'];
    }
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RANKING');?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <input type="text" class="ranking form-control" name="replica[ranking]" value="<?php echo $ranking_replica;?>" />
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <input type="text" class="ranking form-control" name="normal[ranking]" value="<?php echo $ranking_normal;?>" />
        </div>
    <?php
    }
    ?>
</div>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(document).on("keypress", ".ranking", function(event)
        {
            return isNumberKey(event);
        });

    });

</script>
