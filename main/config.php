<?php
$mysqli = new mysqli("localhost","root","","webtest");

//kiem ra ket noi
if ($mysqli->connect_errno) {
  echo "Ket noi loi " . $mysqli -> connect_error;
  exit();
}

?>