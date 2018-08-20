<section id="footer" class="content-center">
	<div class="container-fluid">
		<div class="row row-eq-height-desktop">
			<div class="footer-grid content-center footer-socmed">
				<div class="footer-insider">
					<? if ($setting->setting__social_media_facebook_link != ''): ?>
						<a target="_blank" href="<?= $setting->setting__social_media_facebook_link; ?>">
							<i class="fa fa-facebook" aria-hidden="true"></i>
						</a>
					<? endif; ?>
					<? if($setting->setting__social_media_twitter_link != ''): ?>
						<a target="_blank" href="<?= $setting->setting__social_media_twitter_link; ?>">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					<? endif; ?>
					<? if($setting->setting__social_media_instagram_link != ''): ?>
						<a target="_blank" href="<?= $setting->setting__social_media_instagram_link; ?>">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					<? endif; ?>
				</div>
			</div><!--
		 --><div class="footer-grid content-center footer-address">
				<div class="footer-insider">
					<?= $setting->company_address; ?>
				</div>
			</div><!--
		 --><div class="footer-grid content-center footer-contact">
				<div class="footer-insider">
					<? if ($setting->company_phone != ''): ?>
						<p>P / <?= $setting->company_phone; ?></p>
					<? endif; ?>
					<? if ($setting->company_fax != ''): ?>
						<p>F / <?= $setting->company_fax; ?></p>
					<? endif; ?>
					<? if ($setting->company_email != ''): ?>
						<p>E / <?= $setting->company_email; ?></p>
					<? endif; ?>
				</div>
			</div><!--
		 --><div class="footer-grid content-center footer-copyright">
				<div class="footer-insider">
					<? if($setting->system_website_copyright != ''): ?>
						<p><?= $setting->system_website_copyright; ?></p>
					<? endif; ?>
					<? if($setting->system_vendor_name != ''): ?>
						<p>Imagined by <?= $setting->system_vendor_name; ?></p>
					<? endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>