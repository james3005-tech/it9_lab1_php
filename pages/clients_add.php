<?php
include "../db.php";
 
$message = "";
 
if (isset($_POST['save'])) {
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
 
  if ($full_name == "" || $email == "") {
    $message = "Name and Email are required!";
  } else {
    $sql = "INSERT INTO clients (full_name, email, phone, address)
            VALUES ('$full_name', '$email', '$phone', '$address')";
    mysqli_query($conn, $sql);
    header("Location: clients_list.php");
    exit;
  }
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Client</title>

<link rel="stylesheet" href="../style.css">
</head>
<body>
<?php include "../nav.php"; ?>

<div class="form-container">
  <h2>Add Client</h2>

  <?php if ($message != ""): ?>
    <div class="error-message"><?php echo $message; ?></div>
  <?php endif; ?>

  <form method="post" class="client-form">

    <div class="form-group">
      <label>Full Name*</label>
      <input type="text" name="full_name">
    </div>

    <div class="form-group">
      <label>Email*</label>
      <input type="text" name="email">
    </div>

    <div class="form-group">
      <label>Phone</label>
      <input type="text" name="phone">
    </div>

    <div class="form-group">
      <label>Address</label>
      <input type="text" name="address">
    </div>

    <button type="submit" name="save" class="btn-save">Save Client</button>

  </form>
</div>

</body>
</html>