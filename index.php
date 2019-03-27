<?php
session_start();
error_reporting(0);
include'include/cryptage.php';
include 'logs/log.php'; //script permettant de faire les logs
include 'app/bdd.php';
require_once 'controleur/action.php';
?>