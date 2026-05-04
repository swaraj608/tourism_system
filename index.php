<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tourism Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Explore Destinations</h2>
  <div class="container">
    <?php
    $result = $conn->query("SELECT * FROM destinations");
    while($row = $result->fetch_assoc()) {
      echo "<div class='destination'>
              <h3>{$row['name']}</h3>
              <p><strong>Location:</strong> {$row['location']}</p>
              <p>{$row['description']}</p>
              <p><strong>Price:</strong> ₹{$row['price']}</p>
              <a class='book-btn' href='book.php?id={$row['id']}'>Book Now</a>
            </div>";
    }
    ?>
  </div>
</body>
</html>
