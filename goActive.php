<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$id = $_POST["iDPost"];
	$longitude = $_POST["longitduePost"];
    $latitude  = $_POST["latititudePost"];
    $IP        = $_POST["ipPost"];
    
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

/*$tsql= "Insert Into dbo.ActiveUsers (ID,Longitude,latitude,IP)
    Values('".$id."', '".$longitude."', '".$latitude."','".$IP."')";
 */  


 
$tsql= "Delete from dbo.ActiveUsers where ID = 2;
        Insert Into dbo.ActiveUsers (ID,Longitude,latitude,IP)
            Values('$id','$longitude','$latitude','$IP')"; 
$stmt = sqlsrv_query($conn, $tsql);
if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
    }
}
?>