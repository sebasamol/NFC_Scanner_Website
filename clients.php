<?php
$name = '';
$surname = '';
$address = '';
$number = '';
$nameErr = $surnameErr = $addressErr = $numberErr = '';

// PHP Data Objects(PDO) Sample Code:

$link = mysqli_connect("dbnfc.mysql.database.azure.com","nfcadmin","Kret5871#","clients","3306");
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
<div class="container text-center mt-5">
  <div class ="scroll mt-5" >
    
                  <?php
                    
                    $sql = "SELECT * FROM clients";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                
                                        echo "<th>Imię</th>";
                                        echo "<th>Nazwisko</th>";
                                        echo "<th>Opcje</th>";
                                        
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['firstname'] . "</td>";
                                        echo "<td>" . $row['lastname'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="readclients.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";

                                        
                                        
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
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
          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><span class="bi bi-plus-circle"></span> Dodaj nowego klienta</button>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Dodawanie klienta do bazy</h3>
                
            </div>
            <div class="modal-body container py-5 d-flex flex-column justify-content-center">
              <form method="POST" action="<?php echo htmlspecialchars(
              $_SERVER['PHP_SELF']
              ); ?>">
              <div class="mb-3 text-lg-start">
                <label for="name" class="form-label">Imię:</label>
                <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="name" name="name" placeholder="Wprowadź imię" >
                <div class="invalid-feedback">
                <?php echo $nameErr; ?>
              </div>
              <div class="mb-3 py-2 text-lg-start">
                <label for="name" class="form-label">Nazwisko:</label>
                <input type="text" class="form-control <?php echo !$surnameErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="surname" name="surname" placeholder="Wprowadź nazwisko" >
                <div class="invalid-feedback">
                <?php echo $surnameErr; ?>
              </div>
              <div class="mb-3 py-2 text-lg-start">
                <label for="name" class="form-label">Adres zamieszkania:</label>
                <input type="text" class="form-control <?php echo !$addressErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="address" name="address" placeholder="Wprowadź adres zamieszkania" >
                <div class="invalid-feedback">
                <?php echo $addressErr; ?>
              </div>
              <div class="mb-3 py-2 text-lg-start">
                <label for="name" class="form-label">Numer telefonu:</label>
                <input type="text" class="form-control <?php echo !$numberErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="number" name="number" placeholder="Wprowadź numer telefonu" >
                <div class="invalid-feedback">
                <?php echo $numberErr; ?>
              </div>
            </div>

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