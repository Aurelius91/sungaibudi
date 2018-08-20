<!DOCTYPE html>
<html lang="en">
<head>
    <? include 'meta.php' ?>
</head>

<body>

	<? $this->load->view('menu'); ?>

	<section id="news-detail-header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 news-detail-title">
					<? if ($lang == $setting->setting__system_language || $news->name_lang == ''): ?>
						<h2><?= $news->name; ?></h2>
					<? else: ?>
						<h2><?= $news->name_lang; ?></h2>
					<? endif; ?>
				</div>
				<div class="col-sm-6 text-right">
					<div class="news-detail-date-wrap v-center">
						<div class="news-detail-icon v-center">
							<img src="<?= base_url(); ?>assets/images/main/calendar-icon.png">
						</div><!--
					 --><div class="news-detail-date v-center">
							<h6><?= $news->date_display; ?></h6>
						</div>
					</div><!--
				  --><div class="news-detail-separator v-center">
						<h6>|</h6>
					</div><!--
				 --><div class="news-detail-by v-center">
						<h6><?= $news->author; ?></h6>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 news-detail-pict fade-animate" data-animate data-animation-classes="animated fadeInUp" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $news->image_name; ?>);">
					<div class="header-overlay"></div>
				</div>
			</div>
			<div class="news-detail-share-wrap">
				<div class="news-detail-share">
					<div class="news-detail-share-rotate">
						<div class="news-detail-share-line v-center"></div><!--
					 --><div class="news-detail-share-text v-center"><h6>SHARE</h6></div>
					</div>
				</div>
				<div class="news-detail-share-icon-wrap">
					<div class="news-detail-share-icon">
						<div class="news-detail-socmed fb-bg">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</div>
						<div class="news-detail-socmed twit-bg">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</div>
						<!-- <div class="news-detail-socmed ig-bg">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</div> -->
					</div>
				</div>
			</div>
			<div class="news-detail-white-camu"></div>
		</div>
	</section>

	<section id="news-detail-white-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 news-detail-desc-wrap">
					<div class="col-sm-12 news-detail-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<? if ($lang == $setting->setting__system_language || $news->description_lang == ''): ?>
							<?= $news->description; ?>
						<? else: ?>
							<?= $news->description_lang; ?>
						<? endif; ?>
					</div>
					<div class="col-sm-12 news-detail-back">
						<div class="news-detail-back-button">
							<a href="<?= base_url(); ?>newsandevent"><button class="btn btn-read-more-red"><span>BACK</span></button></a>
						</div>
					</div>
					<div class="news-detail-border-bottom"></div>
				</div>
			</div>
		</div>
	</section>

	<? if (count($arr_related_news) > 0): ?>
		<section id="news-detail-carousel-section">
			<div class="container-fluid">
				<div class="row">
					<div class="v-center col-sm-3 home-news-title-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
						<div class="home-news-title">
							<h2>LATEST<br>NEWS</h2>
						</div>
						<div class="red-liner"></div>
						<div class="home-news-desc">
							<p>Aenean sollicitudin, lorem quis bibendum auctor</p>
						</div>
						<div class="latest-news-nav">
							<img id="latest-news-prev" src="<?= base_url(); ?>assets/images/main/arrow-prev.png">
							<img id="latest-news-next" src="<?= base_url(); ?>assets/images/main/arrow-next.png">
						</div>
					</div><!--
				 --><div class="v-center col-sm-9 home-news-carousel-wrap">
						<div id="home-news-carousel" class="owl-carousel owl-theme">
							<? foreach ($arr_related_news as $related_news): ?>
								<div class="home-news-item">
									<div class="home-news-bg" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $related_news->image_name; ?>);"></div>
									<div class="home-news-subtitle">
										<? if ($lang == $setting->setting__system_language || $related_news->name_lang == ''): ?>
											<p><?= $related_news->name; ?></p>
										<? else: ?>
											<p><?= $related_news->name_lang; ?></p>
										<? endif; ?>
									</div>
									<div class="home-news-button">
										<a href="<?= base_url(); ?>newsandevent/detail/<?= $related_news->url_name; ?>/"><button class="btn btn-read-more"><span>READ MORE</span></button></a>
									</div>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<? endif; ?>

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
		homeNewsCarousel();
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

	function homeNewsCarousel(){
		$('#home-news-carousel').owlCarousel({
			autoplay: true,
			loop: true,
			nav: false,
			dots: false,
			responsive:{
				0:{
					items:2
				},
				767:{
					items:3
				}
			}
		});

		$('#latest-news-next').click(function(){
			$('#home-news-carousel').trigger('next.owl.carousel');
		});

		$('#latest-news-prev').click(function(){
			$('#home-news-carousel').trigger('prev.owl.carousel');
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
