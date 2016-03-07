<? global $contact_us ?>

<section id="contact" data-speed="6" data-type="background" data-identity="contact">
    <div class="container">
        <div class="row">
            <h2 class="sec-title">Contact us</h2>

            <div class="contact-block">
                <div class="col-md-6">
                    <div class="address">
                        <div class="need-line">
                            <h6><?= $contact_us->contact_header ?></h6>

                            <p><?= $contact_us->contact_text ?></p>

                            <div class="green-par"><img src="<?= get_template_directory_uri() ?>/library/images/green-add-logo.jpg" alt=""></div>
                        </div>

                        <div class="row add-info">
	                        <? foreach( $contact_us->contact_sections as $section ) : ?>
	                            <div class="col-md-6">
	                                <h6><?= $section['contact-sections-header'] ?></h6>
	
	                                <p><?= $section['contact-sections-text'] ?></p>
	                            </div>
							<? endforeach ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
<!--
					<div class="contact-form">
						<form method="post" id="frm-contact">
							<input type="text" placeholder="Name" id="frm-name" class="name-in" name="name">
							<input type="text" placeholder="Email" id="frm-email" class="email-in" name="email">
							<input type="text" placeholder="Website" id="frm-website" class="full-in" name="website">
							<span class="custom-sel">
								<select class="select-in styled" name="subject" id="frm-subject" name="contact-sel">
									<option selected value="">Select your subject</option>
									<option value="Buy hops or hop products">Buy hops or hop products</option>
									<option value="Make an Innovations Brewery Reservation">Make an Innovations Brewery Reservation</option>
									<option value="Make an Innovations Brewery Reservation">Request More Information</option>
								</select>
							</span>
							<textarea class="text-in" placeholder="Type your message here" cols="2" rows="2" name="message"></textarea>
							<button class="submit-btn">Submit</button>
							<div class="alert alert-success" role="alert" style="display:none;">
								<a href="javascript:void(0);" class="alert-link" id="success-error-message"></a>
							</div>
						</form>
					</div>
-->

                        <div class="contact-form">
                            <form method="post" id="frm-contact">
                                <input type="text" placeholder="Name" id="frm-name" class="name-in" name="name">
                                <input type="text" placeholder="Email" id="frm-email" class="email-in" name="email">
                                <input type="text" placeholder="Website" id="frm-website" class="full-in" name="website">
                                <span class="custom-sel">
                                  <select class="select-in styled" name="subject" id="frm-subject" name="subject">
                                      <option selected value="">Select your subject</option>
                                      <option value="Buy hops or hop products">Buy hops or hop products</option>
                                      <option value="Make an Innovations Brewery Reservation">Make an Innovations Brewery Reservation</option>
                                      <option value="Make an Innovations Brewery Reservation">Request More Information</option>
                                  </select>
                                </span>
                                <textarea class="text-in" placeholder="Type your message here" cols="2" rows="2" name="comment"></textarea>
                                <button class="submit-btn">Submit</button>
                                <div class="alert alert-success" role="alert" style="display:none;">
                                    <a href="javascript:void(0);" class="alert-link" id="success-error-message"></a>
                                </div>
                            </form>
                        </div>



                </div>

            </div>
        </div>
    </div>
</section>