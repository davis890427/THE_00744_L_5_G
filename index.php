<?php
session_start() ;
/*
   külső fájl inkludálása
*/

include("inc/database.php") ;

/*
   függvények behívása
*/


connect();


if(isset($_GET["pf"]))  
  include('pages/' . $_GET["pf"] . '.php') ;



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
  <head>                                    
    <title>Hírek</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2" />
  </head>
  <body>
    <div class="left">
<?php

error_reporting(E_ALL & ~E_NOTICE);
if($_GET[m] == "logout_ok") print "Kijelentkezés sikeres!"; //az üzenet érték függvényében való feltételek
error_reporting(E_ALL & ~E_NOTICE);
if($_GET[m] == "login_ok") print "A bejelentkezés sikeres!<br />";
error_reporting(E_ALL & ~E_NOTICE);
if($_GET[m] == "login_failed") print "A bejelentkezés SIKERTELEN!";



if(empty($_SESSION[id])) {                    //bejelentkezés vizsgálata
     //form létrehozása
     print'
     <img src="logo.gif"/>
     <form method="post" action="index.php?pf=login/check_login">           
     <table>
	 <tr>
     <td>Név:</td>
     <td><input class="logininput" type="text" name="login" /></td>
	 </tr><tr>
     <td>Jelszó:</td>
     <td><input class="logininput" type="password" name="pass" /></td>
     </tr>
     <tr>
     <td colspan="2"><input class="loginsubmit" type="submit" value="Bejelentkezés" /></td>
	 </tr>
	 </table>
	 </form>
    ';

    print "<a href=\"index.php?p=reg/reg\">Regisztráció</a>";
    }
else    //bejelenkezett felhasználó üdvözlése
    print "
    <img src=\"logo.gif\"/>
    Üdvözöllek $_SESSION[login]!<br />
    
    <a href=\"index.php?pf=login/logout\">Kijelentkezés</a>";
?>
</div>
<div class="right">
<?php 
    if(isset($_GET["p"]) and !isset($_GET["pf"])) 
      include("pages/" . $_GET["p"] . ".php") ;
    elseif(!isset($_GET["pf"])) 
      include("pages/main.php") ;
?>
</div>
</body>
</html>