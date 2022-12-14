<?php
//Zmienne do formularza
$name = $surname = $address = $amount = $deposit = $info = '';
$nameErr = $surnameErr = $addressErr = $amountErr = $depositErr = '';

//Komunikacja z Azure 
try {
  $conn = new PDO("sqlsrv:server = tcp:databasenfc.database.windows.net,1433; Database = databasenfc", "nfcadmin", "Kret5871#");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  print("Error connecting to SQL Server.");
  die(print_r($e));
}


$connectionInfo = array("UID" => "nfcadmin", "pwd" => "Kret5871#", "Database" => "databasenfc", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:databasenfc.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);



?>
<!DOCTYPE html>
<html lang ="pl">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale1.0">
        <title>Wypożycz</title>
    
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="style.css">
        <script src="https://kit.fontawesome.com/abd674511e.js" crossorigin="anonymous"></script>
        <!--My script -->
        <!--Date range picker -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script>
        $(function() {
          $('input[name="daterange"]').daterangepicker({
            opens: 'left'
          }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('MM-DD-YYYY') + ' to ' + end.format('MM-DD-YYYY'));
          });
        });
        </script>
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
        <a class="nav-link px-lg-3" href="index.php">Strona główna</a>
        <a class="nav-link px-lg-3" href="#">Baza wypożyczeń</a>
        <a class="nav-link px-lg-3 active" href="#">Wypożycz strój</a>
        <a class="nav-link px-lg-3" href="addcostume.php">Dodaj strój</a>
        <a class="nav-link px-lg-3" href="addcostume.php">Edytuj strój</a>
        <a class="nav-link px-lg-3" href="clients.php">Klienci</a>
        <a class="nav-link px-lg-3" href="#">Logowanie</a>

    
      </div>
    </div>
  </div>
</nav>
<header>

</header>
 
<main>
    <!-- Formularz-->
    <form method="POST" action="<?php echo htmlspecialchars(
      $_SERVER['PHP_SELF']
    ); ?>"  class="container py-5 d-flex flex-column justify-content-center">
  <h2>Wypożyczanie stroju</h2>
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
    <label for="number" class="form-label">Wybierz termin wypożyczenia:</label>
    <input type="text" class ="form-control form-control-lg w-50" name="daterange" value="Termin wypożyczenia" />
    </div>

    <div class="mb-3">
      <label for="number" class="form-label">Kwota wypożyczenia:</label>
      <input type="text" class="form-control <?php echo !$numberErr ?: 'is-invalid'; ?> form-control-lg w-50 " id="number" name="number" placeholder="Wprowadź numer telefonu " >
      <div class="invalid-feedback">
        <?php echo $numberErr; ?>
      </div>
    </div>
    <div class="mb-3">
      <label for="number" class="form-label">Kaucja:</label>
      <input type="text" class="form-control <?php echo !$numberErr ?: 'is-invalid'; ?> form-control-lg w-50 " id="number" name="number" placeholder="Wprowadź numer telefonu " >
      <div class="invalid-feedback">
        <?php echo $numberErr; ?>
      </div>
    </div>
    <div class="mb-3 w-50">
      <label for="exampleFormControlTextarea1" class="form-label " >Informacje dodatkowe:</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" value="Wybierz klienta z bazy" class="btn btn-primary btn-block btn-lg w-50">
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" value="Dodaj stroje" class="btn btn-primary btn-block btn-lg w-50">
    </div>
    <div class="mb-3">
        <input type="submit" name="submit" value="Zatwierdź i generuj umowę" class="btn btn-primary btn-block btn-lg w-50">
    </div>

    
    

  </form>
    
    

</main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      
</body>


    
        

   



</html>