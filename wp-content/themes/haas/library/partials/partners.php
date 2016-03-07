<? global $partners ?>

<section id="partner" data-speed="1" data-type="background" data-identity="partner">
	<div class="container">
		<div class="row">
			<h2 class="sec-title">PARTNERS</h2>

			<div class="partner-block">
				<h3><?= $partners->partners_header ?></h3>

				<div class="row par-row flicker-fix">
					
					<? foreach( $partners->partners_partners as $partner ) : ?>
						<div class="col-md-4">
							 <div class="par-img">
								<a href="<?= $partner['partners-partners-link'] ?>" target="_blank"><img src="<?= $partner['partners-partners-image'] ?>" alt=""></a>
							</div>
	
							<p class="summer-text"><strong><?= $partner['partners-partners-header'] ?></strong> <?= $partner['partners-partners-text'] ?></p>
							
							<? if( $partner['partners-partners-more'] ) : ?>
								<p class="read-more-data"><?= $partner['partners-partners-more'] ?></p>
								<a href="javascript:void(0);" class="read-more-lnk flicker-fix">READ MORE</a><p>
							<? endif ?>
						</div>
						<div class="read-full-text"><div class="close-icon"></div><p><strong><?= $partner['partners-partners-header'] ?></strong> <?= $partner['partners-partners-text'] . $partner['partners-partners-more'] ?></p></div>
						
					<? endforeach ?>
					<div class="col-md-12 finaldata"></div>
				</div>
			</div>
		</div>
	</div>
</section>