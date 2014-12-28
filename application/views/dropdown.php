<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<option value=""><?php echo $this->lang->line('SELECT');?></option>
<?php
    for($i=0;$i<sizeof($value);$i++)
    {
?>
    <option value="<?php echo $value[$i];?>"><?php echo $name[$i];?></option>
<?php
    }
?>

