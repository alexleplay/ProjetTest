<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>modification utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="modifier_utilisateur.php" method="POST">
<?php
$utilisateur=$_GET["code"];
//requête de travail
$requete="select nomindividu, prenomindividu, telindividu, cinindividu, pathphotoindividu
			from individu where IDINDIVIDU='$utilisateur'";
$resultat=mysql_query($requete) or die(mysql_error());
$row=mysql_fetch_array($resultat);
//Titre de la page
echo "<center>";
echo "<span class=style2>Modification de l'utilisateur ".$row[0].' '.$row[1]."</span><br>";
echo "<br><br>";
?>
<input type="hidden" name="code" value="<?php echo $utilisateur?>">
Nom : <input name="nom" type="text"  value="<?php echo $row[0]?>">&nbsp;&nbsp;
Prénom : <input name="prenom" type="text"  value="<?php echo $row[1]?>"><br><br>
Téléphone : <input name="tel" type="text"  value="<?php echo $row[2]?>" maxlength="10">&nbsp;&nbsp;
C.I.N : <input name="cin" type="text"  value="<?php echo $row[3]?>"><br><br>
Photo : <input name="photo" type="text"  value="<?php echo $row[4]?>"><br><br>
<input type="button" value="Retour" onClick="window.location='liste_utilisateur.php';">
<input name="valider" type="submit" value="Modifier">
</form>
</body>
</html>
<?
mysql_close(); 
?>