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

</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fa-solid fa-masks-theater"></i> Wypożyczalnia strojów </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link px-lg-3" href="index.php">Strona główna</a>
        <a class="nav-link px-lg-3" href="#">Baza wypożyczeń</a>
        <a class="nav-link px-lg-3 active" href="#">Wypożycz</a>
        <a class="nav-link px-lg-3" href="#">Dodaj strój</a>
        <a class="nav-link px-lg-3" href="#">Logowanie</a>
    
      </div>
    </div>
  </div>
</nav>
<header>

</header>
 
<main>
    <!-- Formularz-->
<div class="container py-5">
  <h2>Dane wypożyczającego</h2>
  <form>
    <div class="form-group py-1 ">
      <label for="name">Imię:</label>
      <input type="name" class="form-control form-control-lg w-50" id="name" placeholder="Wprowadź imię">
    </div>
    <div class="form-group py-1">
      <label for="last name">Nazwisko:</label>
      <input type="last name" class="form-control form-control-lg w-50" id="last name" placeholder="Wprowadź nazwisko">
    </div>
    <div class="form-group py-1">
      <label for="adress">Adres zamieszkania:</label>
      <input type="address" class="form-control form-control-lg w-50" id="adress" placeholder="Wprowadź adres zamieszkania">
    </div>
    <div class="form-group py-1">
      <label for="adress">Kwota wypożyczenia:</label>
      <input type="address" class="form-control form-control-lg w-50" id="adress" placeholder="Wprowadź wartość kwoty wypożyczenia">
    </div>
    <div class="form-group py-1">
      <label for="adress">Kaucja:</label>
      <input type="address" class="form-control form-control-lg w-50" id="adress" placeholder="Wprowadź wartość kaucji za stroje">
    </div>

  </form>

  <!-- Przyciski-->

  <div class="d-flex flex-column">
  <div class="p-1"><button type="button" class="btn btn-primary btn-block btn-lg w-50">Wybierz klienta z bazy</button></div>
  <div class="p-1"><button type="button" class="btn btn-primary btn-block btn-lg w-50">Wybierz termin wypożyczenia</button></div>
  <div class="p-1"><button type="button" class="btn btn-primary btn-block btn-lg w-50">Dodaj stroje</button></div>
  <div class="p-1"><button type="button" class="btn btn-primary btn-block btn-lg w-50">Zatwierdź i generuj umowę</button></div>
</div>
  
  




</div>
    
    

</main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      
</body>


    
        

   



</html>