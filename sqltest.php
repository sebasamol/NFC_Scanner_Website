<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:databasenfc.database.windows.net,1433; Database = databasenfc", "nfcadmin", "Kret5871#");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "nfcadmin", "pwd" => "Kret5871#", "Database" => "databasenfc", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:databasenfc.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
$tsql = "CREATE TABLE Person (
    PersonID  int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255)
    );";
    $getResults=sqlsrv_query($conn, $tsql)


?>