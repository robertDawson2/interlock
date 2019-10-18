    <!-- ==================================================
                                              contact info & navbar
    ================================================== -->
    <?php
        include_once './includes/mainHeader.html';
    ?>
    <!-- ==================================================
                                                  End navbar
    ================================================== -->
    
    <!-- ==================================================
                                                      load-wrapp
    ================================================== -->
        <div class="load-wrapp">
            <div class="wrap">
                <ul class="dots-box">
                    <li class="dot"><span></span></li>
                    <li class="dot"><span></span></li>
                    <li class="dot"><span></span></li>
                    <li class="dot"><span></span></li>
                    <li class="dot"><span></span></li>
                </ul>
            </div>
        </div>
        <!-- ==================================================
                                                      End load-wrapp
    ================================================== -->


        <!-- ==================================================
                                                      welcome-area
    ================================================== -->
        <section class="welcome-video p-relative o-hidden width-100">
            <video loop muted poster="#" class="video-background" id="interlock-video">
                <source src="images/projectsNew/Patriots Plaza Edited.mp4" type="video/mp4">
            </video>
            <img src="images/projectsNew/1.jpg" class="mobile-still d-none" alt="">
            <div class="overlay-bg-50 sec-padding flex-center text-center">
                <div class="container">
                    <div class="welcome-text">
                        <h4 class="txt-white fw-400 mb-20px">Our Mission.  Our Promise.</h4>
                        <h1 class="mb-20px color-fff fw-400">Our <span class="color-orange fw-800">Commitment.</span></h1>
                        <p class="txt-white">At Interlock, we work together to ensure, maintain, and continuously improve our high
                            standards for quality and service as a leader in the architectural paving industry.</p>
                         <div class="row text-center">
                            <div id="mail-success" class="col-sm-12 col-md-6 offset-md-3 alert-success text-center success d-none">
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="mail-success-msg"></div>
                            </div>
                            <div id="mail-error" class="col-sm-12 col-md-6 offset-md-3 alert-danger text-center error d-none">
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="mail-error-msg"></div>
                            </div>
                        </div>
                        <a class="main-btn btn-1 mt-30px mr-5px ml-5px d-none" id="quote-btn" data-toggle="modal" data-target="#quote-modal">Get a quote</a>
                    </div>
                    <div class="modal fade" id="quote-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="min-width:60%;" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Request A <span class="color-orange">Quote</span></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="quote-form" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <input type="hidden" name="quote" value="1">
                                            <label for="firstname">First Name <span class="color-orange">*</span></label>
                                            <br>
                                            <span class="fname-error d-none error"></span>
                                            <input type="text" name="firstname" id="firstName" class="form-control text-center" tabindex="1">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="lastname">Last Name<span class="color-orange">*</span></label>
                                            <br>
                                            <span class="lname-error d-none error"></span>
                                            <input type="text" name="lastname" id="lastName" class="form-control text-center" tabindex="2">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="phone">Phone Number <span class="color-orange">*</span></label>
                                            <br>
                                            <span class="phone-error d-none error"></span>
                                            <input type="text" name="phone" id="phone" maxlength="10" class="form-control text-center" tabindex="3">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="email">Email Address <span class="color-orange">*</span></label>
                                            <br>
                                            <span class="email-error d-none error"></span>
                                            <input type="email" name="email" id="email" class="form-control text-center" tabindex="4">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="propertyType">Property Type <span class="color-orange">*</span></label>
                                            <br>
                                            <span class="propertyType-error d-none error"></span>
                                            <select name="propertyType" class="form-control text-center" id="propertyType" tabindex="5">
                                                <option value="">Choose One</option>
                                                <option value="residential">Residential</option>
                                                <option value="commercial">Commercial</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="message">Message <span class="color-orange">*</span></label>
                                            <br>
                                            <span class="message-error d-none error"></span>
                                            <textarea name="message" id="message" class="form-control text-center" style="min-height:100px;" tabindex="6"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" tabindex="7" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" tabindex="8" class="btn btn-success">Request Quote</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================================================
                                                      End welcome-area
    ================================================== -->
        <!-- ==================================================
                                              numbers
