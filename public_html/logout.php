<?

require_once(__DIR__ . '/../config/config.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']){
    echo "Invalid Token!";
  }

  $_SESSION = [];

  if(isset($_COKKIE[session_name()])){
    setcookie(session_name(), '', time() - 86400, '/');
  }

  session_destroy();
}

// header('location: ' . SITE_URL . '/login.php');
header('location: ' . SITE_URL);
