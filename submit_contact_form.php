f ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];

  // Prepare the email
  $to = "your-email@example.com"; // Replace with your email address
  $subject = "Contact Form Submission from Aztec Consulting Group";
  $headers = "From: $email" . "\r\n" .
             "Reply-To: $email" . "\r\n" .
             "X-Mailer: PHP/" . phpversion();
  $body = "Name: $name\n" .
          "Email: $email\n\n" .
          "Message:\n$message";

  // Send the email
  if (mail($to, $subject, $body, $headers)) {
    echo "Your message was sent successfully. Thank you!";
  } else {
    echo "There was an error sending your message. Please try again.";
  }
} else {
  // Redirect to the contact page if the form was not submitted
  header("Location: contact.html");
}
?>