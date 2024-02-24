<?php

$to = 'prateekjoshi0123@gmail.com';
$from = 'contact-form@uucsc-uit.netlify.app';
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
$text = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

$message = "You have received a new message from the contact form.\n\n";
$message .= "Name: " . $name . "\n";
$message .= "Email: " . $email . "\n";
$message .= "Subject: " . $subject . "\n";
$message .= "Message: \n" . $text . "\n";

if (filter_var($from, FILTER_VALIDATE_EMAIL)) {
  $headers = ['From' => ($name?"<$name> ":'').$from,
          'X-Mailer' => 'PHP/' . phpversion()
         ];

  mail($to, $subject, $message, $headers);
  die('OK');
  
} else {
  die('Invalid address');
}


