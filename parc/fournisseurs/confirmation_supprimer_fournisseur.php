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
//récupérer les données du formulaire "sup_even"
$fournisseur=$_GET['code'];
// requéte affichage du nom et du libelle_type de la société
$requete="SELECT nomfournisseur from fournisseur where idfournisseur=$fournisseur" ;
// execution de la requete et test
$resultat = mysql_query($requete);
$row=mysql_fetch_array($resultat);
//Titre de la page
echo "<center>";
echo "<span class=style2>Suppression de la société ".$row[0]."</span>";
echo "<br><br><br>Voulez-vous vraiment supprimer cette enregistrement ?<br><br>";
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_fournisseur.php?code=$fournisseur';\">";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_fournisseur.php';\">";
echo "</form></center>";
mysql_close(); 
?>
</p>
</body>
</html>