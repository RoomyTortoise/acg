<?php
// Database credentials
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'your_database_username');
define('DB_PASSWORD', 'your_database_password');
define('DB_NAME', 'contact_form_db');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Prepare the SQL statement
  $stmt = $conn->prepare("INSERT INTO contact_form_entries (name, email, message) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $message);

  // Execute the statement and check the result
  if ($stmt->execute()) {
    echo "Your message was saved successfully. Thank you!";
  } else {
    echo "There was an error saving your message. Please try again.";
  }

  // Close the statement and the connection
  $stmt->close();
  $conn->close();
} else {
  // Redirect to the contact page if the form was not submitted
  header("Location: contact.html");
}
?>
