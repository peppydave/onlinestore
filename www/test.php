<?php
define ('DBNAME', 'onlinestore');
define('DBUSER', 'root');
define('DBPASS', 'peppydev');
$pdo = new PDO ('mysql:host=localhost;dbname =' .DBNAME, DBUSER, DBPASS);

?>
