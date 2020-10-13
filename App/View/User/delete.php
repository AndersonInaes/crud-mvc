<?php

require_once __DIR__ . '/../Controller/UserController.php';
require_once __DIR__ . '/../../vendor/autoload.php';

use App\conrtoller\UserController as ConrtollerUserController;

$people = new ConrtollerUserController;
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if($people->delete($id)){
  header("Location: ../../index.php");
}else{
  echo "Erro ao deletar pessoa";
}
