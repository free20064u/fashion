<?php 
#A landing page of the website.

    #add the head and header of the page
    include_once('partials/header.php');

?>
<h1 class="text-info">HOME</h1>

<div class="card-deck">

<?php  
# Selecting items from the database and displaying them.
$sql    = 'SELECT * FROM `clothes`  ORDER BY `id` DESC';
$stmt   = $con-> prepare($sql);
$stmt->execute();
$rows   = $stmt->fetchAll();

    foreach ($rows as $row){
        echo '<div class="col-3">
            <div class="card" style="margin: 5px;">
                <a href="#"><img class="card-img-top" src="'. BASE_URL .'/images/'. $row['image1'].'" alt="Card image"></a>
                <div class="card-body">
                    <h5 class="card-title">'. $row['title'].'</h5>
                    <p class="card-text">GHc '. $row['price'] .'</p>

                    <form action="details.php" method="post">
                    <input type="hidden" name="id" value="'. $row['id'] .'">
                    <button class="btn btn-outline-info btn-sm">Details</button>
                    </form>

                    <form action="category.php" method="post">
                    <input type="hidden" name="category" value="'. $row['category'] .'">
                    <button class="btn btn-outline-info btn-sm">'. $row['category'] .'</button>
                    </form>   

                </div>
                <div class="card-footer">
                <small class="text-muted">Posted on '. $row['date_posted'].'</small>
                </div>
            </div>
        </div>';
    }
?>

</div>

<?php
    #add the footer section of the page.
    include_once('partials/footer.php');

?>
