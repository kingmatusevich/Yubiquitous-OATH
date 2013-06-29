<?php
  include_once('Yubikey.php');
  $otp = $_GET['otp'];
  $obj;
  substr($otp, 0, 12);
  sha1(substr);
  $mysqli = new mysqli("localhost", "my_user", "my_password", "world");
  if ($mysqli->connect_errno)
  {
    printf('-1');
    exit();
  }
  /* Select queries return a resultset */
  if ($result = $mysqli->query("SELECT Data from Secrets WHERE ID='".mysqli_sanitize_input))
  {
    if ($result->num_rows != 1)
    {
      printf('0');
      exit();
    } else
    {
      $obj = $result->fetch_object();
      /* free result set */
      $result->close();
      $token = new Yubikey('id');
      $token->setCurlTimeout(20);
      $token->setTimestampTolerance(1000);
      if ($token->verify($otp))
      {
        printf($data);
      }
      else printf('0');
    }
  }
  $mysqli->close();
 ?>