<?php

if($_GET[m] == "hir_empty") print "T�lts ki minden mez�t!";

    $qHir = "SELECT * FROM hirek WHERE id=$_GET[id]";
    $rHir = mysql_query($qHir) or die(mysql_error());
    $Hir = mysql_fetch_assoc($rHir);
?>
<form method="post" action="index.php?pf=hirek/mod_ment&id=<?php print $_GET[id] ?>">
  <table>
    <tr>
    <td>C�m:</td>
    <td><input class="" type="text" name="subject" value="<?php print $Hir[subject] ?>"/></td>
    </tr><tr>
    <td>Tartalom:</td>
    <td><textarea class="" cols="80" rows="10" name="content"><?php print $Hir[content] ?></textarea></td>
    </tr>
        <tr>
  		<td class="form_150px_bold">K�p felt�lt�se: </td>
  		<td><input name="kep" size="40" type="file" /></td>
    </tr>
    <tr>
  		<td class="form_150px_bold">F�jl felt�lt�se: </td>
  		<td><input name="fajl" size="40" type="file" /></td>
    </tr>
    <tr>
    <td colspan="2"><input type="submit" value="M�dos�tom!"/></td>
    </tr>
  </table>
</form>