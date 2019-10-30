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
$nom=$_POST["nom"];
$rs=$_POST["rs"];
$ville=$_POST["ville"];
$tel=$_POST["tel"];
//requete de mise à jour 
$requete="update fournisseur set nomfournisseur='".$nom."', rsfournisseur='".$rs."', villefournisseur='".$ville."', telfournisseur='".$tel."' where idfournisseur='".$code."'";
$resultat=mysql_query($requete) or die(mysql_error());
if($resultat)
	echo("<span class=\"style4\">La modification à été correctement effectuée</span>") ;
else
	echo("<span class=\"style4\">La modification à échouée</span>") ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_fournisseur.php';\">";
echo "</form>";
mysql_close(); 
?>
</body>
</html>