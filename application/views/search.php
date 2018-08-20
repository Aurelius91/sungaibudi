<!DOCTYPE html>
<html lang="en">
<head>
    <? include 'meta.php' ?>
</head>

<body>
	
	<? $this->load->view('menu'); ?>

    <!-- <section id="about-header">
		<div id="about-header-carousel" class="owl-carousel owl-theme">
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/product-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/product-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/product-header.jpg);"><div class="header-overlay"></div></div>
		</div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<? if ($lang == $setting->setting__system_language): ?>
					<h1>Search <br> &nbsp; Result</h1>
				<? else: ?>
					<h1>Hasil <br> &nbsp; Pencarian</h1>
				<? endif; ?>
			</div>
		</div>
	</section> -->

	<section id="another-header" style="background-image: url(<?= base_url(); ?>assets/images/main/product-header.jpg);">
		<div class="header-overlay"></div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<? if ($lang == $setting->setting__system_language): ?>
					<h1>Search <br> &nbsp; Result</h1>
				<? else: ?>
					<h1>Hasil <br> &nbsp; Pencarian</h1>
				<? endif; ?>
			</div>
		</div>
	</section>
	<section id="search-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<? if ($lang == $setting->setting__system_language): ?>
						<h2>Search Result:</h2>
					<? else: ?>
						<h2>Hasil Pencarian:</h2>
					<? endif; ?>
					<ul>
						<li><a href="<?= base_url(); ?>products">Lorem ipsum dolor</a></li>
						<li><a href="<?= base_url(); ?>products">Lorem ipsum dolor</a></li>
						<li><a href="<?= base_url(); ?>products">Lorem ipsum dolor</a></li>
					</ul>
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
		menuMobile();
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
			if($('.search-wrap .search-input').hasClass('open')){
				
			}
			else{
				$('.search-input').addClass('open');
			}
		});
		
		$('body').click(function(e) {
			if ( $(e.target).closest('.search-wrap').length === 0 ) {
				$('.search-input').removeClass('open');
			}
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
	
	function menuMobile(){
		$('.menu-wrap').click(function(){
			if($(this).hasClass('menu-open')){
				$(this).removeClass('menu-open');
			}
			else{
				$(this).addClass('menu-open');
			}
		});
	}

</script>
</html>
