<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.id_dose').mask("#.##0,00" , {reverse:true});
        $('.id_dose_cost').mask("#.##0,00" , {reverse:true});
    });
</script>
