<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	//$ID = $_POST["IDPost"];
    $ID = 4;

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$tsql= "SELECT Longitude, Latitude
FROM ActiveUsers Where ID = ".$ID." ";
            
$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    echo ($row['Longitude']);
    echo ",";
    echo $row['Latitude'];

?>