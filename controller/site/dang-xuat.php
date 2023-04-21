<?php
session_start();
require_once("../../autoload/autoload.php");
 if ( isset( $_SESSION['id_user'] )) {

 	unset($_SESSION['id_user']);
 	unset($_SESSION['name_user']);
 	unset($_SESSION['email_user']);
 }
 redirect_to('site/trang-chu');