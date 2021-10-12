<?php
/**
 * Class: csci490
 * Users: Matthew Simpson, Justin Bartholomew, Austin Taylor
 * Date: 10/9/21
 */

//header include file

error_reporting(E_ALL);

ini_set('display_errors', 1);

$currentfile = basename($_SERVER['PHP_SELF']);

require_once "connect.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team 2 Header File</title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5o7mj88vhvtv3r2c5v5qo4htc088gcb51913qx5wlrtjn81y"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
<header>
    <nav>
       
    </nav>
    <div class="centerh1"><h1 class="h1">stuff</h1></div>
</header>
<div class="center"><h2><?php echo $currentfile; ?> </h2></div>