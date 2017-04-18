<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

?>
<html lang="en">
<head>
    <title>RND</title>
    <link rel="shortcut icon" href="http://malikseeds.com/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://malikseeds.com/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/validationEngine.jquery.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui/jquery-ui.theme.min.css">

</head>
<body>
    <script src="<?php echo base_url(); ?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-filestyle.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery-ui.min.js"></script>

    <script src="<?php echo base_url() ?>js/validator_js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>js/validator_js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
        var display_date_format = "dd-M-yy";
    </script>
    <header class="hidden-print">

                <img alt="Logo" height="40" class="site_logo pull-left" src="<?php echo base_url(); ?>images/logo.png">
                <div class="site_title pull-left">A.R MALIK & Co. (PVT) LTD.</div>
                <div class="user_info pull-right" id="user_info"></div>

    </header>
    <div class="container-fluid">
        <div class="row dashboard-wrapper">
            <div class="col-sm-12" id="content">
            <?php
                //$this->load->view("login");
            ?>
            </div>
<!--            <div class="col-sm-3 hidden-sm hidden-xs" id="right_side">-->
<!---->
<!--            </div>-->

        </div>

    </div>
    <footer>
        <div>
            &copy; & All Rights Reserved by Sopan Seeds.
        </div>
        <div class="clearfix"></div>
    </footer>
    <div id="loading" class="hidden-print"><img src="<?php echo base_url(); ?>images/spinner.gif"></div>
    <div id="message" class="hidden-print"></div>
    <script type="text/javascript" src="<?php echo base_url('js/rnd_common.js?version='.time()); ?>"></script>


</body>
</html>