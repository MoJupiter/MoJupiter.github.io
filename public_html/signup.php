<?php
require_once(__DIR__ . '/../config/config.php');
//
$app = new MyApp\Controller\Signup();
$app->run();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Sign in</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="container">
      <form action="" method="post" id="signup">
        <p>
          <input type="text" name="user" placeholder="user" value="<?= isset($app->getValues()->user) ? h($app->getValues()->user):'' ?>">
        </p>
        <p class="err"><?= h($app->getErrors('user')); ?></p>
        <p>
          <input type="password" name="password" placeholder="password">
        </p>
        <p class="err"><?= h($app->getErrors('password')); ?></p>

      <div class="btn" onclick="document.getElementById('signup').submit();">Sign Up</div>
        <p class="fs12"><a href="/login.php">Log In</a></p>
        <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
      </form>
  </div>
</body>
</html>
