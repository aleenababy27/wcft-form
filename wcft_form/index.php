<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Neuromodulation Form</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="p-4">
<div class="container">
<h2>Neuromodulation</h2>

<form id="painForm" method="POST" action="save_form.php">
  <div class="card mb-3 p-3">
    <h5>Patient Details</h5>
    <input type="text" name="firstname" class="form-control mb-2" placeholder="First Name" required>
    <input type="text" name="surname" class="form-control mb-2" placeholder="Surname" required>
    <input type="date" name="dob" id="dob" class="form-control mb-2" required>
    <input type="number" name="age" id="age" class="form-control mb-2" placeholder="Age" readonly>
  </div>

  <div class="card mb-3 p-3">
    <h5>Brief Pain Inventory</h5>
    <?php
    $questions = [
      "How much relief have pain treatments provided?" => 100,
      "Pain at its WORST in the past week?" => 10,
      "Pain at its LEAST in the past week?" => 10,
      "Pain on average?" => 10,
      "Pain RIGHT NOW?" => 10,
      "Interfered with: General Activity?" => 10,
      "Interfered with: Mood?" => 10,
      "Interfered with: Walking ability?" => 10,
      "Interfered with: Normal work?" => 10,
      "Interfered with: Relationships?" => 10,
      "Interfered with: Sleep?" => 10,
      "Interfered with: Enjoyment of life?" => 10
    ];
    $i = 1;
    foreach($questions as $q => $max){
      echo "<label>$i. $q ($max)</label>
            <input type='number' name='q$i' class='form-control mb-2 score' min='0' max='$max' required>";
      $i++;
    }
    ?>
  </div>

  <div class="card p-3">
    <h5>Total Score</h5>
    <input type="text" name="total" id="total" class="form-control" readonly>
  </div>

  <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
