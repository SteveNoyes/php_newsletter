<?php
// get the form input values
$name = $_POST['name'];
$email = $_POST['email'];

// connect to the database
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabasename";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO newsletter_signup (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);
$stmt->execute();

// check if the query was successful
if ($stmt->affected_rows > 0) {
  echo "Thank you for signing up for our newsletter!";
} else {
  echo "Sorry, there was an error processing your request.";
}

// close the database connection
$stmt->close();
$conn->close();
?>