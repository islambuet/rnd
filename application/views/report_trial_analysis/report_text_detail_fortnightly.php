<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
echo "<pre>";
print_r($varieties);
echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";
echo "<pre>";
print_r($options);
echo "</pre>";
echo "<pre>";
print_r($fortnightly);
echo "</pre>";
$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
    $data=array();
    $data['replica_status']=$variety['replica_status'];

    //for rnd code
    $table_heads[]='rnd_code';
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);
    //rnd code finish


    //for ranking
    $table_heads[]='ranking';
    $data['ranking']['normal']=9999;
    $data['ranking']['replica']=9999;
    if(isset($fortnightly[$variety['id']]['ranking']))
    {
        $data['ranking']['normal']=$fortnightly[$variety['id']]['ranking'];
        $data['ranking']['replica']=$fortnightly[$variety['id']]['ranking'];
    }
    //ranking finished

    $final_varieties[]=$data;
}
?>
<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="hidden-print">
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                <?php
                    foreach($table_heads as $th)
                    {
                        ?>
                        <th><?php echo $this->lang->line('LABEL_'.$th); ?></th>
                        <?php
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
                                <th><?php echo $variety[$th]['normal']; ?></th>
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
                                    <th><?php echo $variety[$th]['replica']; ?></th>
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