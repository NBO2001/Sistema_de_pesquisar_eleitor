<?php
require_once 'classes/psq_eleitor.php';
if (isset($_POST['id_reg'])){

    $id_de_pesquisa = $_POST['id_reg'];
    $t = new Psq_eleitor_inscri();
    $t->psq_id($id_de_pesquisa);

}
?>