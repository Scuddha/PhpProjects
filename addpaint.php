<?php 

//!
//!		This webpage uses a form in order to add title, year, height, width and img to Paint.paints in MySql
//!  	Note: The img column only holds the path to image not the image it self. The image needs to be added 
//!		separately. If there is no image in the designated path, it will still be displayed as a list item 
//!		on the home page, scuddha.php. without the image (until it is deleted using PhpMyAdmin). 
//!
//!		Currently there is no link to this file from other pages. It can be accessed at 
//!		http://localhost:8888/addpaint.php 
//!

try{  

	//!	if statement checks to see if form has input
	if ($_POST) {  
		$title = $_POST['title'];
		$year = $_POST['year'];
		$height = $_POST['height'];
		$width = $_POST['width'];
		$imgpath = $_POST['imgpath'];

		//! checks to make sure all form fields are fill out
		if ($title == "" || $year == "" || $height == "" || $width == "" || $imgpath == ""){
			include("inc/header.php");
			echo "<h1>Whoops!! You need to fill out ALL the info!</h1>";
			include("inc/footer.php");

			exit;
		}
		//!  protects against auto form fillers
		if ($_POST["address"] != "") {
			echo "Bad form input";
			exit;
		}

		//! get connection to DATABASE Paint TABLE paints 
		include("inc/connection.php");
		
		//! prepares INSERT statement for MySql
		$statement = $db->prepare("INSERT INTO `paint`.`paints` (`title`, `year`, `height`, `width`, `img`) 
						           VALUES (:title, :year, :height, :width, :imgpath)");

		
		$statement->bindParam(':title', $title);
		$statement->bindParam(':year', $year);
		$statement->bindParam(':height', $height);
		$statement->bindParam(':width', $width);
		$statement->bindParam(':imgpath', $imgpath);

		//! executes INSERT statement
		$statement->execute();

		//header("location:addpaint.php?status=uploaded");

		
	}
} catch (Exception $e)	 {
	 	echo "Unable to add new row";
	 	exit;
}

include("inc/header.php"); 
	
	//! Still working on the status to change. Not being right used right now 
	if (isset($_GET["status"]) && $_GET["status"] == "uploaded"){
			echo "<h3>Stats uploaded successfully</h3>";
		} else { ?>

			<div class="">	
				<form method="post" action="addpaint.php">
					<div class="form-group">
						<table>
						<tr>
							<th><label for="title">Name</label></th>
							<td><input type="text" id="title" name="title" class="form-control" /></td>
						</tr>
						<tr>
							<th><label for="year">Year</label></th>
							<td><input type="text" id="year" name="year" class="form-control"/></td>
							
						</tr>
						<tr>
							<th><label for="height">Height</label></th>
							<td><input type="text" id="height" name="height" class="form-control"/></td>
							
						</tr>
						<tr>
							<th><label for="width">Width</label></th>
							<td><input type="text" id="width" name="width" class="form-control"/></td>
							
						</tr>
						<tr>
							<th><label for="imgpath">Img path</label></th>
							<td><input type="text" id="imgpath" name="imgpath" class="form-control"/></td>
							
						</tr>

						<tr style="display:none">
							<th><label for="address">Address</label></th>
							<td><input type="text" id="address" name="address" />
							<p>please leave this field blank</p></td>
							
						</tr>
						</table>
					<input type="submit" value="add new" class="btn btn-secondary"/>
				</form>
			</div> 
			<?php } ?>

<?php include("inc/footer.php"); ?>