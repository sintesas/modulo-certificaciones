<?php
$serverName = "MSSQLSERVERBD, 5001"; //serverName\instanceName, portNumber (por defecto es 1433)
$connectionInfo = array( "Database"=>"Certificaciones", "UID"=>"UsrModCertifica", "PWD"=>"Certif21*8/Lin2");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>