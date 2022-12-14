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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="style.css">
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
        <a class="nav-link px-lg-3 active" href="index.php">Strona główna</a>
        <a class="nav-link px-lg-3" href="#">Baza wypożyczeń</a>
        <a class="nav-link px-lg-3" href="rentcostume.php">Wypożycz strój</a>
        <a class="nav-link px-lg-3" href="addcostume.php">Dodaj strój</a>
        <a class="nav-link px-lg-3" href="editcostume.php">Edytuj strój</a>
        <a class="nav-link px-lg-3" href="clients.php">Klienci</a>
        <a class="nav-link px-lg-3" href="#">Logowanie</a>


      </div>
    </div>
  </div>

</nav>
<header>

</header>

<main>

  <form method="POST" action="<?php echo htmlspecialchars(
      $_SERVER['PHP_SELF']
    ); ?>"  class="container py-5 d-flex flex-column justify-content-center">
  <h2>Dane klienta</h2>
    <div class="mb-3">
      <label for="name" class="form-label">Imię:</label>
      <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?> form-control-lg w-50 " id="name" name="name" placeholder="Wprowadź imię" >
      <div class="invalid-feedback">
        <?php echo $nameErr; ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="surname" class="form-label">Nazwisko:</label>
      <input type="text" class="form-control <?php echo !$surnameErr ?: 'is-invalid'; ?> form-control-lg w-50 " id="surname" name="surname"placeholder="Wprowadź nazwisko" ">
      <div class="invalid-feedback">
        <?php echo $surnameErr; ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Adres zamieszkania:</label>
      <input type="text" class="form-control <?php echo !$addressErr ?: 'is-invalid'; ?> form-control-lg w-50 " id="address" name="address" placeholder="Wprowadź adres zamieszkania" >
      <div class="invalid-feedback">
        <?php echo $addressErr; ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="number" class="form-label">Numer telefonu:</label>
      <input type="text" class="form-control <?php echo !$numberErr ?: 'is-invalid'; ?> form-control-lg w-50 " id="number" name="number" placeholder="Wprowadź numer telefonu " >
      <div class="invalid-feedback">
        <?php echo $numberErr; ?>
      </div>
    </div>
    
    <div class="mb-3">
        <input type="submit" name="submit" value="Dodaj klienta" class="btn btn-primary btn-block btn-lg w-50">
    </div>

  </form>
</main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      
</body>


</html>