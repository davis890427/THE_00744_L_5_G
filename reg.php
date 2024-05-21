<?php

if((isset($_POST['felhnev']) && isset($_POST[jelsz]))  &&( strlen($_POST['felhnev']) == 0 || strlen($_POST[jelsz]) == 0)){
    echo "A mezõk kitöltése hibás!";
}else if(isset($_POST['felhnev']) && isset($_POST[jelsz])) {
    $query = "INSERT INTO users (login, pass) values('$_POST[felhnev]', '$_POST[jelsz]')";
    mysql_query($query) or die(mysql_error() . $query);
    echo "Sikeres regisztráció!";
}
?>


<h1>Regisztráció</h1>
<form method="post" action="index.php?p=reg/reg">
  <table>
    <tr>
    <td>Felhasználói név:</td>
    <td><input class="" type="text" name="felhnev" /></td>
    </tr><tr>
    <td>Jelszó:</td>
    <td><input class="" type="password" name="jelsz" /></td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" value="Elküld"/></td>
    </tr>
  </table>
</form>