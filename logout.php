<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: login");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: home");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', null, -1, '/');
    return true;
} else {
    return false;
}
  header("Location: login");
  exit;
 }