<?php


Class Devolucao {
    
    private $pdo;

    public function __construct(){
       
        try{
            $this->pdo = new PDO("mysql:dbname=reserva_veiculo;host=localhost", "root", "");
        }catch(PDOException $e){
            echo 'Erro '.$e->getMessage();
        }

    }


    public function adicionar($pessoa, $carro){

        $sql = "INSERT INTO devolucao (pessoa, carro) VALUES (:pessoa, :carro)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":pessoa", $pessoa);
        $sql->bindValue(":carro", $carro);
        $sql->execute(); 

    }


    public function getNomeCarro($id){
        $info = "";
        $sql = "SELECT * FROM veiculos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            $info = $dado['marca'];

            return $info;     
        }else{
            return $info;
        }

    }

    public function excluirReserva($id){

        $sql = "DELETE FROM reservas WHERE id_r = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();


    }

    public function getDevolucao(){
        $sql = "SELECT * FROM reservas rs INNER JOIN clientes cli ON cli.id = rs.pessoa";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function getDevolucoes(){
        $sql = "SELECT * FROM devolucao";
        $sql = $this->pdo->prepare($sql);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll();
        }else {
            return array();
        }

    }




}

?>