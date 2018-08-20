	<style type="text/css">
	</style>

	<script type="text/javascript">
		$(function() {
			reset();
			init();
			careerKeypress();
			careerClick();
		});

		var filterQuery = '<?= $filter; ?>';

		function changeFilter(f) {
			filterQuery = f;
		}

		function deleteCareer() {
			var careerId = $('.delete-career-button').attr('data-career-id');
			var careerUpdated = $('.delete-career-button').attr('data-career-updated');

			$('.ui.basic.modal.modal-warning-delete').modal('hide');
			$('.ui.text.loader').html('Connecting to Database...');
			$('.ui.dimmer.all-loader').dimmer('show');

			$.ajax({
				data :{
					updated: careerUpdated,
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
				url : '<?= base_url() ?>career/ajax_delete/'+ careerId +'/',
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

			window.location.href = '<?= base_url(); ?>career/view/'+ page +'/'+ filterQuery +'/'+ searchQuery +'/';
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

		function careerClick() {
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
				var careerId = $(this).attr('data-career-id');
				var careerName = $(this).attr('data-career-name');
				var careerUpdated = $(this).attr('data-career-updated');

				$('.delete-career-title').html('Delete career ' + careerName);
				$('.delete-career-button').attr('data-career-id', careerId);
				$('.delete-career-button').attr('data-career-updated', careerUpdated);

				$('.ui.basic.modal.modal-warning-delete').modal('show');
			});
		}

		function careerKeypress() {
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
			<span class="delete-career-title">Delete career</span>
		</div>
		<div class="content text-center">
			<p>You're about to delete this career. You will not be able to undo this action. Are you sure?</p>
		</div>
		<div class="actions">
			<div class="ui red basic cancel inverted button">
				<i class="remove icon"></i>
				No
			</div>
			<div class="ui green ok inverted button delete-career-button" onclick="deleteCareer();">
				<i class="checkmark icon"></i>
				Yes
			</div>
		</div>
	</div>

	<div class="main-content">
		<div class="ui top attached menu table-menu">
			<div class="item item-add-button">
				In The career
			</div>
			<div class="right menu">
				<? if (isset($acl['career']) && $acl['career']->add != ''): ?>
					<a class="item item-add-button" href="<?= base_url(); ?>career/add/">
						<i class="add circle icon"></i> Add Career
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
						<th>Title</th>
						<th>Code</th>
						<th>Description</th>
						<th>Date From</th>
						<th>Date To</th>
						<th>Job Description</th>
						<th>Qualification</th>
					</tr>
				</thead>
				<tbody>
					<? if (count($arr_career) <= 0): ?>
						<tr>
							<td colspan="9">No Result Founds</td>
						</tr>
					<? else: ?>
						<? foreach ($arr_career as $career): ?>
							<tr>
								<td class="td-icon">
									<? if (isset($acl['career']) && $acl['career']->edit > 0): ?>
										<a href="<?= base_url(); ?>career/edit/<?= $career->id; ?>/">
											<span class="table-icon" data-content="Edit Career">
												<i class="edit icon"></i>
											</span>
										</a>
									<? endif; ?>

									<? if (isset($acl['career']) && $acl['career']->delete > 0): ?>
										<a class="open-modal-warning-delete" data-career-id="<?= $career->id; ?>" data-career-name="<?= $career->name; ?>" data-career-updated="<?= $career->updated; ?>">
											<span class="table-icon" data-content="Delete Career">
												<i class="trash outline icon"></i>
											</span>
										</a>
									<? endif; ?>
								</td>
								<td><?= $career->name; ?></td>
								<td><?= $career->name_code; ?></td>
								<td><?= $career->description; ?></td>
								<td><?= $career->date_display; ?></td>
								<td><?= $career->date_to_display; ?></td>
								<td><?= $career->job_description; ?></td>
								<td><?= $career->qualification; ?></td>
							</tr>
						<? endforeach; ?>
					<? endif; ?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="9">
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