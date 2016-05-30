<?php
session_start();
if(!isset($_SESSION['nomeutente'])){
    header("Location: Login.php");
}

if(isset($_SESSION['nomeutente'])){
    $nome = $_SESSION['nomeutente'];
    $idutente = $_SESSION['idutente'];
    $tipoutente  = $_SESSION['tipoutente'];

    $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
    mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
    $query = "SELECT * FROM Utente WHERE ID = '$idutente'";
    $result = mysql_query($query) or die("QUERY FALLITA");
    $r = mysql_fetch_array($result,MYSQL_ASSOC);

    if($tipoutente == "Azienda") {
        $nomevero = $r['Nome'];
        $email = $r['Email'];
        $citta = $r['Citta'];
        $telefono = $r['Telefono'];
        $indirizzo = $r['Indirizzo'];
        $username = $r['Username'];
        $password = $r['Password'];
    }else{
        $nomevero = $r['Nome'];
        $cognome = $r['Cognome'];
        $nascita = $r['Nascita'];
        $email = $r['Email'];
        $citta = $r['Citta'];
        $competenze = $r['Competenze'];
        $esperienza = $r['AnniEsperienza'];
        $titolo = $r['TitoloStudio'];
        $telefono = $r['Telefono'];
        $indirizzo = $r['Indirizzo'];
        $username = $r['Username'];
        $password = $r['Password'];
    }
}

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['citta']) && isset($_POST['indirizzo']) && isset($_POST['telefono']) && isset($_POST['passwordvecchia'])){

    $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
    mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
    $query = "SELECT * FROM Utente WHERE ID = '$idutente'";
    $result = mysql_query($query) or die("QUERY FALLITA");
    $r = mysql_fetch_array($result,MYSQL_ASSOC);

    $passwordVecchia = $r['Password'];


    $passwordInserita = $_POST['passwordvecchia'];
    if(strcmp($password, $passwordInserita) == 0){
        $nomeMod = $_POST['nome'];
        $emailMod = $_POST['email'];
        $cittaMod = $_POST['citta'];
        $indirizzoMod = $_POST['indirizzo'];
        $telefonoMod = $_POST['telefono'];
        $passwordMod = $passwordVecchia;
        if(isset($_POST['passwordnuova'])){
            $passwordMod = $_POST['passwordnuova'];
        }

        $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
        mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
        $query = "UPDATE Utente SET Nome = '$nomeMod', Email = '$emailMod', Citta = '$cittaMod', Telefono = '$telefonoMod', Indirizzo = '$indirizzoMod', Password = '$passwordMod' WHERE ID = '$idutente'";
        $result = mysql_query($query) or die("QUERY FALLITA: ".mysql_error());
        header("Location: GestioneProfilo.php");
     }
}

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['citta']) && isset($_POST['indirizzo']) && isset($_POST['telefono']) && isset($_POST['passwordvecchia']) && isset($_POST['cognome']) && isset($_POST['nascita']) && isset($_POST['titolo']) && isset($_POST['esperienza']) && isset($_POST['competenze'])){

    $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
    mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
    $query = "SELECT * FROM Utente WHERE ID = '$idutente'";
    $result = mysql_query($query) or die("QUERY FALLITA");
    $r = mysql_fetch_array($result,MYSQL_ASSOC);

    $passwordVecchia = $r['Password'];


    $passwordInserita = $_POST['passwordvecchia'];
    if(strcmp($password, $passwordInserita) == 0){
        $nomeMod = $_POST['nome'];
        $emailMod = $_POST['email'];
        $cittaMod = $_POST['citta'];
        $indirizzoMod = $_POST['indirizzo'];
        $telefonoMod = $_POST['telefono'];
        $cognomeMod = $_POST['cognome'];
        $nascitaMod = $_POST['nascita'];
        $competenzeMod = $_POST['competenze'];
        $titoloMod = $_POST['titolo'];
        $esperienzaMod = $_POST['esperienza'];
        $passwordMod = $passwordVecchia;
        if(isset($_POST['passwordnuova'])){
            $passwordMod = $_POST['passwordnuova'];
        }

        $conn = mysql_connect('localhost','djob','') or die("CONNESSIONE DATABASE FALLITA");
        mysql_select_db('my_djob') or die("SELEZIONE DATABASE FALLITA");
        $query = "UPDATE Utente SET Nome = '$nomeMod', Email = '$emailMod', Citta = '$cittaMod', Telefono = '$telefonoMod', Indirizzo = '$indirizzoMod', Password = '$passwordMod', Nascita = '$nascitaMod', Cognome = '$cognomeMod', Competenze = '$competenzeMod', AnniEsperienza = '$esperienzaMod', TitoloStudio = '$titoloMod' WHERE ID = '$idutente'";
        $result = mysql_query($query) or die("QUERY FALLITA: ".mysql_error());
        header("Location: GestioneProfilo.php");
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>DJob | Gestione Profilo</title>
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

    <?php if($tipoutente == "Azienda"){ ?>
    <!-- Home Section -->
    <section class="home-section bg-dark-alfa-30 parallax-2" data-background="images/full-width-images/section-bg-1.jpg" id="home">
        <div class="js-height-full">
            <section class="small-section">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 style="text-align: center">Gestione Profilo</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="nome" id="name-2" class="input-md form-control" value="<?php echo $nomevero; ?>" maxlength="100">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" id="name-2" class="input-md form-control" value="<?php echo $email; ?>" maxlength="100">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="citta" id="name-2" class="input-md form-control" value="<?php echo $citta; ?>" maxlength="100">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="indirizzo" id="name-2" class="input-md form-control" value="<?php echo $indirizzo; ?>" maxlength="100">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="telefono" id="name-2" class="input-md form-control" value="<?php echo $telefono; ?>" maxlength="100">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="username" id="name-2" class="input-md form-control" disabled="disabled" value="<?php echo $username; ?>" maxlength="100">
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="passwordnuova" id="name-2" class="input-md form-control" placeholder="Nuova password" maxlength="100">
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="passwordvecchia" id="name-2" class="input-md form-control" placeholder="Vecchia password" maxlength="100">
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div style="text-align: center">
                                    <a href="index.php" class="btn btn-mod btn-w btn-circle btn-medium">Annulla</a>
                                    <input type="submit" value="Conferma" class="btn btn-mod btn-w btn-circle btn-medium">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <?php }else{ ?>
    <!-- End Home Section -->

    <!-- PRIVATOOOO -->

    <!-- Home Section -->
    <section class="home-section bg-dark-alfa-30 parallax-2" data-background="images/full-width-images/section-bg-1.jpg" id="home">
            <section class="small-section">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1 style="text-align: center">Gestione Profilo</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="nome" id="name-2" class="input-md form-control" value="<?php echo $nomevero; ?>" maxlength="100">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" id="name-2" class="input-md form-control" value="<?php echo $email; ?>" maxlength="100">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="cognome" id="name-2" class="input-md form-control" value="<?php echo $cognome; ?>" maxlength="100">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="nascita" id="name-2" class="input-md form-control" value="<?php echo $nascita; ?>" maxlength="100">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="citta" id="name-2" class="input-md form-control" value="<?php echo $citta; ?>" maxlength="100">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="indirizzo" id="name-2" class="input-md form-control" value="<?php echo $indirizzo; ?>" maxlength="100">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="telefono" id="name-2" class="input-md form-control" value="<?php echo $telefono; ?>" maxlength="100">
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
                                    <textarea name="competenze" id="text" class="input-md form-control" rows="8" placeholder="Competenze ed esperienze" length="400"><?php echo htmlentities($competenze); ?></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="username" id="name-2" class="input-md form-control" disabled="disabled" value="<?php echo $username; ?>" maxlength="100">
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="passwordnuova" id="name-2" class="input-md form-control" placeholder="Nuova password" maxlength="100">
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="passwordvecchia" id="name-2" class="input-md form-control" placeholder="Vecchia password" maxlength="100">
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div style="text-align: center">
                                    <a href="index.php" class="btn btn-mod btn-w btn-circle btn-medium">Annulla</a>
                                    <input type="submit" value="Conferma" class="btn btn-mod btn-w btn-circle btn-medium">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
    </section>
    <?php } ?>


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
                    <li><a href="InserisciAnnuncio.php">Inserisci Annuncio</a></li>
                    <li><a href="RicercaAnnuncio.php">Ricerca Annuncio</a></li>
                    <li><a href="GestioneAnnunci.php">Gestione Annunci</a></li>
                    <?php
                    if(isset($nome)){
                        echo "<li><a href=\"GestioneProfilo.php\">Gestione Profilo</a></li>";
                        echo "<li>
                                <a href=\"\" class=\"mn-has-sub\" style=\"height: 75px; line-height: 75px;\">".$nome." <i class=\"fa fa-angle-down\"></i></a>

                                <!-- Sub -->
                                <ul class=\"mn-sub to-left\" style=\"display: none; opacity: 1;\">

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