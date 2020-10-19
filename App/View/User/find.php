<?php
require_once __DIR__ . "/../../../vendor/autoload.php";
require_once __DIR__ . "../../../Controller/UserController.php";

use App\conrtoller\UserController as UserController;

$peopleController = new UserController();
$term = filter_input(INPUT_GET, "find", FILTER_SANITIZE_STRING);
$list = [];

if($term){
  $list = $peopleController->search($term);
}
var_dump($_GET);
?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Genero</th>
      <th scope="col">Estado</th>
      <th scope="col">Edit</th>
      <th scope="col">Delet</th>

    </tr>
  </thead>
  <tbody>
          
  <?php
    foreach ($list as $people) {
   ?>
    <tr class="table-primary">
      <th scope="row"><?=$people->getId();?></th>
      <td><?=$people->getName(); ?></td>
      <td><?=$people->getEmail(); ?></td>
      <td><?=$people->getGen() == "F" ? "Feminino" : "Masculino"; ?></td>
      <td><?=$people->getState(); ?></td>
      <td>
        <a href="App/View/User/update.php?id=<?=$people->getId();?>" class="btn bg-blue">Editar</a>
      </td>
      <td>
        <a href="App/View/User/delete.php?id=<?=$people->getId();?>" class="btn bg-red" onclick="return confirm('Deseja remover?')">Remover</a>
      </td>
    </tr>
    <?php } ?>

  </tbody>
</table> 