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
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/history-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/history-header.jpg);"><div class="header-overlay"></div></div>
			<div class="about-header-item" style="background-image: url(<?= base_url(); ?>assets/images/main/history-header.jpg);"><div class="header-overlay"></div></div>
		</div>
		<div class="header-title-bg">
			<div class="header-title-wrap">
				<h5>HISTORY</h5>
				<h1>IT'S NOT ONLY JUST<br>A BUSINESS</h1>
			</div>
		</div>
	</section>
	
	<section id="about-tab-wrap" class="fade-animate" data-animate data-animation-classes="animated fadeUpMiddle">
		<div class="container-fluid">
			<div class="row">
				<ul class="nav nav-pills">
					<li class="active">
						<a data-toggle="pill" href="#history">
							<div class="about-tab-inside" data-header="<?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg, <?= base_url(); ?>assets/images/main/history-header.jpg" data-page="HISTORY" data-title="IT'S NOT ONLY JUST<br>A BUSINESS">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/icon-history.png" data-fill="<?= base_url(); ?>assets/images/main/icon-history-white.png">
									<img src="<?= base_url(); ?>assets/images/main/icon-history-white.png">
								</div>
								<div class="about-tab-text">
									<h5>History</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#vision-mission">
							<div class="about-tab-inside" data-header="<?= base_url(); ?>assets/images/main/vision-mission-header.jpg, <?= base_url(); ?>assets/images/main/vision-mission-header.jpg, <?= base_url(); ?>assets/images/main/vision-mission-header.jpg" data-page="VISION & MISSION" data-title="LOREM IPSUM<br>DOLOR SIT AMET">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/icon-vision.png" data-fill="<?= base_url(); ?>assets/images/main/icon-vision-white.png">
									<img src="<?= base_url(); ?>assets/images/main/icon-vision.png">
								</div>
								<div class="about-tab-text">
									<h5>Vision & Mission</h5>
								</div>
							</div>
						</a>
					</li>
					<li class="about-tab-divider">
						<div></div>
					</li>
					<li>
						<a data-toggle="pill" href="#management">
							<div class="about-tab-inside" data-header="<?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg, <?= base_url(); ?>assets/images/main/management-header.jpg" data-page="MANAGEMENT" data-title="LOREM IPSUM<br>DOLOR SIT AMET">
								<div class="about-tab-icon" data-stroke="<?= base_url(); ?>assets/images/main/icon-management.png" data-fill="<?= base_url(); ?>assets/images/main/icon-management-white.png">
									<img src="<?= base_url(); ?>assets/images/main/icon-management.png">
								</div>
								<div class="about-tab-text">
									<h5>Management</h5>
								</div>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section id="about-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 no-padding tab-content">
					<div id="history" class="col-sm-12 tab-pane fade in active">
						<div class="row row-history-1">
							<div class="col-sm-6 v-center history-1-text">
								<div class="box-white-animate animate-translate-out" data-animate data-animation-classes="animated translateOutLeft"></div>
								<div class="history-1-inside fade-animate" data-animate data-animation-classes="animated fadeInLeft">
									<div class="history-1-title">
										<h2>HISTORY OF<br>SUNGAI BUDI GROUP</h2>
									</div>
									<div class="red-liner"></div>
									<div class="history-1-desc">
										<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
										<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc.</p>
										<p>Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim lorem ipsum dolor.</p>
									</div>
								</div>
							</div><!--
						 --><div class="col-sm-6 history-1-pict-wrap v-center">
								<div class="history-1-pict fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= base_url(); ?>assets/images/main/history-1.jpg);">
									<div class="history-pict-overlay"></div>
								</div>
							</div>
						</div>
						<div class="row row-history-2">
							<div class="col-sm-6 v-center history-2-pict-wrap">
								<div class="history-2-pict fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= base_url(); ?>assets/images/main/history-2.jpg);">
									<div class="history-pict-overlay"></div>
								</div>
							</div><!--
						 --><div class="col-sm-6 v-center history-2-text fade-animate" data-animate data-animation-classes="animated fadeInRight">
								<div class="box-white-animate animate-translate-out" data-animate data-animation-classes="animated translateOutRight"></div>
								<div class="history-1-title">
									<h2>LOREM IPSUM<br>DOLOR SIT AMET</h2>
								</div>
								<div class="red-liner"></div>
								<div class="history-1-desc">
									<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
									<p>Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 history-map-wrap">
								<div class="col-sm-12 history-map">
									<img src="<?= base_url(); ?>assets/images/main/history-map.png">
								</div>
								<div class="col-sm-6 v-center history-map-title fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<h2>LOREM IPSUM<br>DOLOR SIT AMET VEL AVET</h2>
								</div><!--
							 --><div class="col-sm-6 v-center history-map-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>
								</div>
							</div>
						</div>
					</div>
					<div id="vision-mission" class="col-sm-12 tab-pane fade">
						<div class="row row-vision">
							<div class="col-sm-5 v-center vision-text">
								<div class="vision-inside fade-animate" data-animate data-animation-classes="animated fadeInRight">
									<div class="vision-title">
										<h2>VISION</h2>
									</div>
									<div class="red-liner"></div>
									<div class="vision-desc">
										<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit:</p>
										<ul>
											<li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
											<li> Sed non  mauris vitae erat consequat auctor eu in elit.</li>
											<li>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</li>
											<li>Nullam ac urna eu felis dapibus condimentum sit amet a augue.</li>
										</ul>
									</div>
								</div>
							</div><!--
						 --><div class="col-sm-7 vision-pict-wrap v-center">
								<div class="vision-pict fade-animate" data-animate data-animation-classes="animated fadeInLeft" style="background-image: url(<?= base_url(); ?>assets/images/main/vision.jpg);">
									<div class="history-pict-overlay"></div>
								</div>
							</div>
						</div>
						<div class="row row-mission">
							<div class="col-sm-6 mission-pict-wrap v-center">
								<div class="mission-pict fade-animate" data-animate data-animation-classes="animated fadeInRight" style="background-image: url(<?= base_url(); ?>assets/images/main/mission.jpg);">
									<div class="history-pict-overlay"></div>
								</div>
								<div class="mission-red-layer"></div>
							</div><!--
						 --><div class="col-sm-6 mission-text-wrap v-center">
								<div class="mission-inside fade-animate" data-animate data-animation-classes="animated fadeInLeft">
									<div class="mission-title">
										<h2>MISSION</h2>
									</div>
									<div class="red-liner"></div>
									<div class="vision-desc">
										<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit:</p>
										<ul>
											<li>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</li>
											<li> Sed non  mauris vitae erat consequat auctor eu in elit.</li>
											<li>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</li>
											<li>Nullam ac urna eu felis dapibus condimentum sit amet a augue.</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 mivi-quote-wrap">
								<div class="mivi-quote-flex content-center">
									<div class="mivi-quote-inside fade-animate" data-animate data-animation-classes="animated fadeInUp">
										<div class="mivi-quote">
											<h4>"Sungai Budi Group is a company enganged in the largest agribusiness in Indonesia that always strives to be the best by continuously maintaining the quality and consistency."</h4>
										</div>
										<div class="red-liner"></div>
										<div class="mivi-quote-by">
											<h6>Gilang Ilham Akbar</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="vision-red-box"></div>
					</div>
					<div id="management" class="col-sm-12 tab-pane fade">
						<div class="col-sm-12 management-1">
							<div class="col-sm-12">
								<div class="management-pagination">
									<div class="home-pagination-wrap">
										<div class="home-pagination-number">
											<h5>01</h5>
										</div>
										<div class="home-pagination-title">
											<h5>Board of Commisioners</h5>
										</div>
									</div>
								</div>
							</div>
							<div class="management-1-red-bg"></div>
							<div class="row">
								<div class="col-sm-6 management-1-left v-center">
									<div class="management-1-left-inside fade-animate" data-animate data-animation-classes="animated fadeInLeft">
										<div id="management-1-left-carousel" class="owl-carousel owl-theme">
											<div class="management-1-left-item">
												<div class="management-1-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/commisioner-1.jpg);"></div>
											</div>
											<div class="management-1-left-item">
												<div class="management-1-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/commisioner-1.jpg);"></div>
											</div>
											<div class="management-1-left-item">
												<div class="management-1-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/commisioner-1.jpg);"></div>
											</div>
											<div class="management-1-left-item">
												<div class="management-1-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/commisioner-1.jpg);"></div>
											</div>
											<div class="management-1-left-item">
												<div class="management-1-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/commisioner-1.jpg);"></div>
											</div>
										</div>
									</div>
								</div><!--
							 --><div class="col-sm-6 management-1-right v-center">
									
										<div class="management-1-right-all">
											<div class="box-white-animate animate-translate-out" data-animate data-animation-classes="animated translateOutRight"></div>
											<div class="management-1-text">
												<div id="management-1-right-carousel" class="owl-carousel owl-theme">
													<div class="management-1-right-item">
														<div class="management-1-who">
															<h5>President Commisioner</h5>
														</div>
														<div class="management-1-name">
															<h2>WITNES ALIF AQRAB</h2>
														</div>
														<div class="red-liner"></div>
														<div class="management-1-desc">
															<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
															<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
															<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi.</p>
														</div>
													</div>
													<div class="management-1-right-item">
														<div class="management-1-who">
															<h5>President Commisioner</h5>
														</div>
														<div class="management-1-name">
															<h2>WITNES ALIF AQRAB</h2>
														</div>
														<div class="red-liner"></div>
														<div class="management-1-desc">
															<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
															<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
															<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi.</p>
														</div>
													</div>
													<div class="management-1-right-item">
														<div class="management-1-who">
															<h5>President Commisioner</h5>
														</div>
														<div class="management-1-name">
															<h2>WITNES ALIF AQRAB</h2>
														</div>
														<div class="red-liner"></div>
														<div class="management-1-desc">
															<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
															<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
															<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi.</p>
														</div>
													</div>
													<div class="management-1-right-item">
														<div class="management-1-who">
															<h5>President Commisioner</h5>
														</div>
														<div class="management-1-name">
															<h2>WITNES ALIF AQRAB</h2>
														</div>
														<div class="red-liner"></div>
														<div class="management-1-desc">
															<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
															<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
															<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi.</p>
														</div>
													</div>
													<div class="management-1-right-item">
														<div class="management-1-who">
															<h5>President Commisioner</h5>
														</div>
														<div class="management-1-name">
															<h2>WITNES ALIF AQRAB</h2>
														</div>
														<div class="red-liner"></div>
														<div class="management-1-desc">
															<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
															<p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.</p>
															<p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi.</p>
														</div>
													</div>
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
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-12 management-2-pagination">
									<div class="home-pagination-wrap">
										<div class="home-pagination-number">
											<h5>02</h5>
										</div>
										<div class="home-pagination-title">
											<h5>Board of Directors</h5>
										</div>
									</div>
								</div>
								<div class="col-sm-12 management-2-carousel-wrap">
									<div id="management-2-carousel" class="owl-carousel owl-theme">
										<div class="management-2-item" data-animate data-animation-classes="animated fadeInUp">
											<div class="management-2-outter-item">
												<div class="management-2-inside-item">
													<div class="management-2-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/director-1.jpg);">
													</div>
													<div class="management-2-text-wrap">
														<div class="management-2-text">
															<h5>Director</h5>
															<h4>LOIS BESTRI</h4>
															<div class="red-liner"></div>
															<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="management-2-item" data-animate data-animation-classes="animated fadeInDown">
											<div class="management-2-outter-item">
												<div class="management-2-inside-item">
													<div class="management-2-text-wrap">
														<div class="management-2-text">
															<h5>President Director</h5>
															<h4>Gilang Ilham Akbar</h4>
															<div class="red-liner"></div>
															<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
														</div>
													</div>
													<div class="management-2-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/director-2.jpg);">
													</div>
												</div>
											</div>
										</div>
										<div class="management-2-item" data-animate data-animation-classes="animated fadeInUp">
											<div class="management-2-outter-item">
												<div class="management-2-inside-item">
													<div class="management-2-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/director-3.jpg);">
													</div>
													<div class="management-2-text-wrap">
														<div class="management-2-text">
															<h5>Director</h5>
															<h4>JONATHAN TUNAS</h4>
															<div class="red-liner"></div>
															<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="management-2-item" data-animate data-animation-classes="animated fadeInDown">
											<div class="management-2-outter-item">
												<div class="management-2-inside-item">
													<div class="management-2-text-wrap">
														<div class="management-2-text">
															<h5>Director</h5>
															<h4>LOIS BESTRI</h4>
															<div class="red-liner"></div>
															<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
														</div>
													</div>
													<div class="management-2-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/director-1.jpg);">
													</div>
												</div>
											</div>
										</div>
										<div class="management-2-item" data-animate data-animation-classes="animated fadeInUp">
											<div class="management-2-outter-item">
												<div class="management-2-inside-item">
													<div class="management-2-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/director-2.jpg);">
													</div>
													<div class="management-2-text-wrap">
														<div class="management-2-text">
															<h5>Director</h5>
															<h4>LOIS BESTRI</h4>
															<div class="red-liner"></div>
															<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="management-2-item" data-animate data-animation-classes="animated fadeInDown">
											<div class="management-2-outter-item">
												<div class="management-2-inside-item">
													<div class="management-2-text-wrap">
														<div class="management-2-text">
															<h5>President Director</h5>
															<h4>Gilang Ilham Akbar</h4>
															<div class="red-liner"></div>
															<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.</p>
														</div>
													</div>
													<div class="management-2-pict" style="background-image: url(<?= base_url(); ?>assets/images/main/director-3.jpg);">
													</div>
												</div>
											</div>
										</div>
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
				carouselItem += '<div class="about-header-item" style="background-image: url('+ headerImages +');"><div class="header-overlay"></div></div>\n';
				console.log(carouselItem);
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
			console.log(nowItem);
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
			items: 3,
		});
		
		var countList = $("#management-2-carousel .owl-item").length;
		
		for(i=1; i<countList-2; i++){
			if(i >= 9){
				$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="'+ parseInt(i+1) +'"></div></li>');
			}
			else{
				$('#home-sub-category-line-dot-list').append('<li class="owl-dot" data-index="'+ parseInt(i) +'"><div data-before="0'+ parseInt(i+1) +'"></div></li>');
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

</script>
</html>
