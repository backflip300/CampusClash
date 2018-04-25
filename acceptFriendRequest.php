<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$acceptingUserID = $_POST["acceptingUserIDPost"];
	$RequestName= $_POST["RequestNamePost"];
	
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//changes the status in the db to 1 which represents a mtutal friendship
$tsql= "UPDATE Friends 
            SET status = 1
                Where U1ID = (SELECT ID FROM Users WHERE USERNAME = '".$RequestName."')
                and U2ID = '".$acceptingUserID."'";
                

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