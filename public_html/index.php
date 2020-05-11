<?php

// ユーザーの一覧

require_once(__DIR__ . '/../config/config.php');

// var_dump($_SESSION['me']);

$app = new MyApp\Controller\Index();

$app->run();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Index</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="container">
    <form action="logout.php" method="post" id="logout">
      <?= h($app->me()->user_name); ?><input type="submit" value="Log out" onclick="document.getElementById('logout').submit();">
      <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
    </form>

    <h1>Users <span class="fs12">(<?= count($app->getValues()->users); ?>)</span></h1>
    <ul>
      <?php foreach ($app->getValues()->users as $user) : ?>
        <li><?= h($user->user_name); ?><br><?= h($user->password); ?></li>
      <?php endforeach; ?>
    </ul>

  </div>
</body>
</html>
