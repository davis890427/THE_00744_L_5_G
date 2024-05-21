
<?php
if($_GET[m] == "hir_ok") print "A hír felvitele sikeres!";      //üzenetek megadása
if($_GET[m] == "hir_empty") print "Tölts ki minden mezõt!";

if($_GET[m] == "kep_hiba") print "Hibás képet adtál meg!";
if($_GET[m] == "fajl_hiba") print "Hibás fájlt adtál meg!";

if($_GET[m] == "hirtorles_ok") print "A hír sikeresen törölve!";
if($_GET[m] == "hirmod_ok") print "A hír sikeresen módosítva!";

if(empty($_SESSION[id]))    //bejelenkezés vizsgálata
    print "Új hír beküldéséhez jelentkezz be!";
else
{

?>
<!-- beküldõ form létregozása-->
<form enctype="multipart/form-data" method="post" action="index.php?pf=hirek/ment">
  <table>
    <tr>
    <td>Cím:</td>
    <td><input class="" type="text" name="subject" /></td>
    </tr><tr>
    <td>Tartalom:</td>
    <td><textarea class="" cols="80" rows="10" name="content"></textarea></td>
    </tr>
    <tr>
  		<td class="form_150px_bold">Kép feltöltése: </td>
  		<td><input name="kep" size="40" type="file" value="" /></td>
    </tr>
    <tr>
  		<td class="form_150px_bold">Fájl feltöltése: </td>
  		<td><input name="fajl" size="40" type="file" value="" /></td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" value="Elküld"/></td>
    </tr>
  </table>
</form>

<?php
//hírek lekérdezése
}
print "<br /><br />";
$query = "SELECT * FROM hirek ORDER BY date DESC";
$result = mysql_query($query) or die(mysql_error());
 //hírek megszámolása
$num = mysql_num_rows($result);
//addig meg a ciklus amíg van sor azaz hír
for($i = 0; $i<$num; $i++)
{
    //az adott sor kinyerése
    $data = mysql_fetch_assoc($result);
    
    $qUser = "SELECT login FROM users WHERE id=$data[userid]";
    $rUser = mysql_query($qUser) or die(mysql_error());
    $User = mysql_fetch_assoc($rUser);
    
    print "<div class=\"hir\">
        <b>Cím:</b> $data[subject] <br /> 
        <b>Felhasználó:</b> $User[login] <br /> 
         
            $data[content]<br />
            <img src=\"$data[kep]\" height=\"200\"/><br />
             
             <br />
          <a href=\"$data[fajl]\">$data[fajl]</a> <br />

        
        <b>Dátum:</b> $data[date]<br />";
        
    if($_SESSION[level] > 1)
        print "<a href=\"index.php?p=hirek/mod&amp;id=$data[id]\">Módosítás</a> | <a href=\"index.php?pf=hirek/del&amp;id=$data[id]\">Törlés</a>"; 
    print "</div><br /><br />";  
}

?>