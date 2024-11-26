<?php 
require_once '../lib/conn.php';
session_start();

extract($_POST);
if(isset($_POST)){


      $verificar = "SELECT * FROM agendamento WHERE data = '$DataServico' && horario = '$HorarioServico'";
      $stmt = $conn->query($verificar);


      if($stmt->rowCount() > 1){
         ?>
         <meta http-equiv="refresh" content="0; url=../agendamento.php"> 
         <?php
         echo '<script>alert("Horário indisponível para o dia selecionado, por favor escolha outro horário ou selecione outra data.")</script>';
         
      }else{

               if (isset($_SESSION['admin']) && $_SESSION['admin'] == true){
                  
                  $id_admin = $_SESSION['id_admin'];
                  
               $sql= "INSERT INTO agendamento(id_agendamento,data,horario,veiculo,status,fk_id_cliente,fk_id_servico) VALUES
               (0,:data,:horario,:veiculo,0,99999,:id_servico)";
         
         $stmt = $conn->prepare($sql);
         $stmt->bindValue(":data",$DataServico);
         $stmt->bindValue(":horario",$HorarioServico);
         $stmt->bindValue(":veiculo",$VeiculoServico);
         $stmt->bindValue(":id_servico",$id_servico);
     
         }else{
            
               $id_cliente = $_SESSION['id_cliente'];

               $sql= "INSERT INTO agendamento(id_agendamento,data,horario,status,fk_id_cliente,fk_id_servico) VALUES
               (0,:data,:horario,0,:id_cliente,:id_servico)";
         
         $stmt = $conn->prepare($sql);
         $stmt->bindValue(":data",$DataServico);
         $stmt->bindValue(":horario",$HorarioServico);
         $stmt->bindValue(":id_cliente",$id_cliente);
         $stmt->bindValue(":id_servico",$id_servico);
         
         }
         
         if($stmt->execute()){
            ?>   
            <script>alert('Agendamento feito com sucesso!')</script>
            <meta http-equiv="refresh" content="0; url=../agendamento.php">  
            <?php  } else {
               ?>  
            <script>alert('Erro ao realizar agendamento, verifique as informações ou selecione novamente.')</script>
            <meta http-equiv="refresh" content="0; url=../agendamento.php"> 
         <?php 


}
} 
}

?>
    
    