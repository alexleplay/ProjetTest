<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Affectation à un utilisateur</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<center>
<b><u>Récapitulatif sur l'affectation du matériel :  </u></b><BR>
<?php
//recuperation des donnee
$personne=$_POST["personne"];
$vehicule=$_POST["vehicule"];
echo "<br>";
echo "<b>Matricule du véhicule affecté : </b>";
$requete = "select IMMATRICULATIONVEHICULE from vehicule where IDVEHICULE='".$vehicule."'";
$resultat = mysql_query($requete);
$row = mysql_fetch_row($resultat);
echo "<br><span class=\"style3\"><h3><b>".$row[0]."</b></h3></span>";
echo "<br>";
echo "<b>Utilisateur : </b>";
$requete = "select NOMINDIVIDU, PRENOMINDIVIDU from individu where IDINDIVIDU='".$personne."'";
$resultat = mysql_query($requete);
$row = mysql_fetch_row($resultat);
echo "<br><span class=\"style3\"><h3><b>".$row[0].' '.$row[1]."</b></h3></span>";
// bouton de retour
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='affecter_vehicule_form.php';\">";
echo "</form>";
//requete d'insertion dans la table
$requete="update individu set IDVEHICULE='".$vehicule."' where IDINDIVIDU='".$personne."'";
$resultat = mysql_query($requete) or die("erreur dans la requete : " .$requete);
mysql_close(); 
?>
</center>
</body>
</html>