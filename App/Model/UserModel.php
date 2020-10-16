<?php
namespace App\model;

require __DIR__ . '../../../vendor/autoload.php';

use App\Entity\People;

use App\core\Conection;
use PDOException;

class UserModel
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new Conection();
    }

    public function create(People $people)
    {
        try {
            $sql = "INSERT INTO user (nome,email,gen,estado) VALUE (:nome, :email, :gen, :estado)";
            $params = [
                ":nome" => $people->getName(),
                ":email" => $people->getEmail(),
                ":gen" => $people->getGen(),
                ":estado" => $people->getState()
            ];

            $r =  $this->pdo->ExecuteNonQuery($sql, $params);

            if ($r > 0)
                return $this->pdo->GetLastId();
            else
                return -1;
        } catch (\Throwable $th) {
            echo "Erro" . $th->getMessage();
        }
    }
    public function update(People $people)
    {
        try {
            $sql = "UPDATE user SET nome = :nome, email = :email, gen = :gen, estado = :estado WHERE id = :id";
            $params = [
                ":id"     => $people->getId(),
                ":nome"   => $people->getName(),
                ":email"  => $people->getEmail(),
                ":gen"   => $people->getGen(),
                ":estado" => $people->getState()
            ];

            return $this->pdo->ExecuteNonQuery($sql, $params);
        } catch (PDOException $ex) {
            echo "ERRO: {$ex->getMessage()}";
            return false;
        }
    }

    public function getAll()
    {
        try {
            $sql = "SELECT id, nome, email, gen, estado FROM user ORDER BY nome ASC";
            $results = $this->pdo->ExecuteQuery($sql);

            $list= [];

            foreach($results as $result){
                $list[] = new People(
                    $result["id"],
                    $result["nome"],
                    $result["email"],
                    $result["gen"],
                    $result["estado"]
                );
            }
            return $list;
        } catch (\Throwable $ex) {
            echo "ERRO: {$ex->getMessage()}";
            return false;
        }
    }

    public function getById(int $peopleId)
    {
        try {

            $sql = "SELECT nome,email,gen,estado  FROM user WHERE id = :id ORDER BY nome ASC";
            $param = ["id" => $peopleId];
            $result = $this->pdo->ExecuteQueryOneRow($sql, $param);
                return new People(
                    $peopleId,
                    $result["nome"],
                    $result["email"],
                    $result["gen"],
                    $result["estado"]
                );

        } catch (\Throwable $ex) {
            echo "ERRO: {$ex->getMessage()}";
            return false;
        }
    }
    public function search(string $term){
        try {
          $sql = "SELECT id, nome, email, gen, estado  FROM user WHERE LOWER(nome) LIKE :nome OR LOWER(email) LIKE :email ORDER BY nome ASC";
          $params = [
            ":nome"  => "%{$term}%",
            ":email" => "%{$term}%"
          ];
          $results = $this->pdo->ExecuteQuery($sql, $params);
          $list = [];
    
          foreach($results as $result){
            $list[] = new People(
              $result["id"],
              $result["nome"],
              $result["email"],
              $result["gen"],
              $result["estado"]
            );
          }
    
          return $list;
        } catch(PDOException $ex){
          echo "ERRO: {$ex->getMessage()}";
          return false;
        }
      }
    
      public function delete(int $peopleId){
        try{
          $sql = "DELETE FROM user WHERE id = :id";
          $param = [":id" => $peopleId];
    
          return $this->pdo->ExecuteNonQuery($sql, $param);
        }catch(PDOException $ex){
          echo "ERRO: {$ex->getMessage()}";
          return false;
        }
      }
}