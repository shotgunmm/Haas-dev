<? global $resources ?>

<section id="resource" data-speed="4" data-type="background" data-identity="resource">
	<div class="container">
		<div class="row">
			<h2 class="sec-title" id="resource-menu-nav">RESOURCES</h2>

			<div class="resource-block">
				<h2><?= $resources->resources_header ?></h2>

				<div class="resources-tab">
					<div role="tabpanel">
						<!-- Nav tabs -->

						<ul class="nav nav-tabs" role="tablist" id="resource-mob-tab">
							<li role="presentation" class="active"><a id="innovate" href="#inno-bre" aria-controls="inno-bre" role="tab" data-toggle="tab">Innovations Brewery</a></li>

							<li role="presentation"><a id="hop" href="#hop-acd" aria-controls="hop-acd" role="tab" data-toggle="tab">HOPS Academy</a></li>

							<li role="presentation"><a id="oth" href="#oth-res" aria-controls="oth-res" role="tab" data-toggle="tab">Other Resources</a></li>
						</ul><!-- Tab panes -->

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active other-height resource-tab" id="inno-bre" >
								<div class="row inno-bre-block flicker-fix">
									<ul class="bxslider2">
										<? foreach( $resources->resources_innovations_brewery as $slide ) : ?>
											<li>
												<div class="col-md-6">
													<div class="inno-list">
														<h4><?= $slide['resources-innovations-brewery-header'] ?></h4>
	
														<?= $slide['resources-innovations-brewery-text'] ?>
													</div>
												</div>
	
												<div class="col-md-6">
													<div class="rep-img"><img src="<?= $slide['resources-innovations-brewery-image'] ?>" alt=""></div>
												</div>
											</li>
										<? endforeach ?>
									</ul>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane fade other-height resource-tab" id="hop-acd" style="min-height:470px;">
								<div class="row inno-bre-block flicker-fix">
									<div class="col-md-6">
										<div class="hop-acd-text">
											<h4><?= $resources->resources_hops_academy[0]['resources-hops-academy-header'] ?></h4>

											<?= $resources->resources_hops_academy[0]['resources-hops-academy-text'] ?>
										</div>
									</div>

									<div class="col-md-6">
										<div class="rep-img"><img src="<?= $resources->resources_hops_academy[0]['resources-hops-academy-image'] ?>" alt=""></div>
									</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane fade other-height resource-tab" id="oth-res">
								<div class="row other-res-block flicker-fix">
									<ul class="other">
										<? foreach( $resources->resources_other as $slide ) : ?>
											<li>
												<div class="col-md-6">
													<div class="other-res-block">
														<div class="other-rec-logo">
															<a href="<?= $slide['resources-other-link'] ?>" target="_blank"><img src="<?= $slide['resources-other-image'] ?>" alt=""></a>
														</div>
	
														<h4><?= $slide['resources-other-header'] ?></h4>
	
														<?= $slide['resources-other-text'] ?>
													</div>
												</div>
											</li>
										<? endforeach ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
