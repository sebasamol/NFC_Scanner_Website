<?php
$link = mysqli_connect("dbnfc.mysql.database.azure.com","nfcadmin","Kret5871#","clients","3306");
$id = '';
$username = '';
$password = '';
$permission = '';
$usernameErr = $passwordErr = $permissionErr = '';
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $usernameErr = "Please enter an address.";     
    } else{
        $username = $input_username;
    }
    
    // Validate address address
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $passwordErr = "Please enter an address.";     
    } else{
        $password = $input_password;
    }
    
    // Validate salary
    $input_permission = trim($_POST["permission"]);
    if(empty($input_permission)){
        $permissionErr = "Please enter an address.";     
    } else{
        
        $permission = $input_permission;
    }
    
    
    // Check input errors before inserting in database
    if(empty($usernameErr) && empty($passwordErr) && empty($permissionErr) ){
        // Prepare an update statement
        $sql = "UPDATE users SET username=?, password=?, permission=?  WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_username, $param_password, $param_permission, $param_id);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;
            $param_permission = $permission;
            
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
        $sql = "SELECT * FROM users WHERE id = ?";
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
                    $username = $row["username"];
                    $password = $row["password"];
                    $permission = $row["permission"];
                    
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
                    <a class="nav-link px-lg-3 " href="costumes.php">Stroje</a>
                    <a class="nav-link px-lg-3 " href="rental.php">Wypożyczenia</a>
                    <a class="nav-link px-lg-3 active" href="employers.php">Pracownicy</a>


                </div>
            </div>
        </div>

    </nav>
    <div class="editform">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Edytuj dane klienta</h2>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="mb-3 text-lg-start">
                            <label for="firstname" class="form-label">Imię:</label>
                            <input type="text" class="form-control <?php echo !$usernameErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="username" name="username" placeholder="Wprowadź imię" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $usernameErr;?></span>
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                            <label for="lastname" class="form-label">Nazwisko:</label>
                            <input type="text" class="form-control <?php echo !$passwordErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="password" name="password" placeholder="Wprowadź nazwisko" value="<?php echo $password; ?>" >
                            <span class="invalid-feedback"><?php echo $passwordErr;?></span>
                        </div>
                        <div class="mb-3 py-2 text-lg-start">
                            <label for="name" class="form-label">Uprawnienia pracownika:</label>
                                <select class="form-control form-control-lg w-85  <?php echo !$permissionErr ?: 'is-invalid'; ?> form-control-lg w-85 " id="permission" name="permission">
                                    <option value="" disabled selected>Wybierz uprawnienia</option>
                                    <option value="admin">Administrator</option>
                                    <option value="pracownik">Pracownik</option>
                                </select>
                                <span class="invalid-feedback"><?php echo $permissionErr;?></span>
                        </div>
                         
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary mt-2" value="Submit">
                        <a href="employers.php" class="btn btn-secondary ml-2 mt-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>