<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Ajouter une intervention</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
$intervention=$_POST['code'];
echo("<b><u>Récapitulatif sur l'intervention N° $intervention </u></b><BR>");
$idpanne=$_POST['panne'];
$idindividu=$_POST['intervenant'];
$d=$_POST['jourprobleme'];
$m=$_POST['moisprobleme'];
$y=$_POST['anneeprobleme'];
$dateprobleme=$y.'-'.$m.'-'.$d;
$d=$_POST['jourintervention'];
$m=$_POST['moisintervention'];
$y=$_POST['anneeintervention'];
$dateintervention=$y.'-'.$m.'-'.$d;
$duree=$_POST['duree'];
$compterendu=$_POST['compterendu'];
echo "<BR>";
echo "<b>Nom de l'utilisateur : </b>";
$requete = "select nomindividu, prenomindividu from individu where idindividu='".$idindividu."'";
$resultat = mysql_query($requete);
$row = mysql_fetch_row($resultat);
echo $row[0]."<BR>";
echo "<b>Prénom de l'utilisateur : </b>";
echo $row[1]."<BR>";
echo "<b>Type de panne :</b>";
$requete = "select libellepanne from panne where idpanne='".$idpanne."'";
$resultat = mysql_query($requete);
$row = mysql_fetch_row($resultat);
echo $row[0]."<br>";
echo "<b>Date du probleme :</b>";
echo $dateprobleme."<br>";
echo "<b>Date de l'intervention :</b>";
echo $dateintervention."<br>";
echo "<b>Durée :</b>";
echo $duree."<br>";
echo "<b>Compte rendu de l'intervention :</b>";
echo $compterendu."<br>";
// bouton de retour  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='liste_intervention.php';\">";
echo "</form>";
// requéte insertion du nouvel enregistrement dans la table utilisateur
$requete = "update intervention 
set idpanne=$idpanne, idindividu=$idindividu, dateprobintervention='$dateprobleme', 
dateintervention='$dateintervention', dureeintervention=$duree, compterenduintervention='$compterendu' 
where idintervention=$intervention";
// execution de la requete
$resultat = mysql_query($requete) or die("erreur dans la requete : " .$requete);
mysql_close(); 
?>
</body>
</html>