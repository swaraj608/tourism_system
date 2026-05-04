<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $destination_id = $_POST['destination_id'];
  $date = $_POST['date'];

  $conn->query("INSERT INTO bookings (user_name, email, destination_id, booking_date)
                VALUES ('$name', '$email', $destination_id, '$date')");
  echo "<p style='color:green; text-align:center;'>Booking successful!</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Destination</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Book Your Trip</h2>
  <form method="POST" class="form-box">
    <input type="hidden" name="destination_id" value="<?php echo $_GET['id']; ?>">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Date:</label><br>
    <input type="date" name="date" required><br><br>
    <button type="submit" class="book-btn">Confirm Booking</button>
  </form>
</body>
</html>
