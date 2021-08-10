<?php 

$servername = 'localhost:3306';
$dBUsername = 'root';
$dBPassword = 'vaporstepa103';
$dBName = 'login_system';

$conn = mysqli_connect($servername,$dBUsername,$dBPassword,$dBName);

if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
};