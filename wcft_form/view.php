<?php
include('config/db.php');
$id = $_GET['id'];
$stmt = sqlsrv_query($conn, "{CALL sp_GetFormById(?)}", [$id]);
$form = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>View Form</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
<h3>Patient: <?= $form['FirstName'] . ' ' . $form['Surname'] ?></h3>
<p><strong>DOB:</strong> <?= $form['DateOfBirth']->format('Y-m-d') ?> | <strong>Age:</strong> <?= $form['Age'] ?></p>
<hr>
<h5>Responses</h5>
<ul>
<?php
for ($i=1; $i<=12; $i++) {
  echo "<li>Q$i: " . $form["Q$i"] . "</li>";
}
?>
</ul>
<h5>Total Score: <?= $form['TotalScore'] ?></h5>
<hr>
<a href="edit.php?id=<?= $id ?>" class="btn btn-warning">Edit</a>
<a href="delete.php?id=<?= $id ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
<a href="admin.php" class="btn btn-secondary">Back</a>
</div>
</body>
</html>
