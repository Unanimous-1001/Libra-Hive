<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);

  // Validate input
  if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill in all required fields.";
    exit;
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
    exit;
  }

  // Send email
  $to = "noitamina999@gmail.com";
  $subject = "New Contact Form Submission";
  $body = "Name: $name\nEmail: $email\nMessage: $message";
  $headers = "From: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "Thank you for your message!";
  } else {
    echo "Sorry, there was a problem sending your message. Please try again later.";
  }
}
?>