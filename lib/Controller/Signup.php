<?php

namespace MyApp\Controller;

class Signup extends \MyApp\Controller {

  public function run() {
    if ($this->isLoggedIn()) {
      header('Location: ' . SITE_URL);
      exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $this->postProcess();
    }
  }

  protected function postProcess(){
    try{
      $this->_validate();
    }catch(\MyApp\Exception\InvalidUser $e){
      $this->setErrors('user', $e->getMessage());
    }catch(\MyApp\Exception\InvalidPassword $e){
      $this->setErrors('password', $e->getMessage());
    }

    $this->setValues('user', $_POST['user']);
    if($this->hasError()){
      return;
    }else{
      try{
        $userModel = new \MyApp\Model\User();
        $userModel->create([
          'user' => $_POST['user'],
          'password' => $_POST['password'],
        ]);
      }catch(\MyApp\Exception\DuplicateUser $e){
        $this->setErrors('user', $e->getMessage());
        return;
      }
      header('Location: ' . SITE_URL . '\login.php');
      exit;
    }
  }

  private function _validate(){
    // echo !isset($_POST['token']) || $_POST['token'] !== $_SESSION['token'] ;
    // var_dump();
    if(!isset($_POST['token'])){
      if($_POST['token'] !== $_SESSION['token']){
        echo "Invelid token";
        exit;
      }

    }

    if(!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['user'])){
      throw new \MyApp\Exception\InvalidUser();
    }

    if(!preg_match('/\A[a-zA-Z0-9]+\z/', $_POST['password'])){
      throw new \MyApp\Exception\InvalidPassword();
    }
  }
}
