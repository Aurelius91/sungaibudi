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

    <section id="career-detail-header">
		<div class="container-fluid">
			<div class="row">
				<div class="career-detail-bg" style="background-image: url(<?= base_url(); ?>assets/images/main/career-detail-bg.jpg);">
					<div class="header-overlay">
						<div class="header-title-bg">
							<div class="header-title-wrap">
								<h5>CAREER DETAIL</h5>
								<h1>CLIENT<br>SERVICES</h1>
							</div>
						</div>
					</div>
				</div>
				<div class="career-detail-white-box"></div>
			</div>
		</div>
	</section>
	
	<section id="career-detail-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 career-detail-tab-wrap">
					<div class="col-sm-6 career-detail-tab-inside">
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="pill" href="#c-d-1">Project Manager</a></li>
							<li><a data-toggle="pill" href="#c-d-2">Sales</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 tab-content">
					<div id="c-d-1" class="tab-pane fade in active">
						<div class="row">
							<div class="col-sm-6 career-detail-top">
								<div class="career-detail-title fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<h2>PROJECT MANAGER (PM)</h2>
								</div>
								<div class="red-liner"></div>
								<div class="career-detail-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								</div>
							</div>
						</div>
						<div class="row row-eq-height-desktop career-detail-split-row">
							<div class="col-sm-6 career-detail-grid job-desc fade-animate" data-animate data-animation-classes="animated fadeInLeft">
								<div class="career-detail-sub-title">
									<h4>Job Description:</h4>
								</div>
								<div class="career-detail-list">
									<ul>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-6 career-detail-grid qualification fade-animate" data-animate data-animation-classes="animated fadeInRight">
								<div class="career-detail-sub-title">
									<h4>Qualification:</h4>
								</div>
								<div class="career-detail-list">
									<ul>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div id="c-d-2" class="tab-pane fade">
						<div class="row">
							<div class="col-sm-6 career-detail-top">
								<div class="career-detail-title fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<h2>SALES</h2>
								</div>
								<div class="red-liner"></div>
								<div class="career-detail-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								</div>
							</div>
						</div>
						<div class="row row-eq-height-desktop career-detail-split-row">
							<div class="col-sm-6 career-detail-grid job-desc fade-animate" data-animate data-animation-classes="animated fadeInLeft">
								<div class="career-detail-sub-title">
									<h4>Job Description:</h4>
								</div>
								<div class="career-detail-list">
									<ul>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-6 career-detail-grid qualification fade-animate" data-animate data-animation-classes="animated fadeInRight">
								<div class="career-detail-sub-title">
									<h4>Qualification:</h4>
								</div>
								<div class="career-detail-list">
									<ul>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 career-detail-form-text">
					<h4>If you have what it takes to be a part of our team, please fill out the form below</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 career-detail-form">
					<div class="form-group career-detail-custom">
						<input type="text" class="form-control input-custom input-custom-transparent" id="career-name">
						<label for="career-name">Your Name</label>
					</div>
				</div>
				<div class="col-sm-6 career-detail-form">
					<div class="form-group career-detail-custom">
						<input type="text" class="form-control input-custom input-custom-transparent" id="career-email">
						<label for="career-email">Your Email</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 career-detail-form">
					<div class="form-group career-detail-custom">
						<input type="text" class="form-control input-custom input-custom-transparent" id="career-phone">
						<label for="career-phone">Your Phone Number</label>
					</div>
				</div>
				<div class="col-sm-6 career-detail-form">
					<div class="form-group career-detail-custom">
						<input type="text" class="form-control input-custom input-custom-transparent" id="career-cv">
						<label for="career-cv">Upload Your CV</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 career-detail-button-gap">
					<div class="career-detail-button-wrap">
						<a href=""><button class="btn btn-read-more-red"><span>BACK</span></button></a>
					</div>
					<div class="career-detail-button-wrap">
						<a href=""><button class="btn btn-read-more-red"><span>SEND</span></button></a>
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
	

</script>
</html>
