<?php


class Veiculo {

    private $pdo;


    public function __construct(){
       
        try{
            $this->pdo = new PDO("mysql:dbname=reserva_veiculo;host=localhost", "root", "");
        }catch(PDOException $e){
            echo 'Erro '.$e->getMessage();
        }

    }


    public function adicionar($marca , $modelo, $cor, $ano, $chassi) {

        if($this->existeModelo($modelo) == false){
            $sql = "INSERT INTO veiculos (marca, modelo, cor, ano, chassi) VALUES (:marca , :modelo, :cor, :ano, :chassi)";
            $sql = $this->pdo->prepare($sql);      
            $sql->bindValue(":marca", $marca);
            $sql->bindValue(":modelo", $modelo);
            $sql->bindValue(":cor", $cor);
            $sql->bindValue(":ano", $ano);
            $sql->bindValue(":chassi", $chassi);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }


    public function getAll(){
        $sql = "SELECT * FROM veiculos";
        $sql = $this->pdo->query($sql);
        

        if($sql->rowCount() > 0){
            $info = $sql->fetchAll();
            return $info;
        }else{
            return array();
        }
    }


    public function editar($id ,$marca ,$modelo, $cor, $ano, $chassi){
        
            $sql = "UPDATE veiculos SET marca = :marca , modelo = :modelo , cor = :cor , ano = :ano , chassi = :chassi WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":marca", $marca);
            $sql->bindValue(":modelo", $modelo);
            $sql->bindValue(":cor", $cor);
            $sql->bindValue(":ano", $ano);
            $sql->bindValue(":chassi", $chassi);
            $sql->bindValue(":id", $id);
            $sql->execute();
            
    }

    public function excluir($id){
       
            $sql = "DELETE FROM veiculos WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

    }


    public function getVeiculo($id){
        $sql = "SELECT * FROM veiculos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else {
            return array();
        }
    }

    public function getMarcaVeiculo($id){
        $sql = "SELECT * FROM veiculos WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch()['marca'];
        } else {
            return array();
        }
    }



    private function existeModelo($modelo){
        $sql = "SELECT modelo FROM veiculos WHERE modelo = :modelo";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":modelo", $modelo);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }

    }

   

}

?>