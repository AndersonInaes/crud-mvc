<?php
require_once __DIR__ . "/../../../vendor/autoload.php";
require_once __DIR__ . "../../../Controller/UserController.php";
use App\conrtoller\UserController as UserController;
use App\Entity\People;

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$pessoaController = new UserController();
$pessoa = $pessoaController->getById($id);

$result = "";

if(filter_input(INPUT_POST, "txtName")){
  $pessoa = new People(
    filter_input(INPUT_POST, "txtId", FILTER_SANITIZE_NUMBER_INT),
    filter_input(INPUT_POST, "txtName", FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL),
    filter_input(INPUT_POST, "gen", FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING)
  );
  $u = new UserController();
  $u->update($pessoa);
  
  if($u){
    $result = "<div class='alert bg-green'>Pessoa Alterada</div>";
  }else{
    $result = "<div class='alert bg-red'>Erro ao alterar</div>";
  }
}
?>
<html>
    <head>
    <link rel="stylesheet" href="../../../public/docs/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../../public/css/style.css">

    </head>
<body>
    <main>
      <form method="post">
      <fieldset>
      <div class="form-group">
      <label for="exampleInputEmail1">Email </label>
      <input value="<?=$pessoa->getEmail(); ?>" type="email" class="form-control" id="txtEmail" name="txtEmail" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="hidden" name="txtId" value="<?=$pessoa->getId(); ?>">
      <input type="text" class="form-control" id="txtName" name="txtName" value="<?=$pessoa->getName(); ?>" placeholder="Your Name">
    </div>

    <div class="form-group">
      <label for="gen">Select Gen</label>
      <select class="form-control" id="gen" name="gen">
        <option value="M" <?=$pessoa->getGen() == "M" ? "selected" : "" ?>>Masculino</option>
        <option value="F" <?=$pessoa->getGen() == "F" ? "selected" : "" ?>>Feminino</option>
      </select>
    </div>

    <div class="form-group">
      <label for="state">Select State</label>
      <select class="form-control" id="state" name="state">
        <option value="Rio Grande Do Sul">RS</option>
        <option value="Sao Paulo">SP</option>
        <option value="Rio de Janeiro">RJ</option>
        <option value="Minas Gerais">MG</option>
        <option value="Santa catarina">SC</option>
      </select>
    </div>

    <div class="btn-group-vertical">
      <input type="submit" class="btn btn-primary" value="Atualizar"/>
    </div>
    <a href="../../../" class="btn btn-primary">Voltar</a>
      </form>
      <?=$result;?>

  </main> 
</body>
    </html>