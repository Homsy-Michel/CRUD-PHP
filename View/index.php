<?php
  require_once '../Controller/pessoaController.php';
  require_once '../Model/usuarios.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Cadastro</title>
</head>
<body>
<?php
  $p = new PessoaController();

  if(isset($_POST['nome'])){

    if(isset($_GET['id_up']) && !empty($_GET['id_up'])){
      $id_up = addslashes($_GET['id_up']);
      $nome = addslashes($_POST['nome']);
      $telefone = addslashes($_POST['telefone']);
      $email = addslashes($_POST['email']);
      $p->atualizarController($id_up, $nome, $telefone, $email);
      header("location: index.php");

    }else{
      $nome = addslashes($_POST['nome']);
      $telefone = addslashes($_POST['telefone']);
      $email = addslashes($_POST['email']);
      $p->cadastrarController($nome, $telefone, $email);
    }
  }
  
?>
<?php
  $p = new PessoaController();

  if(isset($_GET['id_up'])){
    $res = $p->buscarDadosController($_GET['id_up']); 
  }
?>

  <section id="esquerda">
    <form method="POST">
      <h2>CADASTRAR PESSOA</h2>
      <label for="nome">Nome</label>
      <input type="text" name="nome" id="nome" placeholder="Nome" 
      value ="<?php if(isset($res)){echo $res['nome'];}?>">
      <label for="telefone">Telefone</label>
      <input type="text" name="telefone" id="telefone" placeholder="Telefone"
      value ="<?php if(isset($res)){echo $res['telefone'];}?>">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" placeholder="Email"
      value ="<?php if(isset($res)){echo $res['email'];}?>">
      <input type="submit" value="<?php if(isset($res)){echo "Atualizar";}else{ echo"Cadastrar";} ?>">
    </form>
  </section>

  <section id="direita">
  <table>
      <tr id="titulo">
        <td>NOME</td>
        <td>TELEFONE</td>
        <td colspan="2">EMAIL</td>
      </tr>
  <?php
    $p = new PessoaController();
    $p->buscaController();
    if(isset($_GET['id'])){
      $p->excluirController($_GET['id']);
    }
  ?>
    </table>    
  </section>
</body>
</html>



