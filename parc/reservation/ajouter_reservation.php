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
$requete="insert into mission (idvehicule, idindividu, objectifmission, kmparcourumission, qtecarburantmission, datereservation, datefinreservation)
values ('".$vehicule."', '".$individu."', '".$objectif."', '".$km."', '".$qte."', '".$date."', '".$datefin."')";
$resultat=mysql_query($requete) or die(mysql_error());
if($resultat)
	echo("<span class=\"style4\">L'ajout a été correctement effectué</span>") ;
else
	echo("<span class=\"style4\">L'ajout a échoué</span>") ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_reservation.php';\">";
echo "</form>";
mysql_close(); 
?>
</body>
</html>