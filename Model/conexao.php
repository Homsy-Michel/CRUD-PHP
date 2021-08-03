<?php

class Conexao {
  private $pdo;

  public function conexao(){
      try 
    {
      $this->pdo = new PDO("mysql:dbname=CRUDPDO;host=localhost", "root","suikodensan13");
    }
    catch(PDOException $e)
    {
      echo "Erro com banco de dados: ". $e->getMessage();
    }
    catch(Exception $e)
    {
      echo "Erro generico: ". $e->getMessage;
    }

    return $this->pdo;
  }
}


?>