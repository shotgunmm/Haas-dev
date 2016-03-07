<? global $about_us ?>

<section id="about-us" data-speed="2" data-type="background" data-identity="about">
	<div class="container">
		<div class="row">
			<h2 class="sec-title" id="about-menu-nav">About Us</h2>

			<div class="about-tab">
				<div role="tabpanel">
					<!-- Tab panes -->

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active find-height" id="abt-over">
							<div class="row">
								<div class="col-md-5">
									<h3>
										<?= $about_us->about_overview[0]['about-overview-header'] ?>
										<em><?= $about_us->about_overview[0]['about-overview-subheader'] ?></em>
									</h3>

									<?= $about_us->about_overview[0]['about-overview-text'] ?>
								</div>

								<div class="col-md-7"><img src="<?= $about_us->about_overview[0]['about-overview-image'] ?>" alt="" class="img-responsive"></div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane fade find-height" id="abt-history">
							<ul class="bxslider">
								<? foreach( $about_us->about_history as $slide ) : ?>
									<li>
										<div class="row">
											<div class="row-padding">
												<div class="col-md-6">
													<h3>
														<?= $slide['about-history-header'] ?>
														<?= $slide['about-history-subheader'] ? '<em>' . $slide['about-history-subheader'] . '</em>' : '' ?>
													</h3>
													<?= $slide['about-history-left'] ?>
												</div>
	
												<div class="col-md-6">
													<div class="img-his">
														<?= $slide['about-history-right'] ?>
													</div>
												</div>
											</div>
										</div>
									</li>
								<? endforeach ?>
							</ul>
						</div>

						<div role="tabpanel" class="tab-pane fade find-height" id="abt-fnf">
							<div class="row">
								<div class="col-md-5">
									<h3><?= $about_us->about_facilities_fields[0]['about-facilities-fields-header'] ?></h3>

									<?= $about_us->about_facilities_fields[0]['about-facilities-fields-text'] ?>
								</div>

								<div class="col-md-7"><img src="<?= $about_us->about_facilities_fields[0]['about-facilities-fields-image'] ?>" alt="" class="img-responsive"></div>
							</div>
						</div>

						<div role="tabpanel" class="tab-pane fade find-height" id="abt-meet">
							<div class="row">
	
								<div class="green-container-wrap">								
									<? foreach( $about_us->about_team as $team ) : ?>
										<? $team = build_object( $team ) ?>
										<div class="row green-container" id="team_<?= $team->post_name ?>">
											<div class="col-md-4 column"><img alt="" class="img-responsive" src="<?= get_featured_image_uri( $team->ID ) ?>"></div>
		
											<div class="col-md-8 column">
												<h3><?= $team->post_title ?> <em class="sub-text"><?= $team->team_position ?></em></h3>	
												<?= $team->team_description ?>
												<? if( $team->team_moment ) : ?>
													<strong class="sub-text">HERE’S TO THAT MOMENT...</strong><br />
													<span class="black-text"><?= $team->team_moment ?></span>
												<? endif ?>
											</div>
		
											<div class="cross-img"><img alt="" class="team-cross" src="<?= get_template_directory_uri() ?>/library/images/cross-img.png"></div>
										</div>
									<? endforeach ?>
								</div>
								
								<ul class="meet-team">
									<? foreach( $about_us->about_team as $team ) : ?>
										<? $team = build_object( $team ) ?>
										<li class="team-member">
											<a data-toggle='modal' href="#team_<?= $team->post_name ?>"><img src="<?= get_featured_image_uri( $team->ID ) ?>" class="member-image" alt="">
												<span>
													<h5 class="member-name"><?= $team->post_title ?></h5>
													<h6 class="member-designation"><?= $team->team_position ?></h6>
												</span>
											</a>
										</li>
									<? endforeach ?>
								</ul>
								
							</div>
						</div>
					</div><!-- Nav tabs -->

					<ul class="nav nav-tabs" role="tablist" id="about-tab-mobile">
						<li role="presentation" class="active tab-reset-overview" id="abt-over-tab"><a href="#abt-over" aria-controls="abt-over" role="tab" data-toggle="tab">Overview</a></li>

						<li role="presentation" class="tab-reset-overview"><a href="#abt-history" aria-controls="abt-history" role="tab" data-toggle="tab">History</a></li>

						<li role="presentation" class="tab-reset-overview"><a href="#abt-fnf" aria-controls="abt-fnf" role="tab" data-toggle="tab">Facilities &amp; Fields</a></li>

						<li role="presentation" class="tab-reset-overview"><a href="#abt-meet" aria-controls="abt-meet" role="tab" data-toggle="tab">Meet Our Team</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>