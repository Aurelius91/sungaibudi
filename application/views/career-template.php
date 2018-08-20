<!-- foreach arr_career_lookup as arr_career -->
			<? foreach($arr_career_lookup as $arr_career): ?>
				<div class="row">
					<!-- foreach arr_career -->
					<? foreach($arr_career as $career): ?>
						<div class="col-xs-12 col-sm-6 career-grid">
							<div class="career-red-box"></div>
							<div class="career-wrap fade-animate" data-animate data-animation-classes="animated fadeInLeft">
								<div class="career-title">
									<? if ($lang == $setting->setting__system_language || $career->name_lang == ''): ?>
										<h2><?= strtoupper($career->name); ?></h2>
									<? else: ?>
										<h2><?= strtoupper($career->name_lang); ?></h2>
									<? endif; ?>
								</div>
								<div class="red-liner"></div>
								<div class="career-desc">
									<? if ($lang == $setting->setting__system_language || $career->description_lang == ''): ?>
										<p><?= character_limiter(strip_tags($career->description), 180); ?></p>
									<? else: ?>
										<p><?= character_limiter(strip_tags($career->description), 180); ?></p>
									<? endif; ?>
								</div>
								<div class="career-view">
									<a href="<?= base_url(); ?>career/detail/<?= $career->url_name; ?>"><button class="btn btn-read-more-red"><span>VIEW</span></button></a>
								</div>

								<div class="career-hover">
									<div class="career-hover-desc">
										<p><span class="darker"><? if ($lang == $setting->setting__system_language || $career->name_lang == ''): ?><?= $career->name; ?><? else: ?><?= $career->name_lang; ?><? endif; ?> - </span><? if ($lang == $setting->setting__system_language || $career->description_lang == ''): ?>
												<?= character_limiter(strip_tags($career->description), 250); ?>
											<? else: ?>
												<?= character_limiter(strip_tags($career->description), 250); ?>
											<? endif; ?>
										</p>
									</div>
									<div class="career-view">
										<a href="<?= base_url(); ?>career/detail/<?= $career->url_name; ?>"><button class="btn btn-read-more-red btn-red-active"><span>VIEW</span></button></a>
									</div>
								</div>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			<? endforeach; ?>
			<!-- endforeach; -->

			<? if ($count_page > 1): ?>
				<div class="loader-spin-wrap">
					<div class="loader-spin"></div>
				</div>
			<? endif; ?>