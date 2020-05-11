<?php
require_once(__DIR__ . '/../config/config.php');
$app = new MyApp\Controller\Login();
$app->run();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Log in</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="container">
      <form action="" method="post" id="login">
        <p>
          <input type="text" name="user" placeholder="user" value="<?= isset($app->getValues()->user) ? h($app->getValues()->user):'' ?>">
        </p>
        <p>
          <input type="password" name="password" placeholder="password">
        </p>
        <p class="err"><?= h($app->getErrors('login')); ?></p>
        <div class="btn" onclick="document.getElementById('login').submit();">Login</div>
        <p class="fs12"><a href="/signup.php">Sign Up</a></p>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </form>
  </div>
</body>
</html>
