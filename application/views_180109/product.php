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
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/product-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/product-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/product-header.jpg);"><div class="header-overlay"></div></div>
		</div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<h5>PRODUCT</h5>
				<h1>LOREM IPSUM<br>DOLOR SIT AMET</h1>
			</div>
		</div>
	</section>
	
	<section id="product-tab-wrap" class="fade-animate" data-animate data-animation-classes="animated fadeUpMiddle">
		<div class="container-fluid">
			<div class="row">
				<ul id="product-pills" class="nav nav-pills">
					<li class="active">
						<a data-toggle="pill" href="#product-1">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-1.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-1-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-1-white.png">
								</div>
								<div class="about-tab-text">
									<h5>Palm Oil</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-2">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/vision-mission-header.jpg, <?= base_url(); ?>assets/images/main/vision-mission-header.jpg, <?= base_url(); ?>assets/images/main/vision-mission-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-2.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-2-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-2.png">
								</div>
								<div class="about-tab-text">
									<h5>Rice Flour</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-3">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-3.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-3-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-3.png">
								</div>
								<div class="about-tab-text">
									<h5>Cassava</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-4">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-4.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-4-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-4.png">
								</div>
								<div class="about-tab-text">
									<h5>Coconut</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-5">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-5.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-5-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-5.png">
								</div>
								<div class="about-tab-text">
									<h5>Sugar</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-6">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-6.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-6-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-6.png">
								</div>
								<div class="about-tab-text">
									<h5>Other</h5>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section id="product-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 no-padding tab-content">
					<div id="product-1" class="col-sm-12 tab-pane fade in active">
						<div class="row row-history-1">
							<div class="product-carousel-shadow">
								<img src="<?= base_url(); ?>assets/images/main/product-slider-shadow.png">
							</div>
							<div id="product-carousel" class="owl-carousel owl-theme">
								<div class="product-item">
									<div class="product-item-left v-center-tablet">
										<div class="product-item-left-company" data-before="01">
											<h6>PT. Tunas Baru Lampung Tbk</h6>
										</div>
										<div class="product-item-left-name">
											<h2>Cooking Oil</h2>
										</div>
									</div><!--
								 --><div class="product-item-middle v-center-tablet">
										<div class="product-item-middle-pict" style="background-image: url(<?= base_url();?>assets/images/main/product-1.png);"></div>
									</div><!--
								 --><div class="product-item-right v-center-tablet">
										<div class="product-item-right-subtitle">
											<h4>Description</h4>
										</div>
										<div class="product-item-right-desc">
											<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
										</div>
									</div>
								</div>
								<div class="product-item">
									<div class="product-item-left v-center-tablet">
										<div class="product-item-left-company" data-before="02">
											<h6>PT. Tunas Baru Lampung Tbk</h6>
										</div>
										<div class="product-item-left-name">
											<h3>CRUDE PALM OIL (CPO)</h3>
										</div>
									</div><!--
								 --><div class="product-item-middle v-center-tablet">
										<div class="product-item-middle-pict" style="background-image: url(<?= base_url();?>assets/images/main/product-2.png);"></div>
									</div><!--
								 --><div class="product-item-right v-center-tablet">
										<div class="product-item-right-subtitle">
											<h5>Description</h5>
										</div>
										<div class="product-item-right-desc">
											<h6>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</h6>
										</div>
									</div>
								</div>
								<div class="product-item">
									<div class="product-item-left v-center-tablet">
										<div class="product-item-left-company" data-before="03">
											<h6>PT. Tunas Baru Lampung Tbk</h6>
										</div>
										<div class="product-item-left-name">
											<h2>Refined Bleached Deodorized Palm Oil</h2>
										</div>
									</div><!--
								 --><div class="product-item-middle v-center-tablet">
										<div class="product-item-middle-pict" style="background-image: url(<?= base_url();?>assets/images/main/product-3.png);"></div>
									</div><!--
								 --><div class="product-item-right v-center-tablet">
										<div class="product-item-right-subtitle">
											<h4>Description</h4>
										</div>
										<div class="product-item-right-desc">
											<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
										</div>
									</div>
								</div>
								<div class="product-item">
									<div class="product-item-left v-center-tablet">
										<div class="product-item-left-company" data-before="04">
											<h6>PT. Tunas Baru Lampung Tbk</h6>
										</div>
										<div class="product-item-left-name">
											<h3>Refined Bleached Deodorized Palm Olein</h3>
										</div>
									</div><!--
								 --><div class="product-item-middle v-center-tablet">
										<div class="product-item-middle-pict" style="background-image: url(<?= base_url();?>assets/images/main/product-4.png);"></div>
									</div><!--
								 --><div class="product-item-right v-center-tablet">
										<div class="product-item-right-subtitle">
											<h5>Description</h5>
										</div>
										<div class="product-item-right-desc">
											<h6>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</h6>
										</div>
									</div>
								</div>
								<div class="product-item">
									<div class="product-item-left v-center-tablet">
										<div class="product-item-left-company" data-before="05">
											<h6>PT. Tunas Baru Lampung Tbk</h6>
										</div>
										<div class="product-item-left-name">
											<h2>Refined Bleached Deodorized Palm Stearin</h2>
										</div>
									</div><!--
								 --><div class="product-item-middle v-center-tablet">
										<div class="product-item-middle-pict" style="background-image: url(<?= base_url();?>assets/images/main/product-5.png);"></div>
									</div><!--
								 --><div class="product-item-right v-center-tablet">
										<div class="product-item-right-subtitle">
											<h4>Description</h4>
										</div>
										<div class="product-item-right-desc">
											<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
										</div>
									</div>
								</div>
								<div class="product-item">
									<div class="product-item-left v-center-tablet">
										<div class="product-item-left-company" data-before="06">
											<h6>PT. Tunas Baru Lampung Tbk</h6>
										</div>
										<div class="product-item-left-name">
											<h3>Palm Fatty Acid Distillate</h3>
										</div>
									</div><!--
								 --><div class="product-item-middle v-center-tablet">
										<div class="product-item-middle-pict" style="background-image: url(<?= base_url();?>assets/images/main/product-6.png);"></div>
									</div><!--
								 --><div class="product-item-right v-center-tablet">
										<div class="product-item-right-subtitle">
											<h5>Description</h5>
										</div>
										<div class="product-item-right-desc">
											<h6>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</h6>
										</div>
									</div>
								</div>
								<div class="product-item">
									<div class="product-item-left v-center-tablet">
										<div class="product-item-left-company" data-before="07">
											<h6>PT. Tunas Baru Lampung Tbk</h6>
										</div>
										<div class="product-item-left-name">
											<h3>Crude Palm Kernel Oil</h3>
										</div>
									</div><!--
								 --><div class="product-item-middle v-center-tablet">
										<div class="product-item-middle-pict" style="background-image: url(<?= base_url();?>assets/images/main/product-7.png);"></div>
									</div><!--
								 --><div class="product-item-right v-center-tablet">
										<div class="product-item-right-subtitle">
											<h5>Description</h5>
										</div>
										<div class="product-item-right-desc">
											<h6>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row row-product-2">
							<div class="col-sm-12 product-2-border"></div>
							<div class="row">
								<div class="col-sm-3 product-2-grid fade-animate" data-animate data-animation-classes="animated fadeInUp" data-index="0">
									<div class="product-2-number">01</div>
									<div class="col-sm-12 product-2-pict">
										<img src="<?= base_url(); ?>assets/images/main/product-1.png">
									</div>
									<div class="col-sm-12 product-2-name">
										<p>Cooking Oil</p>
									</div>
								</div>
								<div class="col-sm-3 product-2-grid fade-animate" data-animate data-animation-classes="animated fadeInUp" data-index="1">
									<div class="product-2-number">02</div>
									<div class="col-sm-12 product-2-pict">
										<img src="<?= base_url(); ?>assets/images/main/product-2.png">
									</div>
									<div class="col-sm-12 product-2-name">
										<p>Crude Palm Oil (CPO)</p>
									</div>
								</div>
								<div class="col-sm-3 product-2-grid fade-animate" data-animate data-animation-classes="animated fadeInUp" data-index="2">
									<div class="product-2-number">03</div>
									<div class="col-sm-12 product-2-pict">
										<img src="<?= base_url(); ?>assets/images/main/product-3.png">
									</div>
									<div class="col-sm-12 product-2-name">
										<p>Refined Bleached Deodorized Palm Oil</p>
									</div>
								</div>
								<div class="col-sm-3 product-2-grid fade-animate" data-animate data-animation-classes="animated fadeInUp" data-index="3">
									<div class="product-2-number">04</div>
									<div class="col-sm-12 product-2-pict">
										<img src="<?= base_url(); ?>assets/images/main/product-4.png">
									</div>
									<div class="col-sm-12 product-2-name">
										<p>Refined Bleached Deodorized Palm Olein</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 product-2-grid fade-animate" data-animate data-animation-classes="animated fadeInUp" data-index="4">
									<div class="product-2-number">05</div>
									<div class="col-sm-12 product-2-pict">
										<img src="<?= base_url(); ?>assets/images/main/product-5.png">
									</div>
									<div class="col-sm-12 product-2-name">
										<p>Refined Bleached Deodorized Palm Stearin</p>
									</div>
								</div>
								<div class="col-sm-3 product-2-grid fade-animate" data-animate data-animation-classes="animated fadeInUp" data-index="5">
									<div class="product-2-number">06</div>
									<div class="col-sm-12 product-2-pict">
										<img src="<?= base_url(); ?>assets/images/main/product-6.png">
									</div>
									<div class="col-sm-12 product-2-name">
										<p>Palm Fatty Acid Distillate</p>
									</div>
								</div>
								<div class="col-sm-3 product-2-grid fade-animate" data-animate data-animation-classes="animated fadeInUp" data-index="6">
									<div class="product-2-number">07</div>
									<div class="col-sm-12 product-2-pict">
										<img src="<?= base_url(); ?>assets/images/main/product-7.png">
									</div>
									<div class="col-sm-12 product-2-name">
										<p>Crude Palm Kernel Oil</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	<section id="product-brand">
		<div class="container-fluid">
			<div class="row">
				<div id="home-brand-carousel" class="owl-theme owl-carousel fade-animate" data-animate data-animation-classes="animated fadeInUp">
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-1-white.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-2-white.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-1-white.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-2-white.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-1-white.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-2-white.png">
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
		aboutTabIcon();
		productCarousel();
		homeBrandCarousel();
		productClick();
		productTabIcon();
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
	
	function aboutTabIcon(){
		$('.about-tab-inside').click(function(){
			$('.about-tab-inside').children('.about-tab-icon').each(function() {
                var stroke = $(this).attr('data-stroke');
				$(this).children().attr('src', stroke);
            });
			
			var fill = $(this).children('.about-tab-icon').attr('data-fill');
			$(this).children('.about-tab-icon').children().attr('src', fill);
			
			var arrHeader = $(this).attr('data-header').split(', ');
			
			$('#about-header-carousel .owl-item').remove();
			$('#about-header-carousel').find('.owl-stage-outer').remove();
			$('#about-header-carousel').owlCarousel('destroy');

			var carouselItem = '';
			
			$.each(arrHeader, function(key, headerImages) {
				carouselItem += '<div class="about-header-item" style="background-image: url('+ headerImages +');"><div class="header-overlay"></div></div>\n';
				console.log(carouselItem);
			});
			
			$('#about-header-carousel').append(carouselItem);
			aboutHeaderCarousel();
		});
	}
	
	function productCarousel(){
		$('#product-carousel').owlCarousel({
			autoplay: false,
			loop: false,
			nav: true,
			dots: false,
			items: 1,
			navText: ['<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">','<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">']
		});
	}
	
	function homeBrandCarousel(){
		$('#home-brand-carousel').owlCarousel({
			autoplay: false,
			loop: true,
			nav: false,
			dots: false,
			items: 5,
		});
	}
	
	function productClick(){
		$('.product-2-grid').click(function(){
			var dataIndex = $(this).attr('data-index');
			$('#product-carousel').trigger('to.owl.carousel', [dataIndex, 300]);
		});
	}
	
	function productTabIcon(){
		$('#product-pills li').click(function(){
			var lastActive = $('#product-pills li.active .about-tab-icon').attr('data-stroke');
			$('#product-pills li.active .about-tab-icon').children().attr('src', lastActive);
			
			var fillNow = $(this).find('.about-tab-icon').attr('data-fill');
			$(this).find('.about-tab-icon').children().attr('src', fillNow);
		});
	}
	

</script>
</html>
