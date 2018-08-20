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
			window.location.href = '<?= base_url(); ?>news/view/1/';
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
				selector: 'textarea#news-content',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			tinymce.init({
				selector: 'textarea#news-content-lang',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			$('.ui.search.dropdown.form-input').dropdown('clear');

			$('#news-date').datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: 0,
            });
		}

		function reset() {
			$('#news-name').val("");
			$('#news-date').val("");
			$('#news-author').val("");
			$('#news-content').val("");

			$('#news-name-lang').val("");
			$('#news-content-lang').val("");

			$('#news-metatag-title').val("");
			$('#news-metatag-author').val("");
			$('#news-metatag-keywords').val("");
			$('#news-metatag-description').val("");

			$('#main-image').val("");
			$('#preview').data('image_id', 0);
		}

		function submit() {
			var newsName = $('#news-name').val();
			var newsDate = $('#news-date').val();
			var newsAuthor = $('#news-author').val();
			var newsContent = tinyMCE.get('news-content').getContent();

			var newsNameLang = $('#news-name-lang').val();
			var newsContentLang = tinyMCE.get('news-content-lang').getContent();

			var newsMetatagTitle = $('#news-metatag-title').val();
			var newsMetatagAuthor = $('#news-metatag-author').val();
			var newsMetatagKeywords = $('#news-metatag-keywords').val();
			var newsMetatagDescription = $('#news-metatag-description').val();

			var imageId = $('#preview').data('image_id');

			var found = 0;

			$.each($('.data-important'), function(key, data) {
				if ($(data).val() == '') {
					found += 1;
					console.log($(data));

					$(data).addClass('input-error');
				}
			});

			if (imageId <= 0) {
				found += 1;

				$('#main-image').addClass('input-error');
			}

			if (found > 0) {
				return;
			}

			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					name: newsName,
					date: newsDate,
					author: newsAuthor,
					description: newsContent,
					name_lang: newsNameLang,
					description_lang: newsContentLang,
					metatag_title: newsMetatagTitle,
					metatag_author: newsMetatagAuthor,
					metatag_keywords: newsMetatagKeywords,
					metatag_description: newsMetatagDescription,
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
				url : '<?= base_url() ?>news/ajax_add/',
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
					<div class="header">Add News & Events</div>
				</div>
				<div class="form-content">
					<div class="ui form">
						<h4 class="ui dividing header">News - <?= $setting->setting__system_language; ?></h4>
						<div class="field">
							<div class="field">
								<label>Title <span class="color-red">*</span></label>
								<input id="news-name" class="form-input data-important" placeholder="Name.." type="text">
							</div>
							<div class="two fields">
								<div class="field">
									<label>Date <span class="color-red">*</span></label>
									<input id="news-date" class="form-input data-important" placeholder="Date.." type="text">
								</div>
								<div class="field">
									<label>Author <span class="color-red">*</span></label>
									<input id="news-author" class="form-input data-important" placeholder="Author.." type="text">
								</div>
							</div>
							<div class="field">
								<label>Content <span class="color-red">*</span></label>
								<textarea id="news-content" class="form-input" placeholder="Content.." type="text"></textarea>
							</div>
						</div>

						<h4 class="ui dividing header">News - <?= $setting->setting__system_language2; ?></h4>
						<div class="field">
							<div class="field">
								<label>news Name</label>
								<input id="news-name-lang" class="form-input" placeholder="Name.." type="text">
							</div>
							<div class="field">
								<label>Content</label>
								<textarea id="news-content-lang" class="form-input" placeholder="Content.." type="text"></textarea>
							</div>
						</div>

						<h4 class="ui dividing header">Meta Tag</h4>
						<div class="field">
							<div class="three fields">
								<div class="field">
									<label>Meta Tag Title</label>
									<input id="news-metatag-title" class="form-input" placeholder="Meta Tag Title.." type="text">
								</div>
								<div class="field">
									<label>Meta Tag Author</label>
									<input id="news-metatag-author" class="form-input" placeholder="Meta Tag Author.." type="text">
								</div>
								<div class="field">
									<label>Meta Tag Keywords</label>
									<input id="news-metatag-keywords" class="form-input" placeholder="Meta Tag Keywords.." type="text">
								</div>
							</div>
							<div class="field">
								<label>Meta Tag Description</label>
								<input id="news-metatag-description" class="form-input" placeholder="Meta Tag Description.." type="text">
							</div>
						</div>

						<h4 class="ui dividing header">Upload Image</h4>
						<div class="field">
							<label>Upload Image <span class="color-red">*</span></label>
							<div>Recommended Size: 1020px x 530px</div>
							<div style="padding-bottom: 5px;">Max File Size: 500kb</div>
							<input id="main-image" class="form-input data-important" placeholder="Upload Image.." type="File">
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