<?php

namespace MyApp\Model;

class User extends \MyApp\Model {
  public function create($values) {
    $stmt = $this->db->prepare("
    insert into user (user_name, password, created, modified)
    values (:user_name, :password, now(), now())");

    $res = $stmt->execute([
      ':user_name' => $values['user'],
      ':password' => password_hash($values['password'], PASSWORD_DEFAULT)
    ]);

    // echo "return ";

    if($res === false){
      throw new \MyApp\Exception\DuplicateUser();
    }
  }

  public function login($values){
    $stmt = $this->db->prepare("select * from user where user_name = :user_name;");

    $res = $stmt->execute([
      ':user_name' => $values['user'],
    ]);

    $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
    $user = $stmt->fetch();
    // echo "return ";

    if(empty($user)){
      throw new \MyApp\Exception\UnmatchUserOrPassword();
    }
    if(!password_verify($values['password'], $user->password)){
      throw new \MyApp\Exception\UnmatchUserOrPassword();
    }
    return $user;
  }

  public function findAll(){

      $stmt = $this->db->query("select * from user order by id");
      $stmt->setFetchMode(\PDO::FETCH_CLASS, 'stdClass');
      return $stmt->fetchAll();

  }
}
