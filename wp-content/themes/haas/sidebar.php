<!--?php //session_start(); ?-->

				
				<?php 
				if ( is_page_template( 'archive-blog.php' ) || is_singular( 'blog' ) || is_tax( 'blog_cat' )) {?>
				<div class="col-md-4">
					<div class="event-block">
						<div class="event-block-leftside">
							<div class="left-container">
					<h3>Search</h3>

					<form action="<?= get_bloginfo('url') ?>/blog" method="get">
						<div class="input-group">
							<input type="text" class="form-control" name="search">
							<span class="input-group-btn">
								<button class="btn btn-default btn-default1 glyphicon glyphicon-search" type="submit"></button>
							</span>
						</div>
					</form>
					
					<hr>
					<h3>Subscribe</h3>
					 <!--?php //echo smlsubform();?--> 
					 <?php echo do_shortcode('[email-subscribers namefield="NO" desc="" group="Public"]'); ?>

					 <!-- <hr>

					 <div id="optin" class="container">
            			<h1 style="text-align:center">Sign up to stay in touch!</h1>
        					<form id="addForm" action="/manage/optin?v=001lN4gR83UR5QuIH_3CUDX3DCPXWR94tEFBpDuITloKG1-LHKJYMiITUn2bLKfx28LoE73-FaE4kbVcR-ABwG8ExSrLe6LtC_wIxZBYTXWxy0%3D" method="post">						        
						        <div class="form-background-wrapper clearfix">
						            <div class="colLeft">						                
						                    <p>Sign up to get interesting news and updates delivered to your inbox.</p>
						                    <input id="subscriberProfile.visitorPropertiesSize" name="subscriberProfile.visitorPropertiesSize" type="hidden" value="3"/>
						                    <div id="subProfile">
						                        <fieldset>                            
						                                <div class="prop-input clearfix" data-name="Email Address">
						                                    <label for="inputProp0"><span class="required">*</span>Email Address</label><input id="inputProp0" name="subscriberProfile.visitorProps[0].value" data-input="Email Address" type="text" value="" maxlength="50"/>
						                                    <input id="subscriberProfile.visitorProps0.id" name="subscriberProfile.visitorProps[0].id" type="hidden" value="80"/>
						                                    <input id="subscriberProfile.visitorProps0.name" name="subscriberProfile.visitorProps[0].name" type="hidden" value="Email Address"/>
						                                    <input id="subscriberProfile.visitorProps0.maxLen" name="subscriberProfile.visitorProps[0].maxLen" type="hidden" value="50"/>
						                                    <input id="subscriberProfile.visitorProps0.required" name="subscriberProfile.visitorProps[0].required" type="hidden" value="true"/>
						                                    <input id="subscriberProfile.visitorProps0.inputType" name="subscriberProfile.visitorProps[0].inputType" type="hidden" value="input"/>
						                                    <input id="subscriberProfile.visitorProps0.refDataKey" name="subscriberProfile.visitorProps[0].refDataKey" type="hidden" value=""/>
						                                    <input id="subscriberProfile.visitorProps0.customPropID" name="subscriberProfile.visitorProps[0].customPropID" type="hidden" value=""/>
						                                </div>
						                            
						                                <div class="prop-input clearfix" data-name="First Name">
						                                    <label for="inputProp1">First Name</label><input id="inputProp1" name="subscriberProfile.visitorProps[1].value" data-input="First Name" type="text" value="" maxlength="50"/>
						                                    <input id="subscriberProfile.visitorProps1.id" name="subscriberProfile.visitorProps[1].id" type="hidden" value="100"/>
						                                    <input id="subscriberProfile.visitorProps1.name" name="subscriberProfile.visitorProps[1].name" type="hidden" value="First Name"/>
						                                    <input id="subscriberProfile.visitorProps1.maxLen" name="subscriberProfile.visitorProps[1].maxLen" type="hidden" value="50"/>
						                                    <input id="subscriberProfile.visitorProps1.required" name="subscriberProfile.visitorProps[1].required" type="hidden" value="false"/>
						                                    <input id="subscriberProfile.visitorProps1.inputType" name="subscriberProfile.visitorProps[1].inputType" type="hidden" value="input"/>
						                                    <input id="subscriberProfile.visitorProps1.refDataKey" name="subscriberProfile.visitorProps[1].refDataKey" type="hidden" value=""/>
						                                    <input id="subscriberProfile.visitorProps1.customPropID" name="subscriberProfile.visitorProps[1].customPropID" type="hidden" value=""/>
						                                </div>
						                            
						                                <div class="prop-input clearfix" data-name="Last Name">
						                                    <label for="inputProp2">Last Name</label><input id="inputProp2" name="subscriberProfile.visitorProps[2].value" data-input="Last Name" type="text" value="" maxlength="50"/> 
						                                    <input id="subscriberProfile.visitorProps2.id" name="subscriberProfile.visitorProps[2].id" type="hidden" value="300"/>
						                                    <input id="subscriberProfile.visitorProps2.name" name="subscriberProfile.visitorProps[2].name" type="hidden" value="Last Name"/>
						                                    <input id="subscriberProfile.visitorProps2.maxLen" name="subscriberProfile.visitorProps[2].maxLen" type="hidden" value="50"/>
						                                    <input id="subscriberProfile.visitorProps2.required" name="subscriberProfile.visitorProps[2].required" type="hidden" value="false"/>
						                                    <input id="subscriberProfile.visitorProps2.inputType" name="subscriberProfile.visitorProps[2].inputType" type="hidden" value="input"/>
						                                    <input id="subscriberProfile.visitorProps2.refDataKey" name="subscriberProfile.visitorProps[2].refDataKey" type="hidden" value=""/>
						                                    <input id="subscriberProfile.visitorProps2.customPropID" name="subscriberProfile.visitorProps[2].customPropID" type="hidden" value=""/>
						                                </div>                            
						                        </fieldset>
						                    </div>                
						            </div>

						            <div id="colLeftContent" class="colLeft"> 
						                <input id="subscriberProfile.visitorParams" name="subscriberProfile.visitorParams" type="hidden" value="001lN4gR83UR5QuIH_3CUDX3DCPXWR94tEFBpDuITloKG1-LHKJYMiITUn2bLKfx28LoE73-FaE4kbVcR-ABwG8ExSrLe6LtC_wIxZBYTXWxy0="/>
						                <input id="subscriptions.interestCategoriesSize" name="subscriptions.interestCategoriesSize" type="hidden" value="1"/>              
			                            <div id="intCats" style="display:none;">
			                                <input id="subscriptions.interestCategories0.id" name="subscriptions.interestCategories[0].id" type="hidden" value="1797200975"/>
			                                <input id="subscriptions.interestCategories0.name" name="subscriptions.interestCategories[0].name" type="hidden" value="General Interest"/>
			                                <input id="subscriptions.interestCategories0.selected1" name="subscriptions.interestCategories[0].selected" type="checkbox" value="true" checked="checked"/>
			                                <input type="hidden" name="_subscriptions.interestCategories[0].selected" value="on"/>
			                                <span></span>
			                            </div>
						            </div>
						            <div class="colLeft">                
						                    <div id="displayCaptcha">
						                        <input id="captcha.url" name="captcha.url" type="hidden" value="http://visitor.r20.constantcontact.com/manage/optin"/>
						                        <input id="captcha.remoteAddr" name="captcha.remoteAddr" type="hidden" value="122.173.2.190"/>
						                        <input id="capChallenge" name="captcha.challenge" type="hidden" value=""/>
						                        <input id="capResponse" name="captcha.response" type="hidden" value=""/>
						                        <input id="captcha.key" name="captcha.key" type="hidden" value="6LcB5AIAAAAAANx7J2ADgUFxwd_zllfY4DxX81c5"/>
						                        <input id="captcha.control" name="captcha.control" type="hidden" value="001ZGQZci94m8DVEQ0-PWbOHHI41mZ2iFVZ"/>                        
						                    </div>               
						            </div>
						            <div class="clear"></div>
						            <div class="visitorActions clearfix">
						                <input name="_save" type="submit" class="btn btn-primary full" value="Sign Up"/>                
						            </div>
						        </div>
						    </form>
					</div> -->

					 <!--<h3>Categories</h3>-->
					 <!--?php
					 	/*$args = array('orderby' => 'date');
					 	$terms = wp_get_post_terms( $post->ID, 'blog_cat',$args);
						echo '<ul>';
						foreach ($terms as $term) {
						    echo '<li><a href="'.get_term_link($term->slug, 'blog_cat').'">'.$term->name.'</a></li>';
						}
						echo '</ul>';*/
					 ?-->
					 	</div>
					 	</div>
					 	</div>
					 	</div>
				<?php }elseif( is_page_template( 'archive-library.php' ) || is_tax('library_cat')) {?>			
				<div class="col-md-4">
					<div class="event-block">
						<div class="event-block-leftside">
							<div class="left-container">
								<h3>Search</h3>
								<form action="<?= get_bloginfo('url') ?>/library" method="get">
									<div class="input-group">
										<input type="text" class="form-control" name="search">
										<span class="input-group-btn">
											<button class="btn btn-default btn-default1 glyphicon glyphicon-search" type="submit"></button>
										</span>
									</div>
								</form>
					
					<hr>
					 <h3>Categories</h3>
					 <?php
					 	$terms = get_terms( 'library_cat');
						echo '<ul>';
						foreach ($terms as $term) {
						    echo '<li><a href="'.get_term_link($term->slug, 'library_cat').'">'.$term->name.'</a></li>';
						}
						echo '</ul>';
					 ?>
					 <hr>
					 <h3>Popular Resources</h3>

			 <?php
 global $post;
$args = array(
	'post_type'        => 'library',
	'taxonomy'=>'featured',
	'term'=>'popular'
);
 $myposts = new WP_Query($args);
 while( $myposts->have_posts() ) :
$myposts->the_post(); 
?>
<p><a href="<?= get_permalink();?>" > <?= get_the_title() ?></a></p>
 <!--<p><a href="http://haas.shotgunflat8.com/library/best-practices-guide-advanced-hop-bitter-product-handling-dosing/">Best practices guide advanced hop bitter product handling & dosing</a></p>
 <p><a href="http://haas.shotgunflat8.com/library/hop-market-crop-development-report/">Hop market & crop development report </a></p>-->
 <?php endwhile; ?>
					 	</div>
					 	</div>
					 	</div>
				<?php }elseif( is_singular( 'library' )) {?>
				<div class="col-md-5 left-padd-inner" >
				<div class="lib-form">
						<div class="left-container">
					
				<?php
						if(isset($_SESSION['msg'])){?>
							<div class="error"><?php echo $_SESSION['msg']; ?></div>
							<?php unset($_SESSION['msg']);
						 } 

					$form = get_post(853);
					echo $form->post_content;
					$pdf=get_field('upload_pdf',$post->ID);
					echo '<div id="pdfpath" class="'.$pdf.'"></div>';
					$_SESSION['pdf'] = $pdf;?>
					<div class="message"></div>	

					<?php if(isset($_SESSION['msg'])){?>
						<div class="error"><?php echo $_SESSION['msg']; ?></div>
					<?php unset($_SESSION['msg']);
						  } ?> 
					</div></div></div>
				<?php }else{

					$cat_args = array(
					'post_type' => 'news-events',
					'posts_per_page' => 4,
					'tax_query' => array(
						array(
							'taxonomy' => 'news-events',
							'field' => 'id'
							)
						)
					);
					$news_args = $events_args = $cat_args;
					$news_args['tax_query'][0]['terms'] = 23;
					$events_args['tax_query'][0]['terms'] = 24;
				?>
				<div class="col-md-4">
					<div class="event-block">
						<div class="event-block-leftside">
							<div class="left-container">
									<h3>Search</h3>

					<form action="<?= get_bloginfo('url') ?>/news-events" method="get">
						<div class="input-group">
							<input type="text" class="form-control" name="search">
							<span class="input-group-btn">
								<button class="btn btn-default btn-default1 glyphicon glyphicon-search" type="submit"></button>
							</span>
						</div>
					</form>
					
					<hr>
					<h3>Recent Events</h3>
					<? $recent_events = new WP_Query( $events_args ) ?>
					<? if( $recent_events->have_posts() ) : ?>
						<ul>
							<? while( $recent_events->have_posts() ) : ?>
								<? $recent_events->the_post() ?>
								<li><a href="<?= get_permalink() ?>"><?= get_the_title() ?></a></li>
							<? endwhile ?>
						</ul>
					<? endif ?>						

					<hr>

					<h3>Recent News</h3>
					<? $recent_news = new WP_Query( $news_args ) ?>
					<? if( $recent_news->have_posts() ) : ?>
						<ul>
							<? while( $recent_news->have_posts() ) : ?>
								<? $recent_news->the_post() ?>
								<li><a href="<?= get_permalink() ?>"><?= get_the_title() ?></a></li>
							<? endwhile ?>
						</ul>
					<? endif ?>
					
					<hr>			

					<h3>Archive</h3>
					<? post_type_archive( 'news-events', site_url() . '/news-events/' ) ?>
					</div></div></div></div>
				<?php } ?>	
