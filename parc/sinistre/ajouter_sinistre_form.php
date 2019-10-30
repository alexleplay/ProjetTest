<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Ajouter un sinistre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="ajout_sinistre.php" method="POST">
<?php
echo "<center>";
echo "<span class=style2>- Ajouter un sinistre -</span><br><br><br>";
?>
<table>
<tr>
	<td>
	<span class="style4">Nom du responsable : </span>
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
	<span class="style4">Lieu : </span>
	</td>
	<td>
		<input type="text" name="lieu">
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Date : </span>
	</td>
	<td>
		<?php
		echo "<select name=\"jour\">";
		echo "<option value=\"0\"></option>";
		for($i=1;$i<32;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>&nbsp;&nbsp;";
		echo "<select name=\"mois\">&nbsp;&nbsp;";
		echo "<option value=\"0\"></option>";
		for($i=1;$i<13;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>&nbsp;&nbsp;";
		echo "<select name=\"annee\">";
		echo "<option value=\"0\"></option>";
		for($i=2000;$i<2020;$i++)
			echo "<option value=\"$i\">$i</option>";
		echo "</select>";
		?>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td><span class="style4">Dégât matériel :</span></td>
	<td>
		<textarea name="degatmateriel"></textarea>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td><span class="style4">Dégât corporel :</span></td>
	<td>
		<textarea name="degatcorporel"></textarea>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td><span class="style4">Nombre de décès :</span></td>
	<td><input type="text" name="nbrdeces"></td>
</tr>
<tr><td height="16"></td></tr>
</table>
<div align="center"><input type ="submit" value="Enregistrer"></div>
</form>
</body>
</html>
<?
mysql_close(); 
?>