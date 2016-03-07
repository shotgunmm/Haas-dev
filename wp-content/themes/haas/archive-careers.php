<? /* Template Name: Careers	*/ ?>
<? global $careers ?>



<? get_header() ?>

	<section id="career" data-speed="4" data-type="background" class="careerbg">
		
			<div class="container">
				<div class="row">
				
					<h2 class="career-title" id="resource-menu-nav">CAREERS</h2>
							
					<div class="career-block">
					
						<div class="career-block-inner">
							<div class="row">
								<div class="col-md-12">
									<div class="avilable-title">
										<? if( count( $careers->career_open_positions ) > 0 ) : ?>
											<?= $careers->career_top_text ?>
										<? else : ?>
											<?= $careers->career_no_positions ?>
										<? endif ?>
									</div>
								</div>
							</div>
						</div>
						
						<? foreach( $careers->career_open_positions as $open ) : ?>
						<? if($open->post_status != 'trash'){ ?>
							<div class="career-block-inner">
								<div class="row">
									<div class="col-md-12">
										<div class="job-title">
											<h3><?= $open->post_title ?></h3>
											<?= apply_filters( 'the_content', $open->post_content ) ?>
										</div>
									</div>
								</div>
							</div>
						<? } ?>					
						<? endforeach ?>
						
					</div>
				</div>
			</div>
		
	</section>

<? get_footer() ?>