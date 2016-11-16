
<?php

//!
//!
//!  I created this file to make sure I hade a static way to write to my database
//!
//!	 If you edit the $title, $year, $height, $width, and $imgpath, starting on line 17,	
//!  and visit the URL (http://localhost:8888/simpleinsert.php) in your browser it 
//!  automatically updtes the TABLE paints
//!
//!
try{
	$db = new PDO('mysql:host=localhost;dbname=paint;charset=utf8mb4', 'root', 'root');
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$title = "wolf";
$year = "2017";
$height = "21";
$width = "17";
$imgpath = "img/wolfie.jpg";

$statement = $db->prepare("INSERT INTO `paint`.`paints` (`ID`, `title`, `year`, `height`, `width`, `img`) 
						   VALUES (NULL, :title, :year, :height, :width, :imgpath)");

//$statement->bindParam('ID', NULL);
$statement->bindParam(':title', $title);
$statement->bindParam(':year', $year);
$statement->bindParam(':height', $height);
$statement->bindParam(':width', $width);
$statement->bindParam(':imgpath', $imgpath);



$statement->execute();


echo "Success!";

} catch (Exception $e) {
	echo "Unable to connect";
	echo $e->getMessage();
	exit; }



//!
//!	    -- REFERENCE --
//!

// try {
// 	$results = $db->query("SELECT title, year, img FROM Paint.paints");
// }	catch (Exception $e) {
// 	echo "Unable to retreive results";
// 	exit;
// }

// var_dump($results->fetchAll(PDO::FETCH_ASSOC));






