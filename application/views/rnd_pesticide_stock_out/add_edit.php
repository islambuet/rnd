<?php if(!definded('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]= base_url()."rnd_pesticide_stock_out/index/add";
$data["link_back"]=base_url()."rnd_pesticide_stock_out";
$this->load->view("action_buttons_edit",$data);

?>














<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();

    });
</script>