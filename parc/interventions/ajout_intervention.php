<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Ajouter une intervention</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
echo("<b><u>Récapitulatif sur l'utilisateur :  </u></b><BR>");
//récupérer les données du formulaire "ajout_utilisateur_form"
$idvehicule=$_POST['vehicule'];
$idpanne=$_POST['panne'];
$idindividu=$_POST['individu'];
$d=$_POST['jourprobleme'];
$m=$_POST['moisprobleme'];
$y=$_POST['anneeprobleme'];
$dateprobleme=$y.'-'.$m.'-'.$d;
$d=$_POST['jourintervention'];
$m=$_POST['moisintervention'];
$y=$_POST['anneeintervention'];
$dateintervention=$y.'-'.$m.'-'.$d;
$duree=$_POST['duree'];
$compterendu=$_POST['compterendu'];
echo "<BR>";
echo "<b>Nom de l'utilisateur : </b>";
$requete = "select nomindividu, prenomindividu from individu where idindividu='".$idindividu."'";
$resultat = mysql_query($requete);
$row = mysql_fetch_row($resultat);
echo $row[0]."<BR>";
echo "<b>Prénom de l'utilisateur : </b>";
echo $row[1]."<BR>";
echo "<b>Matricule du véhicule :</b>";
$requete = "select immatriculationvehicule from vehicule where idvehicule='".$idvehicule."'";
$resultat = mysql_query($requete);
$row = mysql_fetch_row($resultat);
echo $row[0]."<br>";
echo "<b>Type de panne :</b>";
$requete = "select libellepanne from panne where idpanne='".$idvehicule."'";
$resultat = mysql_query($requete);
$row = mysql_fetch_row($resultat);
echo $row[0]."<br>";
echo "<b>Date du probleme :</b>";
echo $dateprobleme."<br>";
echo "<b>Date de l'intervention :</b>";
echo $dateintervention."<br>";
echo "<b>Durée :</b>";
echo $duree."<br>";
echo "<b>Compte rendu de l'intervention</b>";
echo $compterendu."<br>";
// bouton de retour  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_intervention_form.php';\">";
echo "</form>";
// requéte insertion du nouvel enregistrement dans la table utilisateur
$requete = "INSERT INTO `intervention` (`idpanne`, `idvehicule`, `idindividu`, `dateprobintervention`, `dateintervention`, `dureeintervention`, `compterenduintervention`) VALUES 
('".$idpanne."', '".$idvehicule."', '".$idindividu."', '".$dateprobleme."', '".$dateintervention."', '".$duree."', '".$compterendu."')";
// execution de la requete
$resultat = mysql_query($requete) or die("erreur dans la requete : " .$requete);
mysql_close(); 
?>
</body>
</html>