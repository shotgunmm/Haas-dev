<? global $home ?>
	<section id="banner">

		<div id="carousel-example-generic" class="carousel slide no-mobile" data-ride="carousel" data-interval="7000">
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
				</div>
			</div>
		
			<div class="carousel-inner carousel slide" role="listbox" id="myCarousel">
				<? foreach( $home->home_slider_slides as $key => $slide ) : ?>
					<div class="item<? if( $key == 0 ) : ?> active<? endif ?>">
						<img src="<?= $slide['home-slider-slide-image'] ?>">
						<small class="fadevalue" style="display: <? $key == 0 ? 'block' : 'none' ?>"><?= $slide['home-slider-slide-caption'] ?></small>
					</div>
				<? endforeach ?>
			</div>
		</div>
	
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
							<small class="fadevalue"><?= $slide['home-slider-slide-caption'] ?></small>
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
	
		<a data-slide="prev" href="#myCarousel" id="left-arrow-all" class="left carousel-control common-class">
			<span class="icon-prev"><img src="<?= get_template_directory_uri() ?>/library/images/slider-left-arrow.png" class="img-nav" width="15" height="40" alt=""></span>
		</a>
		<a data-slide="next" href="#myCarousel" id="right-arrow-all" class="right carousel-control common-class">
			<span class="icon-next"><img src="<?= get_template_directory_uri() ?>/library/images/slider-right-arrow.png" width="15" height="40" alt="" class="img-nav"></span>
		</a>
		
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
							<small class="fadevalue"><?= $slide['home-slider-slide-caption'] ?></small>
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
				<ul>
					<? foreach( $home->home_links as $link ) : ?>
						<li>
							<a href="#<?= $link['home-link-link'] ?>" settrigger="<?= $link['home-link-id'] ?>" relative="<?= $link['home-link-link'] ?>" class="move-via-green" aria-controls="<?= $link['home-link-link'] ?>" role="tab" data-toggle="tab">
								<img src="<?= get_template_directory_uri() ?>/library/images/curve-arrow.png" alt="">
								<h6><?= $link['home-link-text'] ?></h6>
							</a>
						</li>
					<? endforeach ?>
				</ul>
			</div>
		</div>
	</section>

<? /*


	<section id="banner">

		<div id="carousel-example-generic" class="carousel slide no-mobile" data-ride="carousel" data-interval="7000">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				<li data-target="#carousel-example-generic" data-slide-to="3"></li>
			</ol>

			<!-- Wrapper for slides -->

			<div class="black-background">

				<div class="carousel-caption img-cap"> <span class="bannre-text"> <img src="images/banner-leaf.png" alt="">
				  <h4>HERE’s To the Moments</h4>
				  <h5>That make brewing beer the best job in the world.</h5>
			  </span>
			  <p>Whether you’re brewing 100 barrels a year or 100 million,
				<br> Haas shares your passion for creating flavors that people love.
				<br> From field to glass, Haas is here for your success.</p>

			</div>
		</div>
		<div class="carousel-inner carousel slide" role="listbox" id="myCarousel">


			<div class="item active"> <img src="images/banner-mitch.jpg" alt="">
				<small class="fadevalue">Mitch Steele, Brewmaster, Stone Brewing Company</small>
			</div>
			<div class="item"> 
				<img src="images/banner-matt.jpg" alt="">
				<small class="fadevalue">Matt Bryndilson, Brewmaster, Firestone Walker  Brewing Company</small>

			</div>
			<div class="item"> <img src="images/banner-jeff.jpg" alt="">
				<small class="fadevalue">Jeff Edgerton, Brewmaster, Bridgeport Brewing</small>
			</div>
			<div class="item"> <img src="images/banner-john.jpg" alt="">
				<small class="fadevalue">John Eaton, Brewing Manager, Craft Beer Alliance</small>
			</div>
		</div>
	</div>





















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
				<? endforeach ?>
			</ul>
		</div>
	</div>
</section> 
*/ ?>
