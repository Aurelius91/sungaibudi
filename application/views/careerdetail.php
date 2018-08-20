<!DOCTYPE html>
<html lang="en">
<head>
    <? include 'meta.php' ?>
</head>

<body>

	<? $this->load->view('menu'); ?>

    <section id="career-detail-header">
		<div class="container-fluid">
			<div class="row">
				<div class="career-detail-bg" style="background-image: url(<?= base_url(); ?>assets/images/main/career-detail-bg.jpg);">
					<div class="header-overlay">
						<div class="header-title-bg">
							<div class="header-title-wrap">
								<? if ($lang == $setting->setting__system_language): ?>
										<h5>CAREER DETAIL</h5>
									<? else: ?>
										<h5>DETAIL KARIR</h5>
									<? endif; ?>
								<? if ($lang == $setting->setting__system_language || $career->name_lang == ''): ?>
									<h1><?= strtoupper($career->name); ?></h1>
								<? else: ?>
									<h1><?= strtoupper($career->name_lang); ?></h1>
								<? endif; ?>
							</div>
						</div>
					</div>
				</div>
				<div class="career-detail-white-box"></div>
			</div>
		</div>
	</section>

	<section id="career-detail-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 career-detail-tab-wrap">
					<div class="col-sm-6 career-detail-tab-inside">
						<ul class="nav nav-pills">
							<li class="active"><a data-toggle="pill" href="#c-d-1">Project Manager</a></li>
							<li><a data-toggle="pill" href="#c-d-2">Sales</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 tab-content">
					<div id="c-d-1" class="tab-pane fade in active">
						<div class="row">
							<div class="col-sm-6 career-detail-top">
								<div class="career-detail-title fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<? if ($lang == $setting->setting__system_language || $career->name_lang == ''): ?>
										<h2><?= strtoupper($career->name); ?> (<?= strtoupper($career->name_code); ?>)</h2>
									<? else: ?>
										<h2><?= strtoupper($career->name_lang); ?> (<?= strtoupper($career->name_code_lang); ?>)</h2>
									<? endif; ?>
								</div>
								<div class="red-liner"></div>
								<div class="career-detail-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<? if ($lang == $setting->setting__system_language || $career->description_lang == ''): ?>
										<?= $career->description; ?>
									<? else: ?>
										<?= $career->description_lang; ?>
									<? endif; ?>
								</div>
							</div>
						</div>
						<div class="row row-eq-height-desktop career-detail-split-row">
							<div class="col-sm-6 career-detail-grid job-desc fade-animate" data-animate data-animation-classes="animated fadeInLeft">
								<div class="career-detail-sub-title">
									<h4>Job Description:</h4>
								</div>
								<div class="career-detail-list">
									<? if ($lang == $setting->setting__system_language || $career->job_description_lang == ''): ?>
										<?= $career->job_description; ?>
									<? else: ?>
										<?= $career->job_description_lang; ?>
									<? endif; ?>
								</div>
							</div>
							<div class="col-sm-6 career-detail-grid qualification fade-animate" data-animate data-animation-classes="animated fadeInRight">
								<div class="career-detail-sub-title">
									<h4>Qualification:</h4>
								</div>
								<div class="career-detail-list">
									<!-- <ul>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
									</ul> -->
									<? if ($lang == $setting->setting__system_language || $career->qualification_lang == ''): ?>
										<?= $career->qualification; ?>
									<? else: ?>
										<?= $career->qualification_lang; ?>
									<? endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div id="c-d-2" class="tab-pane fade">
						<div class="row">
							<div class="col-sm-6 career-detail-top">
								<div class="career-detail-title fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<h2>SALES</h2>
								</div>
								<div class="red-liner"></div>
								<div class="career-detail-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
									<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
								</div>
							</div>
						</div>
						<div class="row row-eq-height-desktop career-detail-split-row">
							<div class="col-sm-6 career-detail-grid job-desc fade-animate" data-animate data-animation-classes="animated fadeInLeft">
								<div class="career-detail-sub-title">
									<h4>Job Description:</h4>
								</div>
								<div class="career-detail-list">
									<ul>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-6 career-detail-grid qualification fade-animate" data-animate data-animation-classes="animated fadeInRight">
								<div class="career-detail-sub-title">
									<h4>Qualification:</h4>
								</div>
								<div class="career-detail-list">
									<ul>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
										<li>Nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris Morbi accumsan ipsum velit.</li>
										<li>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 career-detail-form-text">
					<h4>If you have what it takes to be a part of our team, please fill out the form below</h4>
				</div>
			</div>

			<? if($lang == $setting->setting__system_language): ?>
				<div class="row">
					<div class="col-sm-6 career-detail-form">
						<div class="form-group career-detail-custom">
							<input type="text" class="form-control input-custom input-custom-transparent data-important" id="career-name">
							<label for="career-name">Your Name <span class="red-alert" style="display: none;">*Field must be filled</span></label>
						</div>
					</div>
					<div class="col-sm-6 career-detail-form">
						<div class="form-group career-detail-custom">
							<input type="text" class="form-control input-custom input-custom-transparent data-important" id="career-email">
							<label for="career-email">Your Email <span class="red-alert" style="display: none;">*Field must be filled</span></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 career-detail-form">
						<div class="form-group career-detail-custom">
							<input type="text" class="form-control input-custom input-custom-transparent data-important" id="career-phone">
							<label for="career-phone">Your Phone Number <span class="red-alert" style="display: none;">*Field must be filled</span></label>
						</div>
					</div>
					<div class="col-sm-6 career-detail-form">
						<div class="form-group career-detail-custom">
							<input type="file" class="form-control input-custom input-custom-transparent data-important" id="career-cv" accept=".doc, .docx, .pdf, .rar, .zip">
							<label for="career-cv">Upload Your CV <span class="red-alert" style="display: none;">*Field must be filled</span></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 career-detail-button-gap">
						<div class="career-detail-button-wrap">
							<a href=""><button class="btn btn-read-more-red"><span>BACK</span></button></a>
						</div>
						<div class="career-detail-button-wrap">
							<button class="btn btn-read-more-red" onclick="submitEmailContactUs();"><span>SEND</span></button>
						</div>
					</div>
				</div>
			<? else: ?>
				<div class="row">
					<div class="col-sm-6 career-detail-form">
						<div class="form-group career-detail-custom">
							<input type="text" class="form-control input-custom input-custom-transparent data-important" id="career-name">
							<label for="career-name">Nama <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
						</div>
					</div>
					<div class="col-sm-6 career-detail-form">
						<div class="form-group career-detail-custom">
							<input type="text" class="form-control input-custom input-custom-transparent data-important" id="career-email">
							<label for="career-email">Email <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 career-detail-form">
						<div class="form-group career-detail-custom">
							<input type="text" class="form-control input-custom input-custom-transparent data-important" id="career-phone">
							<label for="career-phone">Nomor Telepon <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
						</div>
					</div>
					<div class="col-sm-6 career-detail-form">
						<div class="form-group career-detail-custom">
							<input type="file" class="form-control input-custom input-custom-transparent data-important" id="career-cv" accept=".doc, .docx, .pdf, .rar, .zip">
							<label for="career-cv">Upload CV Anda <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 career-detail-button-gap">
						<div class="career-detail-button-wrap">
							<a href=""><button class="btn btn-read-more-red"><span>KEMBALI</span></button></a>
						</div>
						<div class="career-detail-button-wrap">
							<button class="btn btn-read-more-red" onclick="submitEmailContactUs();"><span>KIRIM</span></button>
						</div>
					</div>
				</div>
			<? endif; ?>
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
		menuMobile();
		checkInputHasValue();
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

	function checkInputHasValue(){
		$(".input-custom").on("input", function() {
		    $(this).addClass('input-changed');
		});
	}

