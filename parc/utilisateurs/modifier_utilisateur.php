<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<center>
<?php
//récupération des données à modifier
$code=$_POST["code"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$tel=$_POST["tel"];
$cin=$_POST["cin"];
$photo=$_POST["photo"];
//requete de mise à jour de la table utilisateur
$requete="update individu 
set nomindividu='".$nom."', prenomindividu='".$prenom."', telindividu='".$tel."', cinindividu='".$cin."', pathphotoindividu='".$photo."' 
where idindividu = '".$code."'";
$resultat = mysql_query($requete) or die(mysql_error());
if($resultat)
	echo("<strong>La modification à été correctement effectuée</strong>") ;
else
	echo("<strong>La modification à échouée</strong>") ;
// bouton de retour
echo "<br><br><form><input type='button' value=\"Retour\" onclick=\"window.location='liste_utilisateur.php';\"></form>";
mysql_close(); 
?>
</center>
</body>
</html>