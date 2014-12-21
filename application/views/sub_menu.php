<div class="row widget">
    <div class="widget-header">
        <div class="title">
            Dashboard Menu
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="sub-menu-container">
        <?php
        foreach($tasks as $task)
        {
            ?>
            <div class="menu-item col-sm-2" data-menu-id="<?php echo $task['st_id'];?>" title="<?php echo $task['st_name']; ?>">
                <div class="menu_left pull-left">
                    <div class="menu_image">
                        <img alt="menu" src="http://armalikgroup.com.bd/rnd/images/module_icon/<?php echo $task['st_icon'];?>">

                    </div>
                    <div class="menu_title">
                        <?php echo $task['st_name']; ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>

</div>
<div class="clearfix"></div>
