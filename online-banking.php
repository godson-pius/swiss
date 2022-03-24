
    <?php require_once 'inc/header.php'; ?>

    <header class="header-image ken-burn-center light" data-parallax="true" data-natural-height="500" data-natural-width="1920" data-bleed="0" style="background-color: #404D60;" data-offset="0">
        <div class="container">
            <h1>Resource</h1>
            <h2>Jumpstart Application</h2>
        </div>
    </header>
    <main>
        <section class="section-base">
            <div class="container">
                <div class="row row-fit-lg">
                    <div class="col-lg-8">
                        <p>
                            * Indicates a required field.<br><br>

                            Check the box(es) below to select the service(s) for which you are applying and then complete 
                            the personal information fields. Read the various disclosures and if you agree click the "Submit" 
                            button at the bottom of the page. <br><br>

                        <h2>Bank Service</h2><br>
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Online Banking
                         </label><br>
                         <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Loan
                         </label>
                        </p><br>

                        <p>
                            <h2>Personal Information</h2><br>

                           
                            <form id="UCiFI" action="thtmekit/scripts/php/contact-form.php" class="form-box form-ajax form-ajax-wp" method="post" data-email="">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input id="FName" name="FName" placeholder="First Name:" type="text" class="input-text" required=""><br>
                                        <input id="LName" name="LName" placeholder="LastName:" type="text" class="input-text" required=""><br>
                                        <input id="Address" name="Address" placeholder="Current Street Address:" type="text" class="input-text" required=""><br>
                                        <input id="Number" name="Number" placeholder="Primary Phone:" type="number" class="input-text" required=""><br>
                                        <input id="Email" name="Email" placeholder="Email Address:" type="email" class="input-text" required=""><br>
                                        <input id="Marital" name="Marital" placeholder="Marital Status:" type="text" class="input-text" required=""><br>

                                        <label for="state">State :  </label>
                                        <select class="form-control" id="state" required="">
                                          <option>State1</option>
                                          <option>State2</option>
                                          <option>State3</option>
                                          <option>State4</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <input id="MName" name="MName" placeholder="Middle Name:" type="text" class="input-text" required=""><br>
                                        <input id="FName" name="FName" placeholder="Date of Birth:" type="text" class="input-text" required=""><br>
                                        <input id="city" name="city" placeholder="City:" type="text" class="input-text" required=""><br>
                                        <input id="Secondary Phone" name="Secondary Phone" placeholder="Secondary Phone:" type="text" class="input-text" required=""><br>
                                        <input id="Marital" name="Marital" placeholder="Occupation: " type="text" class="input-text" required=""><br>
                                        <input id="Country" name="Country" placeholder="Country:" type="text" class="input-text" required=""><br>
                                        <label for="sel1">Gender :</label>
                                        <select class="form-control" id="Gender" required="">
                                          <option>Male</option>
                                          <option>Female</option>
                                          <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="space-xs" />
                                <button class="btn btn-xs" type="submit">Submit This Application</button><br><br>
                                <!-- <div class="success-box">
                                    <div class="alert alert-success">
                                        Congratulations. Your message has been sent successfully.
                                    </div>
                                </div>
                                <div class="error-box">
                                    <div class="alert alert-warning">
                                        Error, please retry. Your message has not been sent.
                                    </div>
                                </div> -->
                            </form>
                                
                        </p>
                    </div>
                     
                     <div class="col-lg-4">
                        <div class="grid-item">
                            <div class="cnt-box cnt-box-top-icon boxed">
                                <i class="im-monitor-phone"></i>
                                <div class="caption">
                                    <h2>Great Rates!</h2>
                                    <p>
                                        Great Rates!
                                    </p>
                                </div>
                            </div>
                        </div><br>
                    
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <i class="im-bar-chart2"></i>
                            <div class="caption">
                                <h2>Growing in Jonesboro</h2>
                                <p>
                                    Swiss Apex Private Financial Park
                                </p>
                            </div>
                        </div>
                    </div><br>

                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <i class="im-bar-chart2"></i>
                            <div class="caption">
                                <h2>Stop. Think. Connect.</h2>
                                <p>
                                    A campaign to promote safer online practices.
                                </p>
                            </div>
                        </div>
                    </div><br>
                </div>
            
    <?php require_once 'inc/footer.php'; ?>
    
</body>
</html>