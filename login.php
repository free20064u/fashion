<?php

include_once('partials/header.php');


if (isset($_POST['Register'])){

    $username           =   htmlentities(trim($_POST['username']));
    $password_confirm   =   htmlentities(trim($_POST['password_confirm']));
    $password           =   htmlentities(trim($_POST['password']));
    $hashed_password    =   password_hash($password, PASSWORD_DEFAULT);


    $sql    =   'SELECT * FROM `users` WHERE `username` = ?';
    $stmt   =   $con->prepare($sql);
    $stmt   ->  execute(array($username));
    $rows   =   $stmt->fetchAll();
    
    if(($rows)){
        echo "username allready in use";
    }else{
        if (strlen($password) >= 8){
            if ($password === $password_confirm){
                $sql        =   'INSERT INTO `users` (`username`, `password`) VALUES (?, ?)';
                $stmt       =   $con->prepare($sql);
                $stmt       ->  execute(array($username, $hashed_password));
    
                echo "User succesfully registered";
            }else{
                echo "<h1>Passwords do not match</h1>";
            }
        }else{
            echo "<h1>Your password is less than 8 characters</h1>";
        }
        
    }
}
if (isset($_POST['Login'])){

    $sql    =   'SELECT `password` FROM `users` WHERE `username` = ?';
    $stmt   =   $con->prepare($sql);
    $stmt   ->  execute(array($_POST['username']));
    $rows   =   $stmt->fetchAll();

    if (!empty($rows)){
        foreach ($rows as $row){
            $hashed_password = $row['password'];
    
            if (password_verify($_POST['password'], $hashed_password)){
                        $_SESSION['username']       =   $_POST['username'];

                        header("Location:admin.php");
            }else{
                echo "<h1>Your password is not correct</h1>";
            }
        }
    }else{
        echo "Wrong username";
    }    
}

?>

<h4 class="text-info"><?php echo isset($_POST['register']) ? 'Register' : 'Login'; ?></h4>

<!-- Entry for logging into admin dashboard-->
<form action="login.php" method="post">

    <div class="row justify-content-center" style="padding-top:15%;">
        <!-- Username-->
        <input type="text" class="form-control mr-2" name="username" placeholder="username" style="width:20rem;">
        
        <!-- Password-->
        <input type="password" name="password" class="form-control mr-2" placeholder="password" style="width:20rem;">

        <?php echo isset($_POST['register']) ? '<input type="password" name="password_confirm" class="form-control mr-2" placeholder="Confirm password" style="width:20rem;">' : ''; ?>
    </div>
        
        <!-- Display of button value and name. -->
        <div class="row justify-content-center m-3" style="padding-bottom:15%;">
            <button type="submit" name="<?php echo isset($_POST['register']) ? 'Register' : 'Login'; ?>" class="btn btn-outline-info mb-3"><?php echo isset($_POST['register']) ? 'Register' : 'Login'; ?></button>
        </div>
  
</form>



<form action="login.php" method="post">
    <div class="row justify-content-center m-3" style="padding-bottom:15%;">
    <?php echo isset($_POST['register']) ? '<button type="submit" name="login" class="btn btn-outline-info mb-3">Allready a user. Click here to login</button>' : '<button type="submit" name="register" class="btn btn-outline-info mb-3">Not a user. Click here to register</button>'; ?>    
    </div>
</form>
<?php

include_once('partials/footer.php');