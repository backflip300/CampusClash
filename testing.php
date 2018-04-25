<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$username = "User";
	$password = "ededded";

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$tsql= "SELECT PASSWORD
FROM users Where USERNAME =  'User'";
            
$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
if($row['PASSWORD'] == $password){
		echo "Correct Password";
	}
	else {
		echo "Incorrect Password";
	}
?>