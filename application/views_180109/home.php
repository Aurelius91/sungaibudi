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

    <section id="header" class="home-header" style="background-image: url(<?= base_url(); ?>assets/images/main/home-header.jpg), -webkit-radial-gradient(circle, rgba(136, 5, 6, 0.9), rgba(136, 5, 6, 0.9));
	background-image: url(<?= base_url(); ?>assets/images/main/home-header.jpg),-o-radial-gradient(circle, rgba(136, 5, 6, 0.9), rgba(136, 5, 6, 0.9));
	background-image: url(<?= base_url(); ?>assets/images/main/home-header.jpg),-moz-radial-gradient(circle, rgba(136, 5, 6, 0.9), rgba(136, 5, 6, 0.9));
	background-image: url(<?= base_url(); ?>assets/images/main/home-header.jpg),radial-gradient(circle, rgba(136, 5, 6, 0.9), rgba(136, 5, 6, 0.9))">
		<div class="home-red-overlay"></div>
		<div class="home-pattern"></div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<h5>SUNGAI BUDI GROUP</h5>
				<h1>ESTABLISHED AT LAMPUNG IN 1947</h1>
			</div>
		</div>
		<div class="header-play-wrap">
			<div class="header-play"></div>
			<div class="header-play-bottom-line"></div>
		</div>
	</section>
	<section id="home-quote" class="fade-animate" data-animate data-animation-classes="animated fadeUpMiddle">
		<div class="container-fluid">
			<h4>Sungai Budi Group is a company enganged in the largest agribusiness in Indonesia.</h4>
		</div>
	</section>
	<section id="home-about">
		<div class="container-fluid">
			<div class="row row-eq-height">
				<div class="col-sm-6 home-about-history-wrap">
					<div class="home-about-history-inside">
						<div class="home-about-history fade-animate" data-animate data-animation-classes="animated fadeInLeft">
							<div class="home-about-history-title">
								<h2>HISTORY OF<br>SUNGAI BUDI GROUP</h2>
							</div>
							<div class="liner"></div>
							<div class="home-about-history-desc">
								<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
								<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos</p>
							</div>
							<div class="home-read-more">
								<a href=""><button class="btn btn-read-more"><span>READ MORE</span></button></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 home-about-wrap">
					<div class="home-about-inside">
						<div class="home-pagination-wrap">
							<div class="home-pagination-number">
								<h5>01</h5>
							</div>
							<div class="home-pagination-title">
								<h5>About Us</h5>
							</div>
						</div>
						<div class="home-about-video-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
							<div id="jp_container_1" class="jp-video " role="application" aria-label="media player">
							  <div class="jp-type-single">
									<div id="jquery_jplayer_1" class="jp-jplayer"></div>
									
									<div class="video-poster" style="background-image: url(<?= base_url(); ?>assets/images/main/home-about-video.jpg);"></div>
									
									<div class="jp-video-play">
										<a href="javascript:;" class="jp-video-play-icon" tabindex="1"><img src="<?= base_url(); ?>assets/images/main/video-play.png"></a>
									</div>
									
									<div class="jp-gui">
										<div class="jp-interface">
											<div class="jp-controls-holder">
												<ul class="jp-controls">
													<li><a href="javascript:;" class="jp-play" tabindex="1"><img src="<?= base_url(); ?>assets/images/main/video-play.png"></a></li>
													<li><a href="javascript:;" class="jp-pause" tabindex="1"><img src="<?= base_url(); ?>assets/images/main/video-pause.png"></a></li>
												</ul>
											</div>
											
											<div class="jp-progress">
												<div class="jp-seek-bar">
													<div class="jp-play-bar"></div>
												</div>
											</div>
											
											<div class="jp-time-holder">
												<div class="jp-current-time"></div>
											</div>
										</div>
									</div>
									
									<div class="jp-no-solution">
										<span>Update Required</span>
										To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
									</div>
							  </div>
							</div>
							<!--<div class="header-overlay content-center">
								<div class="home-about-play">
									<div class="header-play"></div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="home-product">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 home-product-title fade-animate" data-animate data-animation-classes="animated fadeInLeft">
					<h2>OUR<br>PRODUCTS</h2>
					<div class="red-liner"></div>
				</div>
				<div class="col-sm-6 home-product-pagination">
					<div class="home-pagination-wrap">
						<div class="home-pagination-number">
							<h5>02</h5>
						</div>
						<div class="home-pagination-title">
							<h5>Products</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 home-product-up">
					<div class="row row-eq-height">
						<div class="col-sm-2 home-product-category-wrap">
							<div class="home-product-category-inside">
								<div class="home-product-category">
									<ul class="nav nav-pills fade-animate" data-animate data-animation-classes="animated fadeInRight">
										<li class="active"><a data-toggle="pill" href="#home-product-1">PALM OIL</a></li>
										<li><a data-toggle="pill" href="#home-product-2">RICE FLOUR</a></li>
										<li><a data-toggle="pill" href="#home-product-3">CASSAVA</a></li>
										<li><a data-toggle="pill" href="#home-product-4">COCONUT</a></li>
										<li><a data-toggle="pill" href="#home-product-5">SUGAR</a></li>
										<li><a data-toggle="pill" href="#home-product-6">OTHER</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-10 tab-content no-padding">
							<div id="home-product-1" class="tab-pane fade in active">
								<div class="row row-eq-height">
									<div class="col-sm-9 fade-animate" data-animate data-animation-classes="animated fadeInUp">
										<div class="owl-theme owl-carousel home-product-carousel">
											<div class="home-product-item">
												<div class="home-product-inside-item"  style="background-image: url(<?= base_url(); ?>assets/images/main/bottle.jpg)">
													<div class="home-product-item-title">
														<p>PT. Tunas Baru Lampung Tbk</p>
													</div>
												</div>
											</div>
											<div class="home-product-item">
												<div class="home-product-inside-item" style="background-image: url(<?= base_url(); ?>assets/images/main/bottle.jpg)">
													<div class="home-product-item-title">
														<p>PT. Tunas Baru Lampung Tbk</p>
													</div>
												</div>
											</div>
											<div class="home-product-item">
												<div class="home-product-inside-item" style="background-image: url(<?= base_url(); ?>assets/images/main/bottle.jpg)">
													<div class="home-product-item-title">
														<p>PT. Tunas Baru Lampung Tbk</p>
													</div>
												</div>
											</div>
											<div class="home-product-item">
												<div class="home-product-inside-item" style="background-image: url(<?= base_url(); ?>assets/images/main/bottle.jpg)">
													<div class="home-product-item-title">
														<p>PT. Tunas Baru Lampung Tbk</p>
													</div>
												</div>
											</div>
											<div class="home-product-item">
												<div class="home-product-inside-item" style="background-image: url(<?= base_url(); ?>assets/images/main/bottle.jpg)">
													<div class="home-product-item-title">
														<p>PT. Tunas Baru Lampung Tbk</p>
													</div>
												</div>
											</div>
											<div class="home-product-item">
												<div class="home-product-inside-item" style="background-image: url(<?= base_url(); ?>assets/images/main/bottle.jpg)">
													<div class="home-product-item-title">
														<p>PT. Tunas Baru Lampung Tbk</p>
													</div>
												</div>
											</div>
											<div class="home-product-item">
												<div class="home-product-inside-item" style="background-image: url(<?= base_url(); ?>assets/images/main/bottle.jpg)">
													<div class="home-product-item-title">
														<p>PT. Tunas Baru Lampung Tbk</p>
													</div>
												</div>
											</div>
										</div>
										<div class="home-sub-category-line-dots">
											<ul id="home-sub-category-line-dot-list" class="owl-dots">
												<li class="owl-dot active" data-index="0"><div data-before="01"></div></li>
											</ul>
										</div>
									</div><!--
								 --><div class="col-sm-3 home-sub-product-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
										<div class="home-sub-product-category-inside">
											<div class="home-sub-product-category">
												<ul id="home-sub-category-dots" class="owl-dots nav nav-pills">
													<li class="owl-dot active">Cooking Oil</li>
													<li class="owl-dot">Crude Palm Oil (CPO)</li>
													<li class="owl-dot">Refined Bleached Deodorized Palm Oil</li>
													<li class="owl-dot">Refined Bleached Deodorized Palm Olein</li>
													<li class="owl-dot">Refined Bleached Deodorized Palm Stearin</li>
													<li class="owl-dot">Palm Fatty Acid Distillate</li>
													<li class="owl-dot">Crude Palm Kernel Oil</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="home-product-2" class="tab-pane fade">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="home-news">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 home-news-pagination">
					<div class="home-pagination-wrap">
						<div class="home-pagination-number">
							<h5>03</h5>
						</div>
						<div class="home-pagination-title">
							<h5>News Update</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="v-center col-sm-3 home-news-title-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
					<div class="home-news-title">
						<h2>NEWS<br>& EVENT</h2>
					</div>
					<div class="red-liner"></div>
					<div class="home-news-desc">
						<p>Aenean sollicitudin, lorem quis bibendum auctor</p>
					</div>
				</div><!--
			 --><div class="v-center col-sm-9 home-news-carousel-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
					<div id="home-news-carousel" class="owl-carousel owl-theme">
						<div class="home-news-item">
							<div class="home-news-bg" style="background-image: url(<?= base_url(); ?>assets/images/main/news-thumb-1.jpg);"></div>
							<div class="home-news-subtitle">
								<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit</p>
							</div>
							<div class="home-news-button">
								<a href=""><button class="btn btn-read-more"><span>READ MORE</span></button></a>
							</div>
						</div>
						<div class="home-news-item">
							<div class="home-news-bg" style="background-image: url(<?= base_url(); ?>assets/images/main/news-thumb-2.jpg);"></div>
							<div class="home-news-subtitle">
								<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit</p>
							</div>
							<div class="home-news-button">
								<a href=""><button class="btn btn-read-more"><span>READ MORE</span></button></a>
							</div>
						</div>
						<div class="home-news-item">
							<div class="home-news-bg" style="background-image: url(<?= base_url(); ?>assets/images/main/news-thumb-1.jpg);"></div>
							<div class="home-news-subtitle">
								<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit</p>
							</div>
							<div class="home-news-button">
								<a href=""><button class="btn btn-read-more"><span>READ MORE</span></button></a>
							</div>
						</div>
						<div class="home-news-item">
							<div class="home-news-bg" style="background-image: url(<?= base_url(); ?>assets/images/main/news-thumb-2.jpg);"></div>
							<div class="home-news-subtitle">
								<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit</p>
							</div>
							<div class="home-news-button">
								<a href=""><button class="btn btn-read-more"><span>READ MORE</span></button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="home-brand">
		<div class="container-fluid">
			<div class="row">
				<div id="home-brand-carousel" class="owl-theme owl-carousel fade-animate" data-animate data-animation-classes="animated fadeInUp">
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-1.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-2.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-1.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-2.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-1.png">
					</div>
					<div class="home-brand-item">
						<img src="<?= base_url(); ?>assets/images/main/brand-2.png">
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="home-contact">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 home-contact-pagination">
					<div class="home-pagination-wrap">
						<div class="home-pagination-number">
							<h5>04</h5>
						</div>
						<div class="home-pagination-title">
							<h5>Get In Touch</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 home-contact-red">
					<div class="col-sm-6 home-maps-wrapper">
						<div class="home-maps-absolute fade-animate" data-animate data-animation-classes="animated fadeInUp">
							<div id="maps"></div>
						</div>
					</div>
					<div class="col-sm-6 home-contact-form-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
						<div class="col-sm-12 home-contact-title">
							<h2>CONTACT US</h2>
							<div class="liner"></div>
						</div>
						<div class="col-sm-12 home-contact-subtitle">
							<p>Aenean sollicitudin lorem quis bibendum auctor, nisi elit consequat ipsum</p>
						</div>
						<div class="col-sm-12 home-contact-form">
							<div class="col-sm-12 no-padding home-contact-margin">
								<div class="col-sm-6 left-form">
									<label for="name-contact">Your Name</label>
									<input type="text" class="form-control custom-input" id="name-contact">
								</div>
								<div class="col-sm-6 right-form">
									<label for="email-contact">Your Email</label>
									<input type="text" class="form-control custom-input" id="email-contact">
								</div>
							</div>
							<div class="col-sm-12 no-padding home-contact-margin">
								<label for="message-contact">Message</label>
								<textarea class="form-control custom-input" rows="3"></textarea>
							</div>
							<div class="col-sm-12 no-padding home-contact-margin">
								<div class="home-contact-button">
									<a href=""><button class="btn btn-read-more"><span>SEND</span></button></a>
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
<script type="text/javascript" src="<?= base_url(); ?>assets/plugin/jplayer/jquery.jplayer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" async defer></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDa3rBp3dZ3iqur-wWz-KVtKT2Wf_fujB0&sensor=false"></script>

