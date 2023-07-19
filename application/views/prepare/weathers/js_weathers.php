<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.id_pluviometry').mask("#.##0,0" , {reverse:true});
        $('.id_temperature').mask("#.##0,0" , {reverse:true});
        $('.id_temperature_min').mask("#.##0,0" , {reverse:true});
        $('.id_temperature_max').mask("#.##0,0" , {reverse:true});
    });
</script>
