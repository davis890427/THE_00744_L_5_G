
<?php
if($_GET[m] == "hir_ok") print "A h�r felvitele sikeres!";      //�zenetek megad�sa
if($_GET[m] == "hir_empty") print "T�lts ki minden mez�t!";

if($_GET[m] == "kep_hiba") print "Hib�s k�pet adt�l meg!";
if($_GET[m] == "fajl_hiba") print "Hib�s f�jlt adt�l meg!";

if($_GET[m] == "hirtorles_ok") print "A h�r sikeresen t�r�lve!";
if($_GET[m] == "hirmod_ok") print "A h�r sikeresen m�dos�tva!";

if(empty($_SESSION[id]))    //bejelenkez�s vizsg�lata
    print "�j h�r bek�ld�s�hez jelentkezz be!";
else
{

?>
<!-- bek�ld� form l�tregoz�sa-->
<form enctype="multipart/form-data" method="post" action="index.php?pf=hirek/ment">
  <table>
    <tr>
    <td>C�m:</td>
    <td><input class="" type="text" name="subject" /></td>
    </tr><tr>
    <td>Tartalom:</td>
    <td><textarea class="" cols="80" rows="10" name="content"></textarea></td>
    </tr>
    <tr>
  		<td class="form_150px_bold">K�p felt�lt�se: </td>
  		<td><input name="kep" size="40" type="file" value="" /></td>
    </tr>
    <tr>
  		<td class="form_150px_bold">F�jl felt�lt�se: </td>
  		<td><input name="fajl" size="40" type="file" value="" /></td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" value="Elk�ld"/></td>
    </tr>
  </table>
</form>

<?php
//h�rek lek�rdez�se
}
print "<br /><br />";
$query = "SELECT * FROM hirek ORDER BY date DESC";
$result = mysql_query($query) or die(mysql_error());
 //h�rek megsz�mol�sa
$num = mysql_num_rows($result);
//addig meg a ciklus am�g van sor azaz h�r
for($i = 0; $i<$num; $i++)
{
    //az adott sor kinyer�se
    $data = mysql_fetch_assoc($result);
    
    $qUser = "SELECT login FROM users WHERE id=$data[userid]";
    $rUser = mysql_query($qUser) or die(mysql_error());
    $User = mysql_fetch_assoc($rUser);
    
    print "<div class=\"hir\">
        <b>C�m:</b> $data[subject] <br /> 
        <b>Felhaszn�l�:</b> $User[login] <br /> 
         
            $data[content]<br />
            <img src=\"$data[kep]\" height=\"200\"/><br />
             
             <br />
          <a href=\"$data[fajl]\">$data[fajl]</a> <br />

        
        <b>D�tum:</b> $data[date]<br />";
        
    if($_SESSION[level] > 1)
        print "<a href=\"index.php?p=hirek/mod&amp;id=$data[id]\">M�dos�t�s</a> | <a href=\"index.php?pf=hirek/del&amp;id=$data[id]\">T�rl�s</a>"; 
    print "</div><br /><br />";  
}

?>