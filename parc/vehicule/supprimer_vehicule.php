<?php
include ("../connect_base.php");
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../lien.css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
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
// requete suppression de l'enregistrement
$requete="DELETE FROM vehicule WHERE IDVEHICULE = '".$vehicule."'" ;
// execution de la requete et test
$resultat = mysql_query($requete);
if( $resultat )
    echo("<center><span class=style3><b>La suppression du materiel ".$row[0]." de type ".$row[1]." a correctement été effectuée</b></span><br>") ;
else
    echo("<center><span class=style3><b>La suppression du materiel ".$row[0]." de type ".$row[1]." a échouée</b></span><br>") ;
// bouton de retour
echo "<br><br><form><input type='button' value=\"Retour\" onclick=\"window.location='liste_veh.php?libelle=$row[1]';\"></form>";
// deconnexion de la base
mysql_close(); 
?>
</body>
</html>