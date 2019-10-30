<?php
include ("../connect_base.php");
?>
<html>
<body marginheight="20" bgcolor="#fffcd9">
<?php
//récupérer les données envoyées par l'URL
$utilisateur=$_GET['code'];
// requéte affichage du nom et du libelle_type d'utilisateur
$requete="SELECT nomindividu, prenomindividu from individu where idindividu='".$utilisateur."'" ;
// execution de la requète et test
$resultat = mysql_query($requete) or die(mysql_error());
$row = mysql_fetch_array($resultat);
//Titre de la page
echo "<center><strong>";
echo "<span class=\"style2\">Suppression de l'utilisateur ".$row[0].' '.$row[1]."</span><br><br><br>";
echo "Voulez-vous vraiment supprimer cette enregistrement ?<br><br>";	
// bouton de retour
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_utilisateur.php?code=$utilisateur';\">";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_utilisateur.php';\">";
echo "</form>";
echo "</strong></center>";
// deconnexion de la base
mysql_close(); 
?>
</body>
</html>