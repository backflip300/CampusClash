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


$tsql= "IF '".$username."' in (Select USERNAME from users)
	select '1' AS error;
Else IF
	'".$email."' in (Select Email from users)
	select '2' AS error;
ELSE
    INSERT INTO Users (UserName, Password, email,score)
			VALUES ('".$username."', '".$password."', '".$email."','Round(Rand()*3000,0)');";
            
$stmt = sqlsrv_query($conn, $tsql);

if(sqlsrv_rows_affected($stmt) > 0){
		echo "alg"; 
	}
	else {
		$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
        echo $row["error"];
	}
?>