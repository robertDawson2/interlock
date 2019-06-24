    <!-- ==================================================
                                          contact info & navbar
    ================================================== -->
    <?php
    include_once './header.html';
    ?>
    <!-- ==================================================
                                          End navbar
    ================================================== -->
    <!-- ==================================================
                                          careers
    ================================================== -->
    <section id="application" style="padding:30px;">
            <h1 class="title-h p-relative txt-white">
                <span class="fw-200">Interlock Paving</span> Careers
                <span class="line p-absolute bg-orange"></span>
            </h1>
    <?php
        
        ?>
            <form action="./emailHelper.php" method="POST">
                <div class="row txt-white">
                    <div class="col-sm-12 col-md-6 form-group">
                        <label for="first">First Name<span class="color-orange"> *</span></label>
                        <input class="form-control text-center" type="text" name="fname" id="fname" tabindex="1" required autofocus="true">
                        <label for="phone">Phone Number<span class="color-orange"> *</span></label>
                        <input class="form-control text-center" type="tel" name="phone" id="phone" tabindex="3" required>
                        <label for="addr1">Address 1<span class="color-orange"> *</span></label>
                        <input class="form-control text-center" type="text" name="addr1" id="addr1" tabindex="5" required>
                    </div>
                    <div class="col-sm-12 col-md-6 form-group">
                        <label for="first">Last Name<span class="color-orange"> *</span></label>
                        <input class="form-control text-center" type="text" name="lname" id="lname" tabindex="2" required>
                        <label for="email">Email Address<span class="color-orange"> *</span></label>
                        <input class="form-control text-center" type="text" name="lname" id="lname" tabindex="4" required>
                        <label for="addr2">Address 2</label>
                        <input class="form-control text-center" type="email" name="email" id="email" tabindex="6">
                    </div>
                </div>
                <div class="row txt-white">
                    <div class="col-sm-12 col-md-4">
                        <label for="city">City<span class="color-orange"> *</span></label>
                        <input class="form-control text-center" type="text" name="city" id="city" tabindex="7" required>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <label for="state">State<span class="color-orange"> *</span></label>
                        <select class="form-control" type="text" name="state" id="state" tabindex="8" required>
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
                        <input class="form-control text-center" type="text" name="zip" id="zip" tabindex="9" required>
                    </div>
                    <div class=" col-sm-12 col-md-4">
                        <label for="position">Position<span class="color-orange"> *</span></label>
                        <input disabled class="form-control text-center" type="text" name="position" id="position" tabindex="10" required
                            value="<?php
                                if (isset($_POST['position1'])) {
                                    echo "Laborer";
                                } elseif (isset($_POST['position2'])) {
                                    echo "Foreman";
                                } elseif (isset($_POST['position3'])) {
                                    echo "Heavy Machine Operator";
                                } elseif (isset($_POST['position4'])) {
                                    echo "CDL Driver";
                                }
                            ?>"
                        >
                    </div>
                    <div class=" col-sm-12 col-md-4">
                        <label for="appliedBefore">Have you applied before?<span class="color-orange"> *</span></label>
                        <select class="form-control text-center" type="text" name="appliedBefore" id="appliedBefore" tabindex="11" required>
                            <option value="No" selected>No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </div>
                    <div class=" col-sm-12 col-md-4">
                        <label for="referedBy">Refered by</label>
                        <input id="referedBy" class="form-control text-center" type="text" name="referedBy" id="referedBy" tabindex="12">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 hideApplied">
                        <label for="resume">When did you apply<span class="color-orange"> *</span></label>
                        <input class="form-control text-center" type="date" name="appliedDate" id="appliedDate">
                    </div>
                    <div class="col-md-4 hideApplied"></div>
                    <div class="col-md-4 hideApplied"></div>
                    <div class="col-sm-12 col-md-4">
                        <label for="resume">Upload Resume<span class="color-orange"> *</span></label>
                        <input type="file" name="resume" id="resume" required>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <button class="btn form-control text-center" type="submit" style="background:#cb0000; color:white; border:1px solid black">Submit</button>
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