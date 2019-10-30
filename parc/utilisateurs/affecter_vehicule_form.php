<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Affectation à un utilisateur</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Affectectation à un utilisateur -</strong></p>
<center>
<form method="POST" action="affecter_vehicule.php">
<table align="center">
<tr>
 	<td><span class="style3"><h3><b>Utilisateur : </b><h3></span></td>
    <td><select size="1" name="personne" onChange="Detail(typevehicule.value)">
  		<?php
 			// Selection de tous les enregistrements de la table type materiel
 			$requete = "Select IDINDIVIDU, NOMINDIVIDU, PRENOMINDIVIDU from individu where INTERNE='TRUE' and NOMINDIVIDU<>'admin' ";
 			$resultat = mysql_query ($requete) or die ("Problème lors de choix des utilisateurs");
			while ($row = mysql_fetch_row($resultat))
				echo "<option value=\"$row[0]\">$row[1] $row[2]</option>"
 		?>
 		</select>
	</td>
</tr>
<tr><td><br></td></tr>
<tr>
	<td><span class="style3"><h3><b>Matricule du véhicule : </b><h3></span></td>
	<td><select size="1" name="vehicule" onChange="Detail(typevehicule.value)">
  		<?php
 			// Selection de tous les enregistrements de la table type materiel
 			$requete = "Select IDVEHICULE, IMMATRICULATIONVEHICULE from vehicule";
 			$resultat = mysql_query ($requete) or die ("Problème lors de choix des utilisateurs");
			while ($row = mysql_fetch_row($resultat))
				echo "<option value=\"$row[0]\">$row[1]</option>"
 		?>
 		</select>
	</td>
</tr>
<tr><td><br><br></td></tr>
<tr align="center"><td colspan="3"><input type="submit" name="Envoyer" value="Affecter"></td></tr>
</table>
</form>
</center>
</body>
</html>
<?php
mysql_close();
?>