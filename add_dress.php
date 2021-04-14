<?php 
    #add the head and header of the page
    include_once('partials/header.php');



	
	if ($_SERVER['REQUEST_METHOD']  == 'POST'){
		if(!isset($_POST['edit'])){

			if (isset($_POST['add_dress'])){

				$sql    = 'SELECT `id` FROM `clothes`  ORDER BY `id` DESC';
				$stmt   = $con-> prepare($sql);
				$stmt->execute();
				$rows   = $stmt->fetch();

				foreach($rows as $row){
					$_POST['id'] = $rows['id'] + 1;
					echo $row;
				}

				if (isset($_FILES['front'])){
					move_uploaded_file($_FILES['front']['tmp_name'], 'images/'. $_POST['id'] .'front.jpg');
				}
				if (isset($_FILES['back'])){
					move_uploaded_file($_FILES['back']['tmp_name'], 'images/'. $_POST['id'] .'back.jpg');
				}
				if (isset($_FILES['side'])){
					move_uploaded_file($_FILES['side']['tmp_name'], 'images/'. $_POST['id'] .'side.jpg');
				}

				$sql 	=	'INSERT INTO `clothes` 
										(`title`, 
										`category`, 
										`material`, 								
										`availability`, 
										`image1`, 
										`image2`, 
										`image3`, 
										`price`, 
										`size`) 					
							VALUES (?,?,?,?,?,?,?,?,?)';

				$stmt	=	$con->prepare($sql);
				$stmt->execute(array($_POST['title'],
									$_POST['category'],
									$_POST['material'],
									$_POST['availability'],
									$_POST['id'] .'front.jpg',
									$_POST['id'] .'back.jpg',
									$_POST['id'] .'side.jpg',
									$_POST['price'],
									$_POST['size']
								));
			}else{

				if (isset($_FILES['front'])){
					move_uploaded_file($_FILES['front']['tmp_name'], 'images/'. $_POST['id'] .'front.jpg');
				}
				if (isset($_FILES['back'])){
					move_uploaded_file($_FILES['back']['tmp_name'], 'images/'. $_POST['id'] .'back.jpg');
				}
				if (isset($_FILES['side'])){
					move_uploaded_file($_FILES['side']['tmp_name'], 'images/'. $_POST['id'] .'side.jpg');
				}

				$sql	=	'UPDATE `clothes` 
							SET `title`			=	?,
								`category`		=	?,
								`material`		=	?,
								`availability`	=	?,
								`image1`		=	?,
								`image2`		=	?,
								`image3`		=	?,
								`price`			=	?,
								`size`			=	?
							WHERE `id`			=	?';
				
				$stmt	=	$con->prepare($sql);
				$stmt->execute(array($_POST['title'],
									$_POST['category'],
									$_POST['material'],
									$_POST['availability'],
									$_POST['id'] .'front.jpg',
									$_POST['id'] .'back.jpg',
									$_POST['id'] .'side.jpg',
									$_POST['price'],
									$_POST['size'],
									$_POST['id']
								));
			}

			header('Location:admin.php');
		}
	}


	

?>
<h1 class="text-info"><?php if (isset($_POST['edit'])){echo 'Edit Dress';}else{echo 'New Dress';} ?></h1>
<form action="add_dress.php" method="post" enctype="multipart/form-data">
	<input type="hidden" class="form-control mb-2" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : 'Title';  ?>">

	<input type="text" class="form-control mb-2" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : 'Title';  ?>">


	<select name="category" class="form-control mb-2">
		<option><?php echo isset($_POST['category']) ? $_POST['category'] : 'Select category';  ?></option>
		<option>Men</option>
		<option>Women</option>
		<option>Children</option>
	</select>

	<select name="material" class="form-control mb-2">
		<option><?php echo isset($_POST['material']) ? $_POST['material'] : 'Select material';  ?></option>
		<option>Cotton</option>
		<option>Linen</option>
		<option>Wool</option>
		<option>Polyester</option>
	</select>

	<h5 style="display:inline;">Availability: </h5>
	<div class="radio"  style="display: inline-block;">	
		<label>
		<input type="radio" name="availability" id=""
		value="YES" <?php if(isset($_POST['category'])){
			if ($_POST['availability'] == 'YES'){ echo 'checked';}
		} ?>>
		Yes
		</label>
	</div>
	<div class="radio" style="display: inline-block;">
		<label>
		<input type="radio" name="availability" id=""
		value="NO" <?php if(isset($_POST['category'])){
			if ($_POST['availability'] == 'NO'){ echo 'checked';}
		} ?>>
		No
		</label>
	</div>
	<br>
	<div class="row justify-content-center">
	<fieldset style="display:inline">
		<label>Front image</label>
		<input type="file" name="front" class="form-control-file mt-2 mb-3" >
	</fieldset>
	<fieldset style="display: inline;">
		<label>Back image</label>
		<input type="file" name="back" class="form-control-file mt-2 mb-3">
	</fieldset>
	<fieldset style="display:inline;">
		<label>Side image</label>
		<input type="file" name="side" class="form-control-file mt-2 mb-3">
	</fieldset>
	</div>



	<input type="text" name="price" class="form-control mb-2" value="<?php echo isset($_POST['price']) ? $_POST['price'] : 'Enter Price';  ?>">


	<select name="size" class="form-control mb-2">
		<option><?php echo isset($_POST['size']) ? $_POST['size'] : 'Select your size';  ?></option>
		<option>Extra small</option>
		<option>Small</option>
		<option>Medium</option>
		<option>Large</option>
		<option>Extra large</option>
		<option>Extra extra large</option>
	</select>
	
	<div class="row justify-content-center m-3">
		<button type="submit" name="<?php 	if (isset($_POST['edit'])){ 
												echo 'update';
											}else{
												echo 'add_dress';} ?>" class="btn btn-outline-info mb-3">
									<?php 	if (isset($_POST['edit'])){ 
													echo 'Update';
												}else{
													echo 'Add dress';} ?>
		</button>
	</div>
</form>
  
<?php
    #add the footer section of the page.
    include_once('partials/footer.php');

?>
