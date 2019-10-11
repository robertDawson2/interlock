<!-- ==================================================
                                            contact info & navbar
    ================================================== -->
    <?php
        include_once './includes/header.html';
    ?>
        <!-- ==================================================
                                                      End navbar
    ================================================== -->

    <section id="careers" class="sec-padding text-center">
        <div class="container">
            <h1 class="title-h p-relative">
                <span class="fw-200 color-666">Interlock Paving</span><span class="color-orange"> Careers</span>
                <span class="line p-absolute bg-orange"></span>
            </h1>
            <div class="row">
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
            <div class="row mb-20px text-left">
                
                <div class="col-sm-12 col-md-5">
                    <br><br>
                    <h5 class="fw-600 color-666">Laborer</h5>    
                    <p class="color-666 " >
                        Entry level laborer able to perform tasks invloving physical labor at construction sites. May operate hand and power tools 
                        of all types such as air hammers, earth tampers,cement mixers, surveying and measuring equipment and a variety of other equipment and 
                        instruments. May clean and prepare site, dig trenches, and clear up rubble, debris and other waste materials. May assist other craft workers.
                    </p>
                    <a class="btn appFormTrigger" data-toggle="modal" data-target="#appModal" data-position="Laborer">Apply Now</a>
                    <hr class="line-hr">
                </div>
                
                <div class="col-sm-12 col-md-1 left-job-spacer"></div>
                <div class="col-sm-12 col-md-1"></div>
                
                <div class="col-sm-12 col-md-5">
                    <br><br>
                    <h5 class="fw-600 color-666">Foreman</h5>    
                    <p class="color-666 " >
                        Construction Crew Foreman with at least 5 years experience in the interlocking paving industry. Must be knowledgable at coordinating operations
                        and oversee workers. As the liaison between workers and management, the Foreman is the key person in charge of overseeing the project. Applicant
                        must be well organized , have a keen awarness of material expenses, knowledgable in employee safety, a solid background in field installations, 
                        strong leadership skills, good attitude, the ability to direct the work of others, and document field conditions.
                    </p>
                    <a class="btn appFormTrigger" data-toggle="modal" data-target="#appModal" data-position="Foreman">Apply Now</a>
                    <hr class="line-hr">
                </div>
                
                <div class="col-sm-12">
                        <br />
                        <hr class="hide-on-mobile" style="background:#af0011">
                </div>

                <div class="col-sm-12 col-md-5">
                    <br><br>
                    <h5 class="fw-600 color-666">Equipment Operator</h5>    
                    <p class="color-666 height-250px" >
                        Entry level to experienced Equipment Operator. The Equipment Operator is responsible for the safe and efficient operation of multiple pieces of construction
                        equipment. The applicant must be proficient in the use of a diverse range of construction equipment, including Excavators, Loaders, Dozers, Rollers, Graders,
                        Pavers, Skid Steers and other pieces of equipment, Applicant have a good attitude, punctual, organized, and team oriented. 
                    </p>
                    <a class="btn appFormTrigger" data-toggle="modal" data-target="#appModal" data-position="Equipment Operator">Apply Now</a>
                    <hr class="line-hr">
                </div>
                
                <div class="col-sm-12 col-md-1 left-job-spacer"></div>
                <div class="col-sm-12 col-md-1"></div>
                
                <div class="col-sm-12 col-md-5">
                    <br><br>
                    <h5 class="fw-600 color-666">CDL Driver</h5>    
                    <p class="color-666 height-250px" >
                        Entry level to experienced CDL Driver. Applicant must be a dependable and efficient driver who possesses a great deal physical and mental 
                        stamina. Applicant must able to withstand long hours on the road. Must be organized and detailed oriented, and confortable working independently.
                        A clean Driving record is a must and commercial driving experience is preferred.
                    </p>
                    <a class="btn appFormTrigger" data-toggle="modal" data-target="#appModal" data-position="CDL Driver">Apply Now</a>
                    <hr class="line-hr"w>
                </div>
            </div>
            <!-- ==================================================
            Application Form Modal
            ====================================================-->
            <?php
                include_once './includes/applicationForm.php';
            ?>
        
            <!-- ==================================================
            Application Form Modal End
            ====================================================-->
        </div>
    </section>
    <!-- ==================================================
    footer
    ================================================== -->
    <?php
        include_once './includes/footer.html';
        ?>
        <!-- ==================================================
                                                      End footer
    ================================================== -->