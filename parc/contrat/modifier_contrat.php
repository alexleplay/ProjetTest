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
//récupération des données à modifier
$code=$_POST["code"];
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
$requete="update contrat set idfournisseur='".$fournisseur."', idtypecontrat='".$contrat."', idvehicule='".$matricule."', 
datedebcontrat='".$datedebutcontrat."', datefincontrat='".$datefincontrat."', montantcontrat='".$montant."' where idcontrat='".$code."'";
$resultat=mysql_query($requete) or die(mysql_error());
if($resultat)
	echo("<span class=\"style4\">La modification à été correctement effectuée</span>") ;
else
	echo("<span class=\"style4\">La modification à échouée</span>") ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_contrat.php';\">";
echo "</form>";
mysql_close(); 
?>
</body>
</html>