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
<form action="modifier_intervention.php" method="POST">
<?php
$intervention=$_GET["code"];
$requete="select * from intervention where idintervention='$intervention'";
$resultat=mysql_query($requete) or die(mysql_error());
$row=mysql_fetch_array($resultat);
//Titre de la page
echo "<center>";
echo "<span class=style2>Modification de l'intervention N°".$intervention."</span><br><br><br>";
?>
<input type="hidden" name="code" value="<?php echo $intervention?>">
<table>
<tr>
	<td align="right">
		<span class="style4">Matricule du véhicule : </span>
	</td>
	<td>
		<input name="vehicule" type="text" readonly="1" value="
		<?php 
		$resultat1=mysql_query("select immatriculationvehicule from vehicule where idvehicule='".$row[1]."'");
		$row1 = mysql_fetch_row($resultat1);
		echo $row1[0];
		?>
		">
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td align="right">
		<span class="style4">Libelle du panne : </span>
	</td>
	<td>
		<select name="panne">
		<?php
		$resultat1 = mysql_query("select * from panne");
		while($row1 = mysql_fetch_row($resultat1))
			echo "<option value=\"$row1[0]\">$row1[1]</option>";
		?>
		</select>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td align="right">
		<span class="style4">Intervenant : </span>
	</td>
	<td>
		<select name="intervenant">
		<?php
		$resultat1 = mysql_query("select idindividu, nomindividu, prenomindividu from individu where interne=0");
		while($row1 = mysql_fetch_row($resultat1))
			echo "<option value=\"$row1[0]\">$row1[1] $row1[2]</option>";
		?>
		</select>
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
	<textarea name="compterendu" rows="4"><?php echo $row[7];?></textarea>
	</td>
</tr>
</table>
<input type="button" value="Retour" onClick="window.location='liste_intervention.php';">
<input name="valider" type="submit" value="Modifier">
</form>
</body>
</html>
<?
mysql_close(); 
?>