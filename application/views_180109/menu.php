<div id="menu-wrap" class="<? if ( $this->uri->segment(1)=="" || $this->uri->segment(1)=="newsandeventdetail" || $this->uri->segment(1)=="careerdetail"){echo "trans";} ?>" <? if ( $this->uri->segment(1)=="newsandeventdetail" || $this->uri->segment(1)=="careerdetail" ){echo "style='margin-top: 0 !important;'";} ?>>
	<a href="<?= base_url(); ?>">
		<div class="logo <? if ( $this->uri->segment(1)=="" ){echo "logo-pure";} ?>">
			<img src="<?= base_url(); ?>assets/images/main/logo.jpg">
		</div>
	</a>
	<div class="main-menu-wrap">
		<a href="<?= base_url(); ?>">
			<div class="main-menu">
				<h5>HOME</h5>
			</div>
		</a>
		<div class="menu-divider">
			<h5>|</h5>
		</div>
		<a href="<?= base_url(); ?>aboutus">
			<div class="main-menu <? if ( $this->uri->segment(1)=="aboutus" ){echo "menu-active";} ?>">
				<h5>ABOUT US</h5>
			</div>
		</a>
		<div class="menu-divider">
			<h5>|</h5>
		</div>
		<a href="<?= base_url(); ?>product">
			<div class="main-menu <? if ( $this->uri->segment(1)=="product" ){echo "menu-active";} ?>">
				<h5>PRODUCTS</h5>
			</div>
		</a>
		<div class="menu-divider">
			<h5>|</h5>
		</div>
		<a href="<?= base_url(); ?>newsandevent">
			<div class="main-menu <? if ( $this->uri->segment(1)=="newsandevent" || $this->uri->segment(1)=="newsandeventdetail" ){echo "menu-active";} ?>">
				<h5>NEWS & EVENT</h5>
			</div>
		</a>
		<div class="menu-divider">
			<h5>|</h5>
		</div>
		<a href="<?= base_url(); ?>career">
			<div class="main-menu <? if ( $this->uri->segment(1)=="career" || $this->uri->segment(1)=="careerdetail" ){echo "menu-active";} ?>">
				<h5>CAREER</h5>
			</div>
		</a>
		<div class="menu-divider">
			<h5>|</h5>
		</div>
		<a href="<?= base_url(); ?>contactus">
			<div class="main-menu">
				<h5>CONTACT US</h5>
			</div>
		</a>
	</div>
	<div class="lang-wrap">
		<div class="lang">
			<a href="">	
				<div class="lang-inline lang-active">
					<div class="lang-inside">
						<h5>ENG</h5>
					</div>
				</div>
			</a>
			<a href="">
				<div class="lang-inline">
					<div class="lang-inside">
						<h5>IND</h5>
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