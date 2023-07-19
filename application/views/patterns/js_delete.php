<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <script type="text/javascript">
          $(function(){
            $('.confirma_exclusao').on('click', function(e){
              e.preventDefault();

              var lsName = $(this).data('name');
              var liKey = $(this).data('key');
              var lsCode = $(this).data('code');
              var lsDesc = $(this).data('desc');
              
              $('#modal_confirmation').data('name', lsName);
              $('#modal_confirmation').data('key', liKey);
              $('#modal_confirmation').data('code', lsCode);
              $('#modal_confirmation').data('desc', lsDesc);
              $('#modal_confirmation').modal('show');
            });

            $('#modal_confirmation').on('show.bs.modal', function() {
              var code = $(this).data('code');
              var name = $(this).data('name');
              var desc = $(this).data('desc');
              $('#code_exclusao').text(code);
              $('#name_exclusao').text(name);
              $('#desc_exclusao').text(desc);
            });

            $('#btn_excluir').click(function(){
              var lsLinkKey = $('#modal_confirmation').data('key');
              document.location.href = lsLinkKey;
            });
          });
        </script>
