<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$username = $_POST["usernamePost"];
	$password = $_POST["passwordPost"];

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn ) {
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

$tsql= "SELECT *
FROM users Where USERNAME =  '".$username."'";
            
$stmt = sqlsrv_query($conn, $tsql);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if($row['PASSWORD'] == $password){
        echo ($row['ID']);
        echo ",";
        echo $row['Score'];
	}
	else {
		echo "Incorrect Password";
	}
?>