<?php

include_once('partials/header.php');

?>

<h4>Login</h4>

<!-- Entry of data in the database-->
<form action="add_dress.php" method="post">

    <div class="row justify-content-center" style="padding-top:15%;">
        <!-- Title-->
        <input type="text" class="form-control mr-2" name="username" placeholder="username" style="width:20rem;">
        
        <!-- Price input-->
        <input type="text" name="password" class="form-control mr-2" placeholder="password" style="width:20rem;">
    </div>
        
        <!-- Display of button value and name. -->
        <div class="row justify-content-center m-3" style="padding-bottom:15%;">
            <button type="submit" name="Login" class="btn btn-outline-info mb-3">
            Login</button>
        </div>
  
</form>
<?php

include_once('partials/footer.php');