<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">


	<link href="assets/css/bootstrap.css" rel="stylesheet">

	<link href="assets/vendors/flat-icon/flaticon.css" rel="stylesheet">


	<!-- Rev slider css -->
	<link href="assets/vendors/revolution/css/settings.css" rel="stylesheet">
	<link href="assets/vendors/revolution/css/layers.css" rel="stylesheet">
	<link href="assets/vendors/revolution/css/navigation.css" rel="stylesheet">

	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">

	<link rel="shortcut icon" href="assets/images/logo-02.png" type="image/x-icon">
	<link rel="icon" href="assets/images/logo-02.png" type="image/x-icon">

	<link
			href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&amp;family=Open+Sans:wght@400;600;700;800&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap"
			rel="stylesheet">

	<!-- Responsive -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	

	<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>

<script type="text/javascript">
   (function(){
      emailjs.init({
        publicKey: "SYw_FIDFrWcOFsEQw",
      });
   })();
</script>
<script type="text/javascript">
	function sendMail(e) {
		e.preventDefault();
		var params = {
			from_name : document.getElementById('name').value,
			from_email : document.getElementById('email').value,
			message : document.getElementById('message').value
		}

		emailjs.send('service_8gl7dpl', 'template_5bom545', params).then(function (res) {
			alert("We received Your message. Thank you!")
		})
		
	}
</script>
</head>

<body>

<div class="page-wrapper">

	<!-- Preloader -->
	<div class="preloader"></div>

	<?php 
include 'header.php';
?>
	<!-- End Main Header -->

		<!-- Contact Page Title -->
		<section class="contact-page-title" style="background-image: url(assets/images/background/17.jpg)">
			<div class="auto-container">
				<h1>We are available <br> Share your opinion!</h1>
			</div>
		</section>

		<!-- End Contact Page Title -->

		<!-- Contact Page Section -->
		<section class="contact-page-section">
			<div class="auto-container">
				<div class="row clearfix">

					<!-- Form Column -->
					<div class="form-column col-lg-8 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="title-box">
								<h3>We Love To Hear From You</h3>
								<div class="text"></div>
							</div>

							<!-- Contact Form -->
							<div class="contact-form">
								<form method="post" action="" id="contact-form">
									<div class="row clearfix">
										<div class="form-group col-lg-6 col-md-12 col-sm-12">
											<input id="name" type="text" name="username" value="" placeholder="Name" required>
										</div>

										<div class="form-group col-lg-6 col-md-12 col-sm-12">
											<input id="email" type="email" name="email" value="" placeholder="Email" required>
										</div>

										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<input type="text" name="subject" value="" placeholder="Subject" required>
										</div>

										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<textarea id="message" name="message" placeholder="Message"></textarea>
										</div>

										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<button onclick="sendMail(event)" type="submit" class="theme-btn btn-style-five"><span class="txt">Submit</span>
											</button>
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>

					<!-- Info Column -->
					<div class="info-column col-lg-4 col-md-12 col-sm-12">
						<div class="inner-column">
							
						<ul>
						<li> <strong> Main Restaurant:</strong> <br> Leading University Cafe <br> Ragib Nagar, KamalBazer, Sylhet
						</div> 
						</li>


								<div class="inner-column">
									<ul>
										<li><strong>Have any querry:</strong> <br> Call us on : +88 01725291718
										</div> 
									</li>
								
							</ul>
						</div>
					</div>

				</div>

			</div>
		</section>

		<!--Social Box-->
		<ul class="social-box">
			<li><a href="#" style="color: black"><span class="fa fa-user-alt"></span></a></li>
		</ul>
		<div class="option-list">
			<!-- Cart Button -->
			<div class="cart-btn">
				<a href="shoping-cart.html" class="icon flaticon-shopping-cart" style="color: black"><span
						class="total-cart" style="background-color: #a40301;color:white"></span></a>
			</div>
			<!-- Search Btn -->
		

		<!-- Map Section -->
		<section class="map-section">
			<!-- Map Boxed -->
			<div class="map-boxed">
				<!--Map Outer-->
				<div class="map-outer">
					<iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6331292129!2d144.49266890254142!3d-37.97123689954809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1574408946759!5m2!1sen!2s"
						allowfullscreen=""></iframe>
				</div>
			</div>
		</section>
		<!-- End Map Section -->
		

		<!--Main Footer-->
     
<footer class="main-footer" style="background-color: red">

	<div class="auto-container">
  
		<!-- Widgets Section -->
		<div class="widgets-section">
			<div class="row clearfix">
  
				<!-- Footer Column -->
				<div class="footer-column col-lg-3 col-md-6 col-sm-12">
					<!-- Info Widget -->
					<div class="footer-widget info-widget">
						<h4>Contact Info</h4>
						<a class="number" href="#">+88 01725291718</a>
						<ul class="email-list">
							<li><a href="#">lu-food-hub@gmail.com</a></li>
						</ul>
					</div>
					<div class="text">
						<br> Leading University Cafe<br> Ragib Nagar, KamalBazer, Sylhet
					</div>
				</div>
  
				<!-- Footer Column -->
  
				<!-- Footer Column -->
				<div class="footer-column col-lg-3 col-md-6 col-sm-12">
					<!-- Info Widget -->
					<div class="footer-widget timing-widget">
						<h4>Opening Hour</h4>
						<ul class="timing-list">
							<li>Saturday- Thursday <span>9 AM – 4 PM</span></li>
							<li>Friday <span>Off</span></li>
						</ul>
					</div>
				</div>
  
			</div>
		</div>
  
		<!-- Footer Bottom -->
	</div>
  
	<div class="footer-bottom text-center" style="background-color: white">
		<div class="clearfix text-center">
			<div class="text-center">
				<div class="copyright text-center" style="color: black">&copy; Copyright 2024. All right
					reserved By LU FOOD HUB.
				</div>
			</div>
		</div>
	</div>
  
  </footer>
  
  </div>
	

	<!--Scroll to top-->
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.fancybox.js"></script>
	<script src="assets/js/owl.js"></script>
	<script src="assets/js/wow.js"></script>
	<script src="assets/js/validate.js"></script>
	<script src="assets/js/appear.js"></script>
	<script src="assets/js/script.js"></script>

</body>




</html>