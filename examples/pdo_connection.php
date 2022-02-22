<?php

include "credentials.php";

global $dbHandle;

$dbHandle = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$dbHandle->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// always disable emulated prepared statement when using the MySQL driver
$dbHandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);