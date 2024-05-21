<?php

$kep_ut = "";
$fajl_ut = "";

if(empty($_POST[subject]) || empty($_POST[content])){
    header('Location: index.php?m=hir_empty');
    exit;
}
// Kép vizsgálata
if( isset($_POST[kep]) && !(is_uploaded_file($_FILES["kep"]["tmp_name"]) && $_FILES["kep"]["size"] > 0 && 
(substr_count($_FILES["kep"]["name"], ".jpg") || substr_count($_FILES["kep"]["name"], ".gif") || substr_count($_FILES["kep"]["name"], ".png") ))) 
{
    header('Location: index.php?m=kep_hiba');
    exit;
}else
    {
      
    $kep_ut = "kep/" . $_FILES["kep"]["name"];
    move_uploaded_file($_FILES["kep"]['tmp_name'], $kep_ut);// or die("Hiba történt!");
}

// Fájl vizsgálata
if(isset($_POST[fajl]) && !(is_uploaded_file($_FILES["fajl"]["tmp_name"]) && $_FILES["fajl"]["size"] > 0)) 
{
    header('Location: index.php?m=fajl_hiba');
    exit;
}else
    {

    $fajl_ut = "fajl/" . $_FILES["fajl"]["name"];
    move_uploaded_file($_FILES["fajl"]['tmp_name'], $fajl_ut); //or die("Hiba történt!");
    
}

$query = "INSERT INTO hirek (subject, content, userid, date, kep, fajl) values('$_POST[subject]', '$_POST[content]', $_SESSION[id], NOW(), '$kep_ut', '$fajl_ut')";
mysql_query($query) or die(mysql_error() . $query);
header('Location: index.php?m=hir_ok');
exit;



?>
