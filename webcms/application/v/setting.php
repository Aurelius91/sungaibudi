	<style type="text/css">
	</style>

	<script type="text/javascript">
		$(function() {
			click();
			init();
			reset();
			change();
		});

		function change(){
			$('#main-video').change(function() {
				var file_data = $('#main-video').prop('files')[0];
				var form_data = new FormData();
				form_data.append('file', file_data);
				form_data.append("<?= $csrf['name'] ?>", "<?= $csrf['hash'] ?>");

				$.ajax({
					cache: false,
					contentType: false,
					data: form_data,
					dataType: 'JSON',
					error: function() {
						alert('Server Error.');
					},
					processData: false,
					type: 'post',
					success: function(data) {
						if (data.status == 'success') {
							$('#preview-video').remove();

							var video = '<video id="preview-video" width="100%" height="100%" controls><source src="<?= base_url(); ?>video/'+ data.video_name +'" type="video/mp4"></video>';

							$('#preview').append(video);
							$('#preview').data('video_name', data.video_name);
						}
						else {
							alert(data.message);
						}
					},
					url: '<?= base_url(); ?>setting/ajax_upload_video/',
					xhr: function() {
						var percentage = 0;
						var xhr = new window.XMLHttpRequest();

						xhr.upload.addEventListener('progress', function(evt) {
							$('.ui.text.loader').html('Checking Data..');
						}, false);

						xhr.addEventListener('progress', function(evt) {
							$('.ui.text.loader').html('Updating Database...');
						}, false);

						return xhr;
					}
				});
			});

			$('#main-video-2').change(function() {
				var file_data = $('#main-video-2').prop('files')[0];
				var form_data = new FormData();
				form_data.append('file', file_data);
				form_data.append("<?= $csrf['name'] ?>", "<?= $csrf['hash'] ?>");

				$.ajax({
					cache: false,
					contentType: false,
					data: form_data,
					dataType: 'JSON',
					error: function() {
						alert('Server Error.');
					},
					processData: false,
					type: 'post',
					success: function(data) {
						if (data.status == 'success') {
							$('#preview-video-2').remove();

							var video2 = '<video id="preview-video-2" width="100%" height="100%" controls><source src="<?= base_url(); ?>video/'+ data.video_name +'" type="video/mp4"></video>';

							$('#preview-2').append(video2);
							$('#preview-2').data('video_name', data.video_name);
						}
						else {
							alert(data.message);
						}
					},
					url: '<?= base_url(); ?>setting/ajax_upload_video/',
					xhr: function() {
						var percentage = 0;
						var xhr = new window.XMLHttpRequest();

						xhr.upload.addEventListener('progress', function(evt) {
							$('.ui.text.loader').html('Checking Data..');
						}, false);

						xhr.addEventListener('progress', function(evt) {
							$('.ui.text.loader').html('Updating Database...');
						}, false);

						return xhr;
					}
				});
			});
		}

		function click() {
			$('#form-back').click(function() {
				window.location.href = '<?= base_url(); ?>';
			});

			$('#form-submit').click(function() {
				submit();
			});
		}

		function init() {
		}

		function reset() {
			$('#setting-facebook-url').val("<?= $setting->setting__social_media_facebook_link; ?>");
			$('#setting-twitter-url').val("<?= $setting->setting__social_media_twitter_link; ?>");
			$('#setting-instagram-url').val("<?= $setting->setting__social_media_instagram_link; ?>");

			$('#setting-website-maintenance-container').dropdown('set selected', "<?= $setting->setting__system_main_website_maintenance; ?>");

			$('#setting-dual-language-container').dropdown('set selected', "<?= $setting->setting__website_enabled_dual_language; ?>");
			$('#setting-language-1').val("<?= $setting->setting__system_language; ?>");
			$('#setting-language-2').val("<?= $setting->setting__system_language2; ?>");

			$('#setting-email-sent-to').val("<?= $setting->setting__system_email_sent_to; ?>");
			$('#setting-email-sent-cc').val("<?= $setting->setting__system_email_sent_cc; ?>");
			$('#setting-email2-sent-to').val("<?= $setting->setting__system_email2_sent_to; ?>");
			$('#setting-email2-sent-cc').val("<?= $setting->setting__system_email2_sent_cc; ?>");
			$('#setting-email3-sent-to').val("<?= $setting->setting__system_email3_sent_to; ?>");
			$('#setting-email3-sent-cc').val("<?= $setting->setting__system_email3_sent_cc; ?>");
			$('#setting-email4-sent-to').val("<?= $setting->setting__system_email4_sent_to; ?>");
			$('#setting-email4-sent-cc').val("<?= $setting->setting__system_email4_sent_cc; ?>");

			<? if($setting->setting_website_video_1 != ''): ?>
				$('#preview-video').remove();
				var video = '<video id="preview-video" width="100%" height="100%" controls><source src="<?= base_url(); ?>video/<?= $setting->setting_website_video_1; ?>" type="video/mp4"></video>';
				$('#preview').append(video);
			<? endif; ?>

			<? if($setting->setting_website_video_2 != ''): ?>
				$('#preview-video-2').remove();
				var video2 = '<video id="preview-video-2" width="100%" height="100%" controls><source src="<?= base_url(); ?>video/<?= $setting->setting_website_video_2; ?>" type="video/mp4"></video>';
				$('#preview-2').append(video2);
			<? endif; ?>
		}

		function submit() {
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			var facebookUrl = $('#setting-facebook-url').val();
			var twitterkUrl = $('#setting-twitter-url').val();
			var instagramUrl = $('#setting-instagram-url').val();

			var settingEnabledWebsiteMaintenance = $('#setting-enabled-website-maintenance').val();
			var settingEnabledDualLanguage = $('#setting-enabled-dual-language').val();
			var settingLanguage1 = $('#setting-language-1').val();
			var settingLanguage2 = $('#setting-language-2').val();

			var emailSentTo = $('#setting-email-sent-to').val();
			var emailSentCC = $('#setting-email-sent-cc').val();
			var emailSent2To = $('#setting-email2-sent-to').val();
			var emailSent2CC = $('#setting-email2-sent-cc').val();

			var video = $('#preview').data('video_name');
			var video2 = $('#preview-2').data('video_name');

			$.ajax({
				data :{
					setting__social_media_facebook_link: facebookUrl,
					setting__social_media_twitter_link: twitterkUrl,
					setting__social_media_instagram_link: instagramUrl,
					setting__website_enabled_dual_language: settingEnabledDualLanguage,
					setting__system_language: settingLanguage1,
					setting__system_language2: settingLanguage2,
					setting__system_main_website_maintenance: settingEnabledWebsiteMaintenance,
					setting__system_email_sent_to: emailSentTo,
					setting__system_email_sent_cc: emailSentCC,
					setting__system_email2_sent_to: emailSent2To,
					setting__system_email2_sent_cc: emailSent2CC,
					setting_website_video_1: video,
					setting_website_video_2: video2,
					"<?= $csrf['name'] ?>": "<?= $csrf['hash'] ?>"
				},
				dataType: 'JSON',
				error: function() {
					$('.ui.dimmer.all-loader').dimmer('hide');
					$('.ui.basic.modal.all-error').modal('show');
					$('.all-error-text').html('Server Error.');
				},
				success: function(data){
					if (data.status == 'success') {
						$('.ui.text.loader').html('Refreshing your page...');

						window.location.reload();
					}
					else {
						$('.ui.dimmer.all-loader').dimmer('hide');
						$('.ui.basic.modal.all-error').modal('show');
						$('.all-error-text').html(data.message);
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>setting/ajax_update/',
				xhr: function() {
					var percentage = 0;
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener('progress', function(evt) {
						$('.ui.text.loader').html('Checking Data..');
					}, false);

					xhr.addEventListener('progress', function(evt) {
						$('.ui.text.loader').html('Updating Database...');
					}, false);

					return xhr;
				},
			});
		}
	</script>

	<!-- Dashboard Here -->
	<div class="main-content">
		<div class="ui stackable one column centered grid">
			<div class="column">
				<div class="ui attached message setting-header">
					<div class="header">System Settings</div>
				</div>
				<div class="form-content">
					<div class="ui form">
						<h4 class="ui dividing header">Social media URL</h4>
						<div class="field">
							<div class="three fields">
								<div class="field">
									<label>Facebook URL</label>
									<input id="setting-facebook-url" class="form-input" placeholder="Facebook URL.." type="text">
								</div>
								<div class="field">
									<label>Twitter URL</label>
									<input id="setting-twitter-url" class="form-input" placeholder="Twitter URL.." type="text">
								</div>
								<div class="field">
									<label>Instagram URL</label>
									<input id="setting-instagram-url" class="form-input" placeholder="Instagram URL.." type="text">
								</div>
							</div>
						</div>

						<h4 class="ui dividing header">Website Settings</h4>
						<div class="field">
							<div class="two fields">
								<div class="field">
									<label>Enabled Website Maintenance</label>
									<div id="setting-website-maintenance-container" class="ui search selection dropdown form-input">
										<input id="setting-enabled-website-maintenance" type="hidden">
										<i class="dropdown icon"></i>
										<div class="default text">-- Enabled Website Maintenance --</div>
										<div class="menu">
											<div class="item" data-value="1">Enabled</div>
											<div class="item" data-value="0">Disabled</div>
										</div>
									</div>
								</div>
								<div class="field">
									<label>Enabled Dual Language</label>
									<div id="setting-dual-language-container" class="ui search selection dropdown form-input">
										<input id="setting-enabled-dual-language" type="hidden">
										<i class="dropdown icon"></i>
										<div class="default text">-- Enabled Dual Language --</div>
										<div class="menu">
											<div class="item" data-value="1">Enabled</div>
											<div class="item" data-value="0">Disabled</div>
										</div>
									</div>
								</div>
							</div>
							<div class="two fields">
								<div class="field">
									<label>Main Language Name</label>
									<input id="setting-language-1" class="form-input" placeholder="Main Language Name.." type="text">
								</div>
								<div class="field">
									<label>Optional Language Name</label>
									<input id="setting-language-2" class="form-input" placeholder="Optional Language Name.." type="text">
								</div>
							</div>
						</div>

						<h4 class="ui dividing header">Enquiry Email Settings</h4>
						<!-- Contact Us -->
						<div class="field">
							<div class="two fields">
								<div class="field">
									<label>Contact Us Email Sent To</label>
									<input id="setting-email-sent-to" class="form-input" placeholder="Contact Us Email Sent To.." type="text">
								</div>
								<div class="field">
									<label>Contact Us Email Sent CC (separated by ';')</label>
									<input id="setting-email-sent-cc" class="form-input" placeholder="Contact Us Email Sent CC.." type="text">
								</div>
							</div>
						</div>

						<!-- Career -->
						<div class="field">
							<div class="two fields">
								<div class="field">
									<label>Career Email Sent To</label>
									<input id="setting-email2-sent-to" class="form-input" placeholder="Contact Us Email Sent To.." type="text">
								</div>
								<div class="field">
									<label>Career Sent CC (separated by ';')</label>
									<input id="setting-email2-sent-cc" class="form-input" placeholder="Contact Us Email Sent CC.." type="text">
								</div>
							</div>
						</div>

						<!-- video -->
						<h4 class="ui dividing header">Upload Image</h4>
						<div class="two fields">
							<div class="field">
								<label>Upload Video Banner <span class="color-red">*</span></label>
								<div style="padding-bottom: 5px;">Max File Size: 5Mb</div>
								<input id="main-video" class="form-input data-important" placeholder="Upload video.." type="File">
							</div>
							<div class="field">
								<label>Upload Video About us <span class="color-red">*</span></label>
								<div style="padding-bottom: 5px;">Max File Size: 5Mb</div>
								<input id="main-video-2" class="form-input data-important" placeholder="Upload video.." type="File">
							</div>
						</div>
						<div class="two fields">
							<div class="field">
								<label>Preview Banner Video</label>
								<div id="preview">

								</div>
							</div>
							<div class="field">
								<label>Preview About Video</label>
								<div id="preview-2"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="ui bottom attached message text-right setting-header">
					<div class="ui buttons">
						<button id="form-back" class="ui left attached button form-button">Back</button>
						<button id="form-submit" class="ui right attached button form-button">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>