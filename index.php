<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tourism Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Navigation Bar -->
  <nav>
    <a href="index.php">Home</a>
    <a href="bookings.php">Bookings</a>
    <a href="admin.php">Admin</a>
  </nav>

  <!-- Landing Section -->
  <section class="landing">
    <h1>Welcome to Tourism Management System</h1>
    <p>Plan your trips with ease — browse destinations, book journeys, and manage reservations all in one place.</p>
    <a href="#destinations" class="cta-btn">Explore Destinations</a>
  </section>

  <!-- Destinations Section -->
  <h2 id="destinations">Explore Destinations</h2>
  <div class="container">
    <?php
    $result = $conn->query("SELECT * FROM destinations");
    while($row = $result->fetch_assoc()) {
      echo "<div class='destination'>
              <img src='{$row['image_url']}' alt='{$row['name']}'>
              <h3>{$row['name']}</h3>
              <p><strong>Location:</strong> {$row['location']}</p>
              <p>{$row['description']}</p>
              <p><strong>Price:</strong> ₹{$row['price']}</p>
              <a class='book-btn' href='book.php?id={$row['id']}'>Book Now</a>
            </div>";
    }
    ?>
  </div>

  <!-- Footer -->
  <footer>
    <p>© 2026 Tourism Management System | All Rights Reserved</p>
  </footer>
</body>
</html>
