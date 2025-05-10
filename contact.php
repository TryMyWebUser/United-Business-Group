<?php
include("header.php");
?>

        <div class="breadcumb-wrapper" data-bg-src="assets/img/update_2/bg/breadcumb_bg_2.jpg">
            <div class="container z-index-common">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title">Contact Us</h1>
                    <ul class="breadcumb-menu">
                        <li><a href="index.php">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="space">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-4">
                        <div class="contact-feature">
                            <div class="contact-feature_icon"><img src="assets/img/update_2/icon/contact_feature_1.svg" alt="Icon" /></div>
                            <h4 class="box-title">Our Address</h4>
                            <span class="contact-feature_text">
                            93/2A, Near Sri Velavan Steels, Sathy Main Road, Saravanampatti, Coimbatore - 641035.
                            </span>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="contact-feature">
                            <div class="contact-feature_icon"><img src="assets/img/update_2/icon/contact_feature_2.svg" alt="Icon" /></div>
                            <h4 class="box-title">Email Address</h4>
                            <span class="contact-feature_text"><a href="mailto:ubggroup.sf@gmail.com">ubggroup.sf@gmail.com</a></span><br>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="contact-feature">
                            <div class="contact-feature_icon"><img src="assets/img/update_2/icon/contact_feature_3.svg" alt="Icon" /></div>
                            <h4 class="box-title">Phone Number</h4>
                            <span class="contact-feature_text"><a href="tel:+919750996666">+91 97509 96666</a> <a href="tel:+918754056333">+91 87540 56333</a></span>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-sm-6">
                        <div class="contact-feature">
                            <div class="contact-feature_icon"><img src="assets/img/update_2/icon/contact_feature_4.svg" alt="Icon" /></div>
                            <h4 class="box-title">Opening Time</h4>
                            <span class="contact-feature_text">
                                Mon - Friday 09:AM - 09:PM<br />
                                Saturday closed
                            </span>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="" id="mapSec">
            <div class="contact-map2">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d148621.96470999677!2d76.92430551159708!3d11.083720921187387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba8f7284ed1b305%3A0xb935cc7f5cb2159e!2sUNITED%20BUSINESS%20GROUP!5e1!3m2!1sen!2sin!4v1746002671268!5m2!1sen!2sin" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <section class="space-bottom contact-form-sec">
            <div class="container">
                <div class="reservation-area">
                    <h4 class="sec-title text-center mb-30">Send Us Message</h4>
                    <form action="https://themeholy.com/html/pizzan/demo/mail.php" method="POST" class="booking-form3 ajax-contact">
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-6"><input type="text" class="form-control rounded-2" id="name" name="name" placeholder="Your Name" /> <i class="far fa-user"></i></div>
                            <div class="form-group col-lg-4 col-md-6"><input type="tel" class="form-control rounded-2" id="number" name="number" placeholder="Phone Number" /> <i class="far fa-phone"></i></div>
                            <div class="form-group col-lg-4"><input type="text" class="form-control rounded-2" id="subject" name="subject" placeholder="Subject" /> <i class="far fa-tag"></i></div>
                            <div class="form-group col-12"><textarea name="message" id="message" cols="30" rows="3" class="form-control rounded-2" placeholder="Write Message"></textarea> <i class="far fa-comment"></i></div>
                        </div>
                        <div class="form-btn text-center">
                            <button class="th-btn rounded-2">Send Message<i class="fa-solid fa-arrow-right ms-2"></i></button>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </section>
        
        

<?php
include("footer.php");
?>