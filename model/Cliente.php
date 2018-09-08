<?php


class Cliente {

    private $pdo;


    public function __construct(){
       
        try{
            $this->pdo = new PDO("mysql:dbname=reserva_veiculo;host=localhost", "root", "");
        }catch(PDOException $e){
            echo 'Erro '.$e->getMessage();
        }

    }


    public function adicionar($nome , $idade, $cpf, $dataNascimento) {

        if($this->existeCpf($cpf) == false){
            $sql = "INSERT INTO clientes (nome, idade, cpf, data_nascimento) VALUES (:nome , :idade, :cpf, :dataNascimento)";
            $sql = $this->pdo->prepare($sql);      
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":idade", $idade);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":dataNascimento", $dataNascimento);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }


    public function getAll(){
        $sql = "SELECT * FROM clientes";
        $sql = $this->pdo->query($sql);
        

        if($sql->rowCount() > 0){
            $info = $sql->fetchAll();
            return $info;
        }else{
            return array();
        }
    }


    public function editar($id ,$nome ,$idade, $cpf, $dataNascimento){
        
            $sql = "UPDATE clientes SET nome = :nome , idade = :idade , cpf = :cpf , data_nascimento = :dataNascimento WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":idade", $idade);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":dataNascimento", $dataNascimento);
            $sql->bindValue(":id", $id);
            $sql->execute();
            
    }

    public function excluir($id){
       
            $sql = "DELETE FROM clientes WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

    }


    public function getCliente($id){
        $sql = "SELECT * FROM clientes WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else {
            return array();
        }
    }



    private function existeCpf($cpf){
        $sql = "SELECT cpf FROM clientes WHERE cpf = :cpf";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":cpf", $cpf);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }

    }


    function converteData($data){
        if ( strstr($data, "/") ) {
            $d = explode("/", $data);
            $rtdata = "$d[2]-$d[1]-$d[0]";
        }else {
            $d = explode("-", $data);
            $rtdata = "$d[2]/$d[1]/$d[0]";
        }
    
        return $rtdata;
    
    }

   

}

?>