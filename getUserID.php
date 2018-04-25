<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$userID = $_POST["userIDPost"];
	
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//friend id field generated automatically like in insertUser
//0 means friendship status is pending
$tsql= "SELECT ID FROM Users WHERE USERNAME = '".$userID."'";
            
$stmt = sqlsrv_query($conn, $tsql);
//$name = sqlsrv_get_field( $stmt);


if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
    }
}
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

if(sqlsrv_rows_affected($stmt) > 0){
		echo $row['ID']; 
	}
	else {
		echo $row['ID']; 
	}
?>