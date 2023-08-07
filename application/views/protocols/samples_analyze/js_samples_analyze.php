<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.id_num_weight').mask("#.##0,00" , {reverse:true});
        $('.id_num_brix').mask("#.##0,00" , {reverse:true});
        $('.id_num_lai').mask("#.##0,00" , {reverse:true});
        $('.id_num_pbu').mask("#.##0,00" , {reverse:true});
    });
</script>
