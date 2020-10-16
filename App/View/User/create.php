<?php
require './App/Controller/UserController.php';
require './vendor/autoload.php';

use App\Entity\People;
use App\Conrtoller\UserController;

$result = "";

$pessoa = new People(
    null,
    filter_input(INPUT_POST, "txtName", FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL),
    filter_input(INPUT_POST, "gen", FILTER_SANITIZE_STRING),
    filter_input(INPUT_POST, "state", FILTER_SANITIZE_STRING)
  );

if((new UserController())->create($pessoa)){
  $result = '<div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Cadastro Realizado Com Sucesso</strong>
            </div>';
     }else{
      $result =  "error";
}
?>

<body>
<form method="post">
  <fieldset>
    <legend>New People</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Email </label>
      <input type="email" class="form-control" id="txtEmail" name="txtEmail" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Your Name">
    </div>
    <div class="form-group">
      <label for="gen">Select Gen</label>
      <select class="form-control" id="gen" name="gen">
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
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
      <button type="submit" class="btn btn-primary">Create People</button>
    </div>
    </form>
    <div>
      <?= $result; ?>
    </div>
</body>