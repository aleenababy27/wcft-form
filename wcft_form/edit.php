<?php
include('config/db.php');
$id = $_GET['id'];
$stmt = sqlsrv_query($conn, "{CALL sp_GetFormById(?)}", [$id]);
$form = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Form</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="p-4">
<div class="container">
<h3>Edit Neuromodulation Form</h3>
<form method="POST" action="update_form.php">
<input type="hidden" name="id" value="<?= $id ?>">

<div class="mb-3">
<label>First Name</label>
<input name="firstname" value="<?= $form['FirstName'] ?>" class="form-control">
</div>
<div class="mb-3">
<label>Surname</label>
<input name="surname" value="<?= $form['Surname'] ?>" class="form-control">
</div>
<div class="mb-3">
<label>Date of Birth</label>
<input type="date" name="dob" value="<?= $form['DateOfBirth']->format('Y-m-d') ?>" class="form-control" id="dob">
</div>
<div class="mb-3">
<label>Age</label>
<input type="number" name="age" id="age" value="<?= $form['Age'] ?>" class="form-control" readonly>
</div>

<?php
for ($i=1; $i<=12; $i++) {
  $max = ($i==1)?100:10;
  echo "<label>Q$i (max $max)</label>
  <input type='number' name='q$i' value='{$form["Q$i"]}' min='0' max='$max' class='form-control score mb-2'>";
}
?>
<div class="mb-3">
<label>Total Score</label>
<input name="total" id="total" value="<?= $form['TotalScore'] ?>" class="form-control" readonly>
</div>

<button class="btn btn-success">Update</button>
<a href="admin.php" class="btn btn-secondary">Cancel</a>
</form>
</div>

<script>
$("#dob").on("change", function(){
  let dob = new Date($(this).val());
  let diff = Date.now() - dob.getTime();
  let age = new Date(diff).getUTCFullYear() - 1970;
  $("#age").val(age);
});

$(".score").on("input", function(){
  let total = 0;
  $(".score").each(function(i){
    if(i>0) total += parseInt($(this).val() || 0);
  });
  $("#total").val(total);
});
</script>
</body>
</html>
