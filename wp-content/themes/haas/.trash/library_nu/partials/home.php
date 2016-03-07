<? global $home ?>

<section id="banner">
	<div id="carousel-example-generic" class="carousel slide no-mobile" data-ride="carousel">
		<!-- Indicators -->

		<ol class="carousel-indicators">
			<? for( $i = 0; $i < count( $home->home_slider_slides ); $i++ ) : ?>
				<li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>"<? if( $i == 0 ) :?> class="active"<? endif ?>></li>
			<? endfor ?>
		</ol><!-- Wrapper for slides -->

		<div class="black-background">
			<div class="carousel-caption img-cap">
				
				<span class="bannre-text">
					<img src="<?= get_template_directory_uri() ?>/library/images/banner-leaf.png" alt="">	
					<h4><?= $home->home_slider_overlay[0]['home-slider-overlay-header'] ?></h4>
					<h5><?= $home->home_slider_overlay[0]['home-slider-overlay-subheader'] ?></h5>				
				</span>
				
				<p><?= $home->home_slider_overlay[0]['home-slider-overlay-description'] ?></p>
				
			</div>
		</div>

		<div class="col-md-12">
			<div class="carousel-inner carousel slide" role="listbox" id="myCarousel">
				
				<? foreach( $home->home_slider_slides as $key => $slide ) : ?>
					<div class="item<? if( $key == 0 ) : ?> active<? endif ?>">
						<img src="<?= $slide['home-slider-slide-image'] ?>">
						<small class="fadevalue" style="display: <? $key == 0 ? 'block' : 'none' ?>"><?= $slide['home-slider-slide-caption'] ?></small>
					</div>
				<? endforeach ?>

			</div>
		</div>
	</div>
	
	<a data-slide="prev" href="#myCarousel" class="left carousel-control common-class">
		<span class="icon-prev"><img src="<?= get_template_directory_uri() ?>/library/images/slider-left-arrow.png" class="img-nav" width="15" height="40" alt=""></span>
	</a>
	<a data-slide="next" href="#myCarousel" class="right carousel-control common-class">
		<span class="icon-next"><img src="<?= get_template_directory_uri() ?>/library/images/slider-right-arrow.png" width="15" height="40" alt="" class="img-nav"></span>
	</a>

	<div class="wide-sev-banner">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->

			<ol class="carousel-indicators"></ol><!-- Wrapper for slides -->

			<div class="carousel-inner" role="listbox">
				<div class="item active"><img src="<?= get_template_directory_uri() ?>/library/images/banner-750.jpg" alt=""></div>

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
	</div>

	<div class="mobile-banner">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Wrapper for slides -->

			<div class="carousel-inner" role="listbox">
				<div class="item active"><!-- Indicators -->

				<ol class="carousel-indicators"></ol><img src="<?= get_template_directory_uri() ?>/library/images/mobile-banner.jpg" alt=""></div>

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
	</div>
</section>

<section id="green-links">
	<div class="container">
		<div class="row three-link">
			<ul>
				<? foreach( $home->home_links as $link ) : ?>
					<li>
						<a href="<?= $link['home-link-link'] ?>" class="move-via-green" aria-controls="inno-bre" role="tab" data-toggle="tab">
							<img src="<?= get_template_directory_uri() ?>/library/images/curve-arrow.png" alt="">
							<h6><?= $link['home-link-text'] ?></h6>
						</a>
					</li>
	
<!--
					<li>
						<a href="#hop-acd" settrigger="hop" relative="hop-acd" class="move-via-green" aria-controls="hop-acd" role="tab" data-toggle="tab"><img src="<?= get_template_directory_uri() ?>/library/images/curve-arrow.png" alt=""></a>
	
						<h6><a href="#hop-acd" settrigger="hop" relative="hop-acd" class="move-via-green" aria-controls="hop-acd" role="tab" data-toggle="tab">Attend The Hops Academy</a></h6>
					</li>
	
					<li>
						<a href="#oth-res" settrigger="oth" relative="oth-res" class="move-via-green" aria-controls="oth-res" role="tab" data-toggle="tab"><img src="<?= get_template_directory_uri() ?>/library/images/curve-arrow.png" alt=""></a>
	
						<h6><a href="#oth-res" settrigger="oth" relative="oth-res" class="move-via-green" aria-controls="oth-res" role="tab" data-toggle="tab">Information &amp; Resources</a></h6>
					</li>
-->
				<? endforeach ?>
			</ul>
		</div>
	</div>
</section>