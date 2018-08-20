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

    <section id="header" style="background-image: url(<?= base_url(); ?>assets/images/main/history-header.jpg);">
		<div class="header-overlay"></div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<h5>HISTORY</h5>
				<h1>IT'S NOT ONLY JUST<br>A BUSINESS</h1>
			</div>
		</div>
	</section>
	
	<section id="about-tab-wrap">
		<div class="container-fluid">
			<div class="row">
				<ul class="nav nav-pills">
					<li class="active">
						<a data-toggle="pill" href="#history">
							<div class="about-tab-inside">
								<div class="about-tab-icon">
									<img src="<?= base_url(); ?>assets/images/main/icon-history-white.png">
								</div>
								<div class="about-tab-text">
									<h5>History</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#vision-mission">
							<div class="about-tab-inside">
								<div class="about-tab-icon">
									<img src="<?= base_url(); ?>assets/images/main/icon-vision.png">
								</div>
								<div class="about-tab-text">
									<h5>Vision & Mission</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#management">
							<div class="about-tab-inside">
								<div class="about-tab-icon">
									<img src="<?= base_url(); ?>assets/images/main/icon-management.png">
								</div>
								<div class="about-tab-text">
									<h5>Management</h5>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section id="about-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 no-padding tab-content">
					<div id="history" class="col-sm-12 tab-pane fade in active">
						<div class="row row-eq-height">
							<div class="col-sm-6 content-center history-1-text">
								<div class="history-1-inside">
									<div class="history-1-title">
										<h2>HISTORY OF<br>SUNGAI BUDI GROUP</h2>
									</div>
									<div class="red-liner"></div>
									<div class="history-1-desc">
										<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
										<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc.</p>
										<p>Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim lorem ipsum dolor.</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 history-1-pict-wrap">
								<div class="history-1-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/history-1.jpg);">
									<div class="history-pict-overlay"></div>
								</div>
							</div>
						</div>
						<div class="row row-history-2">
							<div class="col-sm-6 v-center history-2-pict-wrap">
								<div class="history-2-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/history-2.jpg);">
									<div class="history-pict-overlay"></div>
								</div>
							</div><!--
						 --><div class="col-sm-6 v-center history-2-text">
								<div class="history-1-title">
									<h2>LOREM IPSUM<br>DOLOR SIT AMET</h2>
								</div>
								<div class="red-liner"></div>
								<div class="history-1-desc">
									<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
									<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 history-map-wrap">
								<div class="col-sm-12 history-map">
									<img src="<?= base_url(); ?>images/main/history-map.png">
								</div>
								<div class="col-sm-6 v-center">
									<h2>lorem ipsum<br>SUNGAI BUDI GROUP</h2>
								</div><!--
							 --><div class="col-sm-6 v-center">
									<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
								</div>
							</div>
						</div>
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

	}
</script>
</html>
