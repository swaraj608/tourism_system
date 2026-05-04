<?php include 'db.php'; ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $destination_id = $_POST['destination_id'];
  $date = $_POST['date'];

  $conn->query("INSERT INTO bookings (user_name, email, destination_id, booking_date)
                VALUES ('$name', '$email', $destination_id, '$date')");
  echo "<div class='success-msg'>Booking successful! 🎉</div>";
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

    <label for="name">Full Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your full name" required>

    <label for="email">Email Address</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="date">Travel Date</label>
    <input type="date" id="date" name="date" required>

    <button type="submit" class="book-btn">Confirm Booking</button>
  </form>
</body>
</html>
