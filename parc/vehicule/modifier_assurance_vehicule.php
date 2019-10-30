<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Modifier Vehicule</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<?php
//récupération des données à modifier
$code=$_POST["vehicule"];
$d=$_POST["jourassurance"];
$m=$_POST["moisassurance"];
$y=$_POST["anneeassurance"];
$datedebut=$y.'-'.$m.'-'.$d;
$d=$_POST["jourfinassurance"];
$m=$_POST["moisfinassurance"];
$y=$_POST["anneefinassurance"];
$datefin=$y.'-'.$m.'-'.$d;
$coutassurance=$_POST["coutassurance"];
//requete de mise à jour du stock
$requete="update vehicule set DATEDEBUTASSURANCE='".$datedebut."', DATEFINASSURANCE='".$datefin."', COUTASSURANCE='".$coutassurance."' where IDVEHICULE='".$code."'";
$resultat=mysql_query($requete) or die(mysql_error());
if( $resultat )
	echo "<div class=\"style3\"><b>La modification à été correctement effectuée</b></div>";
else
	echo "<div class=\"style3\"><b>La modification à échouée</b></div>";
$requete="select LIBELLECATEGORIE from categorie c, vehicule v where v.IDCATEGORIE=c.IDCATEGORIE and v.IDVEHICULE='".$code."'";
$resultat=mysql_query($requete) or die(mysql_error());
$row=mysql_fetch_array($resultat);
// bouton de retour
echo "<br><br><form><input type='button' value=\"Retour\" onclick=\"window.location='liste_veh.php?libelle=$row[0]';\"></form>";
mysql_close(); 
?>
</body>
</html>