<?php


class Reserva {

    private $pdo;


    public function __construct(){
       
        try{
            $this->pdo = new PDO("mysql:dbname=reserva_veiculo;host=localhost", "root", "");
        }catch(PDOException $e){
            echo 'Erro '.$e->getMessage();
        }

    }



    public function getAll(){
        $sql = "SELECT * FROM usuarios";
        $sql = $this->pdo->query($sql);
        

        if($sql->rowCount() > 0){
            $info = $sql->fetchAll();
            return $info;
        }else{
            return array();
        }
    }


    public function editar($id ,$id_carro ,$data_inicio, $data_fim, $pessoa){
        
            $sql = "UPDATE reservas SET id_carro = :id_carro , data_inicio = :data_inicio, data_fim = :data_fim , pessoa = :pessoa WHERE id_r = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id_carro", $id_carro);
            $sql->bindValue(":data_inicio", $data_inicio);
            $sql->bindValue(":data_fim", $data_fim);
            $sql->bindValue(":pessoa", $pessoa);
            $sql->bindValue(":id", $id);
            $sql->execute();
            
    }

    public function excluir($id){
       
            $sql = "DELETE FROM reservas WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

    }


    public function getReserva($id){
        $sql = "SELECT * FROM reservas WHERE id_r = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else {
            return array();
        }
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
   

}

?>