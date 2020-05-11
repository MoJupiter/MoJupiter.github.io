<?php

namespace MyApp\Exception;

class InvalidPassword extends \Exception{
  protected $message = 'a~z1~9でいれてね〜';
}
