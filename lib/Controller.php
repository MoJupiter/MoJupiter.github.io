<?php

namespace MyApp;

class Controller {
  private $_errors;
  private $_values;

  public function __construct() {
    if(!isset($_SESSION['token'])){
      $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    }
    $this->_errors = new \stdClass();
    $this->_values = new \stdClass();
  }

  public function setErrors($key, $error){
    $this->_errors->$key = $error;
  }

  public function setValues($key, $value){
    $this->_values->$key = $value;
  }

  public function getErrors($key){

    if(isset($this->_errors->$key)){
      echo $this->_errors->$key;
      return $thid->_errors->$key;
    }else{
      // echo isset($this->_errors->$key);
      return '';
    }
    // echo isset($this->_errors->$key);
  }

  public function getValues(){
    return $this->_values;
  }
  public function hasError(){
    return !empty(get_object_vars($this->_errors));
  }

  protected function isLoggedIn() {
    return isset($_SESSION['me']) && !empty($_SESSION['me']);
  }

  public function me(){
    return $this->isLoggedIn() ? $_SESSION :null;
  }
}
