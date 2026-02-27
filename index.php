<?php

session_start();
 
// If not logged in, redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "db.php";
 
$clients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM clients"))['c'];
$services = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM services"))['c'];
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM bookings"))['c'];
 
$revRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(amount_paid),0) AS s FROM payments"));
$revenue = $revRow['s'];
?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="container">

        <h2>Dashboard</h2>
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

        <div class="dashboard">

            <div class="card">
                <h3>Total Clients</h3>
                <p><?php echo $clients; ?></p>
            </div>

            <div class="card">
                <h3>Total Services</h3>
                <p><?php echo $services; ?></p>
            </div>

            <div class="card">
                <h3>Total Bookings</h3>
                <p><?php echo $bookings; ?></p>
            </div>

            <div class="card">
                <h3>Total Revenue</h3>
                <p>₱<?php echo number_format($revenue,2); ?></p>
            </div>

        </div>

        <div class="quick-links">
            <a href="pages/clients_add.php">Add Client</a>
            <a href="pages/bookings_create.php">Create Booking</a>
        </div>

    </div>
</body>
</html>