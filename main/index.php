<?php
 
session_start();  
require_once('controller/controller.php' );
define('BASEPATH', dirname(__file__));
error_reporting(0);



$controller = new Controller();
$controller ->index();
