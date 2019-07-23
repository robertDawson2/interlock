    <!-- ==================================================
                                          contact info & navbar
    ================================================== -->
    <?php
        include_once './header.html';
    ?>
    <!-- ==================================================
                                          End navbar
    ================================================== -->

    <?php 
        // form validation and emailing
        include_once 'emailHelper.php';
    ?>

    <!-- ==================================================
                                          careers
    ================================================== -->
    <section id="application">
            <h1 class="title-h p-relative txt-white text-center">
                <span class="fw-200">Interlock Paving</span> Careers
                <hr style="background:#af0011; width:25%; height:2px;"/>
            </h1>
            <?php if (!is_array($emailSent) && $emailSent !== false) { ?>
                <div class="row">
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="col-sm-12 col-md-6 alert-success text center">Your application has been submitted.</div>
                </div>
            <?php } elseif (is_array($emailSent) && isset($errors['upload'])) { ?>
                <div class="row">
                    <div class="col-sm-12 col-md-3"></div>
                    <div class="col-sm-12 col-md-6 alert-danger text center"><?php echo $errors['upload'] ?></div>
                </div>
            <?php } ?>
               <form action="application.php" method="POST" enctype="multipart/form-data" id="appForm">
                <div class="row txt-white">
                    <div class="col-sm-12 col-md-6 form-group">
                        <label for="first">First Name<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['fname'])) { 
                                foreach ($errors['fname'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="text" name="fname" id="fname" tabindex="1" 
                            value="<?php if (isset($_POST['fname'])) {echo $_POST['fname'];} ?>" required autofocus="true">
                        <label for="phone">Phone Number<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['phone'])) { 
                                foreach ($errors['phone'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="tel" name="phone" id="phone" tabindex="3" 
                            value="<?php if (isset($_POST['phone'])) {echo $_POST['phone'];} ?>" required>
                        <label for="addr1">Address 1<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['addr1'])) { 
                                foreach ($errors['addr1'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="text" name="addr1" id="addr1" tabindex="5" 
                            value="<?php if (isset($_POST['addr1'])) {echo $_POST['addr1'];} ?>" required>
                    </div>
                    <div class="col-sm-12 col-md-6 form-group">
                        <label for="lname">Last Name<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['lname'])) { 
                                foreach ($errors['lname'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="text" name="lname" id="lname" tabindex="2" 
                            value="<?php if (isset($_POST['lname'])) {echo $_POST['lname'];} ?>" required>
                        <label for="email">Email Address<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['email'])) { 
                                foreach ($errors['email'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="text" name="email" id="email" tabindex="4" 
                            value="<?php if (isset($_POST['email'])) {echo $_POST['email'];} ?>" required>
                        <label for="addr2">Address 2</label>
                        <?php if (isset($errors['addr2'])) { 
                                foreach ($errors['addr2'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="email" name="addr2" id="addr2" tabindex="6"
                            value="<?php if (isset($_POST['addr2'])) {echo $_POST['addr2'];} ?>" >
                    </div>
                </div>
                <div class="row txt-white">
                    <div class="col-sm-12 col-md-4">
                        <label for="city">City<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['city'])) { 
                                foreach ($errors['city'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="text" name="city" id="city" tabindex="7" 
                            value="<?php if (isset($_POST['city'])) {echo $_POST['city'];} ?>" required>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <label for="state">State<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['state'])) { 
                                foreach ($errors['state'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <select class="form-control" name="state" id="state" tabindex="8" required>
                            <option value="" selected="selected">Select a State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <label for="zip">Zip Code<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['zip'])) { 
                                foreach ($errors['zip'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="text" name="zip" id="zip" tabindex="9" value="<?php if (isset($_POST['zip'])) {echo $_POST['zip'];}?>" required>
                    </div>
                    <div class=" col-sm-12 col-md-4">
                        <?php if (isset($_POST['position'])) {
                            echo $_POST['position'];
                        } ?>
                        <label for="position">Position<span class="color-orange"> *</span></label>
                        <input disabled class="form-control text-center" type="text" tabindex="10" required
                            value="<?php
                                if (isset($_POST['position1'])) {
                                    echo "Laborer";
                                } elseif (isset($_POST['position2'])) {
                                    echo "Foreman";
                                } elseif (isset($_POST['position3'])) {
                                    echo "Heavy Machine Operator";
                                } elseif (isset($_POST['position4'])) {
                                    echo "CDL Driver";
                                } elseif (isset($_POST['position'])) {
                                    echo $_POST['position'];
                                }
                            ?>"
                        >
                        <input type="hidden" name="position" value="<?php
                                if (isset($_POST['position1'])) {
                                    echo "Laborer";
                                } elseif (isset($_POST['position2'])) {
                                    echo "Foreman";
                                } elseif (isset($_POST['position3'])) {
                                    echo "Heavy Machine Operator";
                                } elseif (isset($_POST['position4'])) {
                                    echo "CDL Driver";
                                } elseif (isset($_POST['position'])) {
                                    echo $_POST['position'];
                                }
                            ?>"
                        >
                    </div>
                    <div class=" col-sm-12 col-md-4">
                        <label for="appliedBefore">Have you applied before?<span class="color-orange"> *</span></label>
                        <select class="form-control" type="text" name="appliedBefore" id="appliedBefore" tabindex="11" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class=" col-sm-12 col-md-4">
                        <label for="referedBy">Refered by</label>
                        <?php if (isset($errors['referedBy'])) { 
                                foreach ($errors['referedBy'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input id="referedBy" class="form-control text-center" type="text" name="referedBy" id="referedBy" tabindex="12" value="<?php if (isset($_POST['referedBy'])) {echo $_POST['referedBy'];} ?>">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 hideApplied">
                        <label for="appliedDate">When did you apply<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['appliedDate'])) { 
                                foreach ($errors['appliedDate'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input class="form-control text-center" type="date" name="appliedDate" id="appliedDate" value="<?php if (isset($_POST['appliedDate'])) {echo $_POST['appliedDate'];} ?>">
                    </div>
                    <div class="col-md-4 hideApplied"></div>
                    <div class="col-md-4 hideApplied"></div>
                    <div class="col-sm-12 col-md-4">
                        <label for="resume">Upload Resume<span class="color-orange"> *</span></label>
                        <?php if (isset($errors['resume'])) { 
                                foreach ($errors['resume'] as $key) { ?>
                                    <span class="error"><?php echo $key ?></span>
                        <?php   } } ?>
                        <input type="file" name="resume" required />
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <button class="btn form-control text-center" name="submitApp" type="submit" style="background:#af0011; color:white; border:1px solid black">Submit</button>
                    </div>
                </div>
            </form>
    </section>
            
    <!-- ==================================================
                                          End careers
    ================================================== -->

    <!-- ==================================================
                                                      footer-area
    ================================================== -->
    <?php
            include_once './footer.html';
        ?>
        <!-- ==================================================
                                                      End footer-area
    ================================================== -->