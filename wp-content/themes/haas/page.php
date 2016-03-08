<? /* Template Name: Careers	*/ ?>
<? global $careers ?>



<? get_header() ?>

	<section id="career" data-speed="4" data-type="background" class="careerbg">
		
			<div class="container">
				<div class="row">
				
					<h2 class="career-title" id="resource-menu-nav"><?php the_title(); ?></h2>
							
					<div class="career-block">
					
						<div class="career-block-inner">
							<div class="row">
								<div class="col-md-12">
									<div class="avilable-title">
										<?php 
										if(have_posts()):
											while(have_posts()):the_post();
												the_content();
											endwhile;
										endif;
										?>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		
	</section>

<? get_footer() ?>