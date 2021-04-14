<?php 
    #add the head and header of the page
    include_once('partials/header.php');


?>
<!-- Display of detail view of dress -->
<h1 class="text-info">DETAILS</h1>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

<?php 


# Splitting a posted date to form a array;

# Sellectin an item from the dress table;

  $sql    = 'SELECT * FROM `clothes` WHERE `id` = '. $_POST['id'];
  $stmt   = $con-> prepare($sql);
  $stmt->execute();
  $rows   = $stmt->fetchAll();


  # Displaying the images from the dress table.
  foreach ($rows as $row){
    echo '<div class="carousel-inner"> 
            <div class="carousel-item active">
              <img class="d-block w-100" src="'. BASE_URL .'/images/'. $row['image1'].'" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="'. BASE_URL .'/images/'. $row['image2'].'" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="'. BASE_URL .'/images/'. $row['image3'].'" alt="Third slide">
            </div>
          </div>';
  }

  ?>


    <div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</div>


<?php

    #add the footer section of the page.
    include_once('partials/footer.php');

?>
