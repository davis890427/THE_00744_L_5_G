<?php
if(isset($_POST["login"])) 
{
  $query = "SELECT * FROM users WHERE login='$_POST[login]'";
  $result = mysql_query($query) or die(mysql_error()); 
  $user_data = mysql_fetch_assoc($result) ;
  
  if(strlen($user_data[pass]) > 0 &&  $user_data[pass] == $_POST["pass"]) 
  {
    $_SESSION["login"] = $user_data[login];
    $_SESSION["pass"] = $user_data[pass];
    $_SESSION["id"] = $user_data[id];
    $_SESSION["level"] = $user_data[level] ;
    header('Location: index.php?m=login_ok');
    exit;
  }
  else
  {
    header('Location: index.php?m=login_failed');
    exit;
  }   
}  
?>
