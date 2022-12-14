<!DOCTYPE html>
<html lang ="pl">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width,initial-scale1.0">
        <title>Wypożyczalnia strojów karnawałowych</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        
          


        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
        <script src="https://kit.fontawesome.com/abd674511e.js" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        $(function() {

          $('input[name="datefilter"]').daterangepicker({
             autoUpdateInput: false,
              locale: {
                cancelLabel: 'Clear'
              }       
            });

          $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
           $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
          });

          $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
           $(this).val('');
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
        <a class="nav-link px-lg-3 active" href="index.php">Strona główna</a>
        <a class="nav-link px-lg-3 " href="clients.php">Klienci</a>
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
<input type="text" name="datefilter" value="" />
</main>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      
</body>


</html>
