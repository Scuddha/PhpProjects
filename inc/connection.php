<?php

//!	   creating PDO
//!    Connecting to local DATABASE Paint TABLE paints 
//!

try{
	$db = new PDO('mysql:host=localhost;dbname=paint;charset=utf8mb4', 'root', 'root');
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
	echo "Unable to connect";
	echo $e->getMessage();
	exit; }

//!
//!    
//! Querying the database
//!    
//!			-- Reference --
//
// try {
// 	$results = $db->query("SELECT title, year, img FROM Paint.paints");
// }	catch (Exception $e) {
// 	echo "Unable to retreive results";
// 	exit;
// }


// var_dump($results->fetchAll(PDO::FETCH_ASSOC));
//$catalog = $results->fetchAll();

?>

