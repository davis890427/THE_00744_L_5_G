<?php
    $qDel = "DELETE FROM hirek WHERE id=$_GET[id]";
    mysql_query($qDel) or die(mysql_error());
    
    
    header('Location: index.php?m=hirtorles_ok');
    exit;
?>
