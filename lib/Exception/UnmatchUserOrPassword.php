<?php

namespace MyApp\Exception;

class UnmatchUserOrPassword extends \Exception{
  protected $message = 'ユーザー名かパスワードが違うよ〜';
}
