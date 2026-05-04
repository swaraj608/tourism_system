<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <!-- Sidebar Navigation -->
<div class="sidebar">
  <h2>Admin Panel</h2>
  <ul>
    <li><a href="admin.php"><span class="icon">🏠</span> Dashboard</a></li>
    <li><a href="admin.php#add-destination"><span class="icon">➕</span> Add Destination</a></li>
    <li><a href="admin.php#bookings"><span class="icon">📑</span> Bookings</a></li>
    <li><a href="index.php"><span class="icon">🌍</span> Back to Home</a></li>
  </ul>
</div>


  <!-- Main Content -->
  <div class="main-content">
    <header class="admin-header">
      <h1>Welcome, Admin</h1>
      <p>Manage destinations and bookings efficiently</p>
    </header>

    <!-- Quick Stats -->
    <div class="stats">
      <?php
        $dest_count = $conn->query("SELECT COUNT(*) AS total FROM destinations")->fetch_assoc()['total'];
        $book_count = $conn->query("SELECT COUNT(*) AS total FROM bookings")->fetch_assoc()['total'];
      ?>
      <div class="card">
        <h3>Total Destinations</h3>
        <p><?php echo $dest_count; ?></p>
      </div>
      <div class="card">
        <h3>Total Bookings</h3>
        <p><?php echo $book_count; ?></p>
      </div>
    </div>

    <!-- Add Destination Form -->
    <h2 id="add-destination">Add New Destination</h2>
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

    <!-- Bookings Table -->
    <h2 id="bookings">Bookings Overview</h2>
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
  </div>
</body>
</html>
