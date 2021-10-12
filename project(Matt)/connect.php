<?php
/**
 * Class: csci490
 * Users: Matthew Simpson, Justin Bartholomew, Austin Taylor
 * Date: 10/9/21
 */

$dsn = 'mysql:host=localhost;dbname=csci490';
$user = 'csci490user';
$pwd = 'csci490user';

try{

    $pdo = new PDO($dsn,$user,$pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e)
{
    echo 'ERROR connecting to database!' . $e->getMessage();
    exit();
}
?>