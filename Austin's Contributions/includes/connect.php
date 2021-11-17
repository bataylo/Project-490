<?php


$dsn = 'mysql:host=localhost;dbname=csci490db';
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