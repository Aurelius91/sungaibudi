<!DOCTYPE html>
<html lang="en">
<head>
    <? include 'meta.php' ?>
</head>

<body>

	<? $this->load->view('menu'); ?>

    <section id="about-header">
		<div id="about-header-carousel" class="owl-carousel owl-theme">
			<? foreach ($arr_slideshow as $slideshow): ?>
				<div class="about-header-item" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $slideshow->image_name; ?>);"><div class="header-overlay"></div></div>
			<? endforeach; ?>
		</div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<? if ($lang == $setting->setting__system_language || $arr_section[0]->title_lang == ''): ?>
					<h5><?= $arr_section[0]->title; ?></h5>
				<? else: ?>
					<h5><?= $arr_section[0]->title_lang; ?></h5>
				<? endif; ?>

				<? if ($lang == $setting->setting__system_language || $arr_section[0]->subtitle_lang == ''): ?>
					<h1><?= $arr_section[0]->subtitle; ?></h1>
				<? else: ?>
					<h1><?= $arr_section[0]->subtitle_lang; ?></h1>
				<? endif; ?>
			</div>
		</div>
	</section>

	<section id="news-event">
		<div class="container-fluid desktop-container">
			<? foreach ($arr_news as $key => $news): ?>
				<? if ($key % 2 <= 0): ?>
					<div class="row">
						<div class="col-xs-12 col-sm-12 news-row news-left">
							<div class="col-xs-12 col-sm-6 v-center news-pict-wrap">
								<div class="news-date v-center">
									<h3><?= $news->day_display; ?></h3>
									<h5><?= strtoupper($news->month_display); ?></h5>
									<p><?= $news->year_display; ?></p>
								</div><!--
							 --><div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $news->image_name; ?>);">
									<div class="header-overlay"></div>
								</div>
								<div class="news-red-bg"></div>
							</div><!--
						 --><div class="col-xs-12 col-sm-6 v-center news-desc-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
								<div class="news-title">
									<? if ($lang == $setting->setting__system_language || $news->name_lang == ''): ?>
										<h2><?= $news->name; ?></h2>
									<? else: ?>
										<h2><?= $news->name_lang; ?></h2>
									<? endif; ?>
								</div>
								<div class="red-liner"></div>
								<div class="news-desc">
									<? if ($lang == $setting->setting__system_language || $news->description_lang == ''): ?>
										<p><?= character_limiter(strip_tags($news->description), 250); ?></p>
									<? else: ?>
										<p><?= character_limiter(strip_tags($news->description_lang), 250); ?></p>
									<? endif; ?>
								</div>
								<div class="news-read">
									<a href="<?= base_url(); ?>newsandevent/detail/<?= $news->url_name; ?>/"><button class="btn btn-read-more-red"><span>READ MORE</span></button></a>
								</div>
							</div>
						</div>
					</div>
				<? else: ?>
					<div class="row">
						<div class="col-xs-12 col-sm-12 news-row news-right">
							<div class="col-xs-12 col-sm-6 v-center news-desc-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
								<div class="news-title">
									<? if ($lang == $setting->setting__system_language || $news->name_lang == ''): ?>
										<h2><?= $news->name; ?></h2>
									<? else: ?>
										<h2><?= $news->name_lang; ?></h2>
									<? endif; ?>
								</div>
								<div class="red-liner"></div>
								<div class="news-desc">
									<? if ($lang == $setting->setting__system_language || $news->description_lang == ''): ?>
										<p><?= character_limiter(strip_tags($news->description), 250); ?></p>
									<? else: ?>
										<p><?= character_limiter(strip_tags($news->description_lang), 250); ?></p>
									<? endif; ?>
								</div>
								<div class="news-read">
									<a href="<?= base_url(); ?>newsandevent/detail/<?= $news->url_name; ?>/"><button class="btn btn-read-more-red"><span>READ MORE</span></button></a>
								</div>
							</div><!--
						 --><div class="col-xs-12 col-sm-6 v-center news-pict-wrap">
								<div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $news->image_name; ?>);">
									<div class="header-overlay"></div>
								</div><!--
							 --><div class="news-date v-center">
									<h3><?= $news->day_display; ?></h3>
									<h5><?= strtoupper($news->month_display); ?></h5>
									<p><?= $news->year_display; ?></p>
								</div>
								<div class="news-red-bg"></div>
							</div>
						</div>
					</div>
				<? endif; ?>
			<? endforeach; ?>

			<? if ($count_page > 1): ?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 text-center news-pagination-wrap">
						<? if ($page > 1): ?>
							<a href="<?= base_url(); ?>newsandevent/page/<?= $page - 1; ?>/">
								<div class="news-nav">
									<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">
								</div>
							</a>
						<? endif; ?>

						<div class="news-pagination">
							<? for ($i = 1; $i <= $count_page; $i++): ?><a href="<?= base_url(); ?>newsandevent/page/<?= $i; ?>/"><div class="news-pagination-list <? if ($i == $page): ?>active<? endif; ?>"><div class="news-pagination-before" data-before="<?= str_pad($i, 2, '0', STR_PAD_LEFT); ?>"></div></div></a><? endfor; ?>
						</div>

						<? if ($page < $count_page): ?>
							<a href="<?= base_url(); ?>newsandevent/page/<?= $page + 1; ?>/">
								<div class="news-nav">
									<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">
								</div>
							</a>
						<? endif; ?>
					</div>
				</div>
			<? endif; ?>
		</div>
		<div class="container-fluid mobile-container">
			<? foreach ($arr_news as $key => $news): ?>
				<? if ($key % 2 <= 0): ?>
					<div class="row">
						<div class="col-xs-12 news-row news-left">
							<div class="col-xs-12 v-center news-pict-wrap">
								<div class="news-date v-center">
									<h3><?= $news->day_display; ?></h3>
									<h5><?= strtoupper($news->month_display); ?></h5>
									<p><?= $news->year_display; ?></p>
								</div><!--
							 --><div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $news->image_name; ?>);">
									<div class="header-overlay"></div>
								</div>
								<div class="news-red-bg"></div>
							</div><!--
						 --><div class="col-xs-12 v-center news-desc-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
								<div class="news-title">
									<? if ($lang == $setting->setting__system_language || $news->name_lang == ''): ?>
										<h2><?= $news->name; ?></h2>
									<? else: ?>
										<h2><?= $news->name_lang; ?></h2>
									<? endif; ?>
								</div>
								<div class="red-liner"></div>
								<div class="news-desc">
									<? if ($lang == $setting->setting__system_language || $news->description_lang == ''): ?>
										<p><?= character_limiter(strip_tags($news->description), 250); ?></p>
									<? else: ?>
										<p><?= character_limiter(strip_tags($news->description_lang), 250); ?></p>
									<? endif; ?>
								</div>
								<div class="news-read">
									<a href="<?= base_url(); ?>newsandevent/detail/<?= $news->url_name; ?>/"><button class="btn btn-read-more-red"><span>READ MORE</span></button></a>
								</div>
							</div>
						</div>
					</div>
				<? else: ?>
					<div class="row">
						<div class="col-xs-12 news-row news-right">
							<div class="col-xs-12 v-center news-pict-wrap">
								<div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $news->image_name; ?>);">
									<div class="header-overlay"></div>
								</div><!--
							 --><div class="news-date v-center">
									<h3><?= $news->day_display; ?></h3>
									<h5><?= strtoupper($news->month_display); ?></h5>
									<p><?= $news->year_display; ?></p>
								</div>
								<div class="news-red-bg"></div>
							</div><!--
						 --><div class="col-xs-12 v-center news-desc-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
								<div class="news-title">
									<? if ($lang == $setting->setting__system_language || $news->name_lang == ''): ?>
										<h2><?= $news->name; ?></h2>
									<? else: ?>
										<h2><?= $news->name_lang; ?></h2>
									<? endif; ?>
								</div>
								<div class="red-liner"></div>
								<div class="news-desc">
									<? if ($lang == $setting->setting__system_language || $news->description_lang == ''): ?>
										<p><?= character_limiter(strip_tags($news->description), 250); ?></p>
									<? else: ?>
										<p><?= character_limiter(strip_tags($news->description_lang), 250); ?></p>
									<? endif; ?>
								</div>
								<div class="news-read">
									<a href="<?= base_url(); ?>newsandevent/detail/<?= $news->url_name; ?>/"><button class="btn btn-read-more-red"><span>READ MORE</span></button></a>
								</div>
							</div>
						</div>
					</div>
				<? endif; ?>
			<? endforeach; ?>
			<!-- <div class="row">
				<div class="col-xs-12 col-sm-12 news-row news-left">
					<div class="col-xs-12 col-sm-6 v-center news-pict-wrap">
						<div class="news-date v-center">
							<h3>23</h3>
							<h5>AUG</h5>
							<p>2017</p>
						</div>
						<div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-3.jpg);">
							<div class="header-overlay"></div>
						</div>
						<div class="news-red-bg"></div>
					</div>
					<div class="col-xs-12 col-sm-6 v-center news-desc-wrap  fade-animate" data-animate data-animation-classes="animated fadeInRight">
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
				<div class="col-xs-12 news-row news-right">
					<div class="col-xs-12 v-center news-pict-wrap">
						<div class="news-pict v-center fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= base_url(); ?>assets/images/main/news-event-4.jpg);">
							<div class="header-overlay"></div>
						</div>
						<div class="news-date v-center">
							<h3>20</h3>
							<h5>AUG</h5>
							<p>2017</p>
						</div>
						<div class="news-red-bg"></div>
					</div>
					<div class="col-xs-12 v-center news-desc-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
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
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col-xs-12 text-center news-pagination-wrap">
					<? if ($page > 1): ?>
						<a href="<?= base_url(); ?>newsandevent/page/<?= $page - 1; ?>/">
							<div class="news-nav">
								<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">
							</div>
						</a>
					<? endif; ?>
					<div class="news-pagination">
						<? for ($i = 1; $i <= $count_page; $i++): ?><a href="<?= base_url(); ?>newsandevent/page/<?= $i; ?>/"><div class="news-pagination-list <? if ($i == $page): ?>active<? endif; ?>"><div class="news-pagination-before" data-before="<?= str_pad($i, 2, '0', STR_PAD_LEFT); ?>"></div></div></a><? endfor; ?>
					</div>
					<? if ($page < $count_page): ?>
						<a href="<?= base_url(); ?>newsandevent/page/<?= $page + 1; ?>/">
							<div class="news-nav">
								<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">
							</div>
						</a>
					<? endif; ?>
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

	function newsPagination(){
		var countList = $(".news-pagination-list").length;

		var dotWidth= (100/countList).toFixed(1);
		$('.news-pagination-list').css('width', dotWidth+'%');
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
