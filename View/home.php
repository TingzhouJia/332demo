<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" href="http://192.168.64.2/SPCA/css/home.css" />
		<?php include "../Config/otherConfig.php" ?>

	</head>
	<body>
		<!-- include header -->
		<?php include 'navBar.php'; ?>
		<!-- homepage body part -->
		<div class="home">
			<div class="gallery">
				<div class="gal_750">
					<div class="gallery-img">
						<a type="button" href="Adopt.php" class="btn btn-warning gallery_btn">ADOPT</a>
						<img src="https://ontariospca.ca/wp-content/uploads/2019/05/Gallery-adopt-copy.jpg" alt="">
					</div>
					<div class="gallery-img">
						<a type="button" href="Volunteers.php" class="btn btn-warning gallery_btn">VOLUNTEER</a>
						<img src="https://ontariospca.ca/wp-content/uploads/2019/03/Gallery-volunteer.jpg" alt="">
					</div>
				</div>
				<div class="gallery-img second">
					<a type="button" href="Donate.php"  class="btn btn-warning gallery_btn">DONATE</a>
					<img src="https://ontariospca.ca/wp-content/uploads/2019/03/Gallery-Donate.jpg" alt="">
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
					<div class="who-we-are__boxes">
						<div class="who-we-are__item">
							<div class="box-block">

								<picture class="box-block__picture">
									<a href="https://ontariospca.ca/what-we-do/spay-neuter/" class="box-block__link">
										<img src="https://ontariospca.ca/wp-content/uploads/2019/03/OSPCA-SpayNeuterCAT-jan2020-600x450-c-center.jpg"
										 alt="" class="box-block__image">
									</a><!-- /.box-block__link -->
								</picture>

								<div class="box-block__links">
									<a href="https://ontariospca.ca/what-we-do/spay-neuter/" class="button button--blue">
										<button type="button" class=" btn-primary">Spay/Neuter</button>
									</a>
								</div><!-- /.box-block__buttons -->


							</div><!-- /.box-block -->
						</div>
						<!-- /.who-we-are__item -->
						<div class="who-we-are__item">
							<div class="box-block" data-template="block.twig">

								<picture class="box-block__picture">
									<a href="https://ontariospca.ca/what-we-do/animal-care/pet-insurance/" class="box-block__link">
										<img src="https://ontariospca.ca/wp-content/uploads/2019/03/GalleryImage-pet-insurance-600x450-600x450-c-center.jpg"
										 alt="cat with cone and bandaged leg" class="box-block__image">
									</a><!-- /.box-block__link -->
								</picture>
								<div class="box-block__description">

								</div><!-- /.box-block__description -->


								<div class="box-block__links">
									<a href="https://ontariospca.ca/what-we-do/animal-care/pet-insurance/" class="button button--blue">
										<button type="button" class=" btn-primary">Pet Insurance</button>
									</a>
								</div><!-- /.box-block__buttons -->


							</div><!-- /.box-block -->
						</div><!-- /.who-we-are__item -->
						<div class="who-we-are__item">
							<div class="box-block" data-template="block.twig">

								<picture class="box-block__picture">
									<a href="https://ontariospca.ca/kumho-tire-helps-animals-in-need/" class="box-block__link">
										<img src="https://ontariospca.ca/wp-content/uploads/2020/01/kumho_website-600x450-600x450-c-center.jpg" alt="german shepherd with winter tire"
										 class="box-block__image">
									</a><!-- /.box-block__link -->
								</picture>
								<div class="box-block__description">

								</div><!-- /.box-block__description -->

								<div class="box-block__links">
									<a href="https://ontariospca.ca/kumho-tire-helps-animals-in-need/" class="button button--blue">
										<button type="button" class=" btn-primary">Learn More</button>

									</a>
								</div><!-- /.box-block__buttons -->


							</div><!-- /.box-block -->
						</div><!-- /.who-we-are__item -->
					</div><!-- /.who-we-are__boxes -->
				</div><!-- /.section__container -->
			</section>
			<!-- section who-we-are end -->
			<section class="section section--events">
				
					<div class="events">
						<h2 class="events__headline">Upcoming Events</h2>
						<div class="events__list fc-circles fc-circles-overlay">
							<div class="card event_each_item" >
								<img src="https://ontariospca.ca/wp-content/uploads/2020/01/hunnybunny__1_-600x600-600x450-c-default.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Online Cupcake Orders – Muskoka</h5>
									<p class="card-text">Bracebridge</p>
									<a href="https://ontariospca.ca/who-we-are/events/online-cupcake-orders-muskoka/" class="btn-primary">Read More</a>
								</div>
							</div>
							<div class="card event_each_item" >
								<img src="https://ontariospca.ca/wp-content/uploads/2020/01/hunnybunny__1_-600x600-600x450-c-default.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Online Cupcake Orders – Muskoka</h5>
									<p class="card-text">Bracebridge</p>
									<a href="https://ontariospca.ca/who-we-are/events/online-cupcake-orders-muskoka/" class="btn-primary">Read More</a>
								</div>
							</div>
							<div class="card event_each_item" >
								<img src="https://ontariospca.ca/wp-content/uploads/2020/01/hunnybunny__1_-600x600-600x450-c-default.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Online Cupcake Orders – Muskoka</h5>
									<p class="card-text">Bracebridge</p>
									<a href="https://ontariospca.ca/who-we-are/events/online-cupcake-orders-muskoka/" class="btn-primary">Read More</a>
								</div>
							</div>
							<div class="card event_each_item" >
								<img src="https://ontariospca.ca/wp-content/uploads/2020/01/hunnybunny__1_-600x600-600x450-c-default.jpg" class="card-img-top" alt="...">
								<div class="card-body">
									<h5 class="card-title">Online Cupcake Orders – Muskoka</h5>
									<p class="card-text">Bracebridge</p>
									<a href="https://ontariospca.ca/who-we-are/events/online-cupcake-orders-muskoka/" class="btn-primary">Read More</a>
								</div>
							</div>
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
