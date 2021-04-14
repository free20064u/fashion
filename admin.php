<?php 
    #add the head and header of the page
    include_once('partials/header.php');

    

    # Deleting item form admins dashbord.
    if(isset($_POST['delete'])){
        $sql    =   'DELETE FROM `clothes` WHERE `id` = (?)';
        $stmt   =   $con -> prepare($sql);
        $stmt   ->  execute(array($_POST['id']));

        unlink('images/'. $_POST['id'] .'front.jpg');
        unlink('images/'. $_POST['id'] .'back.jpg');
        unlink('images/'. $_POST['id'] .'side.jpg');
    }
    




    # Selecting items to be displayed on admins dashboard.
    $sql    =   'SELECT * FROM `clothes` ORDER BY `id` DESC';
    $stmt   =   $con -> prepare($sql);
    $stmt   ->  execute();
    $rows   =   $stmt -> fetchAll();

?>

<h1 class="text-info">ADMIN</h1>

<div class="table-responsive">
<table class="table table-hover">
    <thead class="bg-info">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Material</th>
            <th>Availability</th>
            <th>Image</th>
            <th>Price</th>
            <th>Size</th>
            <th>Date Posted</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>

    <?php 
        foreach($rows as $row){
        echo '<tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['title'] . '</td>
            <td>' . $row['category'] . '</td>
            <td>' . $row['material'] . '</td>
            <td>' . $row['availability'] . '</td>
            <td><img style="width:4rem;" src="images/' . $row['image1'] . '"></td>
            <td>' . $row['price'] . '</td>
            <td>' . $row['size'] . '</td>
            <td>' . $row['date_posted'] . '</td>
            <td>
                <form action="add_dress.php" method="post">
                    <input type="hidden" name="id" value="'. $row['id'] .'">
                    <input type="hidden" name="title" value="'. $row['title'] .'">
                    <input type="hidden" name="category" value="'. $row['category'] .'">
                    <input type="hidden" name="availability" value="'. $row['availability'] .'">
                    <input type="hidden" name="price" value="'. $row['price'] .'">
                    <input type="hidden" name="material" value="'. $row['material'] .'">
                    <input type="hidden" name="size" value="'. $row['size'] .'">
                    <button class="btn btn-outline-info btn-sm nav-item nav-link" name="edit">Edit</button>
                </form>
            </td>
            <td>
                <form action="admin.php" method="post">
                    <input type="hidden" name="id" value="'. $row['id'] .'">
                    <button class="btn btn-outline-info btn-sm nav-item nav-link" name="delete">Delete</button>
                </form>
            </td>
        </tr>';
        }
    ?>
    </tbody>
</table>
</div>
<div class="row justify-content-center m-3">
    <button class="btn btn-outline-info btn-sm nav-item nav-link mr-3 ml-3" style="display: inline;">previous</button>
    <button class="btn btn-outline-info nav-item nav-link mr-3 ml-3" name="new_dress" type="submit" style="display: inline;"><a href="add_dress.php">Add new dress</a></button>
    <button class="btn btn-outline-info mr-3 ml-3" name="next" type="submit">next</button>
</div>
<?php
    #add the footer section of the page.
    include_once('partials/footer.php');

?>