<?php

  $server = 'localhost';
  $dbuser = 'root';
  $dbpwd = '';
  $dbname = 'bankdb';

  $con = mysqli_connect($server, $dbuser, $dbpwd, $dbname);

  if (!$con) {
  	echo "error in establishing database connection";
  	exit();

  } //else {
  	//echo "database connected successfully";
 // }