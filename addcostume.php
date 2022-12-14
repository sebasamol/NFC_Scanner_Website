<?php


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
        <title>Dodaj strój</title>
    
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
        <a class="nav-link px-lg-3 " href="index.php">Strona główna</a>
        <a class="nav-link px-lg-3" href="#">Baza wypożyczeń</a>
        <a class="nav-link px-lg-3" href="rentcostume.php">Wypożycz strój</a>
        <a class="nav-link px-lg-3 active" href="#">Dodaj strój</a>
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
  <h2>Dodawanie stroju do bazy </h2>
    <div class="mb-3">
      <label for="name" class="form-label">Nazwa stroju:</label>
      <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?> form-control-lg w-50 " id="name" name="name" placeholder="Wprowadź nazwe stroju" >
      <div class="invalid-feedback">
        <?php echo $nameErr; ?>
      </div>
    
    </div>
    <label class="py-2">Rozmiar stroju:</label>
    <select class="form-select form-select-lg mb-3 w-50" aria-label=".form-select-lg example">
    <label for="name" class="form-label">Nazwa stroju:</label>
      <option selected>Wybierz rozmiar stroju</option>
      <option value="1">XS</option>
      <option value="2">S</option>
      <option value="3">M</option>
      <option value="4">L</option>
      <option value="5">XL</option>
    </select>

    <label class="py-2">Rodzaj stroju:</label>
    <select class="form-select form-select-lg mb-3 w-50" aria-label=".form-select-lg example">
      <option selected>Wybierz rodzaj stroju</option>
      <option value="1">Dorośli</option>
      <option value="2">Dzieci</option>
  
    </select>

    <label class="py-2">Rozmiar stroju:</label>
    <select class="form-select form-select-lg mb-3 w-50" aria-label=".form-select-lg example">
      <label for="exampleFormControlTextarea1" class="form-select " >Informacje dodatkowe:</label>
      <option selected>Wybierz rodzaj stroju</option>
      <option value="1">Męski</option>
      <option value="2">Damski</option>
  
    </select>
    
    <div class="mb-3 w-50">
      <label for="exampleFormControlTextarea1" class="form-label " >Akcesoria:</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>
    <div class="mb-3 w-50">
      <label for="exampleFormControlTextarea1" class="form-label " >Informacje dodatkowe:</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
    </div>
    
    <div class="py-1"><input type="submit"  name="submit" value="Zeskanuj TAG NFC" class="btn btn-primary btn-block btn-lg w-50"></div>
    <div class="py-1"><input type="submit"  name="submit" value="Dodaj zdjęcie" class="btn btn-primary btn-block btn-lg w-50"></div>
    <div class="py-1"><input type="submit"  name="submit" value="Dodaj strój do bazy" class="btn btn-primary btn-block btn-lg w-50"></div>
    

</form>

  
  
</main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      
</body>

</html>