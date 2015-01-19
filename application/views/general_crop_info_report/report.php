<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//echo '<pre>';
//print_r($procurements);
//echo '</pre>';
?>

<div class="col-sm-12">
    <table class="table table-hover table-bordered" style="font-size: 13px;">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("LABEL_NAMES_OF_CROPS"); ?></th>
            <th><?php echo $this->lang->line("LABEL_CLASSIFICATION"); ?></th>
            <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
            <th><?php echo $this->lang->line("LABEL_COMPANY_NAME"); ?></th>
            <th><?php echo $this->lang->line("LABEL_TYPE"); ?></th>
            <th><?php echo $this->lang->line("LABEL_PROCUREMENT_DATE"); ?></th>
            <th><?php echo $this->lang->line("LABEL_QUANTITY"); ?></th>
            <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php
        $crop_name = '';
        $product_type_name = '';
        foreach($procurements as $procurement)
        {
        ?>
            <tr>
                <td>
                    <?php
                        if ($crop_name == '')
                        {
                            echo $procurement['crop_name'];
                            $crop_name = $procurement['crop_name'];
                        }
                        else if ($crop_name == $procurement['crop_name'])
                        {
                            echo "&nbsp;";
                        }
                        else
                        {
                            echo $procurement['crop_name'];
                            $crop_name = $procurement['crop_name'];
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if ($product_type_name == '')
                        {
                            echo $procurement['product_type'];
                            $product_type_name = $procurement['product_type'];
                        }
                        else if ($product_type_name == $procurement['product_type'])
                        {
                            echo "&nbsp;";
                        }
                        else
                        {
                            echo $procurement['product_type'];
                            $product_type_name = $procurement['product_type'];
                        }
                    ?>
                </td>
                <td><?php echo $procurement['variety_name'];?></td>
                <td>
                    <?php
                        if($procurement['variety_type']==$this->config->item('variety_type_arm'))
                        {
                            echo $this->lang->line('LABEL_ARMALIK');
                        }
                        elseif($procurement['variety_type']==$this->config->item('variety_type_company'))
                        {
                            echo $procurement['company_name'];
                        }
                        else
                        {
                            echo $procurement['principal_name'];
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if($procurement['variety_type']==$this->config->item('variety_type_arm'))
                        {
                            echo $this->lang->line('LABEL_ARMALIK_SELF');
                        }
                        elseif($procurement['variety_type']==$this->config->item('variety_type_company'))
                        {
                            echo $this->lang->line('LABEL_COMPETITOR');
                        }
                        else
                        {
                            echo $this->lang->line('LABEL_PRINCIPAL');
                        }
                    ?>
                </td>
                <td><?php echo date('d-m-Y',$procurement['creation_date']);?></td>
                <td><?php echo $procurement['quantity'];?></td>
                <td><?php echo $procurement['rnd_code'];?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>