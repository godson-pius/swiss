
    <?php require_once 'inc/header.php'; ?>

    <header class="header-image ken-burn-center light" data-parallax="true" data-natural-height="500" data-natural-width="1920" data-bleed="0" data-image-src="" data-offset="0" style="background-color: #404D60;">
        <div class="container">
            <h1>Jumpstart Application</h1>
            <h2>Deposit services</h2>            
            
        </div>
    </header>

    <main>
        <section class="section-base">
            <div class="container">

                <p>
                    Check the box(es) below to select the service(s) for which you are applying and then complete the personal information 
                    fields. Read the various disclosures and if you agree click the "Submit" button at the bottom of the page.
                    <br>
                    <mark>NB: <bold> * </bold> Indicates a required field.</mark>
                </p>
                <hr class="space">

                <div class="title">
                    <h2>Bank Service</h2>
                </div>
                <p>
                    <div class="form-checkbox">
                        <input type="checkbox" id="check" name="check" value="check" required>
                        <label for="check">Online Banking</label>
                        <br>
                        <input type="checkbox" id="check" name="check" value="check" required>
                        <label for="check">Loan</label>
                    </div>
                </p>

                <p>
                    <div class="title">
                        <h2>Personal Information</h2>
                    </div>

                    <form action="themekit/scripts/contact-form/contact-form.php" class="form-box form-ajax" method="post" data-email="example@domain.com">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Firstname *</h4>
                                <input id="name" name="Firstname *" placeholder="Firstname" type="text" class="input-text" required>
                            </div>
                            <div class="col-lg-6">
                                <h4>Middle name</h4>
                                <input id="name" name="Middle Name or Initial" placeholder="Middle name or Initial" type="email" class="input-text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Lastname *</h4>
                                <input id="name" name="Lastname" placeholder="Lastname *" type="text" class="input-text" required>
                            </div>
                            <div class="col-lg-6">
                                <h4>Date of Birth *</h4>
                                <input id="name" name="Date of Birth" placeholder="(mm/dd/yy)" type="date" class="input-text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Current Street Address *</h4>
                                <input id="name" name="Current Street Address" placeholder="Current Street Address *" type="text" class="input-text" required>
                            </div>
                            <div class="col-lg-6">
                                <h4>City *</h4>
                                <input id="name" name="City *" placeholder="City *" type="text" class="input-text" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>State *</h4>
                                <input id="name" name="State" placeholder="State *" type="text" class="input-text" required>
                            </div>
                            <div class="col-lg-6">
                                <h4>Country *</h4>
                                <input id="name" name="Country" placeholder="Country *" type="text" class="input-text" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Primary Phone Number *</h4>
                                <input id="name" name="Primary phone number" placeholder="Primary Phone Number *" type="tel" class="input-text" required>
                            </div>
                            <div class="col-lg-6">
                                <h4>Secondary Phone Number *</h4>
                                <input id="name" name="secondary phone number" placeholder="Secondary Phone Number" type="tel" class="input-text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Email Address *</h4>
                                <input id="email" name="email address" placeholder="Email Address *" type="email" class="input-text" required>
                            </div>
                            <div class="col-lg-6">
                                <h4>Occupation *</h4>
                                <input id="name" name="occupation" placeholder="Occupation *" type="text" class="input-text" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Marital Status *</h4>
                                <select class="input-select" >
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Widowed</option>
                                    <option>Divorced</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <h4>Gender *</h4>
                                <select class="input-select" >
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-xs" type="submit">SUBMIT</button>
                            <div class="success-box">
                                <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                            </div>
                            <div class="error-box">
                                <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                            </div>
                    </form>
                </p>
                

                


            </div>
        </section>
    </main>

    <?php require_once 'inc/footer.php'; ?>
    
</body>
</html>