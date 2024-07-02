<?php
session_start();

if(isset($_SESSION["fname"])){
    unset($_SESSION["fname"]);
    header("Location: page_03.php");
}