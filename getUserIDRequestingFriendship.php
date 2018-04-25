<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$userID = $_POST["userIDPost"];
	//$userID = 22;
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//friend id field generated automatically like in insertUser
//0 means friendship status is pending
$tsql= "Select USERNAME from users
        where ID IN (SELECT U1ID FROM Friends 
        WHERE U2ID = '".$userID."'
        AND status = 0)";
            
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

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['USERNAME'];
      echo ",";
}


if(sqlsrv_rows_affected($stmt) > 0){
		//echo $stmt;
	}
	else {
		echo 'no'; 
	}
?>