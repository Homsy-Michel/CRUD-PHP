<?php
require_once 'conexao.php';

Class Usuario extends Conexao {

  public function cadastrar($nome, $telefone, $email, $senha){
    $pdo = new Conexao();

    $cmd = $pdo->con()->prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
    $cmd->bindValue(":e", $email);
    $cmd->execute();

    if($cmd->rowCount() > 0) {
      return false;
    }else{
      $cmd = $pdo->con()->prepare("INSERT INTO usuarios (nome, telefone,
       email, senha) VALUES (:n, :t, :e, :s)");
    $cmd->bindValue(":n", $nome);
    $cmd->bindValue(":t", $telefone);
    $cmd->bindValue(":e", $email);
    $cmd->bindValue(":s", $senha);
    $cmd->execute();

    return true;

    }



  }

  public function logar($email, $senha){
    $pdo = new Conexao();

    
  }



}


?>