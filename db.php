<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "machine_problem"; /* Database name */

$connect = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}