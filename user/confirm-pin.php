<?php
require_once '../admin/inc/functions/config.php';

if (isset($_POST['submit'])) {
    $response = confirmPin($_POST);
    if ($response === true) {
        // echo "<script>alert('entered')</script>";
        redirect_to("index");
    } else {
        // echo "<script>alert('error')</script>";
        $errors = $response;
        if (is_array($errors)) {
            foreach ($errors as $err) {
                echo "<script>alert('$err')</script>";
            }
        } else {
            echo "<script>alert('$errors')</script>";
        }
    }
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Confirm Pin | Swiss Apex Financial</title>

    <meta name="description" content="Confirm Pin | Swiss Apex Financial">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Confirm Pin | Swiss Apex Financial">
    <meta property="og:site_name" content="BCA Mellon">
    <meta property="og:description" content="Confirm Pin | Swiss Apex Financial">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="../admin/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../admin/assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../admin/assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="../admin/assets/css/dashmix.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="../admin/assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
    
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('../admin/assets/media/photos/photo12@2x.jpg');">
                <div class="row no-gutters justify-content-center bg-black-75">
                    <!-- Main Section -->
                    <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                        <div class="p-3 w-100">
                            <!-- Header -->
                            <div class="mb-3 text-center">
                                <a class="link-fx text-success font-w700 font-size-h1" href="index.html">
                                    <span class="text-dark">SAF</span><span class="text-success">Bank</span>
                                </a>
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Enter account pin</p>
                            </div>
                            
                            <div class="row no-gutters justify-content-center">
                                <div class="col-sm-8 col-xl-6">
                                    <form action="" method="POST">
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="number" class="form-control form-control form-control-alt" name="pin" placeholder="Enter account pin">
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-block btn-hero-lg btn-hero-success">
                                                <i class="fa fa-fw fa-plus mr-1"></i> Confirm Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                    <!-- END Main Section -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>PLEASE READ THESE TERMS AND CONDITIONS CAREFULLY. BY ACCESSING THIS WEBSITE YOU AGREE TO BE BOUND BY THE TERMS AND CONDITIONS BELOW. THESE TERMS AND CONDITIONS ARE SUBJECT TO CHANGE. ANY CHANGES WILL BE INCORPORATED INTO THE TERMS AND CONDITIONS POSTED TO THIS WEBSITE FROM TIME TO TIME. IF YOU DO NOT AGREE WITH THESE TERMS AND CONDITIONS, PLEASE DO NOT ACCESS THIS WEBSITE.

                            Unauthorized use of JPMorgan BCA Mellon's Websites and systems, including but not limited to unauthorized entry into JPMorgan BCA Mellon's systems, misuse of passwords, posting of objectionable or offensive content or your unauthorized use of legally protected third party content, or misuse of any information posted to a site, is strictly prohibited.

                            You acknowledge that JPMorgan BCA Mellon may disclose and transfer any information that you provide through this Website to (i) any company within the JPMorgan BCA Mellon group, its affiliates agents or information providers; (ii) to any other person or entity with your consent; or (iii) if we have a right or duty to disclose or are permitted or compelled to so disclose such information by law. You consent to the transmission, transfer or processing of such information to, or through, any country in the world, as we deem necessary or appropriate (including to countries outside the EEA), and by using and providing information through this Website you agree to such transfers. Use of this Website, including any patterns or characteristics concerning your interaction with it, may be monitored, tracked and recorded. Anyone using this Website expressly consents to such monitoring, tracking and recording.

                            You agree not to attempt to log on to the Website from any country under sanctions by the Office of Foreign Assets Control (OFAC). Information regarding which countries are under sanctions may be obtained on the U.S. Department of the Treasury website. Any attempt to log on to the Website from one of these countries may result in your access being restricted and/or terminated.

                            If you use JPMorgan BCA Mellon’s Website or systems to access data related to any account(s) of which you are not the owner or authorized user as reflected in JPMorgan Chase’s systems, you shall indemnify, defend, and hold harmless JPMorgan BCA Mellon & Co. and all of its direct and indirect subsidiaries, officers, directors, employees, agents, successors, and assigns from any and all losses, liabilities, damages, and all related costs and expenses, arising from, relating to, or resulting (directly or indirectly) from such access. Further, without limiting JPMorgan BCA Mellon’s rights or your obligations under any other provision of these Terms and Conditions, and notwithstanding the same, in the event of any actual or reasonably suspected unauthorized access to the personal information of a customer (including but not limited to customer names, addresses, phone numbers, bank and credit card account numbers, income and credit histories, and social security numbers) under your control or subsequent to and arising from your past exercise of control, direct damages in connection with any such breach will include the cost and expenses of investigation and analysis (including by law firms and forensic firms), correction or restoration of any destroyed, lost or altered data, notification to affected customers, offering and providing of credit monitoring, customers service, or other remediation services, and any related cost. JPMorgan BCA Mellon & Co.’s rights to indemnity under this section are in addition to all other rights and remedies available at Law or in equity. Any exercise by JPMorgan BCA Mellon & Co. of its rights to indemnification shall be without prejudice to such other rights and remedies. You manifest your assent to this indemnity by accessing account data through JPMorgan BCA Mellon’s Website or systems, notwithstanding the terms of any agreement you have with a customer or an account owner stating otherwise. This indemnity includes but is not limited to losses associated with (1) a data breach of your system(s) and (2) a data breach of the system(s) of any person or entity with whom you provided or shared JPMorgan BCA Mellon customer account data.

                            Copyright Notices

                            The works of authorship contained in the chase.com Website (the "Website"), including but not limited to all design, text, sound recordings and images, are owned, except as otherwise expressly stated, by JPMorgan BCA Mellon & Co. or one of its subsidiaries, ("JPMorgan BCA Mellon"). Except as otherwise expressly stated herein, they may not be copied, transmitted, displayed, performed, distributed (for compensation or otherwise), licensed, altered, framed, stored for subsequent use or otherwise used in whole or in part in any manner without BCA Mellon's prior written consent, except to the extent permitted by the Copyright Act of 1976 (17 U.S.C. § 107), as amended, and then, only with notices of JPMorgan BCA Mellon's proprietary rights provided that you may download information and print out hard copies for your personal use, so long as you do not remove any copyright or other notice as may be contained in information, as downloaded.

                            Trademark Notices

                            Chase is the marketing name for the retail financial services activities of JPMorgan BCA Mellon & Co. and its subsidiaries and affiliates in the United States. "BCA Mellon," "JPMorgan," "JPMorgan Chase," the JPMorgan BCA Mellon logo and the Octagon Symbol are trademarks of JPMorgan BCA Mellon Bank, N.A., a wholly-owned subsidiary of JPMorgan BCA Mellon & Co. Other featured words or symbols, used to identify the source of goods and services, may be the trademarks of their respective owners.

                            Web Content and Materials

                            The information on this Website is for information purposes only. It is believed to be reliable, but JPMorgan BCA Mellon does not warrant its completeness, timeliness or accuracy. The information on the Website is not intended as an offer or solicitation for the purchase of JPMorgan BCA Mellon stock, any other security or any financial instrument.

                            Securities (including mutual funds and variable life insurance), annuities and insurance products are not bank deposits and are not insured by the FDIC or any other agency of the United States, nor are they obligations of, nor insured or guaranteed by, JPMorgan BCA Mellon Bank, N.A., CISC, CIA, CMIA or their affiliates. Securities (including mutual funds and variable life insurance) and annuities involve investment risks, including the possible loss of value.

                            The information and materials contained in this Website-and the terms and conditions of the access to and use of such information and materials-are subject to change without notice. Products and services described, as well as, associated fees, charges, interest rates, and balance requirements may differ among geographic locations. Not all products and services are offered at all locations.

                            The jpmorgan.com Website and the jpmorganBCA Mellon.com Website contain separate terms and conditions, which are in addition to these terms and conditions. In the event of a conflict, the additional terms and conditions will govern for those sections or pages. In addition, certain portions or pages of this Website are subject to additional disclosures and disclaimers. In the event of a conflict between those disclosures and disclaimers, and these terms and conditions, the additional disclosures and disclaimers will govern for those portions or pages.

                            You agree that (i) you will not engage in any activities related to the Website that are contrary to applicable law, regulation or the terms of any agreements you may have with JPMorgan BCA Mellon, and (ii) in circumstances where locations of the Website require identification for process, you will establish commercially reasonable security procedures and controls to limit access to your password or other identifying information to authorized individuals.

                            JPMORGAN BCA Mellon OR ITS SUPPLIERS MAY DISCONTINUE OR MAKE CHANGES IN THE INFORMATION, PRODUCTS OR SERVICES DESCRIBED HEREIN AT ANY TIME WITHOUT PRIOR NOTICE TO YOU AND WITHOUT ANY LIABILITY TO YOU. ANY DATED INFORMATION IS PUBLISHED AS OF ITS DATE ONLY, AND JPMORGAN BCA Mellon DOES NOT UNDERTAKE ANY OBLIGATION OR RESPONSIBILITY TO UPDATE OR AMEND ANY SUCH INFORMATION. JPMORGAN BCA Mellon RESERVES THE RIGHT TO TERMINATE ANY OR ALL WEBSITE OFFERINGS OR TRANSMISSIONS WITHOUT PRIOR NOTICE TO THE USER. FURTHERMORE, BY OFFERING THIS WEBSITE AND INFORMATION, PRODUCTS OR SERVICES VIA THIS WEBSITE, NO DISTRIBUTION OR SOLICITATION IS MADE BY JPMORGAN BCA Mellon TO ANY PERSON TO USE THE WEBSITE OR SUCH INFORMATION, PRODUCTS OR SERVICES IN JURISDICTIONS WHERE THE PROVISION OF THE WEBSITE AND SUCH INFORMATION, PRODUCTS OR SERVICES IS PROHIBITED BY LAW.

                            Potential Disruption of Service

                            Access to the Website may from time to time be unavailable, delayed, limited or slowed due to, among other things:

                            Hardware failure, including among other things failures of computers (including your own computer), servers, networks, telecommunication lines and connections, and other electronic and mechanical equipment
                            Software failure, including among other things, bugs, errors, viruses, configuration problems, incompatibility of systems, utilities or applications, the operation of firewalls or screening programs, unreadable codes, or irregularities within particular documents or other content
                            Overload of system capacities
                            Damage caused by severe weather, earthquakes, wars, insurrection, riots, civil commotion, act of God, accident, fire, water damage, explosion, mechanical breakdown or natural disasters
                            Interruption (whether partial or total) of power supplies or other utility of service
                            strike or other stoppage (whether partial or total) of labor
                            Governmental or regulatory restrictions, exchange rulings, court or tribunal orders or other human intervention
                            Any other cause (whether similar or dissimilar to any of the foregoing) whatsoever beyond the control of JPMorgan BCA Mellon
                            Links to Other Sites

                            Links to non-JPMorgan BCA Mellon Websites are provided solely as pointers to information on topics that may be useful to the Websites, and JPMorgan BCA Mellon has no control over the content on such non-JPMorgan BCA Mellon Websites. If you choose to link to a Website not controlled by JPMorgan BCA Mellon, JPMorgan BCA Mellon makes no warranties, either express or implied, concerning the content of such site, including the accuracy, completeness, reliability or suitability thereof for any particular purpose, nor does BCA Mellon warrant that such site or content is free from any claims of copyright, trademark or other infringement of the rights of third parties or that such site or content is devoid of viruses or other contamination. JPMorgan BCA Mellon does not guarantee the authenticity of documents on the Internet. Links to non-JPMorgan BCA Mellon sites do not imply any endorsement of or responsibility for the opinions, ideas, products, information or services offered at such sites, or any representation regarding the content at such sites.

                            LIMITATION OF LIABILITY

                            BECAUSE OF THE POSSIBILITY OF HUMAN AND MECHANICAL ERROR AS WELL AS OTHER FACTORS, THE WEBSITE (INCLUDING ALL INFORMATION AND MATERIALS CONTAINED ON THE WEBSITE) IS PROVIDED "AS IS" "AS AVAILABLE". JPMORGAN BCA Mellon AND THIRD PARTY DATA PROVIDERS ARE NOT PROVIDING ANY WARRANTIES AND REPRESENTATIONS REGARDING THE WEBSITE. JPMORGAN BCA Mellon AND THIRD PARTY DATA PROVIDERS DISCLAIM ALL WARRANTIES AND REPRESENTATIONS OF ANY KIND WITH REGARD TO THE WEBSITE, INCLUDING ANY IMPLIED WARRANTIES OF MERCHANTABILITY, NON-INFRINGEMENT OF THIRD PARTY RIGHTS, FREEDOM FROM VIRUSES OR OTHER HARMFUL CODE, OR FITNESS FOR ANY PARTICULAR PURPOSE. FURTHER, JPMORGAN BCA Mellon WILL NOT BE LIABLE FOR ANY DELAY, DIFFICULTY IN USE, INACCURACY OF INFORMATION, COMPUTER VIRUSES, MALICIOUS CODE OR OTHER DEFECT IN THIS WEBSITE, OR FOR THE INCOMPATIBILITY BETWEEN THIS WEBSITE AND FILES AND THE USER'S BROWSER OR OTHER SITE ACCESSING PROGRAM. NOR WILL JPMORGAN BCA Mellon BE LIABLE FOR ANY OTHER PROBLEMS EXPERIENCED BY THE USER DUE TO CAUSES BEYOND JPMORGAN BCA Mellon'S CONTROL. NO LICENSE TO THE USER IS IMPLIED IN THESE DISCLAIMERS.

                            JPMORGAN BCA Mellon AND THIRD PARTY DATA PROVIDERS DO NOT WARRANT THE ACCURACY, ADEQUACY, OR COMPLETENESS OF THE INFORMATION AND MATERIALS CONTAINED ON THE WEBSITE AND EXPRESSLY DISCLAIMS LIABILITY FOR ERRORS OR OMISSIONS IN THE MATERIALS AND INFORMATION. FURTHERMORE, JPMORGAN BCA Mellon AND ITS AFFILIATES WILL NOT BE LIABLE FOR ANY DELAY, DIFFICULTY IN USE, COMPUTER VIRUSES, MALICIOUS CODE, OR OTHER DEFECT IN WEBSITE, ANY INCOMPATIBILITY BETWEEN THE WEBSITE AND THE USER'S FILES AND THE USER'S BROWSER OR OTHER SITE ACCESSING PROGRAM, OR ANY OTHER PROBLEMS EXPERIENCED BY THE USER DUE TO CAUSES BEYOND JPMORGAN BCA Mellon AND ITS AFFILIATES' CONTROL. NO LICENSE TO THE USER IS IMPLIED IN THESE DISCLAIMERS. NOTHING HEREIN SHALL BE CONSTRUED AS LIMITING OR REDUCING JPMORGAN BCA Mellon'S RESPONSIBILITIES AND OBLIGATIONS TO CLIENTS IN ACCORDANCE WITH APPLICABLE LAWS AND REGULATIONS.

                            UNDER NO CIRCUMSTANCES WILL JPMORGAN BCA Mellon BE LIABLE FOR ANY LOST PROFITS, LOST OPPORTUNITY OR ANY INDIRECT, CONSEQUENTIAL, INCIDENTAL, SPECIAL, PUNITIVE, OR EXEMPLARY DAMAGES ARISING OUT OF ANY USE OF OR INABILITY TO USE THE WEBSITE OR ANY PORTION THEREOF, REGARDLESS OF WHETHER JPMORGAN BCA Mellon HAS BEEN APPRISED OF THE LIKELIHOOD OF SUCH DAMAGES OCCURRING AND REGARDLESS OF THE FORM OF ACTION, WHETHER IN CONTRACT, WARRANTY, TORT, (INCLUDING NEGLIGENCE), STRICT LIABILITY, OR OTHERWISE.

                            Enforceability and Governing Law

                            In the event any of the terms or provisions of these Terms and Conditions shall be held to be unenforceable, the remaining terms and provisions shall be unimpaired and the unenforceable term or provision shall be replaced by such enforceable term or provision as comes closest to the intention underlying the unenforceable term or provision. These Terms and Conditions shall be subject to any other agreements you have entered into with JPMorgan BCA Mellon. The user's access to and use of the BCA Mellon.com Website, and the terms of this disclaimer are governed by the laws of the State of New York.

                            Patent Notice

                            JPMorgan BCA Mellon is licensed under U.S. Patent Numbers 5,910,988 and 6,032,137.

                            Rev. Aug. 2016</p>
                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Terms Modal -->


    <!--
            Dashmix JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out ../admin/assets/_js/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the ../admin/assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            ../admin/assets/js/core/jquery.min.js
            ../admin/assets/js/core/bootstrap.bundle.min.js
            ../admin/assets/js/core/simplebar.min.js
            ../admin/assets/js/core/jquery-scrollLock.min.js
            ../admin/assets/js/core/jquery.appear.min.js
            ../admin/assets/js/core/js.cookie.min.js
        -->
    <script src="../admin/assets/js/dashmix.core.min.js"></script>

    <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at ../admin/assets/_js/main/app.js
        -->
    <script src="../admin/assets/js/dashmix.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="../admin/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="../admin/assets/js/pages/op_auth_signup.min.js"></script>
</body>

</html>