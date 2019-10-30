<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Ajout sinistre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<?php
//récupération des données à modifier
$individu=$_POST["nom"];
$vehicule=$_POST["matricule"];
$lieu=$_POST["lieu"];
$d=$_POST['jour'];
$m=$_POST['mois'];
$y=$_POST['annee'];
$date=$y.'-'.$m.'-'.$d;
if($d==0)
	$date=NULL;
$degatmat=$_POST['degatmateriel'];
$degatcor=$_POST['degatcorporel'];
$nbrdeces=$_POST['nbrdeces'];
//requete de mise à jour 
$requete="insert into sinistre (idvehicule, idindividu, lieusinistre, datesinistre, degatmatsinistre, degatcorsinistre, nbrdecessinistre )
values ('".$vehicule."', '".$individu."', '".$lieu."', '".$date."', '".$degatmat."', '".$degatcor."', '".$nbrdeces."')";
$resultat=mysql_query($requete) or die(mysql_error());
if($resultat)
	echo("<span class=\"style4\">L'ajout à été correctement effectuée</span>") ;
else
	echo("<span class=\"style4\">L'ajout à échouée</span>") ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='ajouter_sinistre_form.php';\">";
echo "</form>";
mysql_close(); 
?>
</body>
</html>