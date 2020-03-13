<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="http://192.168.64.2/SPCA/css/home.css" />
	<?php include "../Config/otherConfig.php" ?>
	
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>

<body>
	<!-- include header -->
	<?php include 'navBar.php'; ?>
	<!-- homepage body part -->
	<div class="home">
		<div class="gallery">

			<div class="gallery-img">
				<a type="button" href="Adopt.php" class="btn btn-warning gallery_btn">ADOPT</a>
				<img src="https://ontariospca.ca/wp-content/uploads/2019/05/Gallery-adopt-copy.jpg" alt="">
			</div>
			<div class="gallery-img">
				<a type="button" href="Volunteers.php" class="btn btn-warning gallery_btn">VOLUNTEER</a>
				<img src="https://ontariospca.ca/wp-content/uploads/2019/03/Gallery-volunteer.jpg" alt="">
			</div>

			<div class="gallery-img second">
				<a type="button" href="Donate.php" class="btn btn-warning gallery_btn">DONATE</a>
				<img src="https://ontariospca.ca/wp-content/uploads/2019/03/Gallery-Donate.jpg" alt="">
			</div>
		</div>
	</div>
	<!-- gallery end here -->
	<section class="section section--who-we-are who-we-are">
		<div class="section__container">
			<h2 class="who-we-are__headline">Ontario SPCA and Humane Society</h2>
			<div class="who-we-are__description">
				The Ontario SPCA and Humane Society is a registered charity, established in 1873. The Society and its network of
				animal welfare communities facilitate and provide for province-wide leadership on matters relating to the
				prevention of cruelty to animals and the promotion of animal well-being. Offering a variety of mission-based
				programs, including community-based sheltering, animal wellness services, provincial animal transfers, shelter
				health &amp; wellness, high-volume spay/neuter services, animal rescue, animal advocacy, Indigenous partnership
				programs and humane education, the Ontario SPCA is Ontario’s animal welfare charity.</div>
		</div>

		</div><!-- /.section__container -->
	</section>

	<!-- section who-we-are end -->
	<section>
	<?php
 
 $dataPoints = array(
	 array("label"=> "Food + Drinks", "y"=> 590),
	 array("label"=> "Activities and Entertainments", "y"=> 261),
	 array("label"=> "Health and Fitness", "y"=> 158),
	 array("label"=> "Shopping & Misc", "y"=> 72),
	 array("label"=> "Transportation", "y"=> 191),
	 array("label"=> "Rent", "y"=> 573),
	 array("label"=> "Travel Insurance", "y"=> 126)
 );
	 
 ?>
		<!-- show statistics -->
		<div id="chartContainer" style="height: 370px; width: 370px;"></div>
		<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Average Expense Per Day  in Thai Baht"
	},
	data: [{
		type: "pie",
		//showInLegend: "true",
		//legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "$#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
	</section>
	<section class="section section--events">
		<?php include '../Controller/fetchAllOrganization.php'; ?>
		<div class="events">
			<h2 class="events__headline">Our Organizations</h2>
			<div class="events__list fc-circles fc-circles-overlay">
				<?php 
				$orgList=$organization->organizationList;
				foreach( $orgList as $ele): ?>
					<div class="card event_each_item">
					<img src="https://ontariospca.ca/wp-content/uploads/2020/01/hunnybunny__1_-600x600-600x450-c-default.jpg" class="card-img-top" alt="...">
					<div class="card-body">
					
						<h5 class="card-title"><?php echo $ele["name"]; ?></h5>
						<p class="card-text"><?php echo $ele["typeOfOrganization"]; ?></p>
						<p class="card-text"><?php echo $ele["address"]; ?></p>
						<p class="card-text"><?php echo $ele["phone_number"]; ?></p>
						<a href="https://ontariospca.ca/who-we-are/events/online-cupcake-orders-muskoka/" class=" mybtn">Read More</a>
					</div>
				</div>
				<?php endforeach; ?>
				
			</div>
		</div>
		</div>
		</div>
	</section>
	<section>

	</section>
	</div>
	<?php include 'footer.php'; ?>
</body>

</html>