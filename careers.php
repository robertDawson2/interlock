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
        <h1 class="title-h p-relative text-center txt-white">
            <span class="fw-200">Career</span> Oppurtunities
            <hr style="background:#cb0000; width:25%; height:2px;"/>
        </h1>
        <p class="txt-white text-center team-p">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
        </p>
        <form id="form1" action="./application.php" method="POST">
            <div class="row mb-20px">
                <div class="col-md-3 col-lg-4"></div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a onclick="$('#form1').submit();" ><input class="btn btn-block" name="position1" value="Laborer"></a>
                </div>
            </div>
        </form>
        <form id="form2" action="./application.php" method="POST">
            <div class="row mb-20px">
                <div class="col-md-3 col-lg-4"></div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a onclick="$('#form2').submit();" ><input class="btn btn-block" name="position2" value="Foreman"></a>
                </div>
            </div>
        </form>
        <form id="form3" action="./application.php" method="POST">
            <div class="row mb-20px">
                <div class="col-md-3 col-lg-4"></div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a onclick="$('#form3').submit();" ><input class="btn btn-block" name="position3" value="Heavy Machine Operator"></a>
                </div>
            </div>
        </form>
        <form id="form4" action="./application.php" method="POST">
            <div class="row mb-20px">
                <div class="col-md-3 col-lg-4"></div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <a onclick="$('#form4').submit();" ><input class="btn btn-block" name="position4" value="CDL Driver"></a>
                </div>
            </div>
        </form>
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