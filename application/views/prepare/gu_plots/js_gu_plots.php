<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.id_distance').mask("#.##0,0" , {reverse:true});
        $('.id_total_area').mask("#.##0,0" , {reverse:true});
        $('.id_production_area').mask("#.##0,0" , {reverse:true});
        $('.id_tons').mask("#.##0,0" , {reverse:true});
        $('.id_cut_tons').mask("#.##0,0" , {reverse:true});
    });
</script>
