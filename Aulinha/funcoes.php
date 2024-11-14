<?php

class funcoes {
    private $pdo;
    
    public function __construct($dbname,$host,$user,$senha) {
        try{
            $this->pdo=new PDO("mysql:dbname=".$dbname.";host:".$host,$user,$senha);
        } catch (PDOException $ex) {
            echo "Erro com banco de dados ".$ex->getMessage();
            exit();
        }
    }
    
    public function cadastro($nome, $email, $senha) {
        $cmd = $this->pdo->query("SELECT email FROM contas WHERE email='$email'");
        if($cmd->rowCount()>0){
            return false;
        }
        else{
            $this->pdo->query("INSERT INTO contas(nome,email,senha) VALUES ('$nome', '$$email', '$senha')");
            return true;
        }
    }
    
    public function logar($email, $senha) {
        session_start();
        $cmd = $this->pdo->query("SELECT id FROM contas WHERE email='$email' AND senha='$senha'");
        if($cmd->rowCount()>0){
            $id=$cmd->fetch();
            $_SESSION['id']=$id['id'];
            return true;
        }
        else{
            return false;
        }
    }
}
