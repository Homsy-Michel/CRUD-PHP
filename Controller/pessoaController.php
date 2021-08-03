<?php
  require_once "../Model/pessoa.php";

 class PessoaController {

  

  public function buscaController(){
    $p = new Pessoa();
    $dados = $p->buscarDados();

      if(count($dados) > 0){
        for ($i=0; $i < count($dados) ; $i++) { 
          echo "<tr>";
          foreach($dados[$i] as $k => $v) {
            if($k != "id"){
          echo "<td>".$v."</td>";
        }
      }
     ?> 
          <td>
          <a href="index.php?id_up=<?php echo $dados[$i]["id"];?>">Editar</a> 

          <a href="index.php?id=<?php echo $dados[$i]["id"];?>">Excluir</a>
          </td>
          
     <?php
          echo "</tr>";
      }
    }else{

        echo "<div class="."aviso".">
        <h4>Ainda não há pessoas cadsatradas</h4>
        </div>";
      
    }
  }
  public function cadastrarController($nome, $telefone, $email) {
    $p = new Pessoa();

      if(!empty($nome) && !empty($telefone) && !empty($email)){
        if(!$p->cadastrarPessoa($nome, $telefone, $email)){
          echo "<div>
          <h3>Email já está cadastrado</h3>
          </div>";
        }
    }
    else{
      echo "<div class="."aviso".">
      <img src="."../View/img/aviso.png".">
      <h4>Preencha todos os campos</h4>
      </div>";
    }
  }

  public function atualizarController($id, $nome, $telefone, $email){
    $p = new Pessoa();

    if(!empty($id) && !empty($nome) && !empty($telefone) && !empty($email)){
      if(!$p->atualizarDados($id, $nome, $telefone, $email)){
        echo "Email ja cadastrado";
      }  
  }
  else{
    echo "<div class="."aviso".">
    <img src="."../View/img/aviso.png".">
    <h4>Preencha todos os campos</h4>
    </div>";
  }
}

  public function excluirController($id) {
    $p = new Pessoa();
    
    if(!empty($id)){
      $id_pessoa = addslashes($id);
      $p->excluirPessoa($id_pessoa);
      header("location: index.php");
    }
  }

  
  public function buscarDadosController($id) {
    $p = new Pessoa();

      if(!empty($id)){
        $id_update = addslashes($id);
        $res = $p->buscarDadosPessoa($id_update);
        
      }

      return $res;
    }

  } 
?>

