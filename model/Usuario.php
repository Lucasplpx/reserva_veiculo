<?php


class Usuario {

    private $pdo;


    public function __construct(){
       
        try{
            $this->pdo = new PDO("mysql:dbname=reserva_veiculo;host=localhost", "root", "");
        }catch(PDOException $e){
            echo 'Erro '.$e->getMessage();
        }

    }


    public function adicionar($email , $senha) {

        if($this->existeEmail($email) == false){
            $sql = "INSERT INTO usuarios (email, senha) VALUES (:email , :senha)";
            $sql = $this->pdo->prepare($sql);      
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->execute();

            return true;
        } else {
            return false;
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


    public function editar($id ,$email ,$senha){
        
            $sql = "UPDATE usuarios SET email = :email , senha = :senha WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senha);
            $sql->bindValue(":id", $id);
            $sql->execute();
            
    }

    public function excluir($id){
       
            $sql = "DELETE FROM usuarios WHERE id = :id";
            $sql = $this->pdo->prepare($sql);
            $sql->bindValue(":id", $id);
            $sql->execute();

    }


    public function getUsuario($id){
        $sql = "SELECT id, email, senha FROM usuarios WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id",$id);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetch();
        } else {
            return array();
        }
    }




    private function existeEmail($email){
        $sql = "SELECT email FROM usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }

    }


    


    private function existeLivro($idlivro){
        $sql = "SELECT * FROM livros WHERE idlivro = :idlivro";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":idlivro", $idlivro);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }

    }

   

}

?>