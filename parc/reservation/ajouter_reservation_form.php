<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Ajout réservation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="ajouter_reservation.php" method="POST">
<center>
<span class=style2>- Réserver un véhicule -</span><br><br><br>;
<table>
<tr>
	<td>
	<span class="style4">Nom du demandeur : </span>
	</td>
	<td>
		<select name="nom">
		<?php
		$resultat1 = mysql_query("select idindividu, nomindividu, prenomindividu from individu where interne=1 and nomindividu<>'admin'");
		while($row1 = mysql_fetch_array($resultat1))
			echo "<option value=\"$row1[0]\">$row1[1] $row1[2]</option>";
		?>
		</select>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Matricule véhicule : </span>
	</td>
	<td>
		<select name="matricule">
		<?php
		$resultat1 = mysql_query("select idvehicule, immatriculationvehicule from vehicule");
		while($row1 = mysql_fetch_array($resultat1))
			echo "<option value=\"$row1[0]\">$row1[1]</option>";
		?>
		</select>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Objectif : </span>
	</td>
	<td>
		<input type="text" name="objectif">
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td><span class="style4">Km :</span></td>
	<td>
		<input type="text" name="km">
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td><span class="style4">Qte Carburant :</span></td>
	<td>
		<input type="text" name="qte">
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Date Réservation :</span>
	</td>
	<td>
		<?php
		echo "<select name=\"jour\">";
		for($i=1;$i<32;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>&nbsp;&nbsp;";
		echo "<select name=\"mois\">&nbsp;&nbsp;";
		for($i=1;$i<13;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>&nbsp;&nbsp;";
		echo "<select name=\"annee\">";
		for($i=2000;$i<2020;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>";
		?>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Date Fin de réservation :</span>
	</td>
	<td>
		<?php
		echo "<select name=\"jourfin\">";
		for($i=1;$i<32;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>&nbsp;&nbsp;";
		echo "<select name=\"moisfin\">&nbsp;&nbsp;";
		for($i=1;$i<13;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>&nbsp;&nbsp;";
		echo "<select name=\"anneefin\">";
		for($i=2000;$i<2020;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>";
		?>
	</td>
</tr>
<tr><td height="16"></td></tr>
</table>
<input type="button" value="Retour" onClick="window.location='liste_reservation.php';">
<input name="valider" type="submit" value="Enregistrer">
</form>
</body>
</html>
<?
mysql_close(); 
?>