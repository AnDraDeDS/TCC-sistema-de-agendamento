<?php 
require_once '../lib/conn.php';
session_start();

extract($_POST);

if(isset($_POST))

   if (isset($_SESSION['admin']) && $_SESSION['admin'] == true){
      $id = $_SESSION['id_admin'];
   }
   else {
      $id = $_SESSION['id_cliente'];
   }


      $verificar = "SELECT * FROM agendamento WHERE data = '$DataServico' && horario = '$HorarioServico'";
      $stmt = $conn->query($verificar);

      
      
      if($stmt->rowCount() > 1){
         ?>
         <meta http-equiv="refresh" content="0; url=../agendamento.php"> 
         <?php
         echo '<script>alert("Horário indisponível para o dia selecionado.")</script>';
         
      }else{
         
         
         $verificar2 = "SELECT * FROM agendamento  WHERE fk_id_cliente = $id AND status = 0"; 
         $stmtVerify = $conn->query($verificar2);
         
      if($stmtVerify->rowCount() != 0){
         ?>
         <meta http-equiv="refresh" content="0; url=../agendamento.php"> 
         <?php
         echo '<script>alert("Aguarde a confirmação da solicitação de serviço anterior para iniciar uma nova.")</script>';
         
      }else{

         if (isset($_SESSION['admin']) && $_SESSION['admin'] == true){

            
            $sql= "INSERT INTO agendamento(id_agendamento,data,horario,veiculo,status,fk_id_cliente,fk_id_servico) VALUES
               (0,:data,:horario,:veiculo,0,1,:id_servico)";
         
         $stmt = $conn->prepare($sql);
         $stmt->bindValue(":data",$DataServico);
         $stmt->bindValue(":horario",$HorarioServico);
         $stmt->bindValue(":veiculo",$VeiculoServico);
         $stmt->bindValue(":id_servico",$id_servico);
         
      }else{
         
         $id_cliente = $_SESSION['id_cliente'];
         
         $sql= "INSERT INTO agendamento(id_agendamento,data,horario,veiculo,status,fk_id_cliente,fk_id_servico) VALUES
         (0,:data,:horario,:veiculo,0,:id_cliente,:id_servico)";
   
   $stmt = $conn->prepare($sql);
   $stmt->bindValue(":data",$DataServico);
   $stmt->bindValue(":horario",$HorarioServico);
   $stmt->bindValue(":veiculo",$VeiculoServico);
   $stmt->bindValue(":id_servico",$id_servico);
   $stmt->bindValue(":id_cliente",$id_cliente);
         
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
    
    