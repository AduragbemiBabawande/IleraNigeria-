<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_from = 'kehinde@ileranigeria.org';

$email_subject = 'New Form Submission @IleraNigeria';

$email_body = "User Name: $name.\n";
              "User Email: $visitor_email.\n";
              "Subject: $subject.\n";
              "User Message: $message.\n";

$to = 'ileranigeria1@gamil.com';

$headers = "From: $email_from \r\n";

$headers = "Reply-To: $visitor_email \r\n";


mail($to,$email_subject,$email_body,$headers);

header("Location: contact.html");?>