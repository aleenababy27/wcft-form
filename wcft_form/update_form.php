<?php
include('config/db.php');
$inputs = $_POST;
$params = [
 $inputs['id'], $inputs['firstname'],$inputs['surname'],$inputs['dob'],$inputs['age'],
 $inputs['q1'],$inputs['q2'],$inputs['q3'],$inputs['q4'],$inputs['q5'],
 $inputs['q6'],$inputs['q7'],$inputs['q8'],$inputs['q9'],$inputs['q10'],$inputs['q11'],$inputs['q12'],
 $inputs['total']
];
$sql = "{CALL sp_UpdateForm(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";
$stmt = sqlsrv_query($conn,$sql,$params);
if($stmt) header("Location: admin.php");
else die(print_r(sqlsrv_errors(), true));
?>