================================================== -->
        <section class="numbers text-center">
            <div class="overlay-bg-80 sec-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="mb-25px mt-25px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.1s">
                                <i class="icon-document color-orange fs-35 radius-50 mb-25px transition-4"></i>
                                <p class="count fs-35 color-fff fw-600 mb-7px">895</p>
                                <h3 class="color-aaa fw-300">Projects</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="mb-25px mt-25px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">
                                <i class="icon-video color-orange fs-35 radius-50 mb-25px transition-4"></i>
                                <p class="count fs-35 color-fff fw-600 mb-7px">800000</p>
                                <h3 class="color-aaa fw-300">Sqft. Installed</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="mb-25px mt-25px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">
                                <i class="icon-trophy color-orange fs-35 radius-50 mb-25px transition-4"></i>
                                <p class="count fs-35 color-fff fw-600 mb-7px">90</p>
                                <h3 class="color-aaa fw-300">Awards</h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="mb-25px mt-25px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.7s" >
                                <i class="icon-happy color-orange fs-35 radius-50 mb-25px transition-4"></i>
                                <p class="count fs-35 color-fff fw-600 mb-7px">1082</p>
                                <h3 class="color-aaa fw-300">Happy Clients</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================================================
                                                      End numbers
    ================================================== -->

    <!-- ==================================================
                                                      about-area
    ================================================== -->
    <section id='about' class="about-area sec-padding bg-f6f6f6">
            <div class="container">
                <h1 class="title-h p-relative">
                    <span class="fw-200">About</span><span class="color-orange"> Interlock Paving</span>
                    <span class="line p-absolute bg-orange"></span>
                </h1>
                <p class="title-p"><span class="">Interlock Paving was established in 1985. We are licensed in Maryland, Washington DC, Virginia, and Delaware.
                    We deliver the best workmanship, customer service, and award winning quality in the architectural and interlocking paving industry. Please fell free to contact us for a free quote.
                </span></p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="about-image wow fadeInLeft" data-wow-delay="0.4s" id="about-pic">
                            <img src="images/tempteam/Paul_Foreman.JPEG" alt="about" id="about-pic">
                        </div>
                        <div class="about-image wow fadeInLeft" data-wow-delay="0.4s" id="about-pic">
                            <img src="images/HighJumper.png" alt="about" id="highjumper">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-text wow fadeInRight" data-wow-delay="0.7s">
                            <h3 class="fw-600 mb-20px"><span class="fw-200"> A Message From </span><span class="color-orange"> Our Owner</span></h3>
                            <p class="mb-20px">
                                At Interlock, we view every assignment as a challange and an opportunity to exceed our own standards.
                            </p>
                            <p class="mb-20px">
                                Like the high jumper, whose goal is to constantly raise the bar on his or her personal best, all of us 
                                at Interlock strive to achive the same - in the field or in the office, during the project and even after its completion.
                            </p>
                            <p class="mb-20px">
                                If we live up to our reputation as one of the best contractors in our industry, we must always reach high to surpass our own records for 
                                high-quality service.
                            </p>
                            <div class="mt-15px color-orange fw-700">Paul Foreman, President</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================================================
                                                      End about-area
    ================================================== -->

        <!-- ==================================================
                                              work-area
