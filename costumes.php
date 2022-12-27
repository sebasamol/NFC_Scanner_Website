<?php
$name = '';
$surname = '';
$address = '';
$number = '';
$nameErr = $surnameErr = $addressErr = $numberErr = '';

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
/*
if (isset($_POST['submit'])) {

  if (empty($_POST['name'])) {
    $nameErr = 'Imię jest wymagane';
  } else {
    $name = filter_input(
      INPUT_POST,
     'name',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }


  if (empty($_POST['surname'])) {
    $surnameErr = 'Nazwisko jest wymagane';
  } else {
    $surname = filter_input(
    INPUT_POST,
      'surname',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }
  if (empty($_POST['address'])) {
    $addressErr = 'Adres jest wymagany';
  } else {
    $address = filter_input(
    INPUT_POST,
      'address',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }

  if (empty($_POST['number'])) {
    $numberErr = 'Numer telefonu jest wymagany';
  } else {
    $number = filter_input(
    INPUT_POST,
      'number',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }
  

  if (empty($nameErr) && empty($surnameErr) && empty($addressErr) && empty($numberErr)) {
    $tsql = "INSERT INTO Clients (FirstName, LastName, Address, Number) VALUES ('$name', '$surname', '$address', '$number')";
    $getResults= sqlsrv_query($conn, $tsql);
    echo '<script>alert("Klient został dodany do bazy")</script>';
    
    
  }


}
*/
  

    



?>

<!DOCTYPE html>
<html lang ="pl">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale1.0">
        <title>Wypożyczalnia strojów karnawałowych</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
        <script src="https://kit.fontawesome.com/abd674511e.js" crossorigin="anonymous"></script>

</head>

<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><i class="fa-solid fa-masks-theater"></i> Wypożyczalnia strojów </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link px-lg-3 " href="index.php">Strona główna</a>
        <a class="nav-link px-lg-3 active" href="clients.php">Klienci</a>
        <a class="nav-link px-lg-3 " href="costumes.php">Stroje</a>
        <a class="nav-link px-lg-3 " href="rental.php">Wypożyczenia</a>
        <a class="nav-link px-lg-3 " href="employers.php">Pracownicy</a>


      </div>
    </div>
  </div>

</nav>
<header>

</header>
<main>
<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


</main>
</body>
</html>