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
        <a class="nav-link px-lg-3" href="#">Logowanie</a>

      </div>
    </div>
  </div>

</nav>
<header>

</header>

<main>
<div class="container py-5 d-flex flex-column justify-content-center">
  <h2>Dodawanie stroju do bazy </h2>
  <form>
    <div class="form-group py-1 ">
      <label for="name">Nazwa stroju:</label>
      <input type="name" class="form-control form-control-lg w-50 " id="name" placeholder="Wprowadź nazwę stroju">
    </div>

    
  </form>

  <!--Checkboxy rodzaj stroju-->
  <label class="py-2">Rodzaj stroju:</label>
  <div class="container py-1 d-flex flex-row">
    <select class="form-select w-50" aria-label="Default select example">
        <option selected>Wybierz rodzaj stroju</option>
        <option value="1">Dziecięcy</option>
        <option value="2">Dorośli</option>
    </select>
    
  </div>

  <!-- Rozmiar stroju -->
  <label class="py-2">Rozmiar stroju:</label>
  <div class="container py-1 d-flex flex-row">
    <select class="form-select w-50" aria-label="Default select example">
        <option selected>Wybierz rozmiar stroju</option>
        <option value="1">XS</option>
        <option value="2">S</option>
        <option value="3">M</option>
        <option value="4">L</option>
        <option value="4">XL</option>


    </select>
    
  </div>

  <div class="form-floating py-2 w-50 ">
      <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
      <label for="floatingTextarea2">Informacje dodatkowe</label>
    </div>
  <!-- Przyciski-->
  <div class="p-1"><button type="button" class="btn btn-primary btn-block btn-lg w-50">Dodaj zdjęcie</button></div>
  <div class="p-1"><button type="button" class="btn btn-primary btn-block btn-lg w-50">Dodaj tag NFC</button></div>
  <div class="p-1"><button type="button" class="btn btn-primary btn-block btn-lg w-50">Zatwierdź dane</button></div>

</main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      
</body>

</html>