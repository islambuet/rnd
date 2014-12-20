<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

?>
<html lang="en">
<head>
    <title>RND</title>
    <link rel="shortcut icon"  type="image/x-icon" href="<?php echo base_url(); ?>images/favicon.ico">
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
    <script src="<?php echo base_url(); ?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <header>

                <img alt="Logo" height="40" class="pull-left" src="<?php echo base_url(); ?>images/logo.png">
                <div class="pull-right" id="user_info"></div>

    </header>
    <div class="container-fluid">
        <div class="row dashboard-wrapper">
            <div class="col-sm-9" id="content">

            </div>
            <div class="col-sm-3" id="right_side">

            </div>

        </div>

    </div>
    <footer>
        <p>
            &copy; 2012 - All Rights Reserved <a href="http://amaderit.com" target="blank">Amader IT</a>
        </p>
    </footer>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/rnd_common.js"></script>

</body>
</html>