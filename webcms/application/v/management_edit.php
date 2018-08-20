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
			window.location.href = '<?= base_url(); ?>management/view/1/';
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
				selector: 'textarea#management-content',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			tinymce.init({
				selector: 'textarea#management-content-lang',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			$('.ui.search.dropdown.form-input').dropdown('clear');

			$('#management-date').datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: 0,
            });
		}

		function reset() {
			$('#management-name').val("<?= $management->name; ?>");
			$('#management-job-title').val("<?= $management->job_title; ?>");
			$('#management-content').val("<?= $management->description; ?>");
			$('#management-type-container').dropdown('set selected', "<?= $management->type; ?>");

			$('#management-name-lang').val("<?= $management->name_lang; ?>");
			$('#management-content-lang').val("<?= $management->description_lang; ?>");

			$('#main-image').val("");
			$('#preview').data('image_id', 0);
			$('.preview').remove();

			var image = '<img class="preview" src="<?= base_url(); ?>images/website/<?= $management->image_name; ?>">';
			$('#preview').append(image);
		}

		function submit() {
			var managementName = $('#management-name').val();
			var managementJobTitle = $('#management-job-title').val();
			var managementContent = tinyMCE.get('management-content').getContent();
			var managementType = $('#management-type-option').val();

			var managementNameLang = $('#management-name-lang').val();
			var managementContentLang = tinyMCE.get('management-content-lang').getContent();
			var managementJobTitleLang = $('#management-job-title-lang').val();

			var imageId = $('#preview').data('image_id');

			var found = 0;

			$.each($('.data-important'), function(key, data) {
				if ($(data).val() == '') {
					found += 1;
					console.log($(data));

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
					name: managementName,
					job_title: managementJobTitle,
					description: managementContent,
					type: managementType,
					name_lang: managementNameLang,
					description_lang: managementContentLang,
					job_title_lang: managementJobTitleLang,
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
				url : '<?= base_url() ?>management/ajax_edit/<?= $management->id; ?>',
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
					<div class="header">Edit Management</div>
				</div>
				<div class="form-content">
					<div class="ui form">
						<h4 class="ui dividing header">management - <?= $setting->setting__system_language; ?></h4>
						<div class="field">
							<div class="two fields">
								<div class="field">
									<label>Name <span class="color-red">*</span></label>
									<input id="management-name" class="form-input data-important" placeholder="Name.." type="text">
								</div>
								<div class="field">
									<label>Job Title <span class="color-red">*</span></label>
									<input id="management-job-title" class="form-input data-important" placeholder="Job title.." type="text">
								</div>
							</div>
							<div class="field">
								<label>Type</label>
								<div id="management-type-container" class="ui search selection dropdown form-input">
									<input id="management-type-option" type="hidden">
									<i class="dropdown icon"></i>
									<div class="default text">-- Management Type --</div>
									<div class="menu">
										<div class="item" data-value="Board of Commisioners">Board of Commisioners</div>
										<div class="item" data-value="Board of Directors">Board of Directors</div>
									</div>
								</div>
							</div>
							<div class="field">
								<label>Content <span class="color-red">*</span></label>
								<textarea id="management-content" class="form-input" placeholder="Content.." type="text"></textarea>
							</div>
							
						</div>

						<h4 class="ui dividing header">management - <?= $setting->setting__system_language2; ?></h4>
						<div class="field">
							<div class="two fields">
								<div class="field">
									<label>Management Name</label>
									<input id="management-name-lang" class="form-input" placeholder="Name.." type="text">
								</div>
								<div class="field">
									<label>Job Title</label>
									<input id="management-job-title-lang" class="form-input" placeholder="Job title.." type="text">
								</div>
							</div>
							<div class="field">
								<label>Content</label>
								<textarea id="management-content-lang" class="form-input" placeholder="Content.." type="text"></textarea>
							</div>
						</div>

						<h4 class="ui dividing header">Upload Image</h4>
						<div class="field">
							<label>Upload Image <span class="color-red">*</span></label>
							<div>Recommended Size: 1020px x 530px</div>
							<div style="padding-bottom: 5px;">Max File Size: 500kb</div>
							<input id="main-image" class="form-input" placeholder="Upload Image.." type="File">
						</div>
						<div class="field">
							<label>Preview Image</label>
							<div id="preview"></div>
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