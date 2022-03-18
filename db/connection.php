<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_master';

$connect = mysqli_connect($server, $username, $password, $database);

mysqli_query($connect, "SET NAMES 'utf8'");

if(!isset($_SESSION)){
    session_start();
}