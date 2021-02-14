<section id="contact">
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="section-title">@lang('dictionary.contact.title')</h3>
            <p class="section-description">@lang('dictionary.about.description')</p>
        </div>
    </div>
    <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452"
    width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="container wow fadeInUp mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4">
                <div class="info">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p>A108 Adam Street<br>New York, NY 535022</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope"></i>
                        <p>info@example.com</p>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+1 5589 55488 55s</p>
                    </div>
                </div>
                <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-8">
                <div class="form">
                    <div id="sendmessage">@lang('dictionary.contact.form.send_message')</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name"
                            placeholder="@lang('dictionary.contact.form.name.placeholder')" data-rule="minlen:4"
                            data-msg="@lang('dictionary.contact.form.name.validation_message')" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email"
                            placeholder="@lang('dictionary.contact.form.email.placeholder')" data-rule="email"
                            data-msg="@lang('dictionary.contact.form.email.validation_message')" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject"
                            placeholder="@lang('dictionary.contact.form.subject.placeholder')" data-rule="minlen:4"
                            data-msg="@lang('dictionary.contact.form.subject.validation_message')" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5"
                            placeholder="@lang('dictionary.contact.form.message.placeholder')" data-rule="required"
                            data-msg="@lang('dictionary.contact.form.message.validation_message')"></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button type="submit" class="beige-btn">@lang('dictionary.contact.form.send')</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>