<?php
session_start();

if(isset($_SESSION['nomeutente'])){
    header("Location: index.php");
}

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $esistente = false;

    $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
    mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
    $query = "SELECT username, password, Tipo, ID FROM Utente";
    $result = mysql_query($query) or die("QUERY FALLITA");

    while($r = mysql_fetch_array($result,MYSQL_ASSOC)){
        if(strcmp($r['username'],$username) == 0 && strcmp($r['password'],$password) == 0){
            $_SESSION['nomeutente'] = $username;
            $_SESSION['tipoutente'] = $r['Tipo'];
            $_SESSION['idutente'] = $r['ID'];
            $esistente = true;
            header("Location: index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>DJob | Login</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="Roman Kirichik">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="images/favicon.png">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
        
        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-responsive.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">        

        
    </head>
    <body class="appear-animate">
        
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->
        
        <!-- Page Wrap -->
        <div class="page" id="top">

            <!-- Home Section -->
            <section class="home-section bg-dark-alfa-30 parallax-2" data-background="images/full-width-images/section-bg-1.jpg" id="home">
                <div class="js-height-full">
                    <section class="small-section">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <h1 style="text-align: center">Login</h1>
                            </div>
                        </div>

                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    Username: <input type="text" name="username" id="name-4" class="form-control input-lg" placeholder="Username.." maxlength="100">
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    Password: <input type="password" name="password" id="name-4" class="form-control input-lg" placeholder="Password.." maxlength="100">
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-7"></div>
                                <div class="col-md-3">
                                    <a href="Registrazione.php">Non sei ancora registrato?</a>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <div class="row">
                                <br>
                                <div style="text-align: center">
                                    <input type="submit" value="Login" class="btn btn-mod btn-w btn-circle btn-medium">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </section>
            <!-- End Home Section -->
            
            <!-- Navigation panel -->
            <nav class="main-nav dark transparent stick-fixed">
                <div class="full-wrapper relative clearfix">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll">
                        <a href="#top" class="logo">
                            <img src="images/logo-white.png" alt="" />
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- Main Menu -->
                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist scroll-nav local-scroll">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="TuttiAnnunci.php">Tutti gli Annunci</a></li>
                            <li><a href="InserisciAnnuncio.php">Inserisci Annuncio</a></li>
                            <li><a href="RicercaAnnuncio.php">Ricerca Annuncio</a></li>
                            <li><a href="GestioneAnnunci.php">Gestione Annunci</a></li>
                            <li><a href="Contattaci.php">Contattaci</a></li>
                            <li><a href="Registrazione.php">Registrati</a></li>
                            <li class="active"><a href="Login.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->
            
            

            <!-- End About Section -->
            
            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->
            
            <!-- Services Section -->

            <!-- End Services Section -->
            
            
            <!-- Call Action Section -->

            <!-- End Call Action Section -->
            
            
            <!-- Portfolio Section -->

            <!-- End Portfolio Section -->
            
            
            <!-- Call Action Section -->

            <!-- End Call Action Section -->
            
            
            <!-- Features Section -->

            <!-- End Features Section -->
            
            
            <!-- Testimonials Section -->

            <!-- End Testimonials Section -->
            
            
            <!-- Blog Section -->

            <!-- End Blog Section -->
            
            
            <!-- Newsletter Section -->

            <!-- End Newsletter Section -->
            
            
            <!-- Contact Section -->

            <!-- End Contact Section -->
            
            
            <!-- Google Map -->

            <!-- End Google Map -->
            
            

        
        </div>
        <!-- End Page Wrap -->
        
        
        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="js/jquery.countTo.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
        <script type="text/javascript" src="js/gmap3.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>
        <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>       
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        
    </body>
</html>