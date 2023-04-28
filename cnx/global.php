<?php

$web = true;
if ($web) {
    //Ip de la pc servidor de base de datos  MYSQL8003.site4now.net
    define("DB_HOST", "MYSQL8003.site4now.net");
    //Nombre de la base de datos
    define("DB_NAME", "db_a8fdc4_hack");
    //Usuario de la base de datos
    define("DB_USERNAME", "a8fdc4_hack");
    //Contraseña del usuario de la base de datos
    define("DB_PASSWORD", "Ht5k58#b1TX!Dl");
} else {
    //Ip de la pc servidor de base de datos  MYSQL8003.site4now.net
    define("DB_HOST", "localhost");
    //Nombre de la base de datos
    define("DB_NAME", "hackathon");
    //Usuario de la base de datos
    define("DB_USERNAME", "root");
    //Contraseña del usuario de la base de datos
    define("DB_PASSWORD", "");
}
//definimos la codificación de los caracteres
define("DB_ENCODE", "utf8");
//Definimos una constante como nombre del proyecto
define("SYSTEM_NAME", "AylluTanta");
//Definimos una constante como nombre del proyecto
$domain = "http://192.168.1.11/";
define("DOMAIN", $domain);
//$domain = "http://192.168.1.12";
//Definimos una constante como nombre del proyecto
define("URL_CLASSES", $domain . "/hackathon/assets/system_classes/");

?>