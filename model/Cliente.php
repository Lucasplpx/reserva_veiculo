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


    public function adicionar($nome , $idade, $cpf, $dataNascimento, $endereco, $telefone, $celular) {

        if($this->existeCpf($cpf) == false){
            $sql = "INSERT INTO clientes (nome, idade, cpf, data_nascimento, endereco, telefone, celular) VALUES (:nome , :idade, :cpf, :dataNascimento, :endereco, :telefone, :celular)";
            $sql = $this->pdo->prepare($sql);      
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":idade", $idade);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":dataNascimento", $dataNascimento);
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":celular", $celular);
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


    public function editar($id ,$nome ,$idade, $cpf, $dataNascimento, $endereco, $telefone, $celular){
        
            $sql = "UPDATE clientes SET nome = :nome , idade = :idade , cpf = :cpf , data_nascimento = :dataNascimento, endereco = :endereco, telefone = :telefone, celular = :celular WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":idade", $idade);
            $sql->bindValue(":cpf", $cpf);
            $sql->bindValue(":dataNascimento", $dataNascimento);
            $sql->bindValue(":endereco", $endereco);
            $sql->bindValue(":telefone", $telefone);
            $sql->bindValue(":celular", $celular);
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