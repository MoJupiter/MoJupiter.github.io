<?php

namespace MyApp\Exception;

class DuplicateUser extends \Exception{
  protected $message = '同じユーザー名の人がいるよ〜';

}
