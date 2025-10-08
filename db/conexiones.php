<?php
$servername = "localhost";// cambia "localhot" si es necesario
$username = "root";//cambio "root" si es necesario
$password= "";// cambia la contraseña si es necesario
$dbname="jporiducciones";// cambia "ejemplo" por el nombre de tu base de datos 

// crear conexión 
$conn = new mysqli ($servername, $username, $password,$dbname);

// verificar conexión 
if ($conn->connect_error) { 
  die( "conexión fallida : " . $conn -> connect_error ) ;
}
?>