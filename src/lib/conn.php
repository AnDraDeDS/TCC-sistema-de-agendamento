<?php 
    const DBDRIVE = "mysql";
    const DBHOST = "localhost";
    const DBNAME = "JRCAR";
    const DBUSER = "root";
    const DBPASS = "";

    $conn = new PDO(DBDRIVE.":hostname=".DBHOST.";dbname=".DBNAME,DBUSER,DBPASS);
?>