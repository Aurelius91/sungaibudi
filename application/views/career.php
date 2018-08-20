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

	<section id="career-message-section" class="fade-animate" data-animate data-animation-classes="animated fadeUpMiddle">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<? if ($lang == $setting->setting__system_language || $arr_section[1]->description_lang == ''): ?>
						<?= $arr_section[1]->description; ?>
					<? else: ?>
						<?= $arr_section[1]->description_lang; ?>
					<? endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section id="career">
		<div id="career-container" class="container-fluid">
			<!-- foreach arr_career_lookup as arr_career -->
			<? foreach($arr_career_lookup as $arr_career): ?>
				<div class="row">
					<!-- foreach arr_career -->
					<? foreach($arr_career as $career): ?>
						<div class="col-xs-12 col-sm-6 career-grid">
							<div class="career-red-box"></div>
							<div class="career-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
								<div class="career-title">
									<? if ($lang == $setting->setting__system_language || $career->name_lang == ''): ?>
										<h2><?= strtoupper($career->name); ?></h2>
									<? else: ?>
										<h2><?= strtoupper($career->name_lang); ?></h2>
									<? endif; ?>
								</div>
								<div class="red-liner"></div>
								<div class="career-desc">
									<? if ($lang == $setting->setting__system_language || $career->description_lang == ''): ?>
										<p><?= character_limiter(strip_tags($career->description), 180); ?></p>
									<? else: ?>
										<p><?= character_limiter(strip_tags($career->description), 180); ?></p>
									<? endif; ?>
								</div>
								<div class="career-view">
									<a href="<?= base_url(); ?>career/detail/<?= $career->url_name; ?>"><button class="btn btn-read-more-red"><span>VIEW</span></button></a>
								</div>

								<div class="career-hover">
									<div class="career-hover-desc">
										<p><span class="darker"><? if ($lang == $setting->setting__system_language || $career->name_lang == ''): ?><?= $career->name; ?><? else: ?><?= $career->name_lang; ?><? endif; ?> - </span><? if ($lang == $setting->setting__system_language || $career->description_lang == ''): ?>
												<?= character_limiter(strip_tags($career->description), 250); ?>
											<? else: ?>
												<?= character_limiter(strip_tags($career->description), 250); ?>
											<? endif; ?>
										</p>
									</div>
									<div class="career-view">
										<a href="<?= base_url(); ?>career/detail/<?= $career->url_name; ?>"><button class="btn btn-read-more-red btn-red-active"><span>VIEW</span></button></a>
									</div>
								</div>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			<? endforeach; ?>
			<!-- endforeach; -->

			<? if ($count_page > 1): ?>
				<div class="loader-spin-wrap">
					<div class="loader-spin"></div>
				</div>
			<? endif; ?>
		</div>
	</section>

	<section id="news-subscribe">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 text-center news-subs-title">
					<? if ($lang == $setting->setting__system_language || $arr_section[2]->subtitle_lang == ''): ?>
						<h3><?= $arr_section[2]->subtitle; ?></h3>
					<? else: ?>
						<h3><?= $arr_section[2]->subtitle_lang; ?></h3>
					<? endif; ?>
				</div>
				<div class="col-sm-12 text-center career-contact-desc">
					<? if ($lang == $setting->setting__system_language || $arr_section[2]->description_lang == ''): ?>
						<?= $arr_section[2]->description; ?>
					<? else: ?>
						<?= $arr_section[2]->description_lang; ?>
					<? endif; ?>
				</div>
				<div class="col-sm-12 text-center">
					<div class="news-subs-read">
						<a href="<?= base_url(); ?>contactus"><button class="btn btn-read-more"><span>CONTACT US</span></button></a>
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
		menuMobile();

		<? if ($count_page > 1): ?>
			reachSubscribeBottom();
		<? endif; ?>
	});

	var page = "<?= $page; ?>";
	var maxPage = "<?= $count_page; ?>";

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

	function ajaxLoadPage(page) {
		$.ajax({
			data: {
				'<?= $csrf['name']; ?>': '<?= $csrf['hash']; ?>',
			},
			dataType: 'JSON',
			error: function() {
				alert('server error.');
			},
			success: function(data) {
				if (data.status == 'success') {
					$('.loader-spin-wrap').remove();
					$('#career-container').append(data.template);

					animateThing();
				}
				else {
					alert(data.message);
				}
			},
			type : 'POST',
			url : '<?= base_url(); ?>career/ajax_load_page/'+ page +'/'
		});
	}

	function reachSubscribeBottom(){
		$(window).on("scroll", function() {
			var scrollHeight = $(document).height();
			var scrollPosition = $(window).height() + $(window).scrollTop();

			if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
				page = parseInt(page) + 1;

				if (parseInt(page) > parseInt(maxPage)) {
					return;
				}

			   	$('.loader-spin-wrap').addClass('show-loading');

				ajaxLoadPage(page);
			}
		});
	}
</script>
</html>
