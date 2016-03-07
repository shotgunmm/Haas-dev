<? global $products ?>
<? $products->classic = build_object( get_term( 15, 'products' ), 'products' ) ?>
<? $products->advanced = build_object( get_term( 16, 'products' ), 'products' ) ?>

<section id="product" data-speed="4" data-type="background" data-identity="product">
	<div class="container">
		<div class="row" id="product-div">
			<h2 class="sec-title">Products</h2>

			<div class="product-block-main">
				<div class="product-main-text">
					<h3><?= $products->products_header ?></h3>
					<?= $products->description ?>
				</div>

				<div class="row product-box">
					<? foreach( array( 'product-classic' => $products->classic, 'product-advance' => $products->advanced ) as $box => $product_type ) : ?>
						<div class="col-md-6">
							<div class="pro-box" id="<?= $box ?>">
								<div class="pro-img">
									<img src="<?= $product_type->product_icon ?>" alt="">
									<h3><?= format_product_title( $product_type->name ) ?></h3>
								</div>
								<div class="pro-text"><p><?= $product_type->description ?></p></div>
							</div>
						</div>
					<? endforeach ?>
				</div>
			</div>
		</div>
		
		
		<? foreach( array( 'classic-product' => $products->classic, 'advance-product' => $products->advanced ) as $box => $product_type ) : ?>
			<div class="product-block opacity" id="<?= $box ?>">
				<div class="product-block-inner">
					
					<div class="col-md-3">
						<div class="pro-logo">
							<img src="<?= $product_type->product_icon ?>" alt="">
							<h3><?= format_product_title( $product_type->name ) ?></h3>
						</div>
					</div>
					
					<div class="col-md-9">
						<div class="product-list">
							<ul>
								<? foreach( get_terms( 'products', array( 'parent' => $product_type->term_id, 'orderby' => 'id' ) ) as $term ) : ?>
									<li class="pro-list-head"><h5><?= $term->name ?></h5></li>
									<? foreach( get_posts( array( 'post_type' => 'product', 'tax_query' => array( array( 'taxonomy' => 'products', 'field' => 'term_id', 'terms' => $term->term_id ) ), 'orderby' => 'title', 'order' => 'ASC' ) ) as $product ) : ?>
										<? product_list_item( $product ) ?>										
										<? foreach( get_posts( array( 'post_type' => 'product', 'post_parent' => $product->ID, 'orderby' => 'title', 'order' => 'ASC' ) ) as $subproduct ) product_list_item( $subproduct, 'sub-item' ) ?>
									<? endforeach ?>
								<? endforeach ?>
								
							</ul>
						</div>
					</div>
	
					<div class="cross-img"><img src="<?= get_template_directory_uri() ?>/library/images/cross-img.png" alt=""></div>
				</div>
			</div>
		<? endforeach ?>
	</div>
</section>