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
<p align="center" class="style2"><strong>- Ajouter une intervention -</strong></p><br>
<form name="ajout_vehicul" method="post" action="ajout_intervention.php">
<table align="center" border="0">
	<tr>
		<td align="right"><span class="style4">Matricule :</span></td>
		<td>
			<?php
			$requete = "select idvehicule, immatriculationvehicule from vehicule";
			$resultat = mysql_query($requete);
			echo "<select name=\"vehicule\">";
			while($row = mysql_fetch_array($resultat))
				echo "<option value=\"$row[0]\">$row[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr><td height="8"></td></tr>
	<tr>
		<td align="right"><span class="style4">Panne :</span></td>
		<td>
			<?php
			$requete = "select idpanne, libellepanne from panne";
			$resultat = mysql_query($requete);
			echo "<select name=\"panne\">";
			while($row = mysql_fetch_array($resultat))
				echo "<option value=\"$row[0]\">$row[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr><td height="8"></td></tr>
	<tr>
		<td align="right"><span class="style4">Intervenant :</span></td>
		<td>
			<?php
			$requete = "select idindividu, nomindividu, prenomindividu from individu where interne=0";
			$resultat = mysql_query($requete);
			echo "<select name=\"individu\">";
			echo "<option value=\"NULL\">Pas d'intervenant</option>";
			while($row = mysql_fetch_array($resultat))
				echo "<option value=\"$row[0]\">$row[1] $row[2]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr><td height="8"></td></tr>
	<tr>
		<td align="right"><span class="style4">Date Problème :</span></td>
		<td>
			<?php
			echo "<select name=\"jourprobleme\">";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moisprobleme\">";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneeprobleme\">";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr><td height="8"></td></tr>
	<tr>
		<td align="right"><span class="style4">Date Intervention :</span></td>
		<td>
			<?php
			echo "<select name=\"jourintervention\">";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moisintervention\">";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneeintervention\">";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr><td height="8"></td></tr>
	<tr>
		<td align="right"><span class="style4">Duree :</span></td>
		<td>
			<?php
			echo "<select name=\"duree\">";
			for($i=1;$i<=200;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?><b> en H</b>
		</td>
	</tr>
	<tr><td height="8"></td></tr>
	<tr>
		<td align="right"><span class="style4">Compte Rendu :</span></td>
		<td>
		<textarea name="compterendu" rows="4"></textarea>
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