<?php

namespace MyApp\Controller;

class Login extends \MyApp\Controller {

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
    }catch(\MyApp\Exception\EmptyPost $e){
      $this->setErrors('login', $e->getMessage());
    }

    $this->setValues('user', $_POST['user']);

    if($this->hasError()){
      return;
    }else{
      try{
        $userModel = new \MyApp\Model\User();
        $user = $userModel->login([
          'user' => $_POST['user'],
          'password' => $_POST['password'],
        ]);
      }catch(\MyApp\Exception\UnmatchUserOrPassword $e){
        $this->setErrors('login', $e->getMessage());
        return;
      }
      session_regenerate_id(true);
      $_SESSION['me'] = $user;

      header('Location: ' . SITE_URL);
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
    if(!isset($_POST['user']) || !isset($_POST['password'])){
      echo "Invalid Form!!";
      exit;
    }

    if($_POST['user'] === '' || $_POST['password'] === ''){
      throw new \MyApp\Exception\EmptyPost();
    }
  }
}
