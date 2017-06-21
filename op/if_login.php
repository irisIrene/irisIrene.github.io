<?php 
session_start();
include_once('../conn/conn.php');
if(!$_SESSION['name']) {header("Location:../index.php");}
?>