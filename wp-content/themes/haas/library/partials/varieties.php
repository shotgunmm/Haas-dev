<? global $varieties ?>
<? $varieties->alpha = new WP_Query( array( 'post_type' => 'variety', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1 ) ); ?>
<? $varieties->regions = array() ?>

<script>	
	$(document).on('change', '#sort-varieties', function(){
		$('.var-sort-list').removeClass('active');
		$('.var-sort-list.' + $(this).val()).addClass('active');
	})
</script>

<section id="variety" data-speed="1" data-type="background" data-identity="variety">
	<div class="container">
		<div class="row flicker-fix">
			<h2 class="sec-title">VARIETIES</h2>

			<div class="row variety-box">
				<div class="col-md-6">
					<h3><?= $varieties->varieties_header ?></h3>
					<?= $varieties->varieties_text ?>
				</div>

				<div class="col-md-6">
					<div class="sort-bt-variety">
						<div class="sort-var-sel">
							<select id="sort-varieties" class="styled" name="var-sel">
								<option value="alpha">SORT HOPS ALPHABETICALLY</option>
								<option value="region">SORT HOPS BY REGION</option>
							</select>
						</div>
						
						<div class="var-sort-list-wrap">
							<div class="var-sort-list alpha active">
								<ul>
									<? foreach( $varieties->alpha->posts as $key => $variety ) : ?>
										<? $variety = build_object( $variety ) ?>									
										<? foreach( wp_get_post_terms( $variety->ID, 'regions' ) as $term ) : ?>
											<? if( ! isset( $varieties->regions[$term->slug] ) ) $varieties->regions[$term->slug] = $term; ?>
											<? $varieties->regions[$term->slug]->posts[] = $variety; ?>
										<? endforeach ?>
										<li>
											<h6><?= $variety->post_title ?></h6><a href="<?= $variety->variety_pdf ?>" target="_blank">DOWNLOAD PDF</a>
										</li>
									<? endforeach ?>
								</ul>
							</div>
													
							<div class="var-sort-list region">
								<? asort( $varieties->regions ) ?>
								<? foreach( $varieties->regions as $region ) : ?>
									<div>
										<span><?= $region->name ?></span>
										<ul>
											<? foreach( $region->posts as $variety ) : ?>
												<li>
													<h6><?= $variety->post_title ?></h6><a href="<?= $variety->variety_pdf ?>" target="_blank">DOWNLOAD PDF</a>
												</li>
											<? endforeach ?> 
										</ul>
									</div>
								<? endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>