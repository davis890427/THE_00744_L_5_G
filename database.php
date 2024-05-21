<?php

//KAPCSOLÓDÁS AZ ADATBÁZISHOZ

function connect() {
        $connect_name = "root" ;
        $connect_password = "" ;
        $host = "localhost" ;
        $connect = mysql_connect($host, $connect_name, $connect_password) or die("Az adatbázishoz való kapcsolódás sikertelen!");
        mysql_select_db("hirek") ;
}
?>