<? global $home ?>
	<section id="banner">

		<div id="carousel-example-generic" class="carousel slide no-mobile" data-ride="carousel" >
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<? for( $i = 0; $i < count( $home->home_slider_slides ); $i++ ) : ?>
					<li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>"<? if( $i == 0 ) :?> class="active"<? endif ?>></li>
				<? endfor ?>				
			</ol>

			<!-- Wrapper for slides -->
			<div class="black-background">
				<div class="carousel-caption img-cap">
					<span class="bannre-text">
						<img src="<?= get_template_directory_uri() ?>/library/images/banner-leaf.png" alt="">	
						<h4><?= $home->home_slider_overlay[0]['home-slider-overlay-header'] ?></h4>
						<h5><?= $home->home_slider_overlay[0]['home-slider-overlay-subheader'] ?></h5>				
					</span>
					<p><?= $home->home_slider_overlay[0]['home-slider-overlay-description'] ?></p>
					
					<span class="brewer-wrap">
						<? foreach( $home->home_slider_slides as $key => $slide ) : ?>
							<small class="brewer" key="<?= $key ?>" style="display: <?= $key == 0 ? 'block' : 'none' ?>"><?= $slide['home-slider-slide-caption'] ?></small>
						<? endforeach ?>
					</span>
				</div>
			</div>
		
			<div class="carousel-inner carousel slide" role="listbox">
				<? foreach( $home->home_slider_slides as $key => $slide ) : ?>
					<div class="item<? if( $key == 0 ) : ?> active<? endif ?>" key="<?= $key ?>">
						<img src="<?= $slide['home-slider-slide-image'] ?>">
<!-- 						<span class="parent-fade"><small class="fadevalue" style="display: <? $key == 0 ? 'block' : 'none' ?>"><?= $slide['home-slider-slide-caption'] ?></small></span> -->
					</div>
				<? endforeach ?>
			</div>			
		</div>
	<!-- Ipad View --> 
		<div class="wide-sev-banner">
			<div id="carousel-example-generic-web" class="carousel slide" data-ride="carousel" data-interval="7000">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<? for( $i = 0; $i < count( $home->home_slider_slides ); $i++ ) : ?>
						<li data-target="#carousel-example-generic-web" data-slide-to="<?= $i ?>"<? if( $i == 0 ) :?> class="active"<? endif ?>></li>
					<? endfor ?>					
				</ol>
	
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<? foreach( $home->home_slider_slides as $key => $slide ) : ?>
						<div class="item<? if( $key == 0 ) : ?> active<? endif ?>">
							<img src="<?= $slide['home-slider-slide-image'] ?>">
							<span class="parent-fade"><small class="fadevalue-ipad"><?= $slide['home-slider-slide-caption'] ?></small></span>
						</div>
					<? endforeach ?>
				</div>
				<div class="carousel-caption img-cap">
					<span class="bannre-text">
						<img src="<?= get_template_directory_uri() ?>/library/images/banner-leaf.png" alt="">	
						<h4><?= $home->home_slider_overlay[0]['home-slider-overlay-header'] ?></h4>
						<h5><?= $home->home_slider_overlay[0]['home-slider-overlay-subheader'] ?></h5>				
					</span>
					<p><?= $home->home_slider_overlay[0]['home-slider-overlay-description'] ?></p>
				</div>
			</div>
		</div>
	
		<a data-slide="prev" href="#carousel-example-generic" id="left-arrow-all" class="left carousel-control common-class" >
		 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="icon-prev"><img src="<?= get_template_directory_uri() ?>/library/images/slider-left-arrow.png" class="img-nav" width="15" height="40" alt=""></span>
		</a>
		<a data-slide="next" href="#carousel-example-generic" id="right-arrow-all" class="right carousel-control common-class" >
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="icon-next"><img src="<?= get_template_directory_uri() ?>/library/images/slider-right-arrow.png" width="15" height="40" alt="" class="img-nav"></span>
		</a>
		
		<!-- Mobile View -->
		<div class="mobile-banner">
			<div id="carousel-example-generic-mobile" class="carousel slide" data-ride="carousel" data-interval="7000">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<? for( $i = 0; $i < count( $home->home_slider_slides ); $i++ ) : ?>
						<li data-target="#carousel-example-generic-mobile" data-slide-to="<?= $i ?>"<? if( $i == 0 ) :?> class="active"<? endif ?>></li>
					<? endfor ?>					
				</ol>

				<!-- Wrapper for slides -->		
				<div class="black-background"></div>
				
				<div class="carousel-inner carousel slide" role="listbox" id="myCarousel-mobile">
					<? foreach( $home->home_slider_slides as $key => $slide ) : ?>
						<div class="item<? if( $key == 0 ) : ?> active<? endif ?>">
							<img src="<?= $slide['home-slider-slide-image'] ?>">
							<span class="parent-fade"><small class="fadevalue-mobile"><?= $slide['home-slider-slide-caption'] ?></small></span>
						</div>
					<? endforeach ?>
					<? /*
					<div class="item<? if( $key == 0 ) : ?> active<? endif ?>">
						<img src="<?= $slide['home-slider-slide-image'] ?>">
						<small class="fadevalue"><?= $slide['home-slider-slide-caption'] ?></small>
					</div>
					*/ ?>
				</div>
			</div>
		
			<div class="carousel-caption img-cap">
				<span class="bannre-text">
					<img src="<?= get_template_directory_uri() ?>/library/images/banner-leaf.png" alt="">	
					<h4><?= $home->home_slider_overlay[0]['home-slider-overlay-header'] ?></h4>
					<h5><?= $home->home_slider_overlay[0]['home-slider-overlay-subheader'] ?></h5>				
				</span>
				<p><?= $home->home_slider_overlay[0]['home-slider-overlay-description'] ?></p>
			</div>
		</div>
	
	</section>

	<section id="green-links">
		<div class="container">
			<div class="row three-link">
				<ul class="flicker-fix">
					<? foreach( $home->home_links as $link ) : ?>
							<?php
								$tab_id_extraa = "abt-ovr"; 
								if(is_array($link['tab_link'])){
									foreach($link['tab_link'] as $single_link){
										$tab_id_extraa = $single_link;
									}
								}else{
									$tab_id_extraa = $link['tab_link'];
								}
							?>
						<li>
						<?php	$tab_id = get_tab_id($tab_id_extraa); ?>
							<a href="#<?= $link['home-link-link'] ?>" settrigger="<?= $link['home-link-id'] ?>" relative="<?= $tab_id ?>" class="move-via-green" aria-controls="<?= $link['home-link-link'] ?>" role="tab" data-toggle="tab">
								<img src="<?= get_template_directory_uri() ?>/library/images/curve-arrow.png" alt="">
								<h6><?= $link['home-link-text'] ?></h6>
							</a>
						</li>
					<? endforeach ?>
				</ul>
			</div>
		</div>
	</section>