<?php
$id = '';
$username = '';
$password = '';
$permission = "";
$usernameErr = $passwordErr = $permissionErr = '';

// PHP Data Objects(PDO) Sample Code:

$link = mysqli_connect("dbnfc.mysql.database.azure.com","nfcadmin","Kret5871#","clients","3306");
if (isset($_POST['submit'])) {

    if (empty($_POST['username'])) {
        $nameErr = 'Imię pracownika jest wymagane';
    } else {
        $name = filter_input(
            INPUT_POST,
            'username',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
    
    if (empty($_POST['password'])) {
        $passwordErr = 'Hasło jest wymagane';
    } else {
        $password = filter_input(
            INPUT_POST,
            'password',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
    
    //Kategoria stroju//
    if(!empty($_POST['permission'])) {
      $selected = $_POST['permission'];
      $permission = filter_input(
          INPUT_POST,
          'permission',
          FILTER_SANITIZE_FULL_SPECIAL_CHARS
      );
  } else {
      $permissionErr = 'Wybór uprawnień jest wymagany';
  }

    


    if (empty($usernameErr) && empty($passwordErr) && empty($permissionErr)) {
        $tsql = "INSERT INTO users (username, password, permission) VALUES ('$name', '$password', '$permission')";
        $getResults = mysqli_query($link, $tsql);

    }
    



}
  

?>

<!DOCTYPE html>
<html lang ="pl">
<head>
<meta charset="UTF-8">
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
    <style>
      .editform{
            width: 600px;
            
            margin: 0 auto;
        }
   </style>
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
        <a class="nav-link px-lg-3 " href="costumes.php">Stroje</a>
        <a class="nav-link px-lg-3 active" href="rental.php">Wypożyczenia</a>
        <a class="nav-link px-lg-3 " href="employers.php">Pracownicy</a>


      </div>
    </div>
  </div>

</nav>
<header>

</header>
<main>
<div class="editform">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-14">
                    <h2 class="mt-5">Wprowadź dane do wypożyczenia</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="mb-3 text-lg-start">
                         <label for="firstname" class="form-label">Imię:</label>
                            <input type="text" class="form-control <?php echo !$firstnameErr ?: 'is-invalid'; ?> <?php echo $firstname; ?> form-control-lg w-85 " id="firstname" name="firstname" placeholder="Wprowadź imię" value="<?php echo $firstname; ?>" >
                            <span class="invalid-feedback"><?php echo $firstnameErr;?></span>
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                            <label for="lastname" class="form-label">Nazwisko:</label>
                            <input type="text" class="form-control <?php echo !$lastameErr ?: 'is-invalid'; ?>  form-control-lg w-85 " id="lastname" name="lastname" placeholder="Wprowadź nazwisko" value="<?php echo $lastname; ?>" >
                            <span class="invalid-feedback"><?php echo $lastnameErr;?></span>
                            
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                         <label for="address" class="form-label">Adres zamieszkania:</label>
                         <input type="text" class="form-control <?php echo !$addressErr ?: 'is-invalid'; ?>  form-control-lg w-85 " id="address" name="address" placeholder="Wprowadź adres zamieszkania"  value="<?php echo $address; ?>" >
                         <span class="invalid-feedback"><?php echo $addressErr;?></span>
                            
                        </div>
                         <div class="mb-3 py-2 text-lg-start">
                            <label for="name" class="form-label">Numer telefonu:</label>
                            <input type="text" class="form-control <?php echo !$numberErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="number" name="number" placeholder="Wprowadź numer telefonu" value="<?php echo $number; ?>">
                            <span class="invalid-feedback"><?php echo $numberErr;?></span>
                            
                        </div>
                          <div class="text-center mt-3">
                            <div class ="d-flex flex-row">
                            <div class="mt-3">
                                <div class="row">
                                  <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="bi bi-list-ul"></i> Wybierz klienta </button>
                                </div>
                              </div>
                            <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title">Wybierz klienta z listy</h3>

                
                            </div>
                            <div class="modal-body container py-5 d-flex flex-column justify-content-center">
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
                                        echo '<a href="readclients.php?id='. $row['id'] .'" class="mr-3" title="Wyświetl" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        
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
                
                            </div>

            
                    </form>
                    
                    
                    
                </div>
                
            </div>        
        </div>
          
  </div>
    <div class ="row mt-3">
      <input type="text" name="datefilter" value="" />

        <button type="button" class="btn btn-primary py-3 mt-3" ><i class="fa-brands fa-nfc-directional"></i></i> Dodaj stroje</button>
            
        <button type="button" class="btn btn-primary py-3 mt-3" > Zatwierdź i generuj umowę</button>
                    
    </div>
        
      
    




</main>
<!-- JavaScript Bundle with Popper -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
</body>


</html>