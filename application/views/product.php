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

	<section id="product-tab-wrap" class="fade-animate" data-animate data-animation-classes="animated fadeUpMiddle">
		<div class="container-fluid">
			<div class="row">
				<div id="product-pills-carousel" class="owl-theme owl-carousel nav nav-pills">
					<li class="active">
						<a data-toggle="pill" href="#product-<?= $arr_category[0]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-1.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-1-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-1-white.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[0]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-pills-border"></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-<?= $arr_category[1]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/vision-mission-header.jpg, <?= base_url(); ?>assets/images/main/vision-mission-header.jpg, <?= base_url(); ?>assets/images/main/vision-mission-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-2.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-2-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-2.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[1]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-pills-border"></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-<?= $arr_category[2]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-3.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-3-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-3.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[2]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-pills-border"></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-<?= $arr_category[3]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-4.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-4-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-4.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[3]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-pills-border"></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-<?= $arr_category[4]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-5.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-5-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-5.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[4]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-pills-border"></div>
					</li>
					<li>
						<a data-toggle="pill" href="#product-<?= $arr_category[5]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-6.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-6-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-6.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[5]->name; ?></h5>
								</div>
							</div>
						</a>
					</li>
				</div>

				<div id="product-mobile-tab-carousel" class="owl-carousel owl-theme">
					<div class="product-mobile-tab-item product-activate">
						<a data-toggle="pill" href="#product-<?= $arr_category[0]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-1.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-1-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-1-white.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[0]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-mobile-tab-divider"></div>
					</div>
					<div class="product-mobile-tab-item">
						<a data-toggle="pill" href="#product-<?= $arr_category[1]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-2.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-2-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-2.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[1]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-mobile-tab-divider"></div>
					</div>
					<div class="product-mobile-tab-item">
						<a data-toggle="pill" href="#product-<?= $arr_category[2]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-3.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-3-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-3.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[2]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-mobile-tab-divider"></div>
					</div>
					<div class="product-mobile-tab-item">
						<a data-toggle="pill" href="#product-<?= $arr_category[3]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-4.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-4-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-4.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[3]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-mobile-tab-divider"></div>
					</div>
					<div class="product-mobile-tab-item">
						<a data-toggle="pill" href="#product-<?= $arr_category[4]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-5.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-5-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-5.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[4]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-mobile-tab-divider"></div>
					</div>
					<div class="product-mobile-tab-item">
						<a data-toggle="pill" href="#product-<?= $arr_category[5]->id; ?>">
							<div class="product-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/product-icon-6.png" data-fill="<?= base_url(); ?>assets/images/main/product-icon-6-white.png">
									<img src="<?= base_url(); ?>assets/images/main/product-icon-6.png">
								</div>
								<div class="about-tab-text">
									<h5><?= $arr_category[5]->name; ?></h5>
								</div>
							</div>
						</a>
						<div class="product-mobile-tab-divider"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="product-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 no-padding tab-content">
					<? foreach ($arr_category as $key => $category): ?>
						<div id="product-<?= $category->id; ?>" class="col-xs-12 col-sm-12 tab-pane fade <? if ($key <= 0): ?>in active<? endif; ?>">
							<div class="row row-history-1">
								<div class="product-carousel-shadow">
									<img src="<?= base_url(); ?>assets/images/main/product-slider-shadow.png">
								</div>
								<div id="product-carousel" class="owl-carousel owl-theme product-carousel-owl">
									<? foreach ($category->arr_product as $k => $product): ?>
										<div class="product-item">
											<div class="product-item-left v-center-tablet">
												<div class="product-item-left-company" data-before="01">
													<h6><?= $product->corporate_name; ?></h6>
												</div>
												<div class="product-item-left-name">
													<h2><?= $product->name; ?></h2>
												</div>
											</div><!--
										 --><div class="product-item-middle v-center-tablet">
												<div class="product-item-middle-pict" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $product->image_name; ?>);"></div>
											</div><!--
										 --><div class="product-item-right v-center-tablet">
												<div class="product-item-right-subtitle">
													<h4>Description</h4>
												</div>
												<div class="product-item-right-desc">
													<? if ($lang == $setting->setting__system_language || $product->description_lang == ''): ?>
														<?= $product->description; ?>
													<? else: ?>
														<?= $product->description_lang; ?>
													<? endif; ?>
												</div>
											</div>
										</div>
									<? endforeach; ?>
								</div>
							</div>
							<div class="row row-product-2">
								<div class="col-xs-12 col-sm-12 product-2-border"></div>
								<div class="row">
									<? foreach ($category->arr_product as $k => $product): ?>
										<div class="col-xs-12 col-sm-6 col-md-3 product-2-grid fade-animate" data-animate data-animation-classes="animated fadeInUp" data-index="<?= $k; ?>">
											<div class="product-2-number">01</div>
											<div class="col-xs-12 col-sm-12 product-2-pict">
												<img src="<?= $setting->setting__system_admin_url; ?>images/website/<?= $product->image_name; ?>">
											</div>
											<div class="col-xs-12 col-sm-12 product-2-name">
												<p><?= $product->name; ?></p>
											</div>
										</div>
									<? endforeach; ?>
								</div>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<? if (count($arr_corporate) > 0): ?>
		<section id="product-brand">
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
		productPillsCarousel();
		productCarousel();
		homeBrandCarousel();
		productClick();
		productTabIcon();
		mobileProductTabCarousel();
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

	function productPillsCarousel(){
		$('#product-pills-carousel').owlCarousel({
			autoplay: false,
			loop: false,
			nav: true,
			dots: false,
			responsive : {
			    0 : {
			        items: 2
			    },
			    767 : {
			        items: 3
			    },
			    920 : {
			    	items: 4
			    },
			    1200 : {
			        items: 5
			    },
			    1360 : {
			        items: 6
			    }
			},
			navText: ['<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">','<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">']
		});
	}

	function productCarousel(){
		$('.product-carousel-owl').owlCarousel({
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
			responsive:{
				0:{
					items:3
				},
				767:{
					items:4
				},
				1024:{
					items:5
				}
			}
		});
	}

	function productClick(){
		$('.product-2-grid').click(function(){
			var dataIndex = $(this).attr('data-index');
			$('#product-carousel').trigger('to.owl.carousel', [dataIndex, 300]);
		});
	}

	function productTabIcon(){
		$('#product-pills-carousel li').click(function(){
			var lastActive = $('#product-pills-carousel li.active .about-tab-icon').attr('data-stroke');
			$('#product-pills-carousel li.active .about-tab-icon').children().attr('src', lastActive);
			$('#product-pills-carousel li').removeClass('active');

			$(this).addClass('active');
			var fillNow = $(this).find('.about-tab-icon').attr('data-fill');
			$(this).find('.about-tab-icon').children().attr('src', fillNow);

			var contentLink = $(this).find('a').attr('href');
			$('#product-content .tab-pane').removeClass('active in');
			$(contentLink).addClass('active in');
		});

		$('#product-pills li').click(function(){
			var lastActive = $('#product-pills li.active .about-tab-icon').attr('data-stroke');
			$('#product-pills li.active .about-tab-icon').children().attr('src', lastActive);

			var fillNow = $(this).find('.about-tab-icon').attr('data-fill');
			$(this).find('.about-tab-icon').children().attr('src', fillNow);
		});

		$('.product-mobile-tab-item').click(function(){
			var mobileLastActive = $('.product-mobile-tab-item.product-activate .about-tab-icon').attr('data-stroke');
			$('.product-mobile-tab-item.product-activate .about-tab-icon').children().attr('src', mobileLastActive);

			$('.product-mobile-tab-item').removeClass('product-activate');
			$(this).addClass('product-activate');

			var mobileFillNow = $(this).find('.about-tab-icon').attr('data-fill');
			$(this).find('.about-tab-icon').children().attr('src', mobileFillNow);
		});
	}

	function mobileProductTabCarousel(){
		$('#product-mobile-tab-carousel').owlCarousel({
			autoplay: false,
			loop: false,
			nav: true,
			dots: false,
			responsive:{
				0:{
					items:2
				},
				767:{
					items:3
				}
			},
			navText: ['<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">','<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">']
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
