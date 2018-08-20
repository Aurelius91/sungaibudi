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
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-header.jpg);"><div class="header-overlay"></div></div>
		</div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<h5>NEWS & EVENT</h5>
				<h1>LATEST NEWS FROM<br>SUNGAI BUDI</h1>
			</div>
		</div>
	</section>
	
	<section id="news-event">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 news-row news-left">
					<div class="col-sm-6 v-center news-pict-wrap">
						<div class="news-date v-center">
							<h3>27</h3>
							<h5>AUG</h5>
							<p>2017</p>
						</div><!--
					 --><div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-1.jpg);">
							<div class="header-overlay"></div>
						</div>
						<div class="news-red-bg"></div>
					</div><!--
				 --><div class="col-sm-6 v-center news-desc-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
						<div class="news-title">
							<h2>PROIN GRAVIDA NIBH VEL VELIT AUCTOR</h2>
						</div>
						<div class="red-liner"></div>
						<div class="news-desc">
							<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
						</div>
						<div class="news-read">
							<a href="<?= base_url(); ?>newsandeventdetail"><button class="btn btn-read-more-red"><span>READ MORE</span></button></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 news-row news-right">
					<div class="col-sm-6 v-center news-desc-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
						<div class="news-title">
							<h2>Aenean sollicitudin lorem quis</h2>
						</div>
						<div class="red-liner"></div>
						<div class="news-desc">
							<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
						</div>
						<div class="news-read">
							<a href="<?= base_url(); ?>newsandeventdetail"><button class="btn btn-read-more-red"><span>READ MORE</span></button></a>
						</div>
					</div><!--
				 --><div class="col-sm-6 v-center news-pict-wrap">
						<div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-2.jpg);">
							<div class="header-overlay"></div>
						</div><!--
					 --><div class="news-date v-center">
							<h3>25</h3>
							<h5>AUG</h5>
							<p>2017</p>
						</div>
						<div class="news-red-bg"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 news-row news-left">
					<div class="col-sm-6 v-center news-pict-wrap">
						<div class="news-date v-center">
							<h3>23</h3>
							<h5>AUG</h5>
							<p>2017</p>
						</div><!--
					 --><div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-3.jpg);">
							<div class="header-overlay"></div>
						</div>
						<div class="news-red-bg"></div>
					</div><!--
				 --><div class="col-sm-6 v-center news-desc-wrap  fade-animate" data-animate data-animation-classes="animated fadeInRight">
						<div class="news-title">
							<h2>PROIN GRAVIDA NIBH VEL VELIT AUCTOR</h2>
						</div>
						<div class="red-liner"></div>
						<div class="news-desc">
							<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
						</div>
						<div class="news-read">
							<a href="<?= base_url(); ?>newsandeventdetail"><button class="btn btn-read-more-red"><span>READ MORE</span></button></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 news-row news-right">
					<div class="col-sm-6 v-center news-desc-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
						<div class="news-title">
							<h2>Aenean sollicitudin lorem quis</h2>
						</div>
						<div class="red-liner"></div>
						<div class="news-desc">
							<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
						</div>
						<div class="news-read">
							<a href="<?= base_url(); ?>newsandeventdetail"><button class="btn btn-read-more-red"><span>READ MORE</span></button></a>
						</div>
					</div><!--
				 --><div class="col-sm-6 v-center news-pict-wrap">
						<div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-4.jpg);">
							<div class="header-overlay"></div>
						</div><!--
					 --><div class="news-date v-center">
							<h3>20</h3>
							<h5>AUG</h5>
							<p>2017</p>
						</div>
						<div class="news-red-bg"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center news-pagination-wrap">
					<div class="news-nav">
						<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">
					</div>
					<div class="news-pagination">
						<div class="news-pagination-list active">
							<div class="news-pagination-before" data-before="01"></div>
						</div><!--
					 --><div class="news-pagination-list">
							<div class="news-pagination-before" data-before="02"></div>
						</div><!--
					 --><div class="news-pagination-list">
							<div class="news-pagination-before" data-before="03"></div>
						</div><!--
					 --><div class="news-pagination-list">
							<div class="news-pagination-before" data-before="04"></div>
						</div>
					</div>
					<div class="news-nav">
						<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="news-subscribe">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 text-center news-subs-title">
					<h3>SUBSCRIBE OUR NEWSLETTER!</h3>
				</div>
				<div class="col-sm-12 text-center">
					<div class="form-group news-group-custom">
						<input type="text" class="form-control input-custom input-custom-transparent" id="subs-email-form">
						<label for="subs-email-form">Your Email</label>
					</div>
				</div>
				<div class="col-sm-12 text-center">
					<div class="news-subs-read">
						<a href=""><button class="btn btn-read-more"><span>SEND</span></button></a>
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
		newsPagination();
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
	
	function newsPagination(){
		var countList = $(".news-pagination-list").length;
		
		var dotWidth= (100/countList).toFixed(1);
		$('.news-pagination-list').css('width', dotWidth+'%');
	}

</script>
</html>
