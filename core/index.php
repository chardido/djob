<?php
session_start();

if(isset($_SESSION['nomeutente'])){
    $nome = $_SESSION['nomeutente'];
    $tipo = $_SESSION['tipoutente'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DJob | Homepage</title>
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

            <?php
            if(isset($_SESSION['tipoutente']) && $_SESSION['tipoutente'] == 'Azienda'){
                ?>

                <section class="home-section bg-dark-alfa-30 parallax-2" data-background="images/full-width-images/section-bg-1.jpg" id="home">
                    <div class="js-height-full">

                        <!-- Hero Content -->
                        <div class="home-content">
                            <div class="home-text">

                                <div class="col-md-12">
                                    <img src="images/logobianco.png">
                                </div>


                                <h1>
                                    Scegli il tuo lavoro, con Djob!
                                </h1>


                                <form action="RicercaAnnuncio.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <input type="text" name="parolachiave" class="input-md form-control" placeholder="Ricerca..">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <select class="input-md form-control" name="settore">
                                                <option value="" disabled selected>Settore</option>
                                                <?php
                                                $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
                                                mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
                                                $query = "SELECT nome FROM Settore";
                                                $result = mysql_query($query) or die("QUERY FALLITA");

                                                while($r = mysql_fetch_array($result,MYSQL_ASSOC)){
                                                    echo "<option>".$r['nome']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="input-md form-control" name="luogo">
                                                <option value="" disabled selected>Luogo</option>
                                                <?php
                                                $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
                                                mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
                                                $query = "SELECT nome FROM Luogo ORDER BY nome";
                                                $result = mysql_query($query) or die("QUERY FALLITA");

                                                while($r = mysql_fetch_array($result,MYSQL_ASSOC)){
                                                    echo "<option>".$r['nome']."</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="input-md form-control" name="titolo">
                                                <option value="" disabled selected>Titolo di studio</option>
                                                <option>Nessuno</option>
                                                <option>Scuola elementare</option>
                                                <option>Scuola Media Inferiore</option>
                                                <option>Scuola Media Superiore</option>
                                                <option>Laurea Triennale</option>
                                                <option>Laurea Magistrale</option>
                                                <option>Dottorato di Ricerca</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="input-md form-control" name="esperienza">
                                                <option value="" disabled selected>Anni esperienza</option>
                                                <option>0</option>
                                                <option>1-2</option>
                                                <option>2-5</option>
                                                <option>5+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div style="text-align: center">
                                            <input type="submit" value="Cerca" class="btn btn-mod btn-w btn-circle btn-medium">
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- End Hero Content -->

                        <!-- Scroll Down -->
                        <div class="local-scroll">
                            <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                        </div>
                        <!-- End Scroll Down -->

                    </div>
                </section>

            <?php
            }else {
                ?>


                <!-- Home Section -->
                <section class="home-section bg-dark-alfa-30 parallax-2"
                         data-background="images/full-width-images/section-bg-1.jpg" id="home">
                    <div class="js-height-full">

                        <!-- Hero Content -->
                        <div class="home-content">
                            <div class="home-text">

                                <div class="col-md-12">
                                    <img src="images/logobianco.png">
                                </div>


                                <h1>
                                    Scegli il tuo lavoro, con Djob!
                                </h1>


                                <form action="RicercaAnnuncio.php" method="POST">
                                    <div class="col-md-12">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <input type="text" name="parolachiave" class="input-md form-control"
                                                   placeholder="Ricerca..">
                                        </div>
                                        <div class="col-md-2">
                                            <select class="input-md form-control" name="luogo">
                                                <option value="" disabled selected>Luogo</option>
                                                <?php
                                                $conn = mysql_connect('localhost', 'djob', '') or die("CONNESSIONE DATABASE FALLITA");
                                                mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
                                                $query = "SELECT nome FROM Luogo ORDER BY nome";
                                                $result = mysql_query($query) or die("QUERY FALLITA");

                                                while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                                    echo "<option>" . $r['nome'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <select class="input-md form-control" name="settore">
                                                <option value="" disabled selected>Settore</option>
                                                <?php
                                                $conn = mysql_connect('localhost', 'djob', '') or die("CONNESSIONE DATABASE FALLITA");
                                                mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
                                                $query = "SELECT nome FROM Settore";
                                                $result = mysql_query($query) or die("QUERY FALLITA");

                                                while ($r = mysql_fetch_array($result, MYSQL_ASSOC)) {
                                                    echo "<option>" . $r['nome'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <div class="col-md-12">
                                            <input type="submit" value="Cerca"
                                                   class="btn btn-mod btn-w btn-circle btn-medium">
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- End Hero Content -->

                        <!-- Scroll Down -->
                        <div class="local-scroll">
                            <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                        </div>
                        <!-- End Scroll Down -->

                    </div>
                </section>
                <!-- End Home Section -->

                <?php
            }
            ?>
            
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
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="TuttiAnnunci.php">Tutti gli Annunci</a></li>
                            <li><a href="InserisciAnnuncio.php">Inserisci Annuncio</a></li>
                            <li><a href="RicercaAnnuncio.php">Ricerca Annuncio</a></li>
                            <li><a href="GestioneAnnunci.php">Gestione Annunci</a></li>
                            <li><a href="Contattaci.php">Contattaci</a></li>

                            <?php
                            if(isset($nome)){
                                echo "<li>
                                <a href=\"GestioneProfilo.php\" class=\"mn-has-sub\" style=\"height: 75px; line-height: 75px;\">".$nome." <i class=\"fa fa-angle-down\"></i></a>

                                <!-- Sub -->
                                <ul class=\"mn-sub to-left\" style=\"display: none; opacity: 1;\">


                                    <li>
                                        <a href=\"GestioneProfilo.php\">Gestione Profilo</a>
                                    </li>
                                    <li>
                                        <a href=\"logout.php\">Logout</a>
                                    </li>

                                </ul>
                                <!-- End Sub -->

                            </li>";
                            }else{
                                echo "<li><a href=\"Registrazione.php\">Registrati</a></li>";
                                echo "<li><a href=\"Login.php\">Login</a></li>";
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->


            <!-- About Section -->
            <section class="page-section" id="about">
                <div class="container relative">


                    <h1 class="align-center">
                        Cos'&egrave; Djob?
                    </h1>

                        <div class="row align-center">

                            <h3>Djob &egrave; la nuova piattaforma che permette ad utenti diversamente abili di cercare il lavoro ideale!</h3>
                            <br>
                            <h5>La sua semplicit&agrave; e immediatezza permettono all'utente una ricerca efficace e veloce.</h5>

                        </div>

                </div>
            </section>
            <!-- End About Section -->

            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->

            <!-- Foter -->
            <footer class="page-section bg-gray-lighter footer pb-60">
                <div class="container">

                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.5s">
                        <a href="#top"><img src="images/logo-nero.png" width="78" height="36" alt="" /></a>
                    </div>
                    <!-- End Footer Logo -->



                    <!-- Footer Text -->
                    <div class="footer-text">

                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <a href="http://themeforest.net/user/theme-guru/portfolio" target="_blank">&copy; Djob 2016</a>.
                        </div>
                        <!-- End Copyright -->
                        <div class="footer-made">
                            Made with love for great people.
                        </div>

                    </div>
                    <!-- End Footer Text -->

                 </div>


                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->

            </footer>
            <!-- End Foter -->
        
        
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