<!DOCTYPE html>
<html lang="en">
<head>
    <? include 'meta.php' ?>
</head>

<body>

	<? $this->load->view('menu'); ?>

    <section id="about-header">
		<div id="about-header-carousel" class="owl-carousel owl-theme">
			<? foreach ($arr_slideshow_1 as $slideshow_1): ?>
				<div class="about-header-item" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $slideshow_1->image_name; ?>);"><div class="header-overlay"></div></div>
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

	<section id="about-tab-wrap" class="fade-animate" data-animate data-animation-classes="animated fadeUpMiddle">
		<div class="container-fluid">
			<div class="row">
				<ul class="nav nav-pills">
					<li class="active">
						<a data-toggle="pill" href="#history">
							<div class="about-tab-inside"
							data-header="<? foreach ($arr_slideshow_1 as $slideshow_1): ?><?= $setting->setting__system_admin_url; ?>images/website/<?= $slideshow_1->image_name; ?>, <? endforeach; ?>"
							data-page="<? if ($lang == $setting->setting__system_language || $arr_section[0]->title_lang == ''): ?><?= $arr_section[0]->title; ?><? else: ?><?= $arr_section[0]->title_lang; ?><? endif; ?>"
							data-title="<? if ($lang == $setting->setting__system_language || $arr_section[0]->subtitle_lang == ''): ?><?= $arr_section[0]->subtitle; ?><? else: ?><?= $arr_section[0]->subtitle_lang; ?><? endif; ?>">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/icon-history.png" data-fill="<?= base_url(); ?>assets/images/main/icon-history-white.png">
									<img src="<?= base_url(); ?>assets/images/main/icon-history-white.png">
								</div>
								<div class="about-tab-text">
									<? if ($lang == $setting->setting__system_language || $arr_section[0]->title_lang == ''): ?>
										<h5><?= $arr_section[0]->title; ?></h5>
									<? else: ?>
										<h5><?= $arr_section[0]->title_lang; ?></h5>
									<? endif; ?>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#vision-mission">
							<div class="about-tab-inside"
							data-header="<? foreach ($arr_slideshow_2 as $slideshow_2): ?><?= $setting->setting__system_admin_url; ?>images/website/<?= $slideshow_2->image_name; ?>, <? endforeach; ?>"
							data-page="<? if ($lang == $setting->setting__system_language || $arr_section[4]->title_lang == ''): ?><?= $arr_section[4]->title; ?><? else: ?><?= $arr_section[4]->title_lang; ?><? endif; ?>"
							data-title="<? if ($lang == $setting->setting__system_language || $arr_section[4]->subtitle_lang == ''): ?><?= $arr_section[4]->subtitle; ?><? else: ?><?= $arr_section[4]->subtitle_lang; ?><? endif; ?>">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/icon-vision.png" data-fill="<?= base_url(); ?>assets/images/main/icon-vision-white.png">
									<img src="<?= base_url(); ?>assets/images/main/icon-vision.png">
								</div>
								<div class="about-tab-text">
									<? if ($lang == $setting->setting__system_language || $arr_section[4]->title_lang == ''): ?>
										<h5><?= $arr_section[4]->title; ?></h5>
									<? else: ?>
										<h5><?= $arr_section[4]->title_lang; ?></h5>
									<? endif; ?>
								</div>
							</div>
						</a>
					</li>
					<? if($count_boc > 0 || $count_bod > 0):?>
						<li class="about-tab-divider">
							<div></div>
						</li>
						<li>
							<a data-toggle="pill" href="#management">
								<div class="about-tab-inside"
								data-header="<? foreach ($arr_slideshow_3 as $slideshow_3): ?><?= $setting->setting__system_admin_url; ?>images/website/<?= $slideshow_3->image_name; ?>, <? endforeach; ?>"
								data-page="<? if ($lang == $setting->setting__system_language || $arr_section[8]->title_lang == ''): ?><?= $arr_section[8]->title; ?><? else: ?><?= $arr_section[8]->title_lang; ?><? endif; ?>"
								data-title="<? if ($lang == $setting->setting__system_language || $arr_section[8]->subtitle_lang == ''): ?><?= $arr_section[8]->subtitle; ?><? else: ?><?= $arr_section[8]->subtitle_lang; ?><? endif; ?>">
									<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/icon-management.png" data-fill="<?= base_url(); ?>assets/images/main/icon-management-white.png">
										<img src="<?= base_url(); ?>assets/images/main/icon-management.png">
									</div>
									<div class="about-tab-text">
										<? if ($lang == $setting->setting__system_language || $arr_section[8]->title_lang == ''): ?>
											<h5><?= $arr_section[8]->title; ?></h5>
										<? else: ?>
											<h5><?= $arr_section[8]->title_lang; ?></h5>
										<? endif; ?>
									</div>
								</div>
							</a>
						</li>
					<? endif; ?>
				</ul>
			</div>
		</div>
	</section>

	<section id="about-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 no-padding tab-content">
					<div id="history" class="col-xs-12 col-sm-12 tab-pane fade in active">
						<div class="row row-history-1">
							<div class="col-xs-12 col-sm-6 v-center history-1-text">
								<div class="box-white-animate animate-translate-out" data-animate data-animation-classes="animated translateOutLeft"></div>
								<div class="history-1-inside fade-animate" data-animate data-animation-classes="animated fadeInLeft">
									<div class="history-1-title">
										<? if ($lang == $setting->setting__system_language || $arr_section[1]->title_lang == ''): ?>
											<h2><?= $arr_section[1]->title; ?></h2>
										<? else: ?>
											<h2><?= $arr_section[1]->title_lang; ?></h2>
										<? endif; ?>
									</div>
									<div class="red-liner"></div>
									<div class="history-1-desc">
										<? if ($lang == $setting->setting__system_language || $arr_section[1]->description_lang == ''): ?>
											<?= $arr_section[1]->description; ?>
										<? else: ?>
											<?= $arr_section[1]->description_lang; ?>
										<? endif; ?>
									</div>
								</div>
							</div><!--
						 --><div class="col-xs-12 col-sm-6 history-1-pict-wrap v-center">
						 		<? if($arr_section[1]->image_name == ''): ?>
									<div class="history-1-pict fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= base_url(); ?>assets/images/main/history-1.jpg);">
										<div class="history-pict-overlay"></div>
									</div>
								<? else: ?>
									<div class="history-1-pict fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= $setting->setting__system_admin_url; ?>
										images/website/<?= $arr_section[1]->image_name; ?>);">
										<div class="history-pict-overlay"></div>
									</div>
								<? endif; ?>
							</div>
						</div>
						<div class="row row-history-2">
							<div class="col-xs-12 col-sm-6 v-center history-2-pict-wrap">
								<? if($arr_section[2]->image_name == ''): ?>
									<div class="history-2-pict fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= base_url(); ?>assets/images/main/history-2.jpg);">
										<div class="history-pict-overlay"></div>
									</div>
								<? else: ?>
									<div class="history-2-pict fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $arr_section[2]->image_name; ?>);">
										<div class="history-pict-overlay"></div>
									</div>
								<? endif; ?>
							</div><!--
						 --><div class="col-xs-12 col-sm-6 v-center history-2-text fade-animate" data-animate data-animation-classes="animated fadeInRight">
								<div class="box-white-animate animate-translate-out" data-animate data-animation-classes="animated translateOutRight"></div>
								<div class="history-1-title">
									<? if ($lang == $setting->setting__system_language || $arr_section[2]->title_lang == ''): ?>
										<h2><?= $arr_section[2]->title; ?></h2>
									<? else: ?>
										<h2><?= $arr_section[2]->title_lang; ?></h2>
									<? endif; ?>
								</div>
								<div class="red-liner"></div>
								<div class="history-1-desc">
									<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
									<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
									<? if ($lang == $setting->setting__system_language || $arr_section[2]->description_lang == ''): ?>
										<?= $arr_section[2]->description; ?>
									<? else: ?>
										<?= $arr_section[2]->description_lang; ?>
									<? endif; ?>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 history-map-wrap">
								<div class="col-xs-12 col-sm-12 history-map">
									<? if($arr_section[3]->image_name == ''): ?>
										<img src="<?= base_url(); ?>assets/images/main/history-map.png">
									<? else: ?>
										<img src="<?= $setting->setting__system_admin_url; ?>images/website/<?= $arr_section[3]->image_name; ?>">
									<? endif; ?>
								</div>
								<div class="col-xs-12 col-sm-6 v-center history-map-title fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<? if ($lang == $setting->setting__system_language || $arr_section[3]->title_lang == ''): ?>
										<h2><?= $arr_section[3]->title; ?></h2>
									<? else: ?>
										<h2><?= $arr_section[3]->title_lang; ?></h2>
									<? endif; ?>
								</div><!--
							 --><div class="col-xs-12 col-sm-6 v-center history-map-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<? if ($lang == $setting->setting__system_language || $arr_section[3]->description_lang == ''): ?>
										<?= $arr_section[3]->description; ?>
									<? else: ?>
										<?= $arr_section[3]->description_lang; ?>
									<? endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div id="vision-mission" class="col-xs-12 col-sm-12 tab-pane fade">
						<div class="row row-vision">
							<div class="col-xs-12 col-sm-5 v-center vision-text">
								<div class="vision-inside fade-animate" data-animate data-animation-classes="animated fadeInRight">
									<div class="vision-title">
										<? if ($lang == $setting->setting__system_language || $arr_section[5]->title_lang == ''): ?>
											<h2><?= $arr_section[5]->title; ?></h2>
										<? else: ?>
											<h2><?= $arr_section[5]->title_lang; ?></h2>
										<? endif; ?>
									</div>
									<div class="red-liner"></div>
									<div class="vision-desc">
										<? if ($lang == $setting->setting__system_language || $arr_section[5]->description_lang == ''): ?>
											<?= $arr_section[5]->description; ?>
										<? else: ?>
											<?= $arr_section[5]->description_lang; ?>
										<? endif; ?>
									</div>
								</div>
							</div><!--
						 --><div class="col-xs-12 col-sm-7 vision-pict-wrap v-center">
						 		<? if($arr_section[5]->image_name == ''): ?>
									<div class="vision-pict fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= base_url(); ?>assets/images/main/vision.jpg);">
										<div class="history-pict-overlay"></div>
									</div>
								<? else: ?>
									<div class="vision-pict fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $arr_section[5]->image_name; ?>);">
										<div class="history-pict-overlay"></div>
									</div>
								<? endif; ?>
							</div>
						</div>
						<div class="row row-mission">
							<div class="col-xs-12 col-sm-6 mission-pict-wrap v-center">
								<? if($arr_section[6]->image_name == ''): ?>
									<div class="mission-pict fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= base_url(); ?>assets/images/main/mission.jpg);">
										<div class="history-pict-overlay"></div>
									</div>
								<? else: ?>
									<div class="mission-pict fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $arr_section[6]->image_name; ?>);">
										<div class="history-pict-overlay"></div>
									</div>
								<? endif; ?>
								<div class="mission-red-layer"></div>
							</div><!--
						 --><div class="col-xs-12 col-sm-6 mission-text-wrap v-center">
								<div class="mission-inside fade-animate" data-animate data-animation-classes="animated fadeInLeft">
									<div class="mission-title">
										<? if ($lang == $setting->setting__system_language || $arr_section[6]->title_lang == ''): ?>
											<h2><?= $arr_section[6]->title; ?></h2>
										<? else: ?>
											<h2><?= $arr_section[6]->title_lang; ?></h2>
										<? endif; ?>
									</div>
									<div class="red-liner"></div>
									<div class="vision-desc">
										<? if ($lang == $setting->setting__system_language || $arr_section[6]->description_lang == ''): ?>
											<?= $arr_section[6]->description; ?>
										<? else: ?>
											<?= $arr_section[6]->description_lang; ?>
										<? endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-12 mivi-quote-wrap">
								<div class="mivi-quote-flex content-center">
									<div class="mivi-quote-inside fade-animate" data-animate data-animation-classes="animated fadeInUp">
										<div class="mivi-quote">
											<? if ($lang == $setting->setting__system_language || $arr_section[7]->title_lang == ''): ?>
												<h4><?= $arr_section[7]->title; ?></h4>
											<? else: ?>
												<h4><?= $arr_section[7]->title_lang; ?></h4>
											<? endif; ?>
										</div>
										<div class="red-liner"></div>
										<div class="mivi-quote-by">
											<? if ($lang == $setting->setting__system_language || $arr_section[7]->subtitle_lang == ''): ?>
												<h6><?= $arr_section[7]->subtitle; ?></h6>
											<? else: ?>
												<h6><?= $arr_section[7]->subtitle_lang; ?></h6>
											<? endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="vision-red-box"></div>
					</div>
					<div id="management" class="col-xs-12 col-sm-12 tab-pane fade">
						<? if($count_boc > 0): ?>
							<div class="col-xs-12 col-sm-12 management-1">
								<div class="col-xs-12 col-sm-12">
									<div class="management-pagination">
										<div class="home-pagination-wrap">
											<div class="home-pagination-number">
												<h5>01</h5>
											</div>
											<div class="home-pagination-title">
												<? if ($lang == $setting->setting__system_language || $arr_section[9]->title_lang == ''): ?>
													<h5><?= $arr_section[9]->title; ?></h5>
												<? else: ?>
													<h5><?= $arr_section[9]->title_lang; ?></h5>
												<? endif; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="management-1-red-bg"></div>
								<div class="row">
									<div class="col-xs-12 col-sm-6 management-1-left v-center">
										<div class="management-1-left-inside fade-animate" data-animate data-animation-classes="animated fadeInLeft">
											<div id="management-1-left-carousel" class="owl-carousel owl-theme">
												<? foreach($arr_management as $management): ?>
													<? if($management->type == 'Board of Commisioners'): ?>
														<div class="management-1-left-item">
															<div class="management-1-pict" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $management->image_name; ?>);"></div>
														</div>
													<? endif; ?>
												<? endforeach; ?>
											</div>
										</div>
									</div><!--
								 --><div class="col-xs-12 col-sm-6 management-1-right v-center">

											<div class="management-1-right-all">
												<div class="box-white-animate animate-translate-out" data-animate data-animation-classes="animated translateOutRight"></div>
												<div class="management-1-text">
													<div id="management-1-right-carousel" class="owl-carousel owl-theme">
														<? foreach($arr_management as $management): ?>
															<? if($management->type == 'Board of Commisioners'): ?>
																<div class="management-1-right-item">
																	<div class="management-1-who">
																		<? if ($lang == $setting->setting__system_language || $management->job_title_lang == ''): ?>
																			<h5><?= $management->job_title; ?></h5>
																		<? else: ?>
																			<h5><?= $management->job_title_lang; ?></h5>
																		<? endif; ?>
																	</div>
																	<div class="management-1-name">
																		<? if ($lang == $setting->setting__system_language || $management->name_lang == ''): ?>
																			<h2><?= $management->name; ?></h2>
																		<? else: ?>
																			<h2><?= $management->name_lang; ?></h2>
																		<? endif; ?>
																	</div>
																	<div class="red-liner"></div>
																	<div class="management-1-desc">
																		<? if ($lang == $setting->setting__system_language || $management->description_lang == ''): ?>
																			<?= $management->description; ?>
																		<? else: ?>
																			<?= $management->description_lang; ?>
																		<? endif; ?>
																	</div>
																</div>
															<? endif; ?>
														<? endforeach; ?>
													</div>
													<div class="management-1-line-dots">
														<ul id="management-1-line-dot-list" class="owl-dots">
															<li class="owl-dot active" data-index="0"><div data-before="01"></div></li>
														</ul>
														<div id="management-1-nav" class="owl-nav"></div>
													</div>
												</div>
											</div>

									</div>
								</div>
							</div>
						<? endif; ?>
						<? if($count_bod > 0): ?>
							<div class="row">
								<div class="col-xs-12 col-sm-12">
									<div class="col-xs-12 col-sm-12 management-2-pagination">
										<div class="home-pagination-wrap">
											<div class="home-pagination-number">
												<h5>02</h5>
											</div>
											<div class="home-pagination-title">
												<? if ($lang == $setting->setting__system_language || $arr_section[10]->title_lang == ''): ?>
													<h5><?= $arr_section[10]->title; ?></h5>
												<? else: ?>
													<h5><?= $arr_section[10]->title_lang; ?></h5>
												<? endif; ?>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 management-2-carousel-wrap">
										<div id="management-2-carousel" class="owl-carousel owl-theme">
											<? $number = 0; ?>
											<? foreach($arr_management as $key => $management): ?>
												<? if($management->type != 'Board of Directors'): ?>
													<?  continue; ?>
												<? endif; ?>

												<? if($number % 2 <= 0): ?>
													<div class="management-2-item" data-animate data-animation-classes="animated fadeInUp">
														<div class="management-2-outter-item">
															<div class="management-2-inside-item">
																<div class="management-2-pict" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $management->image_name; ?>);">
																</div>
																<div class="management-2-text-wrap">
																	<div class="management-2-text">
																		<? if ($lang == $setting->setting__system_language || $management->job_title_lang == ''): ?>
																			<h5><?= $management->job_title; ?></h5>
																		<? else: ?>
																			<h5><?= $management->job_title_lang; ?></h5>
																		<? endif; ?>

																		<? if ($lang == $setting->setting__system_language || $management->name_lang == ''): ?>
																			<h4><?= $management->name; ?></h4>
																		<? else: ?>
																			<h4><?= $management->name_lang; ?></h4>
																		<? endif; ?>

																		<div class="red-liner"></div>
																		<? if ($lang == $setting->setting__system_language || $management->description_lang == ''): ?>
																			<?= $management->description; ?>
																		<? else: ?>
																			<?= $management->description_lang; ?>
																		<? endif; ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<? else: ?>
													<div class="management-2-item" data-animate data-animation-classes="animated fadeInDown">
														<div class="management-2-outter-item">
															<div class="management-2-inside-item">
																<div class="management-2-text-wrap">
																	<div class="management-2-text">
																		<? if ($lang == $setting->setting__system_language || $management->job_title_lang == ''): ?>
																			<h5><?= $management->job_title; ?></h5>
																		<? else: ?>
																			<h5><?= $management->job_title_lang; ?></h5>
																		<? endif; ?>

																		<? if ($lang == $setting->setting__system_language || $management->name_lang == ''): ?>
																			<h4><?= $management->name; ?></h4>
																		<? else: ?>
																			<h4><?= $management->name_lang; ?></h4>
																		<? endif; ?>

																		<div class="red-liner"></div>
																		<? if ($lang == $setting->setting__system_language || $management->description_lang == ''): ?>
																			<?= $management->description; ?>
																		<? else: ?>
																			<?= $management->description_lang; ?>
																		<? endif; ?>
																	</div>
																</div>
																<div class="management-2-pict" style="background-image: url(<?= $setting->setting__system_admin_url; ?>images/website/<?= $management->image_name; ?>);">
																</div>
															</div>
														</div>
													</div>
												<? endif;?>

												<? $number += 1; ?>
											<? endforeach;?>
										</div>
										<div class="management-2-line-dots">
											<ul id="home-sub-category-line-dot-list" class="owl-dots">
												<li class="owl-dot active" data-index="0"><div data-before="01"></div></li>
											</ul>
											<div id="management-2-nav" class="owl-nav"></div>
										</div>
									</div>
								</div>
							</div>
						<? endif;?>
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
		managementOneLeftCarousel();
		managementOneRightCarousel();
		managementTwoCarousel();
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

			var page = $(this).attr('data-page');
			var title = $(this).attr('data-title');

			$('.header-title-wrap h5').remove();
			$('.header-title-wrap h1').remove();

			$('.header-title-wrap').append('<h5>'+ page +'</h5>');
			$('.header-title-wrap').append('<h1>'+ title +'</h1>');

			var arrHeader = $(this).attr('data-header').split(', ');

			$('#about-header-carousel .owl-item').remove();
			$('#about-header-carousel').find('.owl-stage-outer').remove();
			$('#about-header-carousel').owlCarousel('destroy');

			var carouselItem = '';

			$.each(arrHeader, function(key, headerImages) {
				if(headerImages != ''){
					carouselItem += '<div class="about-header-item" style="background-image: url('+ headerImages +');"><div class="header-overlay"></div></div>\n';
				}
			});

			$('#about-header-carousel').append(carouselItem);
			aboutHeaderCarousel();
		});
	}

	function managementOneLeftCarousel(){
		$('#management-1-left-carousel').owlCarousel({
			rtl:true,
			autoplay: false,
			loop: false,
			nav: false,
			dots: false,
			items: 1,
			autoWidth: true,
			touchDrag: false,
			mouseDrag: false
		});
	}

	function managementOneRightCarousel(){
		$('#management-1-right-carousel').owlCarousel({
			autoplay: false,
			loop: false,
			nav: true,
			navContainer: '#management-1-nav',
			navText: ['<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">','<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">'],
			dotsContainer: '#management-1-line-dots',
			items: 1,
			animateIn: 'fadeIn',
		});

		var countMana1 = $("#management-1-right-carousel .owl-item").length;

		for(i=1; i<countMana1; i++){
			if(i >= 9){
				$('#management-1-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="'+ parseInt(i+1) +'"></div></li>');
			}
			else{
				$('#management-1-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="0'+ parseInt(i+1) +'"></div></li>');
			}
		}

		var dotWidth= (100/countMana1).toFixed(1);
		$('#management-1-line-dot-list li').css('width', dotWidth+'%');

		$('#management-1-right-carousel').on('translate.owl.carousel', function(event) {
			var nowItem = event.item.index ;
			$('#management-1-line-dot-list .owl-dot').removeClass('active');
			$("#management-1-line-dot-list .owl-dot[data-index='"+nowItem+"']").addClass('active');
		});

		$('#management-1-nav').on('click', '.owl-next', function () {
			$('#management-1-left-carousel').trigger('next.owl.carousel')
		});
		$('#management-1-nav').on('click', '.owl-prev', function () {
			$('#management-1-left-carousel').trigger('prev.owl.carousel')
		});
	}

	function managementTwoCarousel(){
		$('#management-2-carousel').owlCarousel({
			autoplay: false,
			loop: false,
			nav: true,
			navContainer: '#management-2-nav',
			navText: ['<img src="<?= base_url(); ?>assets/images/main/arrow-prev.png">','<img src="<?= base_url(); ?>assets/images/main/arrow-next.png">'],
			dotsContainer: '#management-2-line-dots',
			responsive:{
				0:{
					items:1
				},
				767:{
					items:2
				},
				1023:{
					items:3
				}
			}
		});

		var countList = $("#management-2-carousel .owl-item").length;

		if($(window).width() > 768){
			for(i=1; i<countList-2; i++){
				if(i >= 9){
					$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="'+ parseInt(i+1) +'"></div></li>');
				}
				else{
					$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="0'+ parseInt(i+1) +'"></div></li>');
				}
			}
		}
		else if($(window).width() > 767){
			for(i=1; i<countList-1; i++){
				if(i >= 9){
					$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="'+ parseInt(i+1) +'"></div></li>');
				}
				else{
					$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="0'+ parseInt(i+1) +'"></div></li>');
				}
			}
		}
		else{
			for(i=1; i<countList; i++){
				if(i >= 9){
					$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="'+ parseInt(i+1) +'"></div></li>');
				}
				else{
					$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="0'+ parseInt(i+1) +'"></div></li>');
				}
			}
		}


		var dotWidth= (100/countList).toFixed(1);
		$('#home-sub-category-line-dot-list li').css('width', dotWidth+'%');

		$('#management-2-carousel').on('translate.owl.carousel', function(event) {
			var currentItem = event.item.index ;
			$('#home-sub-category-line-dot-list .owl-dot').removeClass('active');
			$("#home-sub-category-line-dot-list .owl-dot[data-index='"+currentItem+"']").addClass('active');
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
