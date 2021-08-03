
<?php
  require_once "conexao.php";
  
  class Pessoa {
    public $pdo;
    

    public function __construct(){
      $this->pdo = new Conexao();
    }


    public function buscarDados()
    {
      $res = array();
      $cmd = $this->pdo->conexao()->query("SELECT * FROM  pessoa ORDER BY nome");
      $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }

    public function cadastrarPessoa($nome, $telefone, $email){
      
      $cmd = $this->pdo->conexao()->prepare("SELECT id FROM pessoa WHERE email = :e");
      $cmd->bindValue(":e", $email);
      $cmd->execute();

      if($cmd->rowCount() > 0){
        return false;
      }
      else{
        $cmd = $this->pdo->conexao()->prepare("INSERT INTO pessoa (nome, telefone, email)
        VALUES (:n, :t, :e)");
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":t", $telefone);
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        return true;
      }
    } 

    public function excluirPessoa($id){
      
      $cmd = $this->pdo->conexao()->prepare("DELETE FROM pessoa WHERE id = :id");
      $cmd->bindValue(":id", $id);
      $cmd->execute();
    }

    public function buscarDadosPessoa($id) {
      
      $res = array();
      $cmd = $this->pdo->conexao()->prepare("SELECT * FROM  pessoa WHERE id = :id");
      $cmd->bindValue(":id", $id);
      $cmd->execute();
      $res = $cmd->fetch(PDO::FETCH_ASSOC);
      return $res;
  
    }

    public function atualizarDados($id, $nome, $telefone, $email) {
      

      $cmd = $this->pdo->conexao()->prepare("SELECT id FROM pessoa WHERE email = :e");
      $cmd->bindValue(":e", $email);
      $cmd->execute();

      if($cmd->rowCount() > 0){
        $cmd = $this->pdo->conexao()->prepare("UPDATE pessoa SET nome = :n, telefone = :t  WHERE id = :id");
        $cmd->bindValue(":id", $id);
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":t", $telefone);
        $cmd->execute();

        return false;

      }else{
  
        $cmd = $this->pdo->conexao()->prepare("UPDATE pessoa SET nome = :n, telefone = :t, email = :e WHERE  id = :id"); 
        $cmd->bindValue(":id", $id); 
        $cmd->bindValue(":n", $nome);
        $cmd->bindValue(":t", $telefone);
        $cmd->bindValue(":e", $email);
        $cmd->execute();

        return true;
      }
    }
  }
  



?>