================================================== -->
        <section id='ourWork' class="work-area bg-333  sec-padding" >
            <div class="container">
                <h1 class="title-h txt-white p-relative">
                    <span class="fw-200">Featured</span><span class="color-orange"> Projects</span>
                    <span class="line p-absolute bg-orange"></span>
                </h1>
                <p class="title-p txt-white">From inception to completion, we build partnerships with our clients based on trust, quality work, and outstanding customer service. </p>
                <div id="previewArea">
                    <div title="Click to close" id="imagePreview" class="d-none" src="" alt="">
                        <div data-number="0" id="enlarged"></div>
                    </div>
                </div>
                <!-- grid -->
                <div class="owl-carousel owl-theme photo-owl-carousel">
                    <!-- gallery item -->

                    <img src="images/projectsNew/1_patriot_plaza.jpg" data-number="1" alt="image">

                    <img src="images/projectsNew/2_howard_highschool.jpeg" data-number="2" alt="image">
                    
                    <img src="images/projectsNew/3_christ_church_harbor_apartments_2.jpg" data-number="3" alt="image">

                    <img src="images/projectsNew/4_decker_quad_entrance.jpg" data-number="4" alt="image">
                    
                    <img src="images/projectsNew/5_ud.jpg" data-number="5" alt="image">
                    
                    <img src="images/projectsNew/6_md_house_of_delegates_1.jpg" data-number="6" alt="image">
                    
                    <img src="images/projectsNew/7_ud_b.jpg" data-number="7" alt="image">
                    
                    <img src="images/projectsNew/8_17swg.jpg" data-number="8" alt="image">
                    
                    <img src="images/projectsNew/9_balto_conv_ctr_1.jpg" data-number="9" alt="image">
                    
                    <img src="images/projectsNew/10_hcc_dragon.jpg" data-number="10" alt="image">
                    
                    <img src="images/projectsNew/11_waters_edge.jpg" data-number="11" alt="image">
                    
                    <img src="images/projectsNew/12_pooldeck_kelly.jpg" data-number="12" alt="image">
                    
                </div>
            </div>
        </section>
        <!-- ==================================================
                                                      End work-area
    ================================================== -->
    
            <!-- ==================================================
                                                      video-area
    ================================================== -->
        <section style="display: none;" class="video-area sec-padding bg-f6f6f6 p-relative">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="video-image mt-25px mb-25px p-relative">
                            <img alt="img" src="images/vid_thumb.png">
                            <a class="p-absolute" href="https://youtu.be/DiyPk9F47VI" data-lity>
                                <i class="fa fa-play p-relative fs-20 bg-orange color-fff transition-2 pl-3px radius-50 text-center color-fff-hvr bg-333-hvr"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-25px mb-25px">
                            <h3 class="mb-20px fw-600"><span class="fw-200">In The </span> Media... </h3>
                            <p class="mb-30px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================================================
                                                      End video-area
    ================================================== -->

        
        <!-- ==================================================
                                                      contact-area
    ================================================== -->
        <section id='contact' class="contact-area sec-padding bg-fff">
            <div class="container">

                <div class="row">

                    <div class="col-md-12 text-center">
                        <h2 class="p-relative ">
                            <span class="fw-200 text-center">Contact </span><span class="color-orange"> Us</span>
                        </h2>
                        <div class='color-orange fw-600 fs-15'>MHIC #26272</div>
                        <div class="address">
                            <p class="">2191 Greenspring Drive,  Timonium, MD 21093.</p>
                        </div>
                        <div class="address">
                            <p class="">410-682-4942</p>
                        </div>
                        <div class="address">
                            <p class=""><a href="mailto:info@interlock.com">info@interlockpaving.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================================================
                                                          End contact-area
        ================================================== -->

        <!-- ==================================================
                                                      map
    ================================================== -->
        <div id="map">
        </div>
        <!-- ==================================================
                                                      End map
    ================================================== -->

    
    <!-- ==================================================
    scroll-top-btn
    ================================================== -->
    <div class="scroll-top-btn text-center">
        <i class="fa fa-angle-up fs-20 color-fff bg-333 bg-orange-hvr radius-50" style="border:1px solid black"></i>
    </div>
    <!-- ==================================================
    End scroll-top-btn
    ================================================== -->
    
    <!-- ==================================================
                                                  footer-area
================================================== -->
    <?php
        include_once './includes/mainFooter.html';
    ?>
    <!-- ==================================================
                                                  End footer-area
================================================== -->