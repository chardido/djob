<?php
session_start();

if(isset($_SESSION['nomeutente'])){
    header("Location: index.php");
}

if(isset($_POST['azienda']) && isset($_POST['nomeazienda']) && isset($_POST['emailazienda']) && isset($_POST['cittaazienda']) && isset($_POST['indirizzoazienda']) && isset($_POST['telefonoazienda']) && isset($_POST['username']) && isset($_POST['password']) ){
    $nome = $_POST['nomeazienda'];
    $email = $_POST['emailazienda'];
    $citta = $_POST['cittaazienda'];
    $indirizzo = $_POST['indirizzoazienda'];
    $telefono = $_POST['telefonoazienda'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $esistente = false;

    $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
    mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
    $query = "SELECT username, email FROM Utente";
    $result = mysql_query($query) or die("QUERY FALLITA (select): " .mysql_error());

    while($r = mysql_fetch_array($result,MYSQL_ASSOC)){
        if(strcmp($r['email'],$email) == 0 || strcmp($r['username'],$username) == 0){
            $esistente = true;
        }
    }



    if($esistente == false){
        $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
        mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
        $query = "INSERT INTO Utente VALUES ('','$nome','','','$email','$citta','','','','$telefono','$indirizzo','$username','$password','Azienda')";
        $result = mysql_query($query) or die("QUERY FALLITA(insert): ".mysql_error());
        header("Location: index.php");
    }else{
        echo "Utente già presente nel database";
    }

}

if(isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['nascita']) && isset($_POST['email']) && isset($_POST['citta']) && isset($_POST['indirizzo']) && isset($_POST['telefono']) && isset($_POST['titolo']) && isset($_POST['esperienza']) && isset($_POST['competenze']) && isset($_POST['username']) && isset($_POST['password'])){
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $nascita = $_POST['nascita'];
    $email = $_POST['email'];
    $citta = $_POST['citta'];
    $indirizzo = $_POST['indirizzo'];
    $telefono = $_POST['telefono'];
    $titolo = $_POST['titolo'];
    $esperienza = $_POST['esperienza'];
    $competenze = $_POST['competenze'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $esistente = false;

    $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
    mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
    $query = "SELECT username, email FROM Utente";
    $result = mysql_query($query) or die("QUERY FALLITA");

    while($r = mysql_fetch_array($result,MYSQL_ASSOC)){
        if(strcmp($r['email'],$email) == 0 || strcmp($r['username'],$username) == 0){
            $esistente = true;
        }
    }



    if($esistente == false){
        $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
        mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
        $query = "INSERT INTO Utente VALUES ('','$nome','$cognome','$nascita','$email','$citta','$competenze','$esperienza','$titolo','$telefono','$indirizzo','$username','$password','Utente')";
        $result = mysql_query($query) or die("QUERY FALLITA");
        header("Location: index.php");
    }else{
        echo "Utente già presente nel database";
    }

}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Djob | Registrazione</title>
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
                    <section class="small-section">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <h1 style="text-align: center">Registrazione</h1>
                            </div>
                        </div>

                        <div class="row">

                            <!-- Col -->

                            <div class="col-sm-8 col-sm-offset-2">

                                <!-- Nav Tabs -->
                                <div class="align-center mb-40 mb-xs-30">
                                    <ul class="nav nav-tabs tpl-minimal-tabs animate">

                                        <li class="active">
                                            <a href="#mini-one" data-toggle="tab" aria-expanded="true">Privato</a>
                                        </li>

                                        <li class="">
                                            <a href="#mini-two" data-toggle="tab" aria-expanded="false">Azienda</a>
                                        </li>



                                    </ul>
                                </div>
                                <!-- End Nav Tabs -->

                                <!-- Tab panes -->
                                <div class="tab-content tpl-minimal-tabs-cont align-center section-text" style="height: auto;">

                                    <div class="tab-pane fade active in" id="mini-one" style="">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="nome" id="name-2" class="input-md form-control" placeholder="Nome" maxlength="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="cognome" id="name-2" class="input-md form-control" placeholder="Cognome" maxlength="100">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="nascita" id="name-2" class="input-md form-control" placeholder="Data di nascita" maxlength="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="email" id="name-2" class="input-md form-control" placeholder="Email" maxlength="100">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="citta" id="name-2" class="input-md form-control" placeholder="Citta" maxlength="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="indirizzo" id="name-2" class="input-md form-control" placeholder="Indirizzo" maxlength="100">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="telefono" id="name-2" class="input-md form-control" placeholder="Telefono" maxlength="100">
                                                </div>
                                                <div class="col-md-6">
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
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="input-md form-control" name="esperienza">
                                                        <option value="" disabled selected>Anni di esperienza</option>
                                                        <option>0</option>
                                                        <option>1-2</option>
                                                        <option>2-5</option>
                                                        <option>5+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <textarea name="competenze" id="text" class="input-md form-control" rows="8" placeholder="Competenze ed esperienze" length="400"></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="username" id="name-2" class="input-md form-control" placeholder="Username" maxlength="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="password" name="password" id="name-2" class="input-md form-control" placeholder="Password" maxlength="100">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <a href="index.php" class="btn btn-mod btn-w btn-circle btn-medium">Annulla</a>
                                                <input type="submit" value="Conferma" class="btn btn-mod btn-w btn-circle btn-medium">
                                            </div>


                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="mini-two" style="">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="nomeazienda" id="name-2" class="input-md form-control" placeholder="Nome azienda" maxlength="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="emailazienda" id="name-2" class="input-md form-control" placeholder="Email" maxlength="100">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="cittaazienda" id="name-2" class="input-md form-control" placeholder="Città" maxlength="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" name="indirizzoazienda" id="name-2" class="input-md form-control" placeholder="Indirizzo" maxlength="100">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="telefonoazienda" id="name-2" class="input-md form-control" placeholder="Telefono" maxlength="100">
                                                </div>
                                                <input type="hidden" name="azienda">
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="username" id="name-2" class="input-md form-control" placeholder="Username" maxlength="100">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="password" name="password" id="name-2" class="input-md form-control" placeholder="Password" maxlength="100">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <a href="index.php" class="btn btn-mod btn-w btn-circle btn-medium">Annulla</a>
                                                <input type="submit" value="Conferma" class="btn btn-mod btn-w btn-circle btn-medium">
                                            </div>
                                        </form>
                                    </div>


                                </div>

                            </div>

                            <!-- End Col -->

                        </div>



                    </section>
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
                            <li class="active"><a href="Registrazione.php">Registrati</a></li>
                            <li><a href="Login.php">Login</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->
            
            

            <!-- End About Section -->
            
            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->

            

        
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