<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);

	$ID = $_POST["IDPost"];

	
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);


//changes the status in the db to 1 which represents a mtutal friendship
$tsql= "Select USERNAME from users
        where ID IN (SELECT U1ID FROM Friends 
        WHERE U2ID = '".$ID."'
        AND status = 1)
        OR ID IN (SELECT U2ID FROM Friends 
        WHERE U1ID = '".$ID."'
        AND status = 1)";
                

$stmt = sqlsrv_query($conn, $tsql);



while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['USERNAME'];
      echo ",";
}

?>