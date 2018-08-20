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
			window.location.href = '<?= base_url(); ?>career/view/1/';
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
				selector: 'textarea',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			$('.ui.search.dropdown.form-input').dropdown('clear');

			$('#career-date').datepicker({
                dateFormat: 'yy-mm-dd'
            });

            $('#career-date-to').datepicker({
                dateFormat: 'yy-mm-dd'
            });
		}

		function reset() {
			$('#career-name').val("");
			$('#career-name-code').val("");
			$('#career-date').val("");
			$('#career-date-to').val("");
			$('#career-content').val("");
			$('#career-job-description').val("");
			$('#career-qualification').val("");

			$('#career-name-lang').val("");
			$('#career-name-code-lang').val("");
			$('#career-content-lang').val("");
			$('#career-job-description-lang').val("");
			$('#career-qualification-lang').val("");

			$('#career-metatag-title').val("");
			$('#career-metatag-author').val("");
			$('#career-metatag-keywords').val("");
			$('#career-metatag-description').val("");

			$('#main-image').val("");
			$('#preview').data('image_id', 0);
		}

		function submit() {
			var careerName = $('#career-name').val();
			var careerNameCode = $('#career-name-code').val();
			var careerDate = $('#career-date').val();
			var careerDateTo = $('#career-date-to').val();
			var careerContent = tinyMCE.get('career-content').getContent();
			var careerJobDescription = tinyMCE.get('career-job-description').getContent();
			var careerQualification = tinyMCE.get('career-qualification').getContent();

			var careerNameLang = $('#career-name-lang').val();
			var careerNameCodeLang = $('#career-name-code-lang').val();
			var careerContentLang = tinyMCE.get('career-content-lang').getContent();
			var careerJobDescriptionLang = tinyMCE.get('career-job-description-lang').getContent();
			var careerQualificationLang = tinyMCE.get('career-qualification-lang').getContent();

			var careerMetatagTitle = $('#career-metatag-title').val();
			var careerMetatagAuthor = $('#career-metatag-author').val();
			var careerMetatagKeywords = $('#career-metatag-keywords').val();
			var careerMetatagDescription = $('#career-metatag-description').val();

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
					name: careerName,
					name_code: careerNameCode,
					date: careerDate,
					date_to: careerDateTo,
					description: careerContent,
					job_description: careerJobDescription,
					qualification: careerQualification,
					name_lang: careerNameLang,
					name_code_lang: careerNameCodeLang,
					description_lang: careerContentLang,
					job_description_lang: careerJobDescriptionLang,
					qualification_lang: careerQualificationLang,
					metatag_title: careerMetatagTitle,
					metatag_author: careerMetatagAuthor,
					metatag_keywords: careerMetatagKeywords,
					metatag_description: careerMetatagDescription,
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
				url : '<?= base_url() ?>career/ajax_add/',
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
					<div class="header">Add Career</div>
				</div>
				<div class="form-content">
					<div class="ui form">
						<h4 class="ui dividing header">career - <?= $setting->setting__system_language; ?></h4>
						<div class="field">
							<div class="two fields">
								<div class="field">
									<label>Title <span class="color-red">*</span></label>
									<input id="career-name" class="form-input data-important" placeholder="Name.." type="text">
								</div>
								<div class="field">
									<label>Title Code<span class="color-red">*</span></label>
									<input id="career-name-code" class="form-input" placeholder="Code.." type="text">
								</div>
							</div>
							<div class="field">
								<label>Content <span class="color-red">*</span></label>
								<textarea id="career-content" class="form-input" placeholder="Content.." type="text"></textarea>
							</div>
							<div class="two fields">
								<div class="field">
									<label>Date From<span class="color-red">*</span></label>
									<input id="career-date" class="form-input data-important" placeholder="Date.." type="text">
								</div>
								<div class="field">
									<label>Date To<span class="color-red">*</span></label>
									<input id="career-date-to" class="form-input data-important" placeholder="Date.." type="text">
								</div>
							</div>
							<div class="two fields">
								<div class="field">
									<label>Job Description <span class="color-red">*</span></label>
									<textarea id="career-job-description" class="form-input" placeholder="Job desc.." type="text"></textarea>
								</div>
								<div class="field">
									<label>Qualification <span class="color-red">*</span></label>
									<textarea id="career-qualification" class="form-input" placeholder="Qualification.." type="text"></textarea>
								</div>
							</div>
						</div>

						<h4 class="ui dividing header">career - <?= $setting->setting__system_language2; ?></h4>
						<div class="field">
							<div class="field">
								<label>career Name</label>
								<input id="career-name-lang" class="form-input" placeholder="Name.." type="text">
							</div>
							<div class="field">
								<label>Content</label>
								<textarea id="career-content-lang" class="form-input" placeholder="Content.." type="text"></textarea>
							</div>
							<div class="two fields">
								<div class="field">
									<label>Job Description</label>
									<textarea id="career-job-description-lang" class="form-input" placeholder="Job desc.." type="text"></textarea>
								</div>
								<div class="field">
									<label>Qualification</label>
									<textarea id="career-qualification-lang" class="form-input" placeholder="Qualification.." type="text"></textarea>
								</div>
							</div>
						</div>

						<h4 class="ui dividing header">Meta Tag</h4>
						<div class="field">
							<div class="three fields">
								<div class="field">
									<label>Meta Tag Title</label>
									<input id="career-metatag-title" class="form-input" placeholder="Meta Tag Title.." type="text">
								</div>
								<div class="field">
									<label>Meta Tag Author</label>
									<input id="career-metatag-author" class="form-input" placeholder="Meta Tag Author.." type="text">
								</div>
								<div class="field">
									<label>Meta Tag Keywords</label>
									<input id="career-metatag-keywords" class="form-input" placeholder="Meta Tag Keywords.." type="text">
								</div>
							</div>
							<div class="field">
								<label>Meta Tag Description</label>
								<input id="career-metatag-description" class="form-input" placeholder="Meta Tag Description.." type="text">
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