<?php

try{

    $dsn = "mysql:dbname=reserva_veiculo;host=localhost";
    $user = "root";
    $pass = "";

    $pdo = new PDO($dsn, $user, $pass);


}catch(PDOException $e){
    echo 'Erro '.$e->getMessage();
}

?>