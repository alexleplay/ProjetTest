<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier reservation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<?php
//récupération des données à modifier
$code=$_POST["code"];
$individu=$_POST["nom"];
$vehicule=$_POST["matricule"];
$objectif=$_POST["objectif"];
$km=$_POST["km"];
$qte=$_POST["qte"];
$d=$_POST['jour'];
$m=$_POST['mois'];
$y=$_POST['annee'];
$date=$y.'-'.$m.'-'.$d;
if($d==0)
	$date=NULL;
$d=$_POST['jourfin'];
$m=$_POST['moisfin'];
$y=$_POST['anneefin'];
$datefin=$y.'-'.$m.'-'.$d;
if($d==0)
	$datefin=NULL;
//requete de mise à jour 
$requete="update mission set idvehicule='".$vehicule."', idindividu='".$individu."', objectifmission='".$objectif."', 
kmparcourumission='".$km."', qtecarburantmission='".$qte."', datereservation='".$date."', datefinreservation='".$datefin."'
where idmission='".$code."'";
$resultat=mysql_query($requete) or die(mysql_error());
if($resultat)
	echo("<span class=\"style4\">La modification à été correctement effectuée</span>") ;
else
	echo("<span class=\"style4\">La modification à échouée</span>") ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_reservation.php';\">";
echo "</form>";
mysql_close(); 
?>
</body>
</html>