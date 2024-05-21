<?php
session_start() ;
/*
   k�ls� f�jl inklud�l�sa
*/

include("inc/database.php") ;

/*
   f�ggv�nyek beh�v�sa
*/


connect();


if(isset($_GET["pf"]))  
  include('pages/' . $_GET["pf"] . '.php') ;



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
  <head>                                    
    <title>H�rek</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-2" />
  </head>
  <body>
    <div class="left">
<?php

error_reporting(E_ALL & ~E_NOTICE);
if($_GET[m] == "logout_ok") print "Kijelentkez�s sikeres!"; //az �zenet �rt�k f�ggv�ny�ben val� felt�telek
error_reporting(E_ALL & ~E_NOTICE);
if($_GET[m] == "login_ok") print "A bejelentkez�s sikeres!<br />";
error_reporting(E_ALL & ~E_NOTICE);
if($_GET[m] == "login_failed") print "A bejelentkez�s SIKERTELEN!";



if(empty($_SESSION[id])) {                    //bejelentkez�s vizsg�lata
     //form l�trehoz�sa
     print'
     <img src="logo.gif"/>
     <form method="post" action="index.php?pf=login/check_login">           
     <table>
	 <tr>
     <td>N�v:</td>
     <td><input class="logininput" type="text" name="login" /></td>
	 </tr><tr>
     <td>Jelsz�:</td>
     <td><input class="logininput" type="password" name="pass" /></td>
     </tr>
     <tr>
     <td colspan="2"><input class="loginsubmit" type="submit" value="Bejelentkez�s" /></td>
	 </tr>
	 </table>
	 </form>
    ';

    print "<a href=\"index.php?p=reg/reg\">Regisztr�ci�</a>";
    }
else    //bejelenkezett felhaszn�l� �dv�zl�se
    print "
    <img src=\"logo.gif\"/>
    �dv�z�llek $_SESSION[login]!<br />
    
    <a href=\"index.php?pf=login/logout\">Kijelentkez�s</a>";
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