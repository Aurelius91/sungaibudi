	<style type="text/css">
	</style>

	<script type="text/javascript">
		$(function() {
			reset();
			init();
			managementKeypress();
			managementClick();
		});

		var filterQuery = '<?= $filter; ?>';

		function changeFilter(f) {
			filterQuery = f;
		}

		function deleteManagement() {
			var managementId = $('.delete-management-button').attr('data-management-id');
			var managementUpdated = $('.delete-management-button').attr('data-management-updated');

			$('.ui.basic.modal.modal-warning-delete').modal('hide');
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					updated: managementUpdated,
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
				url : '<?= base_url() ?>management/ajax_delete/'+ managementId +'/',
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

		function filter(page) {
			var searchQuery = ($('.input-search').val() == '') ? '' : $.base64('encode', $('.input-search').val());

			window.location.href = '<?= base_url(); ?>management/view/'+ page +'/'+ filterQuery +'/'+ searchQuery +'/';
		}

		function init() {
			$('.dropdown-search, .dropdown-filter').dropdown({
				allowAdditions: true
			});
		}

		function reset() {
			$('.input-search').val("<?= $query; ?>");
			$('#input-page').val("<?= $page; ?>");
		}

		function managementClick() {
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

			$('.open-modal-warning-delete').click(function() {
				var managementId = $(this).attr('data-management-id');
				var managementName = $(this).attr('data-management-name');
				var managementUpdated = $(this).attr('data-management-updated');

				$('.delete-management-title').html('Delete management ' + managementName);
				$('.delete-management-button').attr('data-management-id', managementId);
				$('.delete-management-button').attr('data-management-updated', managementUpdated);

				$('.ui.basic.modal.modal-warning-delete').modal('show');
			});
		}

		function managementKeypress() {
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
			<span class="delete-management-title">Delete management</span>
		</div>
		<div class="content text-center">
			<p>You're about to delete this management. You will not be able to undo this action. Are you sure?</p>
		</div>
		<div class="actions">
			<div class="ui red basic cancel inverted button">
				<i class="remove icon"></i>
				No
			</div>
			<div class="ui green ok inverted button delete-management-button" onclick="deleteManagement();">
				<i class="checkmark icon"></i>
				Yes
			</div>
		</div>
	</div>

	<div class="main-content">
		<div class="ui top attached menu table-menu">
			<div class="item item-add-button">
				In The management
			</div>
			<div class="right menu">
				<? if (isset($acl['management']) && $acl['management']->add != ''): ?>
					<a class="item item-add-button" href="<?= base_url(); ?>management/add/">
						<i class="add circle icon"></i> Add management
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
				<div class="ui right aligned category search item search-item-container">
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
						<th>Job Title</th>
						<th>Description</th>
						<th>Type</th>
					</tr>
				</thead>
				<tbody>
					<? if (count($arr_management) <= 0): ?>
						<tr>
							<td colspan="6">No Result Founds</td>
						</tr>
					<? else: ?>
						<? foreach ($arr_management as $management): ?>
							<tr>
								<td class="td-icon">
									<? if (isset($acl['management']) && $acl['management']->edit > 0): ?>
										<a href="<?= base_url(); ?>management/edit/<?= $management->id; ?>/">
											<span class="table-icon" data-content="Edit management">
												<i class="edit icon"></i>
											</span>
										</a>
									<? endif; ?>

									<? if (isset($acl['management']) && $acl['management']->delete > 0): ?>
										<a class="open-modal-warning-delete" data-management-id="<?= $management->id; ?>" data-management-name="<?= $management->name; ?>" data-management-updated="<?= $management->updated; ?>">
											<span class="table-icon" data-content="Delete management">
												<i class="trash outline icon"></i>
											</span>
										</a>
									<? endif; ?>
								</td>
								<td>
									<img src="<?= base_url(); ?>images/website/<?= $management->image_name; ?>" style="height: 100px;">
								</td>
								<td><?= $management->name; ?></td>
								<td><?= $management->job_title; ?></td>
								<td><?= $management->description; ?></td>
								<td><?= $management->type; ?></td>
							</tr>
						<? endforeach; ?>
					<? endif; ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="6">
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