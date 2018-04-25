<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$username = $_POST["usernamePost"];
	$email = $_POST["emailPost"]; 
	$password = $_POST["passwordPost"];

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
/*
if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
*/
$tsql= "INSERT INTO Users (UserName, Password, email,score)
			VALUES ('".$username."', '".$password."', '".$email."','1500')";
            
$stmt = sqlsrv_query($conn, $tsql);

if(sqlsrv_rows_affected($stmt) > 0){
		echo "alg"; 
	}
	else {
		echo "there was an error";
	}
?>