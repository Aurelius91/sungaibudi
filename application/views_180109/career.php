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

    <section id="about-header">
		<div id="about-header-carousel" class="owl-carousel owl-theme">
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/career-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/career-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/career-header.jpg);"><div class="header-overlay"></div></div>
		</div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<h5>CAREER</h5>
				<h1>LOOKING FOR<br>OPPORTUNITIES?</h1>
			</div>
		</div>
	</section>
	
	<section id="career-message-section" class="fade-animate" data-animate data-animation-classes="animated fadeUpMiddle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<h5>We are always looking for great talent to be a part of Sungai Budi Group team.<br>Review the open position below if you would like to apply</h5>
				</div>
			</div>
		</div>
	</section>
	
	<section id="career">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 career-grid">
					<div class="career-red-box"></div>
					<div class="career-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
						<div class="career-title">
							<h2>DESIGNER</h2>
						</div>
						<div class="red-liner"></div>
						<div class="career-desc">
							<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
						</div>
						<div class="career-view">
							<a href=""><button class="btn btn-read-more-red"><span>VIEW</span></button></a>
						</div>
						
						<div class="career-hover">
							<div class="career-hover-desc">
								<p><span class="darker">Designer - </span>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								<p>nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
							</div>
							<div class="career-view">
								<a href="<?= base_url(); ?>careerdetail"><button class="btn btn-read-more-red btn-red-active"><span>VIEW</span></button></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 career-grid">
					<div class="career-red-box"></div>
					<div class="career-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
						<div class="career-title">
							<h2>DEVELOPMENT</h2>
						</div>
						<div class="red-liner"></div>
						<div class="career-desc">
							<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
						</div>
						<div class="career-view">
							<a href=""><button class="btn btn-read-more-red"><span>VIEW</span></button></a>
						</div>
						
						<div class="career-hover">
							<div class="career-hover-desc">
								<p><span class="darker">Development - </span>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								<p>nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
							</div>
							<div class="career-view">
								<a href="<?= base_url(); ?>careerdetail"><button class="btn btn-read-more-red btn-red-active"><span>VIEW</span></button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 career-grid">
					<div class="career-red-box"></div>
					<div class="career-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
						<div class="career-title">
							<h2>CLIENT SERVICES</h2>
						</div>
						<div class="red-liner"></div>
						<div class="career-desc">
							<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
						</div>
						<div class="career-view">
							<a href=""><button class="btn btn-read-more-red"><span>VIEW</span></button></a>
						</div>
						
						<div class="career-hover">
							<div class="career-hover-desc">
								<p><span class="darker">Client Services - </span>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								<p>nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
							</div>
							<div class="career-view">
								<a href="<?= base_url(); ?>careerdetail"><button class="btn btn-read-more-red btn-red-active"><span>VIEW</span></button></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 career-grid">
					<div class="career-red-box"></div>
					<div class="career-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
						<div class="career-title">
							<h2>MARKETING</h2>
						</div>
						<div class="red-liner"></div>
						<div class="career-desc">
							<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
						</div>
						<div class="career-view">
							<a href=""><button class="btn btn-read-more-red"><span>VIEW</span></button></a>
						</div>
						
						<div class="career-hover">
							<div class="career-hover-desc">
								<p><span class="darker">Marketing - </span>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								<p>nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
							</div>
							<div class="career-view">
								<a href="<?= base_url(); ?>careerdetail"><button class="btn btn-read-more-red btn-red-active"><span>VIEW</span></button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="news-subscribe">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 text-center news-subs-title">
					<h3>IF YOU HAVE ANY QUESTIONS, CONTACT US NOW!</h3>
				</div>
				<div class="col-sm-12 text-center career-contact-desc">
					<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
				</div>
				<div class="col-sm-12 text-center">
					<div class="news-subs-read">
						<a href=""><button class="btn btn-read-more"><span>CONTACT US</span></button></a>
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
		aboutHeaderCarousel();
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
	
	function aboutHeaderCarousel(){
		$('#about-header-carousel').owlCarousel({
			autoplay: false,
			loop: false,
			nav: true,
			dots: false,
			items: 1,
			navText:['<h5>PREV</h5>','<h5>NEXT</h5>']
		});
	}
	

</script>
</html>
