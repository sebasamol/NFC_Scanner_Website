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
    $input_rname = trim($_POST["name"]);
    if(empty($input_username)){
        $username_err = "Please enter an address.";     
    } else{
        $username = $input_username;
    }
    //Kategoria stroju//
    if(!empty($_POST['type'])) {
        $selected = $_POST['type'];
        $type = filter_input(
            INPUT_POST,
            'type',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    } else {
        $typeErr = 'Kategoria stroju jest wymagana';
    }
    if(!empty($_POST['gender'])) {
        $selected = $_POST['gender'];
        $gender = filter_input(
            INPUT_POST,
            'gender',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    } else {
        $genderErr = 'Płeć jest wymagana';
    }
    if(!empty($_POST['size'])) {
        $selected = $_POST['size'];
        $size = filter_input(
            INPUT_POST,
            'size',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    } else {
        $sizeErr = 'Rozmiar stroju jest wymagany';
    }

    if (empty($_POST['elements'])) {
        $elementsErr = 'Akcesoria są wymagane';
    } else {
        $elements = filter_input(
            INPUT_POST,
            'elements',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
    if (empty($_POST['info'])) {
        $infoErr = 'Informacje są wymagane';
    } else {
        $info = filter_input(
            INPUT_POST,
            'info',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
    
    // Check input errors before inserting in database
    if(empty($nameErr) && empty($typeErr) && empty($genderErr) && empty($sizeErr) && empty($elementsErr) && empty($infoErr)){
        // Prepare an update statement
        $sql = "UPDATE costumes SET name=?, type=?, gender=?, size=?, elements=?, info=?, tagid=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssi", $param_name, $param_type, $param_gender, $param_size, $param_elements,$param_info,$param_tagid,$param_id);
            
            // Set parameters
            $param_name = $name;
            $param_type = $type;
            $param_gender = $gender;
            $param_size= $size;
            $param_elements= $elements;
            $param_info= $info;
            $param_tagid = $tagid;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM costumes WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $type = $row["type"];
                    $gender = $row["gender"];
                    $size = $row["size"];
                    $elements = $row["elements"];
                    $info = $row["info"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
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
                    <a class="nav-link px-lg-3 active" href="costumes.php">Stroje</a>
                    <a class="nav-link px-lg-3 " href="rental.php">Wypożyczenia</a>
                    <a class="nav-link px-lg-3 " href="employers.php">Pracownicy</a>
                </div>
            </div>
        </div>

    </nav>
    <div class="editform">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Edytuj dane stroju</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="mb-3 text-lg-start">
                            <label for="name" class="form-label">Nazwa stroju:</label>
                            <input type="text" class="form-control <?php echo !$nameErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="name"  name="name" placeholder="Wprowadź nazwę stroju" value="<?php echo $name; ?>">
                            <div class="invalid-feedback">
                             <?php echo $nameErr; ?>
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                             <label for="name" class="form-label">Kategoria stroju:</label>
                            <select class="form-control form-control-lg w-85 <?php echo !$typeErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="type" name="type" value="<?php echo $type; ?>">
                                <option value="" disabled selected><?php echo $type; ?></option>
                                <option value="dorośli">Dorośli</option>
                                <option value="dziecięcy">Dzieci</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $typeErr;?></span>
                            
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                            <label for="name" class="form-label">Płeć:</label>
                            <select class="form-control form-control-lg w-85  <?php echo !$genderErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="gender" name="gender">
                                <option value="" disabled selected><?php echo $gender; ?></option>
                                <option value="męski">Męski</option>
                                <option value="damski">Damski</option>
                                <option value="unisex">Unisex</option>
                            </select>
                            <span class="invalid-feedback"><?php echo $genderErr;?></span>
                             
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                            <label for="name" class="form-label">Rozmiar stroju:</label>
                            <select class="form-control form-control-lg w-85 <?php echo !$sizeErr ?: 'is-invalid'; ?>" name="size">
                                <option value="" disabled selected><?php echo $size; ?></option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>                    
                                 </select>
                                <span class="invalid-feedback"><?php echo $sizeErr;?></span>
                            
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                            <label for="name" class="form-label">Akcesoria:</label>
                            <textarea class="form-control form-control-lg w-85 " name="elements" id="elements" rows="3" placeholder="Wpisz akcesoria" ><?php echo $elements; ?></textarea>                   
                     
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                            <label for="name" class="form-label">Informacje dodatkowe:</label>
                            <textarea class="form-control form-control-lg w-85" name="info" id="info" rows="3" placeholder="Wpisz informacje dodatkowe "><?php echo $info; ?></textarea>                    
                    
                        </div>
                        </div>
                        <button type="button" class="btn btn-primary btn-block"><span class="bi bi-plus-circle"></span> Zmień tag NFC</button>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="py-3">
                            <input type="submit"  name="submit" value="Zapisz zmiany" class="btn btn-primary btn-block btn-lg">
                            <a href="costumes.php" class="btn btn-secondary btn-block btn-lg">Anuluj</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>