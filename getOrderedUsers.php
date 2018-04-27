<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);


//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);



$tsql= "Select USERNAME, Cast(score as int) AS intScore from users
Order BY intScore DESC;";


$stmt = sqlsrv_query($conn, $tsql);   

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['USERNAME'];
      echo ",";
      echo $row['intScore'];
      echo ",";
}
?>