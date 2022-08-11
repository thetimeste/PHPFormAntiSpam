<?php

function email(){
  
  //get values from page.
  $name= $_POST["name"];
  $email=$_POST["email"];
  $message=$_POST["message"];
  $spam=$_POST["spam"];
  $captcha=$_POST["captcha"];
  
  //variables for validity check.
  $captcha_answer=2;
  $valid=true;
  
  //list of banned names.
  $bannedNames = array("John Doe","Bob","Alice");
  
  //list of banned emails.
  $bannedEmails = array("DefinitelyNotBob@email.com","DefinitelyNotAlice@email.com");
  
  //list of banned words in the message.
  $bannedWords = array("404", "ArrayOutOfBounds");
  

  //check if list of banned names is contained in name form. if true set valid to false.
  foreach ($bannedNames as $value) {
      if(strpos($name, $value) !== false){
          $valid=false;
      }
  }
 
  //check if list of banned emails is contained in name form. if true set valid to false.
  foreach ($bannedEmails as $value) {
      if(strpos($email, $value) !== false){
          $valid=false;
      }
  }
  
  //check if list of banned words is contained in name form. if true set valid to false.
  foreach ($bannedWords as $value) {
      if(strpos($message, $value) !== false){
          $valid=false;
      }
  }
  
  //check if the spam hidden field got compiled, if true means a bot compiled it set therefore set valid to false.
  if(!strlen($spam)==0){
      $valid=false;
  }
  
  //check if the answer to captcha is correct, if not set valid to false.
  if(strcmp($captcha, $captcha_answer)!==0){
      $valid=false;
  }
  
  //if is valid send the email
  if($valid){
      //build the email message that will be sent to your inbox
      $messagemail= "Nome Mittente: ".$name."\nEmail Mittente: ".$email."\nMessaggio: ".$message;
      //send the email
      mail("stefano99.developer@gmail.com","email sito",$messagemail);
      //open a popup
      $message = "Message has been sent.";
      echo "<script type='text/javascript'>alert('$message');</script>";
      //close the window
      echo "<script>window.close();</script>";
  }
  else{
      echo "<script>window.close();</script>";
  }
}
email();
 
?>