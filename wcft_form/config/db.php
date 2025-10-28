<?php
$serverName = "localhost\\SQLEXPRESS";
$connectionOptions = [
    "Database" => "WCFT_DB",
    "Uid" => "sa",
    "PWD" => "your_password"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if (!$conn) die(print_r(sqlsrv_errors(), true));
?>
