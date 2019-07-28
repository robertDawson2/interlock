<!-- ==================================================
                                            contact info & navbar
    ================================================== -->
    <?php
        include_once './header.html';
    ?>
        <!-- ==================================================
                                                      End navbar
    ================================================== -->

    <section id="careers" class="sec-padding text-center">
        <div class="container">
            <h1 class="title-h p-relative txt-white">
                <span class="fw-200">Interlock Paving</span><span class="color-orange"> Careers</span>
                <span class="line p-absolute bg-orange"></span>
            </h1>
            <div class="row">
                    <div class="col-sm-12 col-md-3 success d-none"></div>
                    <div class="col-sm-12 col-md-6 alert-success text-center success d-none"></div>
            </div>
            <div class="row">
                    <div class="col-sm-12 col-md-3 error d-none"></div>
                    <span class="col-sm-12 col-md-6 upload-error alert-danger text-center error d-none"></span>
            </div>
            <?php if (isset($emailSent)) {
                echo $emailSent;
            }
            /*if (!is_array($emailSent) && $emailSent !== false) { ?>
                <div class="row">
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="col-sm-12 col-md-6 alert-success text center">Your application has been submitted.</div>
                </div>
            <?php } elseif ($emailSent === false && isset($errors['upload'])) { ?>
                <div class="row">
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="col-sm-12 col-md-6 alert-danger text center"><?php echo $errors['upload'] ?></div>
                </div>
            <?php } */?>
            <div class="row mb-20px">
                
                <div class="col-sm-12 col-md-6">
                    <br><br>
                    <h5 class="fw-600 color-orange">Laborer</h5>    
                    <p class="bg-fff color-333 p-10px height-250px"style="overflow-y:scroll" >
                        Entry level laborer able to perform tasks invloving physical labor at construction sites. May operate hand and power tools 
                        of all types such as air hammers, earth tampers,cement mixers, surveying and measuring equipment and a variety of other equipment and 
                        instruments. May clean and prepare site, dig trenches, and clear up rubble, debris and other waste materials. May assist other craft workers.
                    </p>
                    <a class="btn btn-block appFormTrigger" data-toggle="modal" data-target="#appModal" data-position="Laborer">Apply Now</a>
                </div>

                
                <div class="col-sm-12 col-md-6">
                    <br><br>
                    <h5 class="fw-600 color-orange">Foreman</h5>    
                    <p class="bg-fff color-333 p-10px height-250px" style="overflow-y:scroll">
                        Construction Crew Foreman with at least 5 years experience in the interlocking paving industry. Must be knowledgable at coordinating operations
                        and oversee workers. As the liaison between workers and management, the Foreman is the key person in charge of overseeing the project. Applicant
                        must be well organized , have a keen awarness of material expenses, knowledgable in employee safety, a solid background in field installations, 
                        strong leadership skills, good attitude, the ability to direct the work of others, and document field conditions.
                    </p>
                    <a class="btn btn-block appFormTrigger" data-toggle="modal" data-target="#appModal" data-position="Foreman">Apply Now</a>
                </div>

                <div class="col-sm-12 col-md-6">
                    <br><br>
                    <h5 class="fw-600 color-orange">Equipment Operator</h5>    
                    <p class="bg-fff color-333 p-10px height-250px" style="overflow-y:scroll">
                        Entry level to experienced Equipment Operator. The Equipment Operator is responsible for the safe and efficient operation of multiple pieces of construction
                        equipment. The applicant must be proficient in the use of a diverse range of construction equipment, including Excavators, Loaders, Dozers, Rollers, Graders,
                        Pavers, Skid Steers and other pieces of equipment, Applicant have a good attitude, punctual, organized, and team oriented. 
                    </p>
                    <a class="btn btn-block appFormTrigger" data-toggle="modal" data-target="#appModal" data-position="Equipment Operator">Apply Now</a>
                </div>
                
                <div class="col-sm-12 col-md-6">
                    <br><br>
                    <h5 class="fw-600 color-orange">CDL Driver</h5>    
                    <p class="bg-fff color-333 p-10px height-250px" style="overflow-y:scroll">
                        Entry level to experienced CDL Driver. Applicant must be a dependable and efficient driver who possesses a great deal physical and mental 
                        stamina. Applicant must able to withstand long hours on the road. Must be organized and detailed oriented, and confortable working independently.
                        A clean Driving record is a must and commercial driving experience is preferred.
                    </p>
                    <a class="btn btn-block appFormTrigger" data-toggle="modal" data-target="#appModal" data-position="CDL Driver">Apply Now</a>
                </div>
            </div>
            <!-- ==================================================
            Application Form Modal
            ====================================================-->
            <?php
                include_once './applicationForm.php';
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
        include_once './footer.html';
        ?>
        <!-- ==================================================
                                                      End footer
    ================================================== -->