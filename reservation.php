<?php
include('indexController.php');
include_once('includes/head.php');
include_once('includes/body.php');
if (isset($_GET)) {
    include_once("php/msg.php");
}
include_once('modules/'.$lenguaje.'/book.php');
include_once('includes/scripts.php');
?>
