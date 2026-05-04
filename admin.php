<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
    <a href="index.php">Home</a>
    <a href="bookings.php">Bookings</a>
    <a href="admin.php">Admin</a>
  </nav>

  <section class="landing">
    <h1>Admin Dashboard</h1>
    <p>Manage destinations and bookings with ease.</p>
  </section>

  <!-- Add Destination Form -->
  <h2>Add New Destination</h2>
  <form method="POST" class="form-box">
    <label>Name</label>
    <input type="text" name="name" required>

    <label>Location</label>
    <input type="text" name="location" required>

    <label>Description</label>
    <textarea name="description"></textarea>

    <label>Price</label>
    <input type="number" name="price" required>

    <label>Image URL</label>
    <input type="text" name="image_url">

    <button type="submit" name="add">Add Destination</button>
  </form>

  <?php
  if(isset($_POST['add'])){
    $conn->query("INSERT INTO destinations (name, location, description, price, image_url)
                  VALUES ('{$_POST['name']}', '{$_POST['location']}', '{$_POST['description']}', {$_POST['price']}, '{$_POST['image_url']}')");
    echo "<div class='success-msg'>Destination added successfully!</div>";
  }
  ?>

  <!-- View Bookings -->
  <h2>Bookings Overview</h2>
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
        $result = $conn->query("SELECT b.*, d.name AS dest_name FROM bookings b JOIN destinations d ON b.destination_id=d.id");
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

  <footer>
    <p>© 2026 Tourism Management System | Admin Panel</p>
  </footer>
</body>
</html>
