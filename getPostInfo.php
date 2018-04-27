<?php
$serverName = "campusclash.database.windows.net";
$connectionOptions = array(
    "Database" => "ccsql",
    "Uid" => "ejs65",
    "PWD" => "eddyteddy300!"
);
/*
*   WE gunna change our own score by 
*
*
*
*/
//	$Name = $_POST["NamePost"];
//	$OpName = $_POST["OpNamePost"]; 
//	$change = $_POST["ChangePost"];

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);



$tsql2= "update users
set score = score - 20
    where Username = 'Edward';";
        
sqlsrv_query($conn, $tsql2);

        

$tsql= "select USERNAME, SCORE from users
    where Username IN ('Edward','smart');";

$stmt = sqlsrv_query($conn, $tsql);   

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['USERNAME'];
      echo ",";
      echo $row['SCORE'];
      echo ",";
}
?>