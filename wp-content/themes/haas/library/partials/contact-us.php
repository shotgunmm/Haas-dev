<? global $contact_us ?>

<section id="contact" data-speed="6" data-type="background" data-identity="contact">
    <div class="container">
        <div class="row">
            <h2 class="sec-title">Contact us</h2>

            <div class="contact-block flicker-fix">
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
                    <div class="contact-form">
                        <!-- SharpSpring Form for Newletter Opt In  -->

<script type="text/javascript">

    var ss_form = {'account': 'MzawMDA0NDA0AAA', 'formID': 'SzYwtzBKtUzWNU01MNc1SbVM001KsUjSTTUxNjZMSTVKTDQ0BAA'};

    ss_form.width = '100%';

    ss_form.height = '1000';

    ss_form.domain = 'app-3QG839UM2W.marketingautomation.services';

    // ss_form.hidden = {'Company': 'Anon'}; // Modify this for sending hidden variables, or overriding values

</script>

<script type="text/javascript" src="https://koi-3QG839UM2W.marketingautomation.services/client/form.js?ver=1.1.1"></script>
                        <!--form method="post" id="frm-contact" class="flicker-fix">
                            <input type="text" placeholder="First Name*" id="frm-name" class="name-in" name="first_name">
                            <input type="text" placeholder="Last Name*" id="frm-last-name" class="name-in" name="last_name">
                            <input type="text" placeholder="Email*" id="frm-email" class="email-in" name="email">
                            <input type="text" placeholder="Company*" id="frm-website" class="full-in" name="company">
                            <span class="custom-sel">
                              <select class="select-in styled" name="subject" id="frm-subject" name="subject">
                                  <option selected="selected" value="">Select your subject</option>
                                  <option value="Buy hops or hop products">Buy hops or hop products</option>
                                  <!--<option value="Make an Innovations Brewery Reservation">Make an Innovations Brewery Reservation</option>-->
                                  <!--option value="Request More Information">Request More Information</option>
                              </select>
                            </span>
                            <textarea class="text-in" placeholder="Type your message here" cols="2" rows="2" name="comment"></textarea>
                            <button class="submit-btn">Submit</button>
                            <div class="alert alert-success" role="alert" style="display:none;">
                                <span class="alert-link" id="success-error-message"></span>
                            </div>
                        </form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
