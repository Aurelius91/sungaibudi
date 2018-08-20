<!DOCTYPE html>
<html lang="en">
<head>
    <? include 'meta.php' ?>
</head>

<body>

	<? $this->load->view('menu'); ?>

    <section id="header" class="home-header" <? if($setting->setting_website_video_1 == ''): ?>
    <? if ($arr_section[0]->image_name == ''): ?>
    	style="background-image: url(<?= base_url(); ?>assets/images/main/home-header.jpg); background-color: transparent;"
    <? else: ?>
    	style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $arr_section[0]->image_name; ?>); background-color: transparent;"
    <? endif; ?>
    <? endif; ?>>

		<? if($setting->setting_website_video_1): ?>
			<div id="jp_container_2" class="jp-video " role="application" aria-label="media player">
			  	<div class="jp-type-single">
					<div id="jquery_jplayer_2" class="jp-jplayer"></div>

					<? if ($arr_section[0]->image_name == ''): ?>
						<div class="video-poster-home" style="background-image: url(<?= base_url(); ?>assets/images/main/home-header.jpg);"></div>
					<? else: ?>
						<div class="video-poster-home" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $arr_section[0]->image_name; ?>);"></div>
					<? endif; ?>

					<div class="jp-no-solution">
						<span>Update Required</span>
						To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
					</div>
			  	</div>
			</div>
		<? endif; ?>

		<div class="home-red-overlay"></div>
		<div class="home-pattern"></div>

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
		<? if($setting->setting_website_video_1 != ''): ?>
			<div class="header-play-wrap">
				<div id="home-banner-play" class="header-play"></div>
				<div id="home-banner-pause" ><img src="<?= base_url(); ?>assets/images/main/video-pause.png"></div>
				<div class="header-play-bottom-line"></div>
			</div>
		<? endif; ?>

	</section>
	<section id="home-quote" class="fade-animate" data-animate data-animation-classes="animated fadeUpMiddle">
		<div class="container-fluid">
			<? if ($lang == $setting->setting__system_language || $arr_section[1]->subtitle_lang == ''): ?>
				<h4><?= $arr_section[1]->subtitle; ?></h4>
			<? else: ?>
				<h4><?= $arr_section[1]->subtitle_lang; ?></h4>
			<? endif; ?>
		</div>
	</section>
	<section id="home-about">
		<div class="container-fluid">
			<div class="row row-eq-height-tablet">
				<div class="col-xs-12 col-sm-6 home-about-history-wrap">
					<div class="home-about-history-inside">
						<div class="home-about-history fade-animate" data-animate data-animation-classes="animated fadeInLeft">
							<div class="home-about-history-title">
								<? if ($lang == $setting->setting__system_language || $arr_section[2]->subtitle_lang == ''): ?>
									<h2><?= $arr_section[2]->subtitle; ?></h2>
								<? else: ?>
									<h2><?= $arr_section[2]->subtitle_lang; ?></h2>
								<? endif; ?>
							</div>
							<div class="liner"></div>
							<div class="home-about-history-desc">
								<? if ($lang == $setting->setting__system_language || $arr_section[2]->description_lang == ''): ?>
									<h2><?= $arr_section[2]->description; ?></h2>
								<? else: ?>
									<h2><?= $arr_section[2]->description_lang; ?></h2>
								<? endif; ?>
							</div>
							<div class="home-read-more">
								<a href=""><button class="btn btn-read-more"><span>READ MORE</span></button></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 home-about-wrap">
					<div class="home-about-inside">
						<div class="home-pagination-wrap">
							<div class="home-pagination-number">
								<h5>01</h5>
							</div>
							<div class="home-pagination-title">
								<? if ($lang == $setting->setting__system_language || $arr_section[2]->title_lang == ''): ?>
									<h5><?= $arr_section[2]->title; ?></h5>
								<? else: ?>
									<h5><?= $arr_section[2]->title_lang; ?></h5>
								<? endif; ?>
							</div>
						</div>
						<div class="home-about-video-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
							<? if($setting->setting_website_video_2): ?>
								<div id="jp_container_1" class="jp-video " role="application" aria-label="media player">
								  	<div class="jp-type-single">
										<div id="jquery_jplayer_1" class="jp-jplayer"></div>

										<? if ($arr_section[2]->image_name == ''): ?>
											<div class="video-poster" style="background-image: url(<?= base_url(); ?>assets/images/main/home-about-video.jpg);"></div>
										<? else: ?>
											<div class="video-poster" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $arr_section[2]->image_name; ?>);"></div>
										<? endif; ?>

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
							<? endif; ?>
							<? if($setting->setting_website_video_2 == ''): ?>
								<? if ($arr_section[2]->image_name == ''): ?>
									<div class="about-video-switch" style="background-image: url(<?= base_url(); ?>assets/images/main/home-about-video.jpg);"></div>
								<? else: ?>
									<div class="about-video-switch" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $arr_section[2]->image_name; ?>);"></div>
								<? endif; ?>
							<? endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="home-product">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-sm-6 home-product-title fade-animate" data-animate data-animation-classes="animated fadeInLeft">
					<? if ($lang == $setting->setting__system_language || $arr_section[3]->subtitle_lang == ''): ?>
						<h2><?= $arr_section[3]->subtitle; ?></h2>
					<? else: ?>
						<h2><?= $arr_section[3]->subtitle_lang; ?></h2>
					<? endif; ?>
					<div class="red-liner"></div>
				</div>
				<div class="col-xs-6 col-sm-6 home-product-pagination">
					<div class="home-pagination-wrap">
						<div class="home-pagination-number">
							<h5>02</h5>
						</div>
						<div class="home-pagination-title">
							<? if ($lang == $setting->setting__system_language || $arr_section[3]->title_lang == ''): ?>
								<h5><?= $arr_section[3]->title; ?></h5>
							<? else: ?>
								<h5><?= $arr_section[3]->title_lang; ?></h5>
							<? endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 home-product-up">
					<div class="row row-eq-height-tablet">
						<div class="col-xs-8 col-sm-2 home-product-category-wrap">
							<div class="home-product-category-inside">
								<div class="home-product-category">
									<ul class="nav nav-pills fade-animate" data-animate data-animation-classes="animated fadeInRight">
										<? foreach ($arr_category as $key => $category): ?>
											<li <? if ($key <= 0): ?>class="active"<? endif; ?>><a data-toggle="pill" href="#home-product-<?= $category->id; ?>"><?= $category->name; ?></a></li>
										<? endforeach; ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-10 tab-content no-padding">
							<? foreach ($arr_category as $key => $category): ?>
								<div id="home-product-<?= $category->id; ?>" class="tab-pane fade <? if ($key <= 0): ?>in active<? endif; ?>">
									<div class="row row-eq-height-tablet">
										<div class="col-xs-12 col-sm-9 fade-animate" data-animate data-animation-classes="animated fadeInUp">
											<div class="owl-theme owl-carousel home-product-carousel">
												<? foreach ($category->arr_product as $product): ?>
													<div class="home-product-item">
														<div class="home-product-inside-item"  style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $product->image_name; ?>)">
															<div class="home-product-item-title">
																<p><?= $product->corporate_name; ?></p>
															</div>
														</div>
													</div>
												<? endforeach; ?>
											</div>
											<div class="home-sub-category-line-dots">
												<ul id="home-sub-category-line-dot-list" class="owl-dots">
													<li class="owl-dot active" data-index="0"><div data-before="01"></div></li>
												</ul>
											</div>
										</div><!--
									 --><div class="col-xs-12 col-sm-3 home-sub-product-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
											<div class="home-sub-product-category-inside">
												<div class="home-sub-product-category">
													<ul id="home-sub-category-dots" class="owl-dots nav nav-pills">
														<? foreach ($category->arr_product as $k => $product): ?>
															<li class="owl-dot <? if ($k <= 0): ?>active<? endif; ?>"><?= $product->name; ?></li>
														<? endforeach; ?>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="home-news">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 home-news-pagination">
					<div class="home-pagination-wrap">
						<div class="home-pagination-number">
							<h5>03</h5>
						</div>
						<div class="home-pagination-title">
							<? if ($lang == $setting->setting__system_language || $arr_section[4]->title_lang == ''): ?>
								<h5><?= $arr_section[4]->title; ?></h5>
							<? else: ?>
								<h5><?= $arr_section[4]->title_lang; ?></h5>
							<? endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="v-center col-xs-12 col-sm-3 home-news-title-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
					<div class="home-news-title">
						<? if ($lang == $setting->setting__system_language || $arr_section[4]->subtitle_lang == ''): ?>
							<h2><?= $arr_section[4]->subtitle; ?></h2>
						<? else: ?>
							<h2><?= $arr_section[4]->subtitle_lang; ?></h2>
						<? endif; ?>
					</div>
					<div class="red-liner"></div>
					<div class="home-news-desc">
						<? if ($lang == $setting->setting__system_language || $arr_section[4]->description_lang == ''): ?>
							<h2><?= $arr_section[4]->description; ?></h2>
						<? else: ?>
							<h2><?= $arr_section[4]->description_lang; ?></h2>
						<? endif; ?>
					</div>
				</div><!--
			 --><div class="v-center col-xs-12 col-sm-9 home-news-carousel-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
					<div id="home-news-carousel" class="owl-carousel owl-theme">
						<? foreach ($arr_news as $news): ?>
							<div class="home-news-item">
								<div class="home-news-bg" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $news->image_name; ?>);"></div>
								<div class="home-news-subtitle">
									<? if ($lang == $setting->setting__system_language || $news->name_lang == ''): ?>
										<p><?= $news->name; ?></p>
									<? else: ?>
										<p><?= $news->name_lang; ?></p>
									<? endif; ?>
								</div>
								<div class="home-news-button">
									<a href="<?= base_url(); ?>newsandevent/detail/<?= $news->url_name; ?>/"><button class="btn btn-read-more"><span>READ MORE</span></button></a>
								</div>
							</div>
						<? endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<? if (count($arr_corporate) > 0): ?>
		<section id="home-brand">
			<div class="container-fluid">
				<div class="row">
					<div id="home-brand-carousel" class="owl-theme owl-carousel fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<? foreach ($arr_corporate as $corporate): ?>
							<div class="home-brand-item">
								<img src="<?= $setting->setting__system_admin_url; ?>images/website/<?= $corporate->image_name; ?>">
							</div>
						<? endforeach; ?>
					</div>
				</div>
			</div>
		</section>
	<? endif; ?>

	<section id="home-contact">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 home-contact-pagination">
					<div class="home-pagination-wrap">
						<div class="home-pagination-number">
							<h5>04</h5>
						</div>
						<div class="home-pagination-title">
							<? if ($lang == $setting->setting__system_language || $arr_section[5]->title_lang == ''): ?>
								<h5><?= $arr_section[5]->title; ?></h5>
							<? else: ?>
								<h5><?= $arr_section[5]->title_lang; ?></h5>
							<? endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 home-contact-red">
					<div class="col-xs-12 col-sm-6 home-maps-wrapper">
						<div class="home-maps-absolute fade-animate" data-animate data-animation-classes="animated fadeInUp">
							<div id="maps"></div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 home-contact-form-wrap fade-animate" data-animate data-animation-classes="animated fadeInRight">
						<div class="col-xs-12 col-sm-12 home-contact-title">
							<? if ($lang == $setting->setting__system_language || $arr_section[5]->subtitle_lang == ''): ?>
								<h2><?= $arr_section[5]->subtitle; ?></h2>
							<? else: ?>
								<h2><?= $arr_section[5]->subtitle_lang; ?></h2>
							<? endif; ?>
							<div class="liner"></div>
						</div>
						<div class="col-xs-12 col-sm-12 home-contact-subtitle">
							<? if ($lang == $setting->setting__system_language || $arr_section[5]->description_lang == ''): ?>
								<p><?= $arr_section[5]->description; ?></p>
							<? else: ?>
								<p><?= $arr_section[5]->description_lang; ?></p>
							<? endif; ?>
						</div>
						<div class="col-xs-12 col-sm-12 home-contact-form">
							<? if($lang == $setting->setting__system_language): ?>
								<div class="col-xs-12 col-sm-12 no-padding home-contact-margin">
									<div class="col-xs-12 col-sm-12 col-md-6 left-form">
										<label for="name-contact">Your Name <span class="red-alert" style="display: none;">*Field must be filled</span></label>
										<input type="text" class="form-control custom-input data-important" id="name-contact">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 right-form home-contact-email">
										<label for="email-contact">Your Email <span class="red-alert" style="display: none;">*Field must be filled</span></label>
										<input type="text" class="form-control custom-input data-important" id="email-contact">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 no-padding home-contact-margin">
									<label for="message-contact">Message</label>
									<textarea id="message-contact" class="form-control custom-input" rows="3"></textarea>
								</div>
								<div class="col-xs-12 col-sm-12 no-padding home-contact-margin">
									<div class="home-contact-button">
										<button class="btn btn-read-more" onclick="submitEmailContactUs();"><span>SEND</span></button>
									</div>
								</div>
							<? else: ?>
								<div class="col-xs-12 col-sm-12 no-padding home-contact-margin">
									<div class="col-xs-12 col-sm-12 col-md-6 left-form">
										<label for="name-contact">Nama <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
										<input type="text" class="form-control custom-input data-important" id="name-contact">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-6 right-form home-contact-email">
										<label for="email-contact">Email <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
										<input type="text" class="form-control custom-input data-important" id="email-contact">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 no-padding home-contact-margin">
									<label for="message-contact">Pesan</label>
									<textarea id="message-contact" class="form-control custom-input" rows="3"></textarea>
								</div>
								<div class="col-xs-12 col-sm-12 no-padding home-contact-margin">
									<div class="home-contact-button">
										<button class="btn btn-read-more" onclick="submitEmailContactUs();"><span>KIRIM</span></button>
									</div>
								</div>
							<? endif; ?>
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
		homeBannerVideo();
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

	function homeProductCarousel(){
		setTimeout(function() {
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
		}, 1000);

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
			responsive:{
				0:{
					items:2
				},
				767:{
					items:3
				}
			}
		});
	}

	function homeBrandCarousel(){
		$('#home-brand-carousel').owlCarousel({
			autoplay: false,
			loop: true,
			nav: false,
			dots: false,
			responsive:{
				0:{
					items:3
				},
				1024:{
					items:5
				}
			}
		});
	}

	function contactMaps(){
		var locations = [
		  ['Wisma Budi',  <?= $setting->setting__website_map_latitude; ?>, <?= $setting->setting__website_map_latitude; ?>, 1]
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
            m4v: "<?= $setting->setting__system_admin_url; ?>video/<?= $setting->setting_website_video_2;?>",
			ogv: "",
          });
        },
        swfPath: "assets/plugin/jplayer",
        supplied: "m4v,ogv",
		cssSelectorAncestor: "#jp_container_1"
      });
	}

	function setPoster(){
		$('.header-play-wrap').click(function(){
			$('.video-poster-home').hide();
		});

		$('.jp-video-play').click(function(){
			$('.video-poster').css('z-index', '-1');
		});

		$('.jp-controls-holder').click(function(){
			$('.video-poster').css('z-index', '-1');
		});
	}

	function homeBannerVideo(){
		$("#jquery_jplayer_2").jPlayer({
        ready: function () {
          $(this).jPlayer("setMedia", {
            m4v: "<?= $setting->setting__system_admin_url; ?>video/<?= $setting->setting_website_video_1;?>",
			ogv: "",
          });
        },
        swfPath: "assets/plugin/jplayer",
        supplied: "m4v,ogv",
		cssSelectorAncestor: "#header",
		cssSelector: {
          play: "#home-banner-play",
          pause: "#home-banner-pause",
        },
        size: {
			width: "auto",
			height: "100%"
		},
        loop: true,
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

<script type="text/javascript">
	$(function(){
		resetForm();
	});

	function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        return regex.test(email);
    }

	function submitEmailContactUs() {
		var found = 0;

		$.each($('.data-important'), function(key, field) {
			if ($(field).val() == '') {
				$(field).prev().children().show();

				found += 1;
			}
			else{
				$(field).prev().children().hide();
			}
		});

		if ($('#email-contact').val() != '' && !isEmail($('#email-contact').val())) {
			found += 1;

			$('#email-contact').prev().children().html('*Wrong Email Format');
			$('#email-contact').prev().children().show();
		}

		if (found > 0) {
			return;
		}

		var name = $('#name-contact').val();
		var email = $('#email-contact').val();
		var message = $('#message-contact').val();

		$.ajax({
	        data :{
	            name: name,
	            email: email,
	            message: message,
	            "<?= $csrf['name'] ?>": "<?= $csrf['hash'] ?>"
	        },
	        dataType: 'JSON',
	        error: function() {
	            alert('server error');
	        },
	        success: function(data){
	            if (data.status == 'success') {
	                resetForm();
	                alert('email sent');
	            }
	            else {
	                alert('server error');
	            }
	        },
	        type : 'POST',
	        url : '<?= base_url(); ?>main/ajax_send_email/'
	    });
	}

	function resetForm(){
		 $('#name-contact').val('');
		 $('#email-contact').val('');
		 $('#message-contact').val('');
	}
</script>
</html>
