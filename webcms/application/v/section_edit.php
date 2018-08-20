	<style type="text/css">
	</style>

	<script type="text/javascript">
		$(function() {
			click();
			init();
			reset();
			change();
		});

		function back() {
			window.location.href = '<?= base_url(); ?>section/view/<?= $section->header_id; ?>/';
		}

		function change() {
			$('#main-image').change(function() {
				var file_data = $('#main-image').prop('files')[0];
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
							$('.preview').remove();

							var image = '<img class="preview" src="<?= base_url(); ?>images/website/'+ data.image_id +'.'+ data.ext +'">';
							$('#preview').append(image);
                            $('#preview').data('image_id', data.image_id);
						}
						else {
							alert(data.message);
						}
					},
					url: '<?= base_url(); ?>image/ajax_upload_all/',
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
				back();
			});

			$('#form-submit').click(function() {
				submit();
			});

			$('.form-input').click(function() {
				$(this).removeClass('input-error');
			});
		}

		function init() {
			tinymce.init({
				selector: 'textarea#section-description',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			tinymce.init({
				selector: 'textarea#section-description-lang',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			$('.ui.search.dropdown.form-input').dropdown('clear');
		}

		function reset() {
			$('#section-name').val("<?= $section->name; ?>");
			$('#section-title').val("<?= $section->title; ?>");
			$('#section-subtitle').val("<?= $section->subtitle; ?>");
			$('#section-custom-text-1').val("<?= $section->custom_text_1; ?>");
			$('#section-custom-text-2').val("<?= $section->custom_text_2; ?>");
			$('#section-link').val("<?= $section->link; ?>");

			$('#section-name-lang').val("<?= $section->name_lang; ?>");
			$('#section-title-lang').val("<?= $section->title_lang; ?>");
			$('#section-subtitle-lang').val("<?= $section->subtitle_lang; ?>");
			$('#section-custom-text-1-lang').val("<?= $section->custom_text_1_lang; ?>");
			$('#section-custom-text-2-lang').val("<?= $section->custom_text_2_lang; ?>");

			$('#main-image').val("");
			$('#preview').data('image_id', 0);

			<? if ($section->image_name != ''): ?>
				$('.preview').remove();
				var image = '<img class="preview" src="<?= base_url(); ?>images/website/<?= $section->image_name; ?>">';
				$('#preview').append(image);
			<? endif; ?>
		}

		function submit() {
			var sectionName = $('#section-name').val();
			var sectionTitle = $('#section-title').val();
			var sectionSubtitle = $('#section-subtitle').val();
			var sectionCustomText1 = $('#section-custom-text-1').val();
			var sectionCustomText2 = $('#section-custom-text-2').val();
			var sectionLink = $('#section-link').val();
			var sectionDescription = '';

			var sectionNameLang = $('#section-name-lang').val();
			var sectionTitleLang = $('#section-title-lang').val();
			var sectionSubtitleLang = $('#section-subtitle-lang').val();
			var sectionCustomText1Lang = $('#section-custom-text-1-lang').val();
			var sectionCustomText2Lang = $('#section-custom-text-2-lang').val();
			var sectionDescriptionLang = '';

			<? if ($section->no_description <= 0): ?>
				sectionDescription = tinyMCE.get('section-description').getContent();
				sectionDescriptionLang = tinyMCE.get('section-description-lang').getContent();
			<? endif; ?>

			var imageId = $('#preview').data('image_id');

			var found = 0;

			$.each($('.data-important'), function(key, data) {
				if ($(data).val() == '') {
					found += 1;

					$(data).addClass('input-error');
				}
			});

			if (found > 0) {
				return;
			}

			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					name: sectionName,
					title: sectionTitle,
					subtitle: sectionSubtitle,
					custom_text_1: sectionCustomText1,
					custom_text_2: sectionCustomText2,
					description: sectionDescription,
					link: sectionLink,
					name_lang: sectionNameLang,
					title_lang: sectionTitleLang,
					subtitle_lang: sectionSubtitleLang,
					custom_text_1_lang: sectionCustomText1Lang,
					custom_text_2_lang: sectionCustomText2Lang,
					description_lang: sectionDescriptionLang,
					image_id: imageId,
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
						$('.ui.text.loader').html('Redirecting...');

						back();
					}
					else {
						$('.ui.dimmer.all-loader').dimmer('hide');
						$('.ui.basic.modal.all-error').modal('show');
						$('.all-error-text').html(data.message);
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>section/ajax_edit/<?= $section->id; ?>/',
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
					<div class="header">Edit section</div>
				</div>
				<div class="form-content">
					<div class="ui form">
						<h4 class="ui dividing header">Content - <?= $setting->setting__system_language; ?></h4>
						<? if ($section->no_name <= 0): ?>
							<div class="field">
								<label>Name</label>
								<input id="section-name" class="form-input" placeholder="Name.." type="text">
							</div>
						<? endif; ?>
						<div class="field">
							<? if ($section->no_title <= 0 && $section->no_subtitle <= 0): ?>
								<div class="two fields">
									<div class="field">
										<label>Title</label>
										<input id="section-title" class="form-input data-important" placeholder="Title.." type="text">
									</div>
									<div class="field">
										<label>Subtitle</label>
										<input id="section-subtitle" class="form-input" placeholder="Subtitle.." type="text">
									</div>
								</div>
							<? else: ?>
								<? if ($section->no_title <= 0): ?>
									<div class="field">
										<label>Title</label>
										<input id="section-title" class="form-input data-important" placeholder="Title.." type="text">
									</div>
								<? endif; ?>

								<? if ($section->no_subtitle <= 0): ?>
									<div class="field">
										<label>Subtitle</label>
										<input id="section-subtitle" class="form-input" placeholder="Subtitle.." type="text">
									</div>
								<? endif; ?>
							<? endif; ?>

							<? if ($section->no_custom_text_1 <= 0 && $section->no_custom_text_2 <= 0): ?>
								<div class="two fields">
									<div class="field">
										<label>Custom Text 1</label>
										<input id="section-custom-text-1" class="form-input" placeholder="Custom Text 1.." type="text">
									</div>
									<div class="field">
										<label>Custom Text 2</label>
										<input id="section-custom-text-2" class="form-input" placeholder="Custom Text 1.." type="text">
									</div>
								</div>
							<? else: ?>
								<? if ($section->no_custom_text_1 <= 0): ?>
									<div class="field">
										<label>Custom Text 1</label>
										<input id="section-custom-text-1" class="form-input" placeholder="Custom Text 1.." type="text">
									</div>
								<? endif; ?>

								<? if ($section->no_custom_text_2 <= 0): ?>
									<div class="field">
										<label>Custom Text 2</label>
										<input id="section-custom-text-2" class="form-input" placeholder="Custom Text 2.." type="text">
									</div>
								<? endif; ?>
							<? endif; ?>
						</div>

						<? if ($section->no_description <= 0): ?>
							<div class="field">
								<label>Description</label>
								<textarea id="section-description" class="form-input" placeholder="Description.."><?= $section->description; ?></textarea>
							</div>
						<? endif; ?>

						<? if ($section->no_link <= 0): ?>
							<div class="field">
								<label>Custom Link</label>
								<input id="section-link" class="form-input" placeholder="Custom Link.." type="text" >
							</div>
						<? endif; ?>

						<? if ($setting->setting__website_enabled_dual_language > 0): ?>
							<h4 class="ui dividing header">Content - <?= $setting->setting__system_language2; ?></h4>
							<? if ($section->no_name <= 0): ?>
								<div class="field">
									<label>Name</label>
									<input id="section-name-lang" class="form-input" placeholder="Name.." type="text">
								</div>
							<? endif; ?>

							<div class="field">
								<? if ($section->no_title <= 0 && $section->no_subtitle <= 0): ?>
									<div class="two fields">
										<div class="field">
											<label>Title</label>
											<input id="section-title-lang" class="form-input" placeholder="Title.." type="text">
										</div>
										<div class="field">
											<label>Subtitle</label>
											<input id="section-subtitle-lang" class="form-input" placeholder="Subtitle.." type="text">
										</div>
									</div>
								<? else: ?>
									<? if ($section->no_title <= 0): ?>
										<div class="field">
											<label>Title</label>
											<input id="section-title-lang" class="form-input" placeholder="Title.." type="text">
										</div>
									<? endif; ?>

									<? if ($section->no_subtitle <= 0): ?>
										<div class="field">
											<label>Subtitle</label>
											<input id="section-subtitle-lang" class="form-input" placeholder="Subtitle.." type="text">
										</div>
									<? endif; ?>
								<? endif; ?>

								<? if ($section->no_custom_text_1 <= 0 && $section->no_custom_text_2 <= 0): ?>
									<div class="two fields">
										<div class="field">
											<label>Custom Text 1</label>
											<input id="section-custom-text-1-lang" class="form-input" placeholder="Custom Text 1.." type="text">
										</div>
										<div class="field">
											<label>Custom Text 2</label>
											<input id="section-custom-text-2-lang" class="form-input" placeholder="Custom Text 1.." type="text">
										</div>
									</div>
								<? else: ?>
									<? if ($section->no_custom_text_1 <= 0): ?>
										<div class="field">
											<label>Custom Text 1</label>
											<input id="section-custom-text-1-lang" class="form-input" placeholder="Custom Text 1.." type="text">
										</div>
									<? endif; ?>

									<? if ($section->no_custom_text_2 <= 0): ?>
										<div class="field">
											<label>Custom Text 2</label>
											<input id="section-custom-text-2-lang" class="form-input" placeholder="Custom Text 2.." type="text">
										</div>
									<? endif; ?>
								<? endif; ?>
							</div>
						<? endif; ?>

						<? if ($section->no_description <= 0): ?>
							<div class="field">
								<label>Description</label>
								<textarea id="section-description-lang" class="form-input" placeholder="Description.."><?= $section->description_lang; ?></textarea>
							</div>
						<? endif; ?>

						<? if ($section->no_image <= 0): ?>
							<h4 class="ui dividing header">Upload Image</h4>
							<div class="field">
								<label>Upload Image <span class="color-red">*</span></label>
								<div>Recommended Size: 1020px x 530px</div>
								<div style="padding-bottom: 5px;">Max File Size: 500mb</div>
								<input id="main-image" class="form-input" placeholder="Upload Image.." type="File" accept=".png, .jpg, .jpeg">
							</div>
							<div class="field">
								<label>Preview Image</label>
								<div id="preview"></div>
							</div>
						<? endif; ?>
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