	<style type="text/css">
	</style>

	<script type="text/javascript">
		$(function() {
			reset();
			init();
			slideshowKeypress();
			slideshowClick();
		});

		function changeFilter(f) {
			filterQuery = f;
		}

		function addslideshow() {
			var slideshowName = $('#project-image-name-add').val();
			var found = 0;

			$.each($('.data-important-add'), function(key, data) {
				if ($(data).val() == '') {
					found += 1;

					$('.color-red.warning').html('This Field Must Be Filled');
				}
			});

			if (found > 0) {
				return;
			}

			$('.add-project-image-modal').modal('hide');
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					name: slideshowName,
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

						window.location.reload();
					}
					else {
						$('.ui.dimmer.all-loader').dimmer('hide');
						$('.color-red.warning').html(data.message);

						$('.add-project-image-modal').modal({
							inverted: true,
						}).modal('show');
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>project_image/ajax_add/',
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

		function deleteSlideshow() {
			var slideshowId = $('.delete-project-image-button').attr('data-project-image-id');
			var slideshowUpdated = $('.delete-project-image-button').attr('data-project-image-updated');

			$('.ui.basic.modal.modal-warning-delete').modal('hide');
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					updated: slideshowUpdated,
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

						window.location.reload();
					}
					else {
						$('.ui.dimmer.all-loader').dimmer('hide');
						$('.ui.basic.modal.all-error').modal('show');
						$('.all-error-text').html(data.message);
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>image/ajax_delete/'+ slideshowId +'/',
				xhr: function() {
					var percentage = 0;
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener('progress', function(evt) {
						$('.ui.text.loader').html('Validating Data..');
					}, false);

					xhr.addEventListener('progress', function(evt) {
						$('.ui.text.loader').html('Delete Data from Database...');
					}, false);

					return xhr;
				},
			});
		}

		function editslideshow() {
			var slideshowName = $('#project-image-name-edit').val();
			var slideshowId = $('#project-image-name-edit').data('project_image_id');
			var found = 0;

			$.each($('.data-important-edit'), function(key, data) {
				if ($(data).val() == '') {
					found += 1;

					$('.color-red.warning').html('This Field Must Be Filled');
				}
			});

			if (found > 0) {
				return;
			}

			$('.edit-project-image-modal').modal('hide');
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					name: slideshowName,
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

						window.location.reload();
					}
					else {
						$('.ui.dimmer.all-loader').dimmer('hide');
						$('.color-red.warning').html(data.message);

						$('.edit-project-image-modal').modal({
							inverted: true,
						}).modal('show');
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>project_image/ajax_edit/'+ slideshowId +'/',
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

		function filter(page) {
			var searchQuery = ($('.input-search').val() == '') ? '' : $.base64('encode', $('.input-search').val());

			window.location.href = '<?= base_url(); ?>project_image/view/'+ page +'/'+ filterQuery +'/'+ searchQuery +'/';
		}

		function getslideshow(slideshowId) {
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
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
						$('.ui.dimmer.all-loader').dimmer('hide');

						$('#project-image-name-edit').val(data.project_image.name);
						$('#project-image-name-edit').data('project_image_id', slideshowId);

						$('.edit-project-image-modal').modal({
							inverted: true,
						}).modal('show');
					}
					else {
						$('.ui.dimmer.all-loader').dimmer('hide');
						$('.color-red.warning').html(data.message);

						$('.add-project-image-modal').modal({
							inverted: true,
						}).modal('show');
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>project_image/ajax_get/'+ slideshowId +'/',
				xhr: function() {
					var percentage = 0;
					var xhr = new window.XMLHttpRequest();

					xhr.upload.addEventListener('progress', function(evt) {
						$('.ui.text.loader').html('Checking Data..');
					}, false);

					xhr.addEventListener('progress', function(evt) {
						$('.ui.text.loader').html('Retrieving Data...');
					}, false);

					return xhr;
				},
			});
		}

		function init() {
			$('.dropdown-search, .dropdown-filter').dropdown({
				allowAdditions: true
			});
			$('.ui.search.dropdown.form-input').dropdown('clear');
		}

		function reset() {
			$('#project-image-name-add').val("");
		}

		function slideshowClick() {
			$('.item-add-button').click(function() {
				$('#project-image-name-add').val("");
				$('.color-red.warning').html("");

				$('.add-project-image-modal').modal({
					inverted: true,
				}).modal('show');
			});

			$('.open-modal-warning-delete').click(function() {
				var slideshowId = $(this).attr('data-project-image-id');
				var slideshowName = $(this).attr('data-project-image-name');
				var slideshowUpdated = $(this).attr('data-project-image-updated');

				$('.delete-project-image-title').html('Delete project_image ' + slideshowName);
				$('.delete-project-image-button').attr('data-project-image-id', slideshowId);
				$('.delete-project-image-button').attr('data-project-image-updated', slideshowUpdated);

				$('.ui.basic.modal.modal-warning-delete').modal('show');
			});
		}

		function slideshowKeypress() {
			$('.input-search').keypress(function(e) {
				if (e.which == 13) {
					var page = 1;

					filter(page);
				}
			});

			$('#input-page').keypress(function(e) {
				if (e.which == 13) {
					var page = $('#input-page').val();

					filter(page);
				}
			});
		}

		function uploadslideshow() {
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			var file_data = $('#project-image-name-add').prop('files')[0];
			var form_data = new FormData();
			form_data.append('file', file_data);
			form_data.append("<?= $csrf['name'] ?>", "<?= $csrf['hash'] ?>");

			var page = $('#page-option').val();

			$('.bar').width(0);
			$('#loading').modal('show');

			$.ajax({
				cache: false,
				contentType: false,
				data: form_data,
				dataType: 'JSON',
				error: function() {
					$('.ui.dimmer.all-loader').dimmer('hide');
					$('.ui.basic.modal.all-error').modal('show');
					$('.all-error-text').html('Server Error.');
				},
				processData: false,
				type: 'post',
				success: function(data) {
					if (data.status == 'success') {
						$('.ui.text.loader').html('Redirecting...');

						window.location.reload();
					}
					else {
						$('.ui.dimmer.all-loader').dimmer('hide');
						$('.color-red.warning').html(data.message);

						$('.add-project-image-modal').modal({
							inverted: true,
						}).modal('show');
					}
				},
				url: '<?= base_url(); ?>image/ajax_upload_all/Slider/'+ page + '/',
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
		}
	</script>

	<!-- Dashboard Here -->
	<div class="ui basic modal modal-warning-delete">
		<div class="ui icon header">
			<i class="trash outline icon delete-icon"></i>
			<span class="delete-project-image-title">Delete project Image</span>
		</div>
		<div class="content text-center">
			<p>You're about to delete this project Image. You will not be able to undo this action. Are you sure?</p>
		</div>
		<div class="actions">
			<div class="ui red basic cancel inverted button">
				<i class="remove icon"></i>
				No
			</div>
			<div class="ui green ok inverted button delete-project-image-button" onclick="deleteSlideshow();">
				<i class="checkmark icon"></i>
				Yes
			</div>
		</div>
	</div>

	<div class="ui modal add-project-image-modal">
		<i class="close icon"></i>
		<div class="header">Add Slideshow</div>
		<div class="form-content content">
			<div class="form-add">
				<div class="form-content">
					<div class="ui form">
						<div class="field">
							<label>Image <span class="color-red warning"></label>
							<input id="project-image-name-add" type="file" accept="image/*" class="data-important-add" placeholder="Name..">
						</div>
						<div class="field">
							<label>Page</label>
							<div id="page-container" class="ui search selection dropdown form-input">
								<input id="page-option" type="hidden">
								<i class="dropdown icon"></i>
								<div class="default text">-- Page --</div>
								<div class="menu">
									<div class="item" data-value="About-History">About - History</div>
									<div class="item" data-value="About-VisionMission">About - Vision Mission</div>
									<div class="item" data-value="About-Management">About - Management</div>
									<div class="item" data-value="Product">Product</div>
									<div class="item" data-value="Newsandevents">News and Events</div>
									<div class="item" data-value="Career">Career</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="actions text-right">
				<div class="ui deny button form-button">Exit</div>
				<div class="ui button form-button" onclick="uploadslideshow();">Submit</div>
			</div>
		</div>
	</div>

	<div class="main-content">
		<div class="ui top attached menu table-menu">
			<div class="item">
				Slideshow
			</div>
			<div class="right menu">
				<? if (isset($acl['website']) && $acl['website']->add > 0): ?>
					<a class="item item-add-button">
						<i class="add circle icon"></i> Add Slideshow
					</a>
				<? endif; ?>
			</div>
		</div>
		<div class="ui bottom attached segment table-segment">
			<table class="ui striped selectable celled table">
				<thead>
					<tr>
						<th class="td-icon">Action</th>
						<th>Type</th>
						<th>Image</th>
						<th>Page</th>
					</tr>
				</thead>
				<tbody>
					<? if (count($arr_image) <= 0): ?>
						<tr>
							<td colspan="3">No Result Founds</td>
						</tr>
					<? else: ?>
						<? foreach ($arr_image as $image): ?>
							<tr>
								<td class="td-icon">
									<? if (isset($acl['website']) && $acl['website']->delete > 0): ?>
										<a class="open-modal-warning-delete" data-project-image-id="<?= $image->id; ?>" data-project-image-name="<?= $image->name; ?>" data-project-image-updated="<?= $image->updated; ?>">
											<span class="table-icon">
												<i class="trash outline icon"></i>
											</span>
										</a>
									<? endif; ?>
								</td>
								<td><?= $image->type; ?></td>
								<td>
									<a href="<?= base_url(); ?>images/website/<?= $image->image_name; ?>" target="_blank">
										<img src="<?= base_url(); ?>images/website/<?= $image->image_name; ?>" style="height: 75px;">
									</a>
								</td>
								<td>
									<?= $image->page; ?>
								</td>
							</tr>
						<? endforeach; ?>
					<? endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>