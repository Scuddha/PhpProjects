<?php 

include("inc/functions.php");
$catalog = all_paints_array();

if (isset($_GET["id"])){
	$id = $_GET["id"];
	if (isset($catalog[$id])){
		$item = $catalog[$id];
	}
}

if (!isset($item)){
	header("location:scuddha.php");
	//exit;
}

$pageTitle = $item["title"];
$section = null;

include("inc/header.php"); 
?>
<div class="detailspage">
	<div class="wrapper">
		<div class="mediaimage">
			<span class"row">
				<div class="col-md-6">
					<img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["title"];?>"/>
				</div>
				<div id="itemdetails" class="col-md-6">
					</br></br>
					<h1><?php echo $item["title"]; ?></h1>
					<?php echo get_item_details_html($id,$item);?>
				</div>
			</span>
		</div>
	</div>
</div>

<div class="row">
</div> 	
 <?php include("inc/footer.php"); ?>