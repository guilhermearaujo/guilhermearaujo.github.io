<?php
  // Check for empty fields
  if (empty($_POST['name'])    ||
      empty($_POST['email'])   ||
      empty($_POST['phone'])   ||
      empty($_POST['message']) ||
      !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
  {
    echo "No arguments Provided!";
    return false;
  }

  $name          = $_POST['name'];
  $email_address = $_POST['email'];
  $phone         = $_POST['phone'];
  $message       = $_POST['message'];

  // Create the email and send the message
  $to = 'contact@guilhermearaujo.me';
  $email_subject = "Website Contact Form:  $name";
  $email_body = "You have received a new message from your website contact form.\n\n"
              . "Here are the details:\n\n"
              . "Name: $name\n\n"
              . "Email: $email_address\n\n"
              . "Phone: $phone\n\n"
              . "Message:\n$message";

  $headers = "From: noreply@guilhermearaujo.me\n";
  $headers .= "Reply-To: $email_address";

  mail($to, $email_subject, $email_body, $headers);

  return true;
?>
