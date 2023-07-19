<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.id_num_tiller').mask("#.##0" , {reverse:true});
        $('.id_num_gap').mask("#.##0,00" , {reverse:true});
    });
</script>
