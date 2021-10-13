<?php
/**
 * Class: csci490fa21
 * User: Justin Bartholomew
 * Date: 10/5/2020
 * Time: 11:48 PM
 */

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