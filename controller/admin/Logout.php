<?php
session_start();
require_once("../../autoload/autoload.php");
 if ( isset( $_SESSION['id'] )) {

 	unset($_SESSION['id']);
 	unset($_SESSION['name']);
 	unset($_SESSION['email']);
 	unset($_SESSION['image']);
 }
 redirect_to('admin');