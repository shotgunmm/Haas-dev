<? global $why_haas ?>

<section id="why-haas" data-speed="2" data-type="background" data-identity="why-haas">
    <div class="container">
        <div class="row">
            <h2 class="sec-title">Why Haas</h2>

            <div class="why-block">
                <h3><?= $why_haas->why_haas_header ?></h3>

                <div class="row why-sec">
                    <div class="col-md-6 right-icons">
                        <? for( $i = 0; $i <= 2; $i++ ) : ?>
	                        <div class="why-box animateblock left">
	                            <div class="why-icon"><img src="<?= $why_haas->why_haas_reasons[$i]['why-haas-reasons-icon'] ?>" alt=""></div>
	
	                            <h4><?= $why_haas->why_haas_reasons[$i]['why-haas-reasons-header'] ?></h4>
	
	                            <?= $why_haas->why_haas_reasons[$i]['why-haas-reasons-text'] ?>
	                        </div>	                        
                        <? endfor ?>
                    </div>

                    <div class="col-md-6 left-icons">
                        <? for( $i = 3; $i <= 5; $i++ ) : ?>
	                        <div class="why-box animateblock right">
	                            <div class="why-icon"><img src="<?= $why_haas->why_haas_reasons[$i]['why-haas-reasons-icon'] ?>" alt=""></div>
	
	                            <h4><?= $why_haas->why_haas_reasons[$i]['why-haas-reasons-header'] ?></h4>
	
	                            <?= $why_haas->why_haas_reasons[$i]['why-haas-reasons-text'] ?>
	                        </div>	                        
                        <? endfor ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>