</script>
<script type="text/javascript">
	function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        return regex.test(email);
    }

	function submitEmailContactUs() {
		var found = 0;

		$.each($('.data-important'), function(key, field) {
			if ($(field).val() == '') {
				$(field).next().children().show();

				found += 1;
			}
			else{
				$(field).next().children().hide();
			}
		});

		if ($('#career-email').val() != '' && !isEmail($('#career-email').val())) {
			found += 1;

			$('#career-email').next().children().html('*Wrong Email Format');
			$('#career-email').next().children().show();
		}

		if($('#career-phone').val() != '' && !$.isNumeric($('#career-phone').val())) {
            found += 1;

			$('#career-phone').next().children().html('*Wrong Phone Number Format. Ex: 6281234567890');
			$('#career-phone').next().children().show();
        }

		if (found > 0) {
			return;
		}

		var file_data = $('#career-cv').prop('files')[0];
		var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('<?= $csrf['name']; ?>', '<?= $csrf['hash']; ?>');

        if(file_data == null){
        	return;
        }


        var name = $('#career-name').val();
		var email = $('#career-email').val();
		var phone = $('#career-phone').val();

        $.ajax({
            cache: false,
            contentType: false,
            data: form_data,
            dataType: 'JSON',
            error: function() {
            	submitQuery = false;
            	$('.important-input').prop('disabled', false);

                alert('Server Error');
            },
            processData: false,
            type: 'post',
            success: function(data) {
            	submitQuery = false;
            	$('.important-input').prop('disabled', false);

                if (data.status == 'success') {
                    alert('Email Sent');
                }
                else {
                    alert(data.message);
                }
            },
            url: '<?= base_url(); ?>career/ajax_upload_cv/<?= $career->id; ?>/' + name + '/' + phone + '/' + email + '/',
        });
	}
</script>
</html>
