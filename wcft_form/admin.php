<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Admin View</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<h3>Completed Forms</h3>
<table class="table table-bordered">
<tr><th>Date</th><th>First Name</th><th>Surname</th><th>Age</th><th>DOB</th><th>Total Score</th></tr>
<?php
$stmt = sqlsrv_query($conn, "{CALL sp_GetForms}");
while($r = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
 echo "<tr onclick=\"window.location='view.php?id={$r['Id']}'\">
 <td>{$r['CreatedAt']->format('Y-m-d')}</td>
 <td>{$r['FirstName']}</td>
 <td>{$r['Surname']}</td>
 <td>{$r['Age']}</td>
 <td>{$r['DateOfBirth']->format('Y-m-d')}</td>
 <td>{$r['TotalScore']}</td></tr>";
}
?>
</table>
</body>
</html>
