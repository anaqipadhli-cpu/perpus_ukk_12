<?php
define('BASEPATH', 'system');
require_once 'application/config/database.php';
$db_config = $db['default'];

$conn = mysqli_connect($db_config['hostname'], $db_config['username'], $db_config['password'], $db_config['database']);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SHOW TABLES");
while ($row = mysqli_fetch_array($result)) {
    echo $row[0] . "\n";
}
mysqli_close($conn);
