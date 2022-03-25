
    <?php require_once 'inc/header.php'; ?>

    <main>
        <section class="section-map section-map-right">
            <div class="google-map" data-marker="media/marker.png" data-coords="21.028511,105.804817" data-zoom="12" data-marker-pos="left"></div>
            <div class="container">
                <div class="title">
                    <h2>Our contacts</h2>
                    <p>Information</p>
                </div>
                <ul class=" text-list-line">
                    <li><b>Address</b><hr /><p>Vietnam</p></li>
                    <li><b>Email</b><hr /><p>info@swissapexfinancial.com</p></li>
                    <li><b>Opening hours</b><hr /><p>8:30AM - 4PM</p></li>
                </ul>
                <hr class="space-sm" />
                <!-- <div class="icon-links icon-social icon-links-grid social-colors">
                    <a class="facebook"><i class="icon-facebook"></i></a>
                    <a class="twitter"><i class="icon-twitter"></i></a>
                    <a class="instagram"><i class="icon-instagram"></i></a>
                    <a class="pinterest"><i class="icon-pinterest"></i></a>
                </div> -->
            </div>
        </section>  
        <section class="section-base">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="title">
                            <h2>Contact us here</h2>
                            <p>Write us</p>
                        </div>
                        <form action="themekit/scripts/contact-form/contact-form.php" class="form-box form-ajax" method="post" data-email="example@domain.com">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Name</p>
                                    <input id="name" name="name" placeholder="" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-6">
                                    <p>Email</p>
                                    <input id="email" name="email" placeholder="" type="email" class="input-text" required>
                                </div>
                            </div>
                            <p>Messagge</p>
                            <textarea id="messagge" name="messagge" class="input-textarea" placeholder="" required></textarea>
                            <button class="btn btn-xs" type="submit">Send messagge</button>
                            <div class="success-box">
                                <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                            </div>
                            <div class="error-box">
                                <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <hr class="space visible-md" />
                        <div class="title">
                            <h2>When are we open?</h2>
                            <p>Information</p>
                        </div>
                        <p>
                        Begin your journey with us today to enable us constantly improve your banking experiences.
                        </p>
                        <table class="table table-border table-time">
                            <thead>
                                <tr>
                                    <th>Day</th>
                                    <th>Working Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Monday - Friday</td><td>8:30AM - 4PM</td></tr>
                                <tr><td>Weekends</td><td>Closed</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php require_once 'inc/footer.php'; ?>
</body>
</html>