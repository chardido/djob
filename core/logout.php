<?php
/**
 * Created by PhpStorm.
 * User: Carlo
 * Date: 28/05/16
 * Time: 15:44
 */

session_start();
unset($_SESSION['nomeutente']);
unset($_SESSION['tipoutente']);
unset($_SESSION['idutente']);
header("Location: index.php");


?>