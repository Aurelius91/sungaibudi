<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale = 1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">


    <title><?= $title; ?></title>

<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugin/bootstrap/css/bootstrap.min.css">
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <!--[if lt IE 9]>
        <script src="<?= base_url(); ?>assets/plugin/ie-support/html5shiv.min.js"></script>
        <script src="<?= base_url(); ?>assets/plugin/ie-support/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	
	<? $this->load->view('menu'); ?>
	
	<section id="contact-map-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 contact-map">
					<div id="map-for-contact"></div>
					<div class="contact-float fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<div class="contact-float-title">
							<h2>IF YOU HAVE ANY QUESTIONS, CONTACT US NOW!</h2>
						</div>
						<div class="liner"></div>
						<div class="contact-float-desc">
							<h6>Aenean sollicitudin lorem quis bibendum auctor, nisi elit consequat ipsum</h6>
						</div>
						<div class="contact-form">
							<div class="form-group contact-group-custom">
								<input type="text" class="form-control input-custom input-custom-transparent" id="contact-name">
								<label for="contact-name">Your Name</label>
							</div>
							<div class="form-group contact-group-custom">
								<input type="text" class="form-control input-custom input-custom-transparent" id="contact-email">
								<label for="contact-email">Your Email</label>
							</div>
							<div class="form-group contact-group-custom">
								<input type="text" class="form-control input-custom input-custom-transparent" id="contact-phone">
								<label for="contact-phone">Your Phone Number</label>
							</div>
							<div class="form-group contact-group-custom">
								<textarea class="form-control input-custom input-custom-transparent" id="contact-message" rows="4"></textarea>
								<label for="contact-message">Message</label>
							</div>
						</div>
						<div class="contact-float-button">
							<a href=""><button class="btn btn-read-more"><span>SEND</span></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="contact-touch">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 contact-touch-wrap">
					<div class="col-sm-12 contact-touch-page fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<h5>CONTACT US</h5>
					</div>
					<div class="col-sm-12 contact-touch-title fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<h1>GET IN TOUCH</h1>
					</div>
					<div class="col-sm-12">
						<div class="red-liner"></div>
					</div>
					<div class="col-sm-12 contact-touch-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<? $this->load->view('footer'); ?>
	
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>if (!window.jQuery) { document.write('<script src="<?= base_url(); ?>assets/js/jquery-2.1.4.min.js"><\/script>'); }</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script src="<?= base_url(); ?>plugin/bootstrap/js/bootstrap.min.js"></script>-->
<script src="<?= base_url(); ?>assets/plugin/owl-carousel/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/animate/animate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" async defer></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDa3rBp3dZ3iqur-wWz-KVtKT2Wf_fujB0&sensor=false"></script>

<script type="text/javascript">
	$(function() {
		animateThing();
		searchInput();
		contactMaps();
	});
	
	
	function animateThing(){
		var animate = new Animate({
			target: '[data-animate]',
			remove: true,
			scrolled: false,
			reverse: false,
			onLoad: true,
			onScroll: true,
			onResize: false,
			disableFilter: false,
			callbackOnInit: function() {},
			callbackOnAnimate: function(el) {},
		});
		animate.init();
	}
	
	function searchInput(){
		$('.btn-search').click(function(){
			$('.search-input').toggleClass('open');
		});
	}
	
	function contactMaps(){
		var locations = [
		  ['Wisma Budi',  -6.214208, 106.831261, 1]
		];
		
		var latit = -6.214208;
		var asidelatit = latit + 0.001;
		
		var longit = 106.831261;
		var asidelongit = longit + 0.004;

		var bounds  = new google.maps.LatLngBounds();

		// Specify features and elements to define styles.
		  var styleArray = [
			  {
				"stylers": [
				  { "saturation": -85 }
				]
			  },{
			  }
			];


		var map = new google.maps.Map(document.getElementById('map-for-contact'), {
		  styles: styleArray,
		  zoom: 17,
		  center: new google.maps.LatLng(asidelatit, asidelongit),
		  mapTypeId: google.maps.MapTypeId.ROADMAP,
		  scrollwheel: false,
          fullscreenControl: true
		});

		var infowindow = new google.maps.InfoWindow();

		var marker, i;
		
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.214208, 106.831261),
			map: map,
			icon:'http://localhost/sungaibudi/assets/images/main/contact-pin.png'
		});
		
	}

</script>
</html>
