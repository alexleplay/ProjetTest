<?php
include ("../connect_base.php");
?>
<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php
//récupérer les données envoyées dans l'adresse URL après confirmation
$utilisateur=$_GET['code'];
//Supprimer toutes les missions faite par l'utilisateur
$requete = "delete from mission where idindividu='".$utilisateur."'";
$resultat = mysql_query($requete);
//Supprimer tous les sinitres concernant l'utilisateur
$requete = "delete from sinistre where idindividu='".$utilisateur."'";
$resultat = mysql_query($requete);
//Permet d'afficher les informations sur l'utilisateur qu'on va supprimer
$requete = "SELECT nomindividu, prenomindividu from individu where idindividu='".$utilisateur."'" ;
$resultat = mysql_query($requete);
$row = mysql_fetch_array($resultat);
// requete suppression de l'enregistrement
$requete = "DELETE FROM individu WHERE idindividu = '".$utilisateur."'" ;
// execution de la requète et test
$resultat = mysql_query($requete);
if($resultat)
    echo "<center><span class=style3>La suppression de l'utilisateur ".$row[0].' '.$row[1]." a correctement été effectuée</span><br>" ;
else
    echo "<center><span class=style3>La suppression de l'utilisateur ".$row[0].' '.$row[1]." a échouée</span><br>" ;
// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_utilisateur.php';\">";
echo "</form>";
mysql_close();
?>
</body>
</html>