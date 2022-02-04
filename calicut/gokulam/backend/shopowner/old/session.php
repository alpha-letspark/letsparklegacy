<?php
session_start();

if(!isset($_SESSION['user'])){
    die("Anda belum login");
}

if($_SESSION['user_privilege']="1"){
    die("Anda bukan admin");
}
?>