<?php


//header include file

error_reporting(E_ALL);

ini_set('display_errors', 1);

$currentfile = basename($_SERVER['PHP_SELF']);

require_once "includes/connect.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team 2 Header File</title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5o7mj88vhvtv3r2c5v5qo4htc088gcb51913qx5wlrtjn81y"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
	 <link rel="stylesheet" href="includes/stylesheet.css">
<header>
    <nav>
       
    </nav>
    <div class="centerh1"><h1 class="h1">stuff</h1></div>
</header>