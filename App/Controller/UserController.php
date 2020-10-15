<?php

namespace App\conrtoller;

use App\Entity\People;
use App\Model\UserModel;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function create(People $people)
    {
         if (strlen($people->getName()) < 3 || strlen($people->getName() > 100))
             return false;

        //  if (strlen($people->getEmail() < 5))
        //      return false;
        
        if($people->getGen() != "F")
        if($people->getGen() != "M")
        return false;

        if(strlen($people->getState() > 2))
        return false;

        $this->userModel->create($people);
      }

    public function update(People $people)
    {
      if($people->getId() < 1)
       return false;

      if(strlen($people->getName()) < 3 || strlen($people->getName()) > 100)
        return false;
      
      if(strlen($people->getEmail()) < 5)
        return false;
      
      if($people->getGen() != "F")
        if($people->getGen() != "M")
          return false;
      
      if(strlen($people->getState()) != 2)
        return false;
      
      return $this->userModel->update($people);
    }
    
    public function delete(int $peopleId){
        if($peopleId < 1)
          return false;
    
        return $this->userModel->delete($peopleId);
      }
    
      public function getAll(){
        return $this->userModel->getAll();
      }
    
      public function getById(int $peopleId){
        if($peopleId < 1)
          return null;
    
        return $this->userModel->getbyId($peopleId);
      }
    
      public function search(string $term){
        if(strlen($term) < 3)
          return null;
    
        return $this->userModel->search(strtolower($term));
      }
}
