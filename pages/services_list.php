<?php
include "../db.php";
$result = mysqli_query($conn, "SELECT * FROM services ORDER BY service_id DESC");
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Services</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <?php include "../nav.php"; ?>

  <div class="table-container">

    <div class="table-header">
      <h2>Services</h2>
    </div>

    <table class="styled-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Rate</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?php echo $row['service_id']; ?></td>
            <td><?php echo $row['service_name']; ?></td>
            <td>₱<?php echo number_format($row['hourly_rate'],2); ?></td>
            <td>
              <?php if($row['is_active']) { ?>
                <span class="badge-active">Active</span>
              <?php } else { ?>
                <span class="badge-inactive">Inactive</span>
              <?php } ?>
            </td>
            <td>
              <a href="services_edit.php?id=<?php echo $row['service_id']; ?>" class="btn-edit">Edit</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

  </div>
</body>

</html>