<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Ajouter un véhicule</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
//récupérer les données du formulaire
$matricule=$_POST["matricule"];
$nbrporte=$_POST["nbrporte"];
$puissance=$_POST["puissance"];
$nbrplace=$_POST["nbrplace"];
$cartegrise=$_POST["cartegrise"];
$pathphoto=$_POST["pathphoto"];
$d=$_POST["jouracquisition"];
$m=$_POST["moisacquisition"];
$y=$_POST["anneeacquisition"];
$dateacquisition=$y.'-'.$m.'-'.$d;
$categorie=$_POST["categorie"];
$service=$_POST["service"];
$typevehicule=$_POST["typevehicule"];
$modele=$_POST["modele"];
$typecarburant=$_POST["typecarburant"];
$site=$_POST["site"];
$coutassurance=$_POST["coutassurance"];
if ( empty($coutassurance) )
	$coutassurance=NULL;
$d=$_POST["jourassurance"];
$m=$_POST["moisassurance"];
$y=$_POST["anneeassurance"];
if( $d!="0" )
	$datedebutassurance=$y.'-'.$m.'-'.$d;
else
	$datedebutassurance=NULL;
$d=$_POST["jourfinassurance"];
$m=$_POST["moisfinassurance"];
$y=$_POST["anneefinassurance"];
if( $d!="0" )
	$datefinassurance=$y.'-'.$m.'-'.$d;
else
	$datefinassurance=NULL;
$fournisseur=$_POST["fournisseur"];
$coutreparation=$_POST["coutreparation"];
if ( empty($coutreparation) )
	$coutreparation=NULL;
$d=$_POST["jourreparation"];
$m=$_POST["moisreparation"];
$y=$_POST["anneereparation"];
if( $d!="0" )
	$datedebutreparation=$y.'-'.$m.'-'.$d;
else
	$datedebutreparation=NULL;
$d=$_POST["jourfinreparation"];
$m=$_POST["moisfinreparation"];
$y=$_POST["anneefinreparation"];
if( $d!="0" )
	$datefinreparation=$y.'-'.$m.'-'.$d;
else
	$datefinreparation=NULL;
$fournisseur2=$_POST["fournisseur2"];
//Requete de travail
$requete = "INSERT INTO `vehicule` (`IDMODELE`, `IDTYPEVEHICULE`, `IDFOURNISSEUR`, `IDSITE`, `IDCATEGORIE`, `IDTYPECARBURANT`, 
`IDSERVICE`, `FOU_IDFOURNISSEUR`, `NBRPORTEVEHICULE`, `PUISSANCEVEHICULE`, `NBRPLACEVEHICULE`, `CARTEGRISEVEHICULE`, 
`IMMATRICULATIONVEHICULE`, `PATHPHOTOVEHICULE`, `DATEAQUISITIONVEHICULE`, `DATEDEBUTASSURANCE`, `DATEFINASSURANCE`, 
`COUTASSURANCE`, `DATEDEBUTREPARATION`, `DATEFINREPARATION`, `COUTREPARATION`) VALUES 
($modele, $typevehicule, $fournisseur, $site, $categorie, $typecarburant, $service, $fournisseur2, $nbrporte, $puissance, 
$nbrplace, '$cartegrise', '$matricule', '$pathphoto', $dateacquisition, $datedebutassurance, $datefinassurance, $coutassurance,
$datedebutreparation, $datefinreparation, $coutreparation)";
$resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
// bouton de retour
if( $resultat )
	echo "<span class=\"style3\"><b>Ajout effectué avec succés</b></span>";
else
	echo "<span class=\"style3\"><b>Désolé problème lors de l'ajout</b></span>";
echo "<form><br>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='ajouter_vehicule_form.php';\">";
echo "</form>";
mysql_close();
?>
</body>
</html>