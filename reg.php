<?php

if((isset($_POST['felhnev']) && isset($_POST[jelsz]))  &&( strlen($_POST['felhnev']) == 0 || strlen($_POST[jelsz]) == 0)){
    echo "A mez�k kit�lt�se hib�s!";
}else if(isset($_POST['felhnev']) && isset($_POST[jelsz])) {
    $query = "INSERT INTO users (login, pass) values('$_POST[felhnev]', '$_POST[jelsz]')";
    mysql_query($query) or die(mysql_error() . $query);
    echo "Sikeres regisztr�ci�!";
}
?>


<h1>Regisztr�ci�</h1>
<form method="post" action="index.php?p=reg/reg">
  <table>
    <tr>
    <td>Felhaszn�l�i n�v:</td>
    <td><input class="" type="text" name="felhnev" /></td>
    </tr><tr>
    <td>Jelsz�:</td>
    <td><input class="" type="password" name="jelsz" /></td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" value="Elk�ld"/></td>
    </tr>
  </table>
</form>