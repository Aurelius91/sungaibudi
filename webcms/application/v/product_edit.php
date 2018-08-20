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
			window.location.href = '<?= base_url(); ?>product/view/1/';
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
				selector: 'textarea#product-description',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			tinymce.init({
				selector: 'textarea#product-description-lang',
				height: 300,
				width: '100%',
				plugins: ["advlist autolink lists link charmap preview", "searchreplace visualblocks code", "table contextmenu paste"],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
				paste_as_text: true
			});

			$('.ui.search.dropdown.form-input').dropdown('clear');

			$('#product-date').datepicker({
                dateFormat: 'yy-mm-dd',
                maxDate: 0,
            });
		}

		function reset() {
			$('#product-name').val("<?= $product->name; ?>");
			$('#product-category-container').dropdown('set selected', "<?= $product->category_id; ?>");
			$('#product-corporate-container').dropdown('set selected', "<?= $product->corporate_id; ?>");

			$('#main-image').val("");
			$('#preview').data('image_id', 0);

			$('.preview').remove();

			var image = '<img class="preview" src="<?= base_url(); ?>images/website/<?= $product->image_name; ?>">';
			$('#preview').append(image);
		}

		function submit() {
			var productName = $('#product-name').val();
			var productDescription = tinyMCE.get('product-description').getContent();
			var productCategory = $('#product-category').val();
			var productCorporate = $('#product-corporate').val();

			var productDescriptionLang = tinyMCE.get('product-description-lang').getContent();

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
					category_id: productCategory,
					corporate_id: productCorporate,
					name: productName,
					description: productDescription,
					description_lang: productDescriptionLang,
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
				url : '<?= base_url() ?>product/ajax_edit/<?= $product->id; ?>/',
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
					<div class="header">Add Product</div>
				</div>
				<div class="form-content">
					<div class="ui form">
						<h4 class="ui dividing header">Product Details</h4>
						<div class="three fields">
							<div class="field">
								<label>Name <span class="color-red">*</span></label>
								<input id="product-name" class="form-input data-important" placeholder="Name.." type="text">
							</div>
							<div class="field">
								<label>Category</label>
								<div id="product-category-container" class="ui search selection dropdown form-input">
									<input id="product-category" type="hidden">
									<i class="dropdown icon"></i>
									<div class="default text">-- Category --</div>
									<div class="menu">
										<? foreach ($arr_category as $category): ?>
											<div class="item" data-value="<?= $category->id; ?>"><?= $category->name; ?></div>
										<? endforeach; ?>
									</div>
								</div>
							</div>
							<div class="field">
							<label>Corporate</label>
								<div id="product-corporate-container" class="ui search selection dropdown form-input">
									<input id="product-corporate" type="hidden">
									<i class="dropdown icon"></i>
									<div class="default text">-- Corporate --</div>
									<div class="menu">
										<? foreach ($arr_corporate as $corporate): ?>
											<div class="item" data-value="<?= $corporate->id; ?>"><?= $corporate->name; ?></div>
										<? endforeach; ?>
									</div>
								</div>
							</div>
						</div>

						<div class="two fields">
							<div class="field">
								<label>Description - <?= $setting->setting__system_language; ?></label>
								<textarea id="product-description" class="form-input" placeholder="Description - <?= $setting->setting__system_language; ?>.." type="text"><?= $product->description; ?></textarea>
							</div>
							<div class="field">
								<label>Description - <?= $setting->setting__system_language2; ?></label>
								<textarea id="product-description-lang" class="form-input" placeholder="Description - <?= $setting->setting__system_language2; ?>.." type="text"><?= $product->description_lang; ?></textarea>
							</div>
						</div>

						<h4 class="ui dividing header">Upload Image</h4>
						<div class="three fields">
							<div class="field">
								<label>Upload Image <span class="color-red">*</span></label>
								<div>Recommended Size: 1000px x 1000px</div>
								<div style="padding-bottom: 5px;">Max File Size: 500kb</div>
								<input id="main-image" class="form-input" placeholder="Upload Image.." type="File">
							</div>
						</div>

						<div class="three fields">
							<div class="field">
								<label>Preview Image</label>
								<div id="preview"></div>
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