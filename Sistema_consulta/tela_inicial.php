<?php
require_once 'classes/psq_eleitor.php';
?>
<!DOCTYPE html>
<html lang='pt-br'>
<head>
<!-- Desenvolvedor Natanael B. Oliveira, 2020. -->
<meta charset='utf8'/>
<meta name='viewport' content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/estilo.css">

<script src="js/jquery.min.js"></script>

    
<link rel="stylesheet" href="css/bootstrap.min.css">

<script src="js/bootstrap.bundle.min.js"></script>



<title>Tela de pesquisa</title>
</head>
<body>
<div id="cabecalho">
<img width="100px" height="95px" src="imagens/logo_tre.png"/>
<label>Sistema de Consulta Zona 62-AM</label>
</div>

<!-- Modal com inscrição -->
<div class="modal fade" id="forn_eleitor" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tela de Consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
                <?php
                if (isset($_GET['inscricao'])){

                    $insc = $_GET['inscricao'];
                    $t = new Psq_eleitor_inscri();
                    $t->psq_eleitor($insc);
                    
                }
                ?>
            
        </div>
      <div class="modal-footer">
        <button type='button' class='btn btn-outline-primary' data-dismiss='modal'>Fechar</button>
      </div>
    </div>
  </div>
</div>

<span id="ifo_do_bank"></span>

<!-- Modal com nome -->
<div class="modal fade" id="form_nome" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tela de Consulta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <?php
                if (isset($_GET['nome_do_eleitor'])){

                    $nome_eleitor = $_GET['nome_do_eleitor'];
                    $t = new Psq_eleitor_inscri();
                    $t->psq_eleitor_nome($nome_eleitor);
                    
                }
                ?>
        </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div id = "formularios">
  <form id='forn_inscrição' method="GET">
  <input id="inscricao" type='text' placeholder= 'Numero de inscrição' name='inscricao' minlength="12" maxlength="12"></input></br></br>
  <input type='submit' value='Pesquisar'></input>
  </form></br>

  <form id='forn_nome' method="GET">
  <input id="nome_eleitor" type='text' placeholder='Nome do eleitor' name='nome_do_eleitor' minlength="5"></input></br></br>
  <input type='submit' value='Pesquisar'></input>
  </form>
</div>
<script>
$(document).ready(function(){
  
    $(document).on('click','.view_data', function (){
        var id_reg = $(this).attr('id');
    if(id_reg !== ''){

        var reg_at = {
                    id_reg : id_reg
        };

        $.post('funcao_det.php', reg_at, function(retorna){
            $('#test').html(retorna);
        });

    }

    });   

});

</script>

<footer>
 <label >&copy;2020 N.B.O<label>
 <?php
 if ($_SERVER['HTTP_HOST'] <> "localhost"){
 
 }else{
  $host= gethostname();
  $ip = gethostbyname($host);
  echo "<label> ===== Ip de acesso: ".$ip." ======</label>";
 }
 


 ?>
</footer> 

<body>

</html>

