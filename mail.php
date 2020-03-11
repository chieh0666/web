<?php
$to_email = "jerry970246@yahoo.com.tw";
$subject = "寄信範本" . date("Y-m-d H:i:s",strtotime("now"));
$body = "信件內容";
// $headers = "From: sender\'s email";

$headers = 'From: jerry970246jp@gmail.com' . "\r\n";
$headers  .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

if(mail($to_email, $subject, $body, $headers)){
  echo "Email successfully sent to {$to_email}..." . "<br/>";
  echo $subject;
}else{
  echo "Email sending failed...";
}