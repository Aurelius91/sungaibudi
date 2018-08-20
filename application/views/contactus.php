<!DOCTYPE html>
<html lang="en">
<head>
    <? include 'meta.php' ?>
</head>

<body>
	
	<? $this->load->view('menu'); ?>
	
	<section id="contact-map-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 contact-map">
					<div id="map-for-contact"></div>
					<div class="contact-float fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<div class="contact-float-title">
							<? if ($lang == $setting->setting__system_language || $arr_section[1]->subtitle_lang == ''): ?>
								<h2><?= $arr_section[1]->subtitle; ?></h2>
							<? else: ?>
								<h2><?= $arr_section[1]->subtitle_lang; ?></h2>
							<? endif; ?>
						</div>
						<div class="liner"></div>
						<div class="contact-float-desc">
							<? if ($lang == $setting->setting__system_language || $arr_section[1]->description_lang == ''): ?>
								<?= $arr_section[1]->description; ?>
							<? else: ?>
								<?= $arr_section[1]->description_lang; ?>
							<? endif; ?>
						</div>
						<div class="contact-form">
							<? if($lang == $setting->setting__system_language): ?>
								<div class="form-group contact-group-custom">
									<input type="text" class="form-control input-custom input-custom-transparent data-important" id="contact-name">
									<label for="contact-name">Your Name <span class="red-alert" style="display: none;">*Field must be filled</span></label>
								</div>
								<div class="form-group contact-group-custom">
									<input type="text" class="form-control input-custom input-custom-transparent data-important" id="contact-email">
									<label for="contact-email">Your Email <span class="red-alert" style="display: none;">*Field must be filled</span></label>
								</div>
								<div class="form-group contact-group-custom">
									<input type="text" class="form-control input-custom input-custom-transparent data-important" id="contact-phone">
									<label for="contact-phone">Your Phone Number <span class="red-alert" style="display: none;">*Field must be filled</span></label>
								</div>
								<div class="form-group contact-group-custom">
									<textarea class="form-control input-custom input-custom-transparent" id="contact-message" rows="4"></textarea>
									<label for="contact-message">Message</label>
								</div>
							<? else: ?>
								<div class="form-group contact-group-custom">
									<input type="text" class="form-control input-custom input-custom-transparent data-important" id="contact-name">
									<label for="contact-name">Nama <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
								</div>
								<div class="form-group contact-group-custom">
									<input type="text" class="form-control input-custom input-custom-transparent data-important" id="contact-email">
									<label for="contact-email">Email <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
								</div>
								<div class="form-group contact-group-custom">
									<input type="text" class="form-control input-custom input-custom-transparent data-important" id="contact-phone">
									<label for="contact-phone">No Telepon <span class="red-alert" style="display: none;">*Field harus diisi</span></label>
								</div>
								<div class="form-group contact-group-custom">
									<textarea class="form-control input-custom input-custom-transparent" id="contact-message" rows="4"></textarea>
									<label for="contact-message">Pesan</label>
								</div>
							<? endif; ?>
						</div>
						<div class="contact-float-button">
							<? if($lang == $setting->setting__system_language): ?>
								<button class="btn btn-read-more" onclick="submitEmailContactUs();"><span>SEND</span></button>
							<? else: ?>
								<button class="btn btn-read-more" onclick="submitEmailContactUs();"><span>KIRIM</span></button>
							<? endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="contact-touch">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-6 contact-touch-wrap">
					<div class="col-xs-12 col-sm-12 contact-touch-page fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<? if ($lang == $setting->setting__system_language || $arr_section[0]->title_lang == ''): ?>
							<h5><?= $arr_section[0]->title; ?></h5>
						<? else: ?>
							<h5><?= $arr_section[0]->title_lang; ?></h5>
						<? endif; ?>
					</div>
					<div class="col-xs-12 col-sm-12 contact-touch-title fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<? if ($lang == $setting->setting__system_language || $arr_section[0]->subtitle_lang == ''): ?>
							<h1><?= $arr_section[0]->subtitle; ?></h1>
						<? else: ?>
							<h1><?= $arr_section[0]->subtitle_lang; ?></h1>
						<? endif; ?>
					</div>
					<div class="col-xs-12 col-sm-12">
						<div class="red-liner"></div>
					</div>
					<div class="col-xs-12 col-sm-12 contact-touch-desc fade-animate" data-animate data-animation-classes="animated fadeInUp">
						<? if ($lang == $setting->setting__system_language || $arr_section[0]->description_lang == ''): ?>
							<?= $arr_section[0]->description; ?>
						<? else: ?>
							<?= $arr_section[0]->description_lang; ?>
						<? endif; ?>
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
		contactMaps();
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
	
	function contactMaps(){
		var locations = [
		  ['Wisma Budi',  <?= $setting->setting__website_map_latitude; ?>, <?= $setting->setting__website_map_latitude; ?>, 1]
		];
		
		var latit = -6.214208;
		if($(window).width() > 767){
			var asidelatit = latit + 0.001;
		}
		else{
			var asidelatit = latit;
		}
		
		var longit = 106.831261;
		if($(window).width() > 767){
			var asidelongit = longit + 0.004;
		}
		else{
			var asidelongit = longit;
		}

		var bounds  = new google.maps.LatLngBounds();

		// Specify features and elements to define styles.
		  var styleArray = [
			  {
				"stylers": [
				  { "saturation": -85 }
				]
			  },{
			  }
			];


		var map = new google.maps.Map(document.getElementById('map-for-contact'), {
		  styles: styleArray,
		  zoom: 17,
		  center: new google.maps.LatLng(asidelatit, asidelongit),
		  mapTypeId: google.maps.MapTypeId.ROADMAP,
		  scrollwheel: false,
          fullscreenControl: true
		});

		var infowindow = new google.maps.InfoWindow();

		var marker, i;
		
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(-6.214208, 106.831261),
			map: map,
			icon:'http://localhost/sungaibudi/assets/images/main/contact-pin.png'
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

		if ($('#contact-email').val() != '' && !isEmail($('#contact-email').val())) {
			found += 1;

			$('#contact-email').next().children().html('*Wrong Email Format');
			$('#contact-email').next().children().show();
		}

		if($('#contact-phone').val() != '' && !$.isNumeric($('#contact-phone').val())) {
            found += 1;

			$('#contact-phone').next().children().html('*Wrong Phone Number Format. Ex: 6281234567890');
			$('#contact-phone').next().children().show();
        }

		if (found > 0) {
			return;
		}

		var name = $('#contact-name').val();
		var email = $('#contact-email').val();
		var phone = $('#contact-phone').val();
		var message = $('#contact-message').val();

		$.ajax({
	        data :{
	            name: name,
	            email: email,
	            phone: phone,
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
		 $('#contact-name').val('');
		 $('#contact-email').val('');
		 $('#contact-phone').val('');
		 $('#contact-message').val('');
	}
</script>
</html>
