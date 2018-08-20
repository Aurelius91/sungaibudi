<div id="menu-wrap" class="<? if ( $this->uri->segment(1)=="" || $this->uri->segment(1)=="newsandeventdetail" || $this->uri->segment(1)=="careerdetail"){echo "trans";} ?>" <? if ( $this->uri->segment(1)=="newsandeventdetail" || $this->uri->segment(1)=="careerdetail" ){echo "style='margin-top: 0 !important;'";} ?>>
	<a href="<?= base_url(); ?>">
		<div class="logo <? if ( $this->uri->segment(1)=="" ){echo "logo-pure";} ?>">
			<img src="<?= base_url(); ?>assets/images/main/logo.jpg">
		</div>
	</a>
	<div class="main-menu-wrap">
		<? foreach ($arr_header as $key => $header): ?>
			<? if ($key > 0): ?>
				<div class="menu-divider">
					<h5>|</h5>
				</div>
			<? endif; ?>

			<a href="<?= base_url(); ?><?= $header->link; ?>">
				<div class="main-menu <? if ($header->id == $header_id ): ?>menu-active<? endif; ?>">
					<? if ($lang == $setting->setting__system_language || $header->name_lang == ''): ?>
						<h5><?= $header->name; ?></h5>
					<? else: ?>
						<h5><?= $header->name_lang; ?></h5>
					<? endif; ?>
				</div>
			</a>
		<? endforeach; ?>
	</div>
	<div class="lang-wrap">
		<div class="lang">
			<a onclick="changeLanguage('<?= $setting->setting__system_language; ?>');">
				<div class="lang-inline <? if($setting->setting__system_language == $lang): ?>lang-active<? endif; ?>">
					<div class="lang-inside">
						<h5><?= $setting->setting__system_language; ?></h5>
					</div>
				</div>
			</a>
			<a onclick="changeLanguage('<?= $setting->setting__system_language2; ?>');">
				<div class="lang-inline <? if($setting->setting__system_language2 == $lang): ?>lang-active<? endif; ?>">
					<div class="lang-inside">
						<h5><?= $setting->setting__system_language2; ?></h5>
					</div>
				</div>
			</a>
		</div><!--
	 --><div class="search-wrap">
			<input type="text" class="form-control search-input" id="search" placeholder="Search">
			<button class="btn btn-search"><img src="<?= base_url(); ?>assets/images/main/loop.png"></button>
		</div>
	</div>
</div>


<div class="mobile-logo">
	<a href="<?= base_url(); ?>">
		<div class="logo <? if ( $this->uri->segment(1)=="" ){echo "logo-pure";} ?>">
			<img src="<?= base_url(); ?>assets/images/main/logo.jpg">
		</div>
	</a>
</div>

<div class="menu-wrap">
	<div class="menu">
		<div class="bar"></div>
		<div class="bar"></div>
		<div class="bar"></div>
	</div>
</div>

<div id="menu-mobile">
	<div class="menu-mobile-content-wrap">
		<div class="menu-mobile-list-wrap">
			<? foreach($arr_header as $key => $header):?>
				<a href="<?= base_url(); ?><?= $header->link; ?>">
					<div class="menu-mobile-list">
						<? if ($lang == $setting->setting__system_language || $header->name_lang == ''): ?>
							<h4><?= $header->name; ?></h4>
						<? else: ?>
							<h4><?= $header->name_lang; ?></h4>
						<? endif; ?>
					</div>
				</a>
			<? endforeach;?>
		</div>
		<div class="menu-mobile-lang">
			<div class="lang">
				<a onclick="changeLanguage('<?= $setting->setting__system_language; ?>');" >
					<div class="lang-inline <? if($setting->setting__system_language == $lang): ?>lang-active<? endif; ?>">
						<div class="lang-inside">
							<h5><?= $setting->setting__system_language; ?></h5>
						</div>
					</div>
				</a>
				<a onclick="changeLanguage('<?= $setting->setting__system_language2; ?>');">
					<div class="lang-inline <? if($setting->setting__system_language2 == $lang): ?>lang-active<? endif; ?>">
						<div class="lang-inside">
							<h5><?= $setting->setting__system_language2; ?></h5>
						</div>
					</div>
				</a>
			</div>
		</div>
		<div class="menu-mobile-search-wrap">
			<div class="search-wrap">
				<input type="text" class="form-control search-input" id="search" placeholder="Search">
				<button class="btn btn-search"><img src="<?= base_url(); ?>assets/images/main/loop.png"></button>
			</div>
		</div>
	</div>
</div>

<script>
	function changeLanguage(lang) {
		$.ajax({
			data: {
				'<?= $csrf['name']; ?>': '<?= $csrf['hash']; ?>',
			},
			dataType: 'JSON',
			error: function() {
				alert('server error.');
			},
			success: function(data) {
				if (data.status == 'success') {
					window.location.reload();
				}
				else {
					alert(data.message);
				}
			},
			type : 'POST',
			url : '<?= base_url(); ?>main/ajax_set_language/'+ lang +'/'
		});
	}
</script>