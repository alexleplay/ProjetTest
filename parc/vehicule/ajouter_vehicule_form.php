<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Ajouter un véhicule</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un véhicule -</strong></p><br>
<form name="ajout_vehicul" method="post" action="ajout_vehicule.php">
<table align="center" border="0">
	<tr>
		<td align="right">Matricule :</td>
		<td><input type="text" name="matricule"></td>
		<td align="right">Nombre de porte :</td>
		<td><input type="text" name="nbrporte"></td>
	</tr>
	<tr>
		<td align="right">Puissance :</td>
		<td><input type="text" name="puissance"></td>
		<td align="right">Nombre de place :</td>
		<td><input type="text" name="nbrplace"></td>
	</tr>
	<tr>
		<td align="right">Numero de carte grise :</td>
		<td><input type="text" name="cartegrise"></td>
		<td align="right">Path photo :</td>
		<td><input type="text" name="pathphoto"></td>
	</tr>
	<tr>
		<td align="right">Date d'acquisition :</td>
		<td>
			<?php
			echo "<select name=\"jouracquisition\">";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moisacquisition\">";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneeacquisition\">";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
		<td align="right">Categorie :</td>
		<td>
			<?php
			$requete = mysql_query("select * from categorie");
			echo "<select name=\"categorie\" id=\"categorie\">";
			while($resultat = mysql_fetch_array($requete))
				echo "<option value=\"$resultat[0]\">$resultat[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr>
		<td align="right">Service :</td>
		<td>
			<?php 
			$requete3 = mysql_query("SELECT IDSERVICE, LIBELLESERVICE FROM service");
			echo "<select name=\"service\" id=\"service\">";
			echo "<option value=\"NULL\">Aucun Service</option>";
			while($resultat3 = mysql_fetch_array($requete3))
				echo "<option value=\"$resultat3[0]\">$resultat3[1]</option>";
			echo "</select>";
			?>
		</td>
		<td align="right">Statut :</td>
		<td><?php 
			$requete2 = mysql_query("SELECT * FROM typevehicule");
			echo "<select name=\"typevehicule\" id=\"typevehicule\">";
			while($resultat2 = mysql_fetch_array($requete2))
				echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr>
		<td align="right">Modèle :</td>
		<td><?php 
			$requete2 = mysql_query("SELECT * FROM modele");
			echo "<select name=\"modele\" id=\"modele\">";
			while($resultat2 = mysql_fetch_array($requete2))
				echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
			echo "</select>";
			?>
		</td>
		<td align="right">Type Carburant :</td>
		<td><?php 
			$requete2 = mysql_query("SELECT * FROM typecarburant");
			echo "<select name=\"typecarburant\" id=\"typecarburant\">";
			while($resultat2 = mysql_fetch_array($requete2))
				echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr>
		<td align="right">Site géographique :</td>
		<td><?php 
			$requete2 = mysql_query("SELECT * FROM site");
			echo "<select name=\"site\" id=\"site\">";
			while($resultat2 = mysql_fetch_array($requete2))
				echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr><td><br></td></tr>
	<tr align="center">
		<td colspan="4"><span class="style3"><b>Assurance :</b></span></td>
	</tr>
	<tr align="center">
		<td colspan="2">Date début d'assurance :</td>
		<td colspan="2"><?php
			echo "<select name=\"jourassurance\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moisassurance\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneeassurance\">";
			echo "<option value=\"0\"></option>";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr align="center">
		<td colspan="2">Date de fin d'assurance :</td>
		<td colspan="2"><?php
			echo "<select name=\"jourfinassurance\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moisfinassurance\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneefinassurance\">";
			echo "<option value=\"0\"></option>";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr align="center">
		<td colspan="2">Coût d'assurance :</td>
		<td colspan="2"><input type="text" name="coutassurance"></td>
	</tr>
	<tr align="center">
		<td colspan="2">Assureur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
		<td colspan="2"><?php 
			$requete2 = mysql_query("SELECT * FROM fournisseur");
			echo "<select name=\"fournisseur\" id=\"fournisseur\">";
			echo "<option value=\"NULL\">Non encore assuré</option>";
			while($resultat2 = mysql_fetch_array($requete2))
				echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr><td><br></td></tr>
	<tr align="center">
		<td colspan="4"><span class="style3"><b>Contrat Réparation :</b></span></td>
	</tr>
	<tr align="center">
		<td colspan="2">Date début de contrat :</td>
		<td colspan="2"><?php
			echo "<select name=\"jourreparation\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moisreparation\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneereparation\">";
			echo "<option value=\"0\"></option>";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr align="center">
		<td colspan="2">Date de fin de contrat :</td>
		<td colspan="2"><?php
			echo "<select name=\"jourfinreparation\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moisfinreparation\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneefinreparation\">";
			echo "<option value=\"0\"></option>";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr align="center">
		<td colspan="2">Coût de contrat :</td>
		<td colspan="2"><input type="text" name="coutreparation"></td>
	</tr>
	<tr align="center">
		<td colspan="2">Atelier de Réparation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
		<td colspan="2"><?php 
			$requete2 = mysql_query("SELECT * FROM fournisseur");
			echo "<select name=\"fournisseur2\" id=\"fournisseur2\">";
			echo "<option value=\"NULL\">Pas de contrat</option>";
			while($resultat2 = mysql_fetch_array($requete2))
				echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
</table><br>
<div align="center"><input type ="submit" value="Enregistrer"></div>
</form>
</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>