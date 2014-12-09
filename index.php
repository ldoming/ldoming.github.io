<?php
 
    if(isset($_POST['email'])) {
     
        // EDIT THE 2 LINES BELOW AS REQUIRED
        $email_to = "lymuel.doming@gmail.com";
        $email_subject = "Message from Portfolio";
        //$errors = new array();
     
        function died($error) {
            // your error code can go here
            echo "We are very sorry, but there were error(s) found with the form you submitted. ";
            echo "These errors appear below.<br /><br />";
            echo $error."<br /><br />";
            echo "Please go back and fix these errors.<br /><br />";
            die();
     
        }

        // validation expected data exists
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
             $errors['name_error'] = (empty($_POST['name']))? "Please input your name": null;
             $errors['email_error'] = (empty($_POST['email']))? "Please input your email address": null;
             $errors['message_error'] = (empty($_POST['message']))? "Please input your message": null;
        }
     
         
     
        $name = $_POST['name']; // required
        $email_from = $_POST['email']; // required
        $comments = $_POST['message']; // required
     
        $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
     
        if(!preg_match($email_exp,$email_from)) {
            $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
        }
     
        $string_exp = "/^[A-Za-z .'-]+$/";
     
        if(!preg_match($string_exp,$name)) {
            $error_message .= 'The First Name you entered does not appear to be valid.<br />';
        }
      
        if(strlen($comments) < 2) {
            $error_message .= 'The Comments you entered do not appear to be valid.<br />';
        }
     
        if(strlen($error_message) > 0) {
            $errors['error_message'] = $error_message;
        }
     
        if(empty($errors)){

            function get_client_ip() {
                $ipaddress = '';
                if ($_SERVER['HTTP_CLIENT_IP'])
                    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                else if($_SERVER['HTTP_X_FORWARDED_FOR'])
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                else if($_SERVER['HTTP_X_FORWARDED'])
                    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                else if($_SERVER['HTTP_FORWARDED_FOR'])
                    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                else if($_SERVER['HTTP_FORWARDED'])
                    $ipaddress = $_SERVER['HTTP_FORWARDED'];
                else if($_SERVER['REMOTE_ADDR'])
                    $ipaddress = $_SERVER['REMOTE_ADDR'];
                else
                    $ipaddress = 'UNKNOWN';
                return $ipaddress;
            }

            $email_message = "Form details below.\n\n";
     
            function clean_string($string) {
                $bad = array("content-type","bcc:","to:","cc:","href");
                return str_replace($bad,"",$string);
            }

            $email_message .= "Name: ".clean_string($name)."\n";
            $email_message .= "Email: ".clean_string($email_from)."\n";
            $email_message .= "Message: ".clean_string($comments)."\n";
            $email_message .= "Client IP address: ".clean_string(get_client_ip())."\n";
            // create email headers
            $headers = 'From: '.$email_from."\r\n".
            'Reply-To: '.$email_from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
            @mail($email_to, $email_subject, $email_message, $headers);
        }else{
            $return['name'] = $name;
            $return['email_from'] = $email_from;
            $return['comments'] = $comments;
        }
    }
 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="img/profile.png" type="image/x-icon">

    <title>Lymuel Sadili Doming :: Portfolio</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/freelancer.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/default.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Cabin+Sketch:bold" rel="stylesheet" type="text/css" />

    <!-- IE8 support for HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="#page-top">Portfolio</a>-->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="page-scroll">
                        <a href="#page-top">Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">My Projects</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About Me</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact Me</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive img-circle" style="border:3px solid black;max-width:242px;" src="img/profile-image.jpg" alt="" title="Lymuel Doming">
                    <div class="intro-text">
                        <span class="name">Lymuel Sadili Doming</span>
                        <hr class="star-light">
                        <span class="skills">Web Developer - Desktop Developer - Freelancer</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/nfa_project.png" class="img-responsive" alt="" />
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/pn_database_project.png" class="img-responsive" alt="" />
                    </a>
                </div>
                <!--
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/circus.png" class="img-responsive" alt="" />
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/game.png" class="img-responsive" alt="" />
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/safe.png" class="img-responsive" alt="" />
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/submarine.png" class="img-responsive" alt="" />
                    </a>
                </div>
                -->
            </div>
        </div>
    </section>

    <section class="success" id="about">

        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About Me</h2>
                    <hr class="star-light">
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-4">
                    <p id="about_me_message">
                        I am a web developer and desktop developer living in Cebu, Philippines. I started programming during my senior year in college.
                        I am also an experience Systems and Network administrator.
                    </p> 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="legend" id="legend_header">
                                <h1>Legend:</h1>
                                <div class="skills">
                                    <ul>
                                        <li class="php">PHP <small>(Native, OOP and MVC)</small></li>
                                        <li class="jq">JavaScript <small>(Native and Jquery)</small></li>
                                        <li class="html">HTML5</li>
                                        <li class="css">CSS3</li>
                                        <li class="sql">MySQL</li>
                                        <li class="ror">Ruby on Rails</li>
                                        <li class="others">Others <small>(Photoshop and etc.)</small></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>                        
                    </div>
                    <div class="col-lg-8">
                        <div id="diagram"></div>
                    </div>
                </div>

                <div class="get">
                    <div class="arc">
                        <span class="text">JavaScript</span>
                        <input type="hidden" class="percent" value="95" />
                        <input type="hidden" class="color" value="#97BE0D" />
                    </div>
                    <div class="arc">
                        <span class="text">CSS3</span>
                        <input type="hidden" class="percent" value="86" />
                        <input type="hidden" class="color" value="#D84F5F" />
                    </div>
                    <div class="arc">
                        <span class="text">HTML5</span>
                        <input type="hidden" class="percent" value="84" />
                        <input type="hidden" class="color" value="#88B8E6" />
                    </div>
                    <div class="arc">
                        <span class="text">MySQL</span>
                        <input type="hidden" class="percent" value="92" />
                        <input type="hidden" class="color" value="#2A89E5" />
                    </div>
                    <div class="arc">
                        <span class="text">Ruby on Rails</span>
                        <input type="hidden" class="percent" value="82" />
                        <input type="hidden" class="color" value="#01D5A3" />
                    </div>
                    <div class="arc">
                        <span class="text">PHP</span>
                        <input type="hidden" class="percent" value="98" />
                        <input type="hidden" class="color" value="#2AE5D6" />
                    </div>
                    <div class="arc">
                        <span class="text">Others</span>
                        <input type="hidden" class="percent" value="81" />
                        <input type="hidden" class="color" value="#F0C933" />
                    </div>
                </div>


        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form role="form" method="POST" action="http://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?>" id="contact_me_form" onsubmit="contact_me_validation();return false" novalidate>
                        <div class="row">
                            <span class="error_message" id="name_error_message"><?php echo (isset($errors['name_error']))?$errors['name_error']:null; ?></span>
                            <div class="form-group col-xs-12 floating-label-form-group">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" name="name" placeholder="Name" id="name">
                            </div>
                        </div>
                        <div class="row">
                            <span class="error_message" id="email_error_message"><?php echo (isset($errors['email_error']))?$errors['email_error']:null; ?></span>
                            <div class="form-group col-xs-12 floating-label-form-group">
                                <label for="email">Email Address</label>
                                <input class="form-control" type="email" name="email" placeholder="Email Address" id="email">
                            </div>
                        </div>
                        <div class="row">
                            <span class="error_message" id="message_error_message"><?php echo (isset($errors['message_error']))?$errors['message_error']:null; ?></span>
                            <div class="form-group col-xs-12 floating-label-form-group">
                                <label for="message">Message</label>
                                <textarea placeholder="Message" class="form-control" rows="5" name="message" id="message"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-lg btn-success">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <p>
                        <h3>Location</h3>
                        Purok 5, Cambinocot
                        <br/>Cebu City
                        <br/>6000, Philippines
                        </p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li><a href="https://www.facebook.com/lychell2012" class="btn-social btn-outline" target="_blank" title="Facebook Page"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/u/0/115985312393094468489/posts" class="btn-social btn-outline" target="_blank" title="Google plus">
                                    <i class="fa fa-fw fa-google-plus"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://www.onlinejobs.ph/jobseekers/info/162346" class="btn-social btn-outline" target="_blank" title="Onlinejobs.ph">
                                    <i class="fa fa-fw fa-hand-o-up"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <p>
                        <h3>Contacts</h3>
                            <i class="fa fa-envelope"></i>&nbsp;&nbsp; Email: lymuel.doming@gmail.com
                            <br/>
                            <i class="fa fa-skype"></i>&nbsp;&nbsp; Skype: lymueldoming1993
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; 2014 - Lymuel Doming
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="scroll-top page-scroll visible-xs visble-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>NFA Sales Tracking System</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/nfa_project.png" class="img-responsive img-centered" alt="">
                            <p style='text-align:left;'>
                            This system is used to track the sales of NFA rice in our area. This system we are able to track the equal distribution of the Rice and its kilo limit.
                            </p>
                            <p style='text-align:left;'>System Requirements:</p>
                            <p style='text-align:left;padding-left:2em'>- Desktop/Laptop</p>
                            <p style='text-align:left;padding-left:2em'>- Laser barcode</p>
                            <p style='text-align:left;padding-left:2em'>- Barcoded member ID's</p>
                            <ul class="list-inline item-details">
                                <li>Client: <strong><a href="#portfolio">Personal/Family Use</a></strong>
                                </li>
                                <li>Date: <strong><a href="#portfolio">June 2014</a></strong>
                                </li>
                                <li>Service: <strong><a href="#portfolio">Web Development</a></strong>
                                </li>
                                <li>Programming Language: <strong><a href="#portfolio">PHP, Javascript, Jquery, HTML5, CSS3, Bootstrap</a></strong>
                                </li>
                                <li>Link: <strong><a href="https://ldoming@bitbucket.org/ldoming/nfa_sales_tracking_system.git" target="_blank">Source Code</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/pn_database_project.png" class="img-responsive img-centered" alt="">
                            <p>This system is used to link all the Passerelles Numeriques informations from Cambodia, Philippines, Vietnam and Paris. 
                            It keeps the student records such as student university schedule, student health record, student activity log and violations and etc.
                            </p>
                            <p style='text-align:left;'>System Requirements:</p>
                            <p style='text-align:left;padding-left:2em'>- Web browser and internet connection</p>
                            <ul class="list-inline item-details">
                                <li>Client: <strong><a href="http://www.passerellesnumeriques.org/" target="_blank">Passerelles Numeriques</a></strong>
                                </li>
                                <li>Date: <strong><a href="#portfolio">2013-2014</a></strong>
                                </li>
                                <li>Service: <strong><a href="#portfolio">Web Development</a></strong>
                                </li>
                                <li>Programming Language: <strong><a href="#portfolio">PHP, Javascript, Jquery, HTML, CSS</a></strong></li>
                                <li>Link: <strong><a href="https://github.com/passerellesnumeriques/Students-Database" target="_blank">Source Code</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/circus.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client: <strong><a href="http://startbootstrap.com">Start Bootstrap</a></strong>
                                </li>
                                <li>Date: <strong><a href="http://startbootstrap.com">April 2014</a></strong>
                                </li>
                                <li>Service: <strong><a href="http://startbootstrap.com">Web Development</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/game.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client: <strong><a href="http://startbootstrap.com">Start Bootstrap</a></strong>
                                </li>
                                <li>Date: <strong><a href="http://startbootstrap.com">April 2014</a></strong>
                                </li>
                                <li>Service: <strong><a href="http://startbootstrap.com">Web Development</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/safe.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client: <strong><a href="http://startbootstrap.com">Start Bootstrap</a></strong>
                                </li>
                                <li>Date: <strong><a href="http://startbootstrap.com">April 2014</a></strong>
                                </li>
                                <li>Service: <strong><a href="http://startbootstrap.com">Web Development</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="img/portfolio/submarine.png" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                                <li>Client: <strong><a href="http://startbootstrap.com">Start Bootstrap</a></strong>
                                </li>
                                <li>Date: <strong><a href="http://startbootstrap.com">April 2014</a></strong>
                                </li>
                                <li>Service: <strong><a href="http://startbootstrap.com">Web Development</a></strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
    <script src="js/freelancer.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/init.js"></script>
    <script src="js/raphael.js"></script>

</body>

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">


          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-7243260-2']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

    </script>

</html>

