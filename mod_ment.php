<?php
   if(empty($_POST[subject]) || empty($_POST[content])){
    header("Location: index.php?p=hirek/mod&m=hir_empty&id=$_GET[id]");
    exit;
    }

    $qUpdate = "UPDATE hirek SET subject='$_POST[subject]', content='$_POST[content]' WHERE id=$_GET[id]" ;
    mysql_query($qUpdate) or die(mysql_error());
    
    header('Location: index.php?m=hirmod_ok');
    exit;

?>
