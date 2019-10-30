<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Suppression sinistre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
//récupérer les données envoyées dans l'adresse URL après confirmation
$sinistre=$_GET['code'];
//Ne pas effacer les logiciels affectés à la societe supprimée
$requete = "delete from sinistre where idsinistre='".$sinistre."'";
$resultat = mysql_query($requete);
if($resultat)
	echo("<center><span class=style3>La suppression du contrat N° ".$sinistre." a correctement été effectuée</span><br>") ;
else
	echo("<center><span class=style3>La suppression du contrat N° ".$sinistre." a échouée</span><br>") ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_sinistre.php';\">";
echo "</form>";
// deconnexion de la base
mysql_close(); 
?>
</body>
</html>