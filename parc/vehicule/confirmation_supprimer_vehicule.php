<?php
include ("../connect_base.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../lien.css">
</head>
<body marginheight="20" bgcolor="#fffcd9">
<?php
//récupérer les données envoyées par l'URL
$vehicule=$_GET["code"];
// requéte affichage du nom et du libelle_type de materiel
$requete="SELECT IMMATRICULATIONVEHICULE, LIBELLECATEGORIE 
from vehicule v, categorie c
where c.IDCATEGORIE=v.IDCATEGORIE
and IDVEHICULE='".$vehicule."'" ;
// execution de la requète et test
$resultat = mysql_query($requete);
$row=mysql_fetch_array($resultat);  
//Titre de la page
echo "<center>";
echo "<span class=style2>Suppression du materiel ".$row[0]."</span><br><br><br>";
echo "Voulez-vous vraiment supprimer cette enregistrement ?<br><br>";
// bouton de retour
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_vehicule.php?code=$vehicule';\">";
echo "&nbsp;";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_veh.php?libelle=$row[1]';\">";
echo "</form></center>";
// deconnexion de la base
mysql_close(); 
?>
</body>
</html>