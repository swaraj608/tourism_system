<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Admin Dashboard</h2>

  <!-- Add Destination Form -->
  <form method="POST" class="form-box">
    <h3>Add Destination</h3>
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="text" name="location" placeholder="Location" required><br><br>
    <textarea name="description" placeholder="Description"></textarea><br><br>
    <input type="number" name="price" placeholder="Price" required><br><br>
    <input type="text" name="image_url" placeholder="Image URL"><br><br>
    <button type="submit" name="add" class="book-btn">Add Destination</button>
  </form>

  <?php
  if(isset($_POST['add'])){
    $conn->query("INSERT INTO destinations (name, location, description, price, image_url)
                  VALUES ('{$_POST['name']}', '{$_POST['location']}', '{$_POST['description']}', {$_POST['price']}, '{$_POST['image_url']}')");
    echo "<p style='color:green;'>Destination added successfully!</p>";
  }
  ?>

  <!-- View Bookings -->
  <h3>Bookings</h3>
  <table border="1" style="width:80%; margin:auto; background:white;">
    <tr><th>Name</th><th>Email</th><th>Destination</th><th>Date</th><th>Status</th></tr>
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
  </table>
</body>
</html>
