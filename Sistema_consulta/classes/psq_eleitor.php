<?php
Class Psq_eleitor_inscri{
    private $inscricao, $nome_eleitor_pes, $id_eleitor;

    function getInscricao(){
         return $this->$inscricao;
     }
     function setInscricao(){
        $this->inscricao = $inscricao;
     }

     function getNome_eleitor_pes(){
        return $this->$nome_eleitor_pes;
    }
    function setNome_eleitor_pes(){
       $this->inscricao = $nome_eleitor_pes;
    }

    function getId_eleitor(){
        return $this->$id_eleitor;
    }
    function setId_eleitor(){
       $this->inscricao = $id_eleitor;
    }
    
    function psq_eleitor($inscricao){
       require_once './config/db_conect.php';

       $inscricao = preg_replace('/[^[:alpha:][:alnum:]_]/',' ',$inscricao);
      if (isset($inscricao)){
       $eleitor = $pdo->prepare("SELECT * FROM eleitores WHERE eleitores.inscricao LIKE '%$inscricao' ");
        $eleitor->execute();
        $eleitor_resultado = $eleitor->fetchAll(PDO::FETCH_ASSOC);
        if(isset($eleitor_resultado[0]['nome'])){

         function format($mask,$string)
            {
                return  vsprintf($mask, str_split($string));
            }
            $inscricao_do_res = $eleitor_resultado[0]['inscricao'];
            $cnpjMask = "%s%s%s%s %s%s%s%s %s%s%s%s";
            
            $quant = 12 - strlen($inscricao_do_res);
            for ($controle = 0; $controle < $quant; $controle++){
                $inscricao_do_res = "0".$inscricao_do_res;
            }

            $inscricao_do_res = format($cnpjMask,$inscricao_do_res);
            
                $loc = $eleitor_resultado[0]['local_votacao'];
                $loc  = preg_replace('/[^[:alpha:][:alnum:]_]/','',$loc);
                $eleitor_local = $pdo->prepare("SELECT * FROM escolas WHERE escolas.id_escola LIKE '$loc'");
                $eleitor_local->execute();
                $eleitor_local_resultado = $eleitor_local->fetchAll(PDO::FETCH_ASSOC);
                
              
                echo "
                <div class='form-row'>
                    <div class='col'>
                        <label>Nome</label>
                        <label type='text' class='form-control'>".$eleitor_resultado[0]['nome']."<label>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col'>
                    <label>Inscrição</label>
                    <label type='text' class='form-control' >".$inscricao_do_res."<label>
                    </div>
                </div>

            <div class='form-row'>
                    <div class='col'>
                        <label>Escola</label>
                        <label type='text' class='form-control'>" .$eleitor_local_resultado[0]['nome_escola'] ."<label>
                    </div>
            </div>
            <div class='form-row'>
                <div class='col'>
                    <a href='https://www.google.com.br/maps/search/" .$eleitor_local_resultado[0]['coord_x']. ",".$eleitor_local_resultado[0]['coord_y']."/'> 
                        <button type='button' class='btn btn-outline-warning' >Localizador</button>
                    </a>
                </div>
             </div>
            <div class='form-row'>
                    <div class='col'>
                        <label>Seção</label>
                        <label type='text' class='form-control' >".$eleitor_resultado[0]['secao']."<label>
                    </div>
                    <div class='col'>
                        <label>Zona</label>
                        <label type='text' class='form-control' >".$eleitor_resultado[0]['zona']."<label>
                     </div>
            </div>
                ";
                echo ("<script>$('#forn_eleitor').modal('show')</script>");
            }else{
                echo ("<script>alert('Nenhum Registro encontrado')</script>");
            }
        }else{
        echo ("<script>alert('Nenhum Registro encontrado')</script>");
      }

            
    }

    function psq_id($id_eleitor){
        require_once './config/db_conect.php';
 
        $inscricao = preg_replace('/[^[:alpha:][:alnum:]_]/',' ',$id_eleitor);
       if (isset($id_eleitor)){
        $eleitor = $pdo->prepare("SELECT * FROM eleitores WHERE eleitores.id LIKE '$id_eleitor' ");
         $eleitor->execute();
         $eleitor_resultado = $eleitor->fetchAll(PDO::FETCH_ASSOC);
         if(isset($eleitor_resultado[0]['nome'])){
 
          function format($mask,$string)
             {
                 return  vsprintf($mask, str_split($string));
             }
             $inscricao_do_res = $eleitor_resultado[0]['inscricao'];
             $cnpjMask = "%s%s%s%s %s%s%s%s %s%s%s%s";
             
             $quant = 12 - strlen($inscricao_do_res);
             for ($controle = 0; $controle < $quant; $controle++){
                 $inscricao_do_res = "0".$inscricao_do_res;
             }
 
             $inscricao_do_res = format($cnpjMask,$inscricao_do_res);
             
                 $loc = $eleitor_resultado[0]['local_votacao'];
                 $loc  = preg_replace('/[^[:alpha:][:alnum:]_]/','',$loc);
                 $eleitor_local = $pdo->prepare("SELECT * FROM escolas WHERE escolas.id_escola LIKE '$loc'");
                 $eleitor_local->execute();
                 $eleitor_local_resultado = $eleitor_local->fetchAll(PDO::FETCH_ASSOC);
                 
               
                 echo "
                 <div class='form-row'>
                     <div class='col'>
                         <label>Nome</label>
                         <label type='text' class='form-control'>".$eleitor_resultado[0]['nome']."<label>
                     </div>
                 </div>
                 <div class='form-row'>
                     <div class='col'>
                     <label>Inscrição</label>
                     <label type='text' class='form-control' >".$inscricao_do_res."<label>
                     </div>
                 </div>
 
             <div class='form-row'>
                     <div class='col'>
                         <label>Escola</label>
                         <label type='text' class='form-control'>" .$eleitor_local_resultado[0]['nome_escola'] ."<label>
                      </div>
             </div>
             <div class='form-row'>
                <div class='col'>
                    <a href='https://www.google.com.br/maps/search/" .$eleitor_local_resultado[0]['coord_x']. ",".$eleitor_local_resultado[0]['coord_y']."/'> 
                        <button type='button' class='btn btn-outline-warning' >Localizador</button>
                    </a>
                </div>
             </div>
             <div class='form-row'>
                     <div class='col'>
                         <label>Seção</label>
                         <label type='text' class='form-control' >".$eleitor_resultado[0]['secao']."<label>
                     </div>
                     <div class='col'>
                         <label>Zona</label>
                         <label type='text' class='form-control' >".$eleitor_resultado[0]['zona']."<label>
                      </div>
             </div>
                 ";
             }
         }
 
             
     }

    function psq_eleitor_nome($nome_eleitor_pes){
        require_once './config/db_conect.php';

                $table = "<div id='test'><table class='table table-hover'>";
                $table .=  "<thead class='thead-dark'>
                    <tr>
                        <th scope='col'>Eleitor</th>
                        <th scope='col'>Inscrição</th>
                        
                        <th scope='col'>Ação</th>
                       
                    </tr>
                </thead>
                <tbody >";
                $pqp = $pdo->prepare("SELECT * FROM eleitores WHERE nome LIKE '%$nome_eleitor_pes%' ORDER BY nome DESC LIMIT 20");
                $pqp->execute();
                $pqp_resultado = $pqp->fetchAll(PDO::FETCH_ASSOC);

                function format($mask,$string)
                {
                    return  vsprintf($mask, str_split($string));
                }

                foreach($pqp_resultado as $item){
                    
                   
                    $inscricao_do_res = $item['inscricao'];
                    $cnpjMask = "%s%s%s%s %s%s%s%s %s%s%s%s";
                    
                    $quant = 12 - strlen($inscricao_do_res);
                    for ($controle = 0; $controle < $quant; $controle++){
                        $inscricao_do_res = "0".$inscricao_do_res;
                    }
        
                    $inscricao_do_res = format($cnpjMask,$inscricao_do_res);
                   
                      $table.= "<tr>
                              <th scope='row'>".$item['nome']."</th>
                             <td>$inscricao_do_res</td>
                             
                             <td>
                              <button type='button' class='btn btn-outline-success view_data' id = ".$item['id']."  data-toggle='modal'>
                                  Visualizar
                                </button>
                              </td>
                             
                             </tr>";
                  }
              $table .="</tbody>
              </table></div>";
              echo $table;

        echo "<script> $('#form_nome').modal('show')</script>";

    }
}
?>