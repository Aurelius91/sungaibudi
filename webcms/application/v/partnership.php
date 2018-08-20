	<style type="text/css">
	</style>

	<script type="text/javascript">
		$(function() {
			reset();
			init();
			partnershipKeypress();
			partnershipClick();
			onChange();
		});

		var filterQuery = '<?= $filter; ?>';

		function changeFilter(f) {
			filterQuery = f;
		}

		function addPartnership() {
			var partnershipName = $('#partnership-name-add').val();
			var partnershipImage = $('#partnership-image-add').data('image_id');
			var found = 0;

			$.each($('.data-important-add'), function(key, data) {console.log($(this));
				if ($(data).val() == '') {
					found += 1;

					$('.color-red.warning').html('This Field Must Be Filled');
				}
			});

			if (found > 0) {
				return;
			}

			$('.add-partnership-modal').modal('hide');
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					name: partnershipName,
					image_id: partnershipImage,
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

						$('.add-partnership-modal').modal({
							inverted: true,
						}).modal('show');
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>partnership/ajax_add/',
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

		function deletePartnership() {
			var partnershipId = $('.delete-partnership-button').attr('data-partnership-id');
			var partnershipUpdated = $('.delete-partnership-button').attr('data-partnership-updated');

			$('.ui.basic.modal.modal-warning-delete').modal('hide');
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					updated: partnershipUpdated,
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
				url : '<?= base_url() ?>partnership/ajax_delete/'+ partnershipId +'/',
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

		function editPartnership() {
			var partnershipName = $('#partnership-name-edit').val();
			var partnershipImage = $('#partnership-image-edit').data('image_id');
			var partnershipId = $('#partnership-name-edit').data('partnership_id');
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

			$('.edit-partnership-modal').modal('hide');
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					name: partnershipName,
					image_id: partnershipImage,
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

						$('.edit-partnership-modal').modal({
							inverted: true,
						}).modal('show');
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>partnership/ajax_edit/'+ partnershipId +'/',
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

			window.location.href = '<?= base_url(); ?>partnership/view/'+ page +'/'+ filterQuery +'/'+ searchQuery +'/';
		}

		function getPartnership(partnershipId) {
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
						$('#partnership-name-edit').val(data.partnership.name);
						$('#partnership-name-edit').data('partnership_id', partnershipId);
						$('#partnership-image-edit').val("");
						$('#partnership-image-edit').data('image_id', 0);

						$('.edit-partnership-modal').modal({
							inverted: false,
						}).modal('show');
					}
					else {
						$('.ui.dimmer.all-loader').dimmer('hide');
						$('.color-red.warning').html(data.message);

						$('.add-partnership-modal').modal({
							inverted: true,
						}).modal('show');
					}
				},
				type : 'POST',
				url : '<?= base_url() ?>partnership/ajax_get/'+ partnershipId +'/',
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

		function onChange() {
			$('#partnership-image-add').change(function() {
				var file_data = $('#partnership-image-add').prop('files')[0];
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
							$('#partnership-image-add').data('image_id', data.image_id);

							alert('Image Uploaded');
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

			$('#partnership-image-edit').change(function() {
				var file_data = $('#partnership-image-edit').prop('files')[0];
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
							$('#partnership-image-edit').data('image_id', data.image_id);

							alert('Image Uploaded');
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

		function reset() {
			$('.input-search').val("<?= $query; ?>");
			$('#input-page').val("<?= $page; ?>");

			$('#partnership-name-add').val("");

			$('#partnership-image-add').data('image_id', 0);
			$('#partnership-image-add').val("");
		}

		function partnershipClick() {
			$('.button-prev').click(function() {
				var page = parseInt('<?= $page; ?>');

				page = page - 1 ;

				if (page <= 0) {
					return;
				}

				filter(page);
			});

			$('.button-next').click(function() {
				var page = parseInt('<?= $page; ?>');
				var maxPage = parseInt('<?= $count_page; ?>');

				page = page + 1 ;

				if (page > maxPage) {
					return;
				}

				filter(page);
			});

			$('.item-add-button').click(function() {
				$('#partnership-name-add').val("");
				$('.color-red.warning').html("");

				$('.add-partnership-modal').modal({
					inverted: true,
				}).modal('show');
			});

			$('.open-modal-warning-delete').click(function() {
				var partnershipId = $(this).attr('data-partnership-id');
				var partnershipName = $(this).attr('data-partnership-name');
				var partnershipUpdated = $(this).attr('data-partnership-updated');

				$('.delete-partnership-title').html('Delete partnership ' + partnershipName);
				$('.delete-partnership-button').attr('data-partnership-id', partnershipId);
				$('.delete-partnership-button').attr('data-partnership-updated', partnershipUpdated);

				$('.ui.basic.modal.modal-warning-delete').modal('show');
			});
		}

		function partnershipKeypress() {
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
	</script>

	<!-- Dashboard Here -->
	<div class="ui basic modal modal-warning-delete">
		<div class="ui icon header">
			<i class="trash outline icon delete-icon"></i>
			<span class="delete-partnership-title">Delete Partnership</span>
		</div>
		<div class="content text-center">
			<p>You're about to delete this partnership. You will not be able to undo this action. Are you sure?</p>
		</div>
		<div class="actions">
			<div class="ui red basic cancel inverted button">
				<i class="remove icon"></i>
				No
			</div>
			<div class="ui green ok inverted button delete-partnership-button" onclick="deletePartnership();">
				<i class="checkmark icon"></i>
				Yes
			</div>
		</div>
	</div>

	<div class="ui modal add-partnership-modal">
		<i class="close icon"></i>
		<div class="header">Add Partnership</div>
		<div class="form-content content">
			<div class="form-add">
				<div class="form-content">
					<div class="ui form">
						<div class="two fields">
							<div class="field">
								<label>Name <span class="color-red warning"></label>
								<input id="partnership-name-add" type="text" class="data-important-add" placeholder="Name..">
							</div>
							<div class="field">
								<label>Upload Image <span class="color-red warning"></label>
								<input id="partnership-image-add" type="file" class="" placeholder="Upload Image.." accept="image/*">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="actions text-right">
				<div class="ui deny button form-button">Exit</div>
				<div class="ui button form-button" onclick="addPartnership();">Submit</div>
			</div>
		</div>
	</div>

	<div class="ui modal edit-partnership-modal">
		<i class="close icon"></i>
		<div class="header">Edit Partnership</div>
		<div class="form-content content">
			<div class="form-add">
				<div class="form-content">
					<div class="ui form">
						<div class="two fields">
							<div class="field">
								<label>Name <span class="color-red warning"></label>
								<input id="partnership-name-edit" class="data-important-edit" placeholder="Name..">
							</div>
							<div class="field">
								<label>Upload Image <span class="color-red warning"></label>
								<input id="partnership-image-edit" type="file" class="" placeholder="Upload Image.." accept="image/*">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="actions text-right">
				<div class="ui deny button form-button">Exit</div>
				<div class="ui button form-button" onclick="editPartnership();">Submit</div>
			</div>
		</div>
	</div>

	<div class="main-content">
		<div class="ui top attached menu table-menu">
			<div class="item">
				Partnership List
			</div>
			<div class="right menu">
				<? if (isset($acl['website']) && $acl['website']->add > 0): ?>
					<a class="item item-add-button">
						<i class="add circle icon"></i> Add Partnership
					</a>
				<? endif; ?>
				<div class="item">
					<div class="ui dropdown dropdown-filter">
						<div class="text"><?= ucwords($filter); ?></div>
						<i class="dropdown icon"></i>
						<div class="menu">
							<div class="item" onclick="changeFilter('all');">All</div>
						</div>
					</div>
				</div>
				<div class="ui right aligned partnership search item search-item-container">
					<div class="ui transparent icon input">
						<input class="input-search" placeholder="Search..." type="text">
						<i class="search link icon"></i>
					</div>
					<div class="results"></div>
				</div>
			</div>
		</div>
		<div class="ui bottom attached segment table-segment">
			<table class="ui striped selectable celled table">
				<thead>
					<tr>
						<th class="td-icon">Action</th>
						<th>Image</th>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<? if (count($arr_partnership) <= 0): ?>
						<tr>
							<td colspan="3">No Result Founds</td>
						</tr>
					<? else: ?>
						<? foreach ($arr_partnership as $partnership): ?>
							<tr>
								<td class="td-icon">
									<? if (isset($acl['website']) && $acl['website']->edit > 0): ?>
										<a onclick="getPartnership('<?= $partnership->id; ?>');">
											<span class="table-icon" data-content="Edit Partnership">
												<i class="edit icon"></i>
											</span>
										</a>
									<? endif; ?>

									<? if (isset($acl['website']) && $acl['website']->delete > 0): ?>
										<a class="open-modal-warning-delete" data-partnership-id="<?= $partnership->id; ?>" data-partnership-name="<?= $partnership->name; ?>" data-partnership-updated="<?= $partnership->updated; ?>">
											<span class="table-icon" data-content="Delete Partnership">
												<i class="trash outline icon"></i>
											</span>
										</a>
									<? endif; ?>
								</td>
								<td>
									<? if ($partnership->image_name != ''): ?>
										<img src="<?= base_url(); ?>images/website/<?= $partnership->image_name; ?>" style="height: 120px;">
									<? endif; ?>
								</td>
								<td><?= $partnership->name; ?></td>

							</tr>
						<? endforeach; ?>
					<? endif; ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="3">
							<button class="ui button button-prev">Prev</button>
							<span>
								<div class="ui input input-page">
									<input id="input-page" placeholder="" type="text">
								</div> / <?= $count_page; ?>
							</span>
							<button class="ui button button-next">Next</button>
						</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</body>
</html>