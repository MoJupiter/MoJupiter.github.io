<?php

namespace MyApp\Exception;

class EmptyPost extends \Exception{
  protected $message = 'User名かPasswordがぬけてるよ〜。';
}
