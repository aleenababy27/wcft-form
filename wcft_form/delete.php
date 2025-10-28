<?php
include('config/db.php');
$id = $_GET['id'];
$stmt = sqlsrv_query($conn, "{CALL sp_DeleteForm(?)}", [$id]);
if($stmt) header("Location: admin.php");
else die(print_r(sqlsrv_errors(), true));
?>
