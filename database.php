<?php

//KAPCSOL�D�S AZ ADATB�ZISHOZ

function connect() {
        $connect_name = "root" ;
        $connect_password = "" ;
        $host = "localhost" ;
        $connect = mysql_connect($host, $connect_name, $connect_password) or die("Az adatb�zishoz val� kapcsol�d�s sikertelen!");
        mysql_select_db("hirek") ;
}
?>