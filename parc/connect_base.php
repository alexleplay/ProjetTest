<?php
$serveur = "localhost"; 
$login = "root"; 
$pswd = ""; 
$bdd = "parcauto"; 
$connect = mysql_connect($serveur,$login,$pswd) or die ('erreur de connexion'); 
mysql_select_db($bdd,$connect) or die ('erreur de connexion base'); 
?>