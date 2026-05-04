<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>All Bookings</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Reuse your sidebar or nav -->
  <nav>
    <a href="index.php">Home</a>
    <a href="bookings.php">Bookings</a>
    <a href="admin.php">Admin</a>
  </nav>

  <h2>All Bookings</h2>
  <div class="table-container">
    <table class="styled-table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Destination</th>
          <th>Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = $conn->query("SELECT b.*, d.name AS dest_name 
                                FROM bookings b 
                                JOIN destinations d ON b.destination_id = d.id");
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['user_name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['dest_name']}</td>
                  <td>{$row['booking_date']}</td>
                  <td>{$row['status']}</td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
