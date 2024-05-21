<?php

if($_GET[m] == "hir_empty") print "Tölts ki minden mezõt!";

    $qHir = "SELECT * FROM hirek WHERE id=$_GET[id]";
    $rHir = mysql_query($qHir) or die(mysql_error());
    $Hir = mysql_fetch_assoc($rHir);
?>
<form method="post" action="index.php?pf=hirek/mod_ment&id=<?php print $_GET[id] ?>">
  <table>
    <tr>
    <td>Cím:</td>
    <td><input class="" type="text" name="subject" value="<?php print $Hir[subject] ?>"/></td>
    </tr><tr>
    <td>Tartalom:</td>
    <td><textarea class="" cols="80" rows="10" name="content"><?php print $Hir[content] ?></textarea></td>
    </tr>
        <tr>
  		<td class="form_150px_bold">Kép feltöltése: </td>
  		<td><input name="kep" size="40" type="file" /></td>
    </tr>
    <tr>
  		<td class="form_150px_bold">Fájl feltöltése: </td>
  		<td><input name="fajl" size="40" type="file" /></td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" value="Módosítom!"/></td>
    </tr>
  </table>
</form>