<?php
include('indexController.php');   
$title = "Home";
include_once('includes/head.php');
include_once('includes/body.php');
if (isset($_GET)) {
    include_once("php/msg.php");
}
include_once('modules/'.$lenguaje.'/header.php');
include_once('modules/'.$lenguaje.'/index.php');
include_once('modules/'.$lenguaje.'/footer.php');
include_once('includes/scripts.php');
?>
