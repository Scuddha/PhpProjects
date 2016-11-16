<?php

//!
//!	This function pulls the data from desired row(s) from DATABASE: Paint and TABLE paints   	
//!

function all_paints_array(){
	include("connection.php");


	try {
	 	$results = $db->query("SELECT title, img, year, height, width FROM Paint.paints");
	 }	catch (Exception $e)	 {
	 	echo "Unable to retreive results";
	 	exit;
	 }
	 	$catalog = $results->fetchAll();
    	return $catalog;
}

//!
//!	This function is used insert data from forms.  Its still a work in progress
//!		


function add_paints_array(){
	include("connection.php");


	try {
	 	$results = "INSERT INTO `paint`.`paints` (`ID`, `title`, `year`, `height`, `width`, `img`) 
	 				VALUES (NULL, $title, $year, $height, $width, $imgpath);";
	 	$db->prepare($results);
	 	$results = execute(array(
	 		'title' => $title,
	 		'year' => $year,
	 		'height' => $height,
	 		'width' => $width,
	 		'imgpath' => $imgpath
	 	));
	 	
	 	//mysql_query($sql);
	 	echo "Success!!";

	 
	 }	catch (Exception $e)	 {
	 	echo "Unable to add new row";
	 	exit;
	 }

	// $results= $db->prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate) VALUES (?, ?, ?, ?)') ;

	// $data = array($postTitle, $postDesc, $postCont, date('Y-m-d H:i:s'));

	// $results->execute($data);


	 //$db = null;
}

//!
//!	This function creates the HTML as a list to be dispay from details on scuddha.php
//!


function get_item_html($id,$item) {
    $output = "<li><a href='details.php?id="
        . $id . "'><img src='" 
        . $item["img"] . "' alt='" 
        . $item["title"] . "' />" 
        . "<p>Details</p>"
        . "</a></li>";
    return $output;
}

//!
//!	This function creates HTML for the details page. 
//!	Note: The title is separate from this function
//!


function get_item_details_html($id,$item) {
    $output =  "<h3>" 
        . $item["year"] . "</h3>" . "<h3>"
        . $item["height"] . " X "
        . $item["width"] . " inches"
        . "</h3>";
    return $output;
}





