<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$ID = $_POST["IDPost"];
    $ID2 = $_POST["ID2Post"];
    
	
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//changes the status in the db to 1 which represents a mtutal friendship

$tsql= "Delete from friends     
        WHERE U1ID = (SELECT ID FROM Users WHERE USERNAME = '".$ID2."')
        AND U2ID = '".$ID."'
        OR
        U1ID = (SELECT ID FROM Users WHERE USERNAME = '".$ID2."')
        AND U2ID = '".$ID."'";

 
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
		//echo $stmt;
        echo $ID2;

	}

?>