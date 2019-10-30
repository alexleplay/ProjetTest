<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Supprimer fournisseur</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
//récupérer les données envoyées dans l'adresse URL après confirmation
$fournisseur=$_GET['code'];
//Ne pas effacer les logiciels affectés à la societe supprimée
$requete = "delete from contrat where idfournisseur='".$fournisseur."'";
$resultat = mysql_query($requete);
//Ne pas effacer les intervenants affectés à la societe supprimée
$requete = "update vehicule set fou_idfournisseur=NULL, datedebutreparation=NULL, datefinreparation=NULL, coutreparation=NULL where fou_idfournisseur='".$fournisseur."'";
$resultat = mysql_query($requete);
// requéte affichage du nom et du libelle_type de la société
$requete = "SELECT nomfournisseur from fournisseur where idfournisseur='".$fournisseur."'" ;
// execution de la requète et test
$resultat = mysql_query($requete);
$row = mysql_fetch_array($resultat);
// requete suppression de l'enregistrement
$requete="DELETE FROM fournisseur WHERE idfournisseur = '".$fournisseur."'" ;
$resultat = mysql_query($requete);
if($resultat)
	echo("<center><span class=style3>La suppression de la société ".$row[0]." a correctement été effectuée</span><br>") ;
else
	echo("<center><span class=style3>La suppression de la société ".$row[0]." a échouée</span><br>") ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_fournisseur.php';\">";
echo "</form>";
// deconnexion de la base
mysql_close(); 
?>
</body>
</html>