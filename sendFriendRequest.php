<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$user1ID = $_POST["user1IDPost"];
	$user2ID = $_POST["user2IDNamePost"];
	
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//friend id field generated automatically like in insertUser
//0 means friendship status is pending
$tsql= "INSERT INTO Friends (U1ID, U2ID, status)
			VALUES ('".$user1ID."', (SELECT ID FROM Users WHERE USERNAME = '".$user2ID."'), '0')";
            
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

if(sqlsrv_rows_affected($stmt) > 0){
		echo "alg"; 
	}
	else {
		echo "there was an error";
	}
?>