<script type="text/javascript">
	$(function() {
		animateThing();
		searchInput();
		homeProductCarousel();
		homeNewsCarousel();
		homeBrandCarousel();
		contactMaps();
		watchit();
		setPoster();
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
	
	function homeProductCarousel(){
		$('.home-product-carousel').owlCarousel({
			autoplay: false,
			center: true,
			loop: false,
			nav: true,
			items: 3,
			dotsContainer: '#home-sub-category-dots',
			navText: ['<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">','<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">'],
			touchDrag: false, 
			mouseDrag: false
		});
		
		var countList = $("#home-sub-category-dots li").length;
		
		for(i=1; i<countList; i++){
			if(i >= 9){
				$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="'+ parseInt(i+1) +'"></div></li>');
			}
			else{
				$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="0'+ parseInt(i+1) +'"></div></li>');
			}
		}
		
		var dotWidth= (100/countList).toFixed(1);
		$('#home-sub-category-line-dot-list li').css('width', dotWidth+'%');
		
		/*$('#home-sub-category-line-dot-list .owl-dot').click(function(){
			$('#home-sub-category-line-dot-list .owl-dot').removeClass('active');
			$(this).addClass('active');
		});*/
		
		$('.home-sub-product-category .owl-dot').click(function () {
			$('.home-product-carousel').trigger('to.owl.carousel', [$(this).index(), 300]);
		});
		
		$('.home-product-carousel').on('translate.owl.carousel', function(event) {
			var currentItem = event.item.index ;
			$('#home-sub-category-line-dot-list .owl-dot').removeClass('active');
			$("#home-sub-category-line-dot-list .owl-dot[data-index='"+currentItem+"']").addClass('active');
			console.log(currentItem);
		});
	}
	
	function homeNewsCarousel(){
		$('#home-news-carousel').owlCarousel({
			autoplay: true,
			loop: true,
			nav: false,
			dots: false,
			items: 3,
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
	
	function contactMaps(){
		var locations = [
		  ['Wisma Budi',  -6.214208, 106.831261, 1]
		];

		var bounds  = new google.maps.LatLngBounds();

		// Specify features and elements to define styles.
		  var styleArray = [
			  {
				"stylers": [
				  { "saturation": 35 }
				]
			  },{
			  }
			];


		var map = new google.maps.Map(document.getElementById('maps'), {
		  styles: styleArray,
		  zoom: 17,
		  center: new google.maps.LatLng(-6.214208, 106.831261),
		  mapTypeId: google.maps.MapTypeId.ROADMAP,
		  scrollwheel: false
		});

		var infowindow = new google.maps.InfoWindow();

		var marker, i;
		
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.214208, 106.831261),
			map: map,
			icon:'http://localhost/sungaibudi/assets/images/main/pin.png'
		});
		
	}
	
	function watchit(){
		$("#jquery_jplayer_1").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            m4v: "assets/video/rosebrand.mp4",
			ogv: "",
          });
        },
        swfPath: "assets/plugin/jplayer",
        supplied: "m4v,ogv",
		cssSelectorAncestor: "#jp_container_1"
      });
	}
	
	function setPoster(){
		$('.jp-video-play').click(function(){
			$('.video-poster').css('z-index', '-1');
		});
		
		$('.jp-controls-holder').click(function(){
			$('.video-poster').css('z-index', '-1');
		});
	}
</script>
</html>
