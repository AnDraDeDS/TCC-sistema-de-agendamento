<?php 
require_once '../lib/conn.php';
session_start();

extract($_POST);
    if(isset($_POST)){

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
       <script>alert('Erro ao fazer o agendamento, verifique as informações!')</script>
       <meta http-equiv="refresh" content="0; url=../agendamento.php"> 
    <?php 


    }}
    ?>
    
