<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier fournisseur</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<?php
$fournisseur=$_POST["fournisseur"];
$contrat=$_POST["contrat"];
$matricule=$_POST["matricule"];
$d=$_POST['jourcontrat'];
$m=$_POST['moiscontrat'];
$y=$_POST['anneecontrat'];
$datedebutcontrat=$y.'-'.$m.'-'.$d;
if($d==0)
	$datedebutcontrat=NULL;
$d=$_POST['jourfin'];
$m=$_POST['moisfin'];
$y=$_POST['anneefin'];
$datefincontrat=$y.'-'.$m.'-'.$d;
if($d==0)
	$datefincontrat=NULL;
$montant=$_POST['montant'];
//requete de mise à jour 
$requete="insert into contrat (idfournisseur, idtypecontrat, idvehicule, datedebcontrat, datefincontrat, montantcontrat) 
values ($fournisseur, $contrat, $matricule, '$datedebutcontrat', '$datefincontrat', $montant)";
$resultat = mysql_query($requete) or die(mysql_error());
if($resultat)
	echo("<span class=\"style4\">L'ajout à été correctement effectué</span>") ;
else
	echo("<span class=\"style4\">Vérifiez que le contrat n'existe pas</span>") ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_contrat.php';\">";
echo "</form>";
mysql_close(); 
?>
</body>
</html>