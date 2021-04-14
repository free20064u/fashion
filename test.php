<?php


function get_item($item){
    global $con;

    if(empty($item)){
        $sql = 'SELECT * FROM `clothes`';
        $stmt = $con-> prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }else{
        $sql = 'SELECT * FROM `clothes` WHERE ' . $item[0] . ' = ' . $item[1];
        $stmt = $con-> prepare($sql);
        $stmt->execute(array());
        $rows = $stmt->fetchAll();
        return $rows; 
    }
}


function put_item(){
    global $con;
    $sql = 'INSERT INTO clothes (`title`, `category`, `material`, `availability`, `image1`, `image2`, `image3`, `price`, `size` VALUES ?,?,?,?,?,?,?,?,?,?';
    $stmt = $con -> prepare($sql);
    $stmt -> execute(array());
}

function remove_item(){
    global $con;
    $sql = 'DELETE FROM `clothes` WHERE id = (?)';
    $stmt = $con -> prepare($sql);
    $stmt -> execute(array());
}

?>

<form action="add_dress.php" action="POST" enctype="multipart/form-data">
    
<input type="text" class="form-control" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : 'Title';  ?>">


<select class="form-control">
    <option name="" ><?php echo isset($_POST['category']) ? $_POST['category'] : 'Select category';  ?></option>
    <option name="men">Men</option>
    <option name="women">Women</option>
    <option name="children">Children</option>
</select>


<select class="form-control">
    <option><?php echo isset($_POST['material']) ? $_POST['material'] : 'Select material';  ?></option>
    <option>Cotton</option>
    <option>Linen</option>
    <option>Wool</option>
    <option>Polyester</option>
</select>

<h5 style="display:inline;">Availability: </h5>
<div class="radio"  style="display: inline-block;">	
<label>
    <input type="radio" name="optionsRadios" id="optionsRadios1"
    value="Yes" <?php if(isset($_POST['category'])){
         if ($_POST['availability'] == 'YES'){ echo 'checked';}
    } ?>>
    Yes
</label>
</div>
<div class="radio" style="display: inline-block;">
<label>
    <input type="radio" name="optionsRadios" id="optionsRadios2"
    value="No" <?php if(isset($_POST['category'])){
         if ($_POST['availability'] == 'NO'){ echo 'checked';}
    } ?>>
    No
</label>
</div>
<br>

<input type="file" name="front" class="form-control-file">


<input type="text" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : 'Enter Price';  ?>">


<select class="form-control">
    <option><?php echo isset($_POST['size']) ? $_POST['size'] : 'Select your size';  ?></option>
    <option>Extra small</option>
    <option>Small</option>
    <option>Medium</option>
    <option>Large</option>
    <option>Extra large</option>
    <option>Extra extra large</option>
</select>
<button name="submit" class="btn btn-outline-info mt-2 mb-3">Submit</button>
</form>

