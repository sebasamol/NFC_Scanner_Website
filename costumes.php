<?php
$name = '';
$type = '';
$gender = '';
$size = '';
$elements = '';
$info = '';
$tagid = '';
$nameErr = $typeErr = $genderErr = $elementsErr = $infoErr = $tagidErr =  '';

// PHP Data Objects(PDO) Sample Code:

$link = mysqli_connect("dbnfc.mysql.database.azure.com","nfcadmin","Kret5871#","clients","3306");
if (isset($_POST['submit'])) {

  if (empty($_POST['name'])) {
    $nameErr = 'Nazwa stroju jest wymagana';
  } else {
    $name = filter_input(
      INPUT_POST,
     'name',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }
  if (empty($_POST['type'])) {
    $typeErr = 'Rodzaj stroju jest wymagany';
  } else {
    $type = filter_input(
      INPUT_POST,
     'type',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }


  if (empty($_POST['gender'])) {
    $genderErr = 'Płeć stroju jest wymagana';
  } else {
    $gender = filter_input(
    INPUT_POST,
      'gender',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }
  if (empty($_POST['size'])) {
    $sizeErr = 'Rozmiar jest wymagany';
  } else {
    $size = filter_input(
    INPUT_POST,
      'size',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }
  if (empty($_POST['elements'])) {
    $elementsErr = 'Adres jest wymagany';
  } else {
    $elements = filter_input(
    INPUT_POST,
      'address',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }

  if (empty($_POST['info'])) {
    $numberErr = 'Numer telefonu jest wymagany';
  } else {
    $number = filter_input(
    INPUT_POST,
      'number',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }
  

  if (empty($nameErr) && empty($typeErr) && empty($genderErr) && empty($sizeErr) && empty($elementsErr) && empty($infoErr)) {
    $tsql = "INSERT INTO costumes (name, type, gender, size, elements, info,) VALUES ('$name', '$type', '$gender', '$size', '$elements', '$info')";
    $getResults= mysqli_query($link, $tsql);
    
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        
          
        <script src="script.js"></script> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
        <script src="https://kit.fontawesome.com/abd674511e.js" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
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
        <a class="nav-link px-lg-3 " href="index.php">Strona główna</a>
        <a class="nav-link px-lg-3 " href="clients.php">Klienci</a>
        <a class="nav-link px-lg-3 active " href="costumes.php">Stroje</a>
        <a class="nav-link px-lg-3 " href="rental.php">Wypożyczenia</a>
        <a class="nav-link px-lg-3 " href="employers.php">Pracownicy</a>


      </div>
    </div>
  </div>

</nav>
<header>

</header>
<main>
<div class="container text-center mt-5">
  <h2>Lista strojów</h2>
  <div class ="scroll mt-5" >
    
                  <?php
                    
                    $sql = "SELECT * FROM costumes";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                
                                        echo "<th>Nazwa stroju</th>";
                                        echo "<th>Typ stroju</th>";
                                        echo "<th>Płeć</th>";
                                        echo "<th>Rozmiar stroju</th>";
                                        echo "<th>Opcje</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['type'] . "</td>";
                                        echo "<td>" . $row['gender'] . "</td>";
                                        echo "<td>" . $row['size'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="readclients.php?id='. $row['id'] .'" class="mr-3" title="Wyświetl" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="updateclients.php?id='. $row['id'] .'" class="mr-3" title="Edytuj" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="deleteclients.php?id='. $row['id'] .'" title="Usuń" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";

                                        
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>Nie znalezionio strojów.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    
                    ?>
      </table>

  </div>
  <div class ="d-flex flex-row mt-3">
        <div class="mt-3">
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><span class="bi bi-plus-circle"></span> Dodaj strój</button>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Dodawanie stroju do bazy</h3>
                
            </div>
            <div class="modal-body container py-5 d-flex flex-column justify-content-center">
              <form method="POST" action="<?php echo htmlspecialchars(
              $_SERVER['PHP_SELF']
              ); ?>">
                <div class="mb-3 text-lg-start">
                    <label for="name" class="form-label">Nazwa stroju:</label>
                    <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="name" name="name" placeholder="Wprowadź imię" >
                    <div class="invalid-feedback">
                    <?php echo $nameErr; ?>
                </div>
                <div class="mb-3 py-2 text-lg-start">
                    <label for="name" class="form-label">Kategoria stroju:</label>
                    <select class="form-control form-control-lg w-85">
                        <option value="" disabled selected>Wybierz kategorie stroju:</option>
                        <option value="adults">Dorośli</option>
                        <option value="kids">Dzieci</option>
                    </select>
                    <div class="invalid-feedback">
                    <?php echo $surnameErr; ?>
                </div>
                <div class="mb-3 py-2 text-lg-start">
                    <label for="name" class="form-label">Płeć:</label>
                    <select class="form-control form-control-lg w-85">
                        <option value="" disabled selected>Wybierz płeć</option>
                        <option value="men">Męski</option>
                        <option value="women">Damski</option>
                        <option value="unisex">Unisex</option>
                    </select>
                    <div class="invalid-feedback">
                    <?php echo $addressErr; ?>
                </div>
                <div class="mb-3 py-2 text-lg-start">
                    <label for="name" class="form-label">Rozmiar stroju:</label>
                    <select class="form-control form-control-lg w-85">
                        <option value="" disabled selected>Wybierz rozmiar stroju</option>
                        <option value="xs">XS</option>
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                        <option value="xxl">XXL</option>                    
                    </select>
                    <div class="invalid-feedback">
                    <?php echo $numberErr; ?>
                </div>
                <div class="mb-3 py-2 text-lg-start">
                    <label for="name" class="form-label">Akcesoria:</label>
                    <textarea class="form-control form-control-lg w-85" id="elementsarea" rows="3" placeholder="Wpisz akcesoria do stroju"></textarea>                   
                     
                </div>
                <div class="mb-3 py-2 text-lg-start">
                    <label for="name" class="form-label">Informacje dodatkowe:</label>
                    <textarea class="form-control form-control-lg w-85" id="infoarea" rows="3" placeholder="Wpisz informacje dodatkowe do stroju"></textarea>                    
                    
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-block"><span class="bi bi-plus-circle"></span> Zeskanuj tag NFC</button>

            <div class="modal-footer justify-content-center">
              <input type="submit"  name="submit" value="Zapisz" class="btn btn-primary btn-block btn-lg">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
          </div>
        </div>
      
      
    </div>
</div>



</main>
<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
</body>


</html>