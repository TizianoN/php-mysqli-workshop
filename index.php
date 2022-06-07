<?php

require __DIR__ . '/Models/Posts.php';

$posts = Posts::all();

session_start();
$msg = $_SESSION['message'];
if ($msg) :
  echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  <strong>Message</strong> 
  $msg
</div>";

endif;
session_destroy();

$path = $_SERVER['REQUEST_URI'];
if (str_contains($_SERVER['REQUEST_URI'], '/create-post')) {  
  if (count($_POST) > 0) {
    Posts::create($_POST);
    header('Location: /');
    exit;
  }
  
  include __DIR__ . "/Views/create-post.php";
  exit;
}

if (str_contains($_SERVER['REQUEST_URI'], '/posts/')) {
  $id = explode("/", $_SERVER['REQUEST_URI'])[2];
  $single_post = Posts::findOne($id);
  include __DIR__ . "/Views/single-post.php";
  exit;
}

if ($_SERVER['REQUEST_URI'] == '/') {
  include __DIR__ . "/Views/list.php";
  exit;
}

include __DIR__ . "/Views/404.php";
exit;

?>