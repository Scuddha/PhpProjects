<?php 
//!
//!
//!
//!  	This is the home page of my website
//!
//!		It incudes the inc/functions.php file and uses all_paints_array() and get_item_html() from that file 
//!		to pull from the database and display the picture of my paintings with HTML.  The pictures link   
//!		to a details page(details.php). The inc/header.php and inc/footer.php display the header and footer. 
//!		
//!	  
include("inc/functions.php");

$catalog = all_paints_array();

$pageTitle = "Paintings";

include("inc/header.php");

 ?>


<div class="wrapper">
	<h1><?php echo $pageTitle; ?></h1>
		<div class="picslist">
			<ul id="gallery">
				
				<?php
				//$random = array_rand($catalog,2);
				foreach ($catalog as $id => $item) {
				echo get_item_html($id,$item);

				}

				?>	
			</ul>
		</div>
</div>
 

 	
<?php include("inc/footer.php"); ?>
