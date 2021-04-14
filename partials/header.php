<?php

include_once('path.php');
require_once('partials/connect.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php ROOT_PATH ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php ROOT_PATH ?>fontawesome/css/all.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?php ROOT_PATH ?>css/style.css">
    <link rel="icon" href="<?php ROOT_PATH ?>images/logo-s.jpg" type="image/jpg">

    <title>jumelleklothing</title>
</head>
<body>
    <div class="container">

        <!--start of header-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="col-5">
                <img src="<?php ROOT_PATH ?>images/logo-s.jpg" class="img-fluid" alt="Responsive image">
                <a style="padding-left: 1%;" class="navbar-brand" href="<?php ROOT_PATH ?>index.php">jumelleklothin</a>
            </div>
            <div class="col-7">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">

                    <?php 
                        # Nav links ...................
                        $nav_lists   =   ['Home'    =>  'index.php',
                                        'Men'     =>  'category.php',
                                        'Women'   =>  'category.php',
                                        'Children'=>  'category.php',
                                        'Contact' =>  'contact.php'];

                        foreach($nav_lists as $key => $value){ 
                            echo '<form action="'. $value .'" method="post">
                            <input type="hidden" name="category" value="'. $key .'">
                            <button class="btn btn-outline-info btn-lg nav-item nav-link">'. $key .'</button>
                            </form>';
                        }

                    ?>

                    </div>
                </div>
            </div> 
        </nav>
<!--end of header-->