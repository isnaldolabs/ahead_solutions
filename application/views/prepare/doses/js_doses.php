<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <script type="text/javascript">
            $( "#id_dose" ).keypress(function() {
                $(this).mask('#0.00');
            });
        </script>
