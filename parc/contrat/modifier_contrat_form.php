<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modification contrat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="modifier_contrat.php" method="POST">
<?php
$contrat=$_GET["code"];
//requête de travail
$requete="select idcontrat, nomfournisseur, libelletypecontrat, immatriculationvehicule, datedebcontrat, datefincontrat, montantcontrat
from contrat c, typecontrat t, vehicule v, fournisseur f
where c.idtypecontrat=t.idtypecontrat and f.idfournisseur=c.idfournisseur and v.idvehicule=c.idvehicule and idcontrat='$contrat'";
$resultat = mysql_query($requete) or die(mysql_error());
$row = mysql_fetch_array($resultat);
$code=$row[0];
$nom=$row[1];
$libelletc=$row[2];
$matricule=$row[3];
$debutcontrat=$row[4];
$fincontrat=$row[5];
$montantcontrat=$row[6];
echo "<center>";
echo "<span class=style2>- Modification du contrat N° ".$code." -</span><br><br><br>";
?>
<input type="hidden" name="code" value="<?php echo $code?>">
<table>
<tr>
	<td>
	<span class="style4">Nom du fournisseur : </span>
	</td>
	<td>
		<select name="fournisseur">
		<?php
		$resultat1 = mysql_query("select idfournisseur, nomfournisseur from fournisseur");
		while($row1 = mysql_fetch_array($resultat1))
			echo "<option value=\"$row1[0]\">$row1[1]</option>";
		?>
		</select>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Type contrat : </span>
	</td>
	<td>
		<select name="contrat">
		<?php
		$resultat1 = mysql_query("select * from typecontrat");
		while($row1 = mysql_fetch_array($resultat1))
			echo "<option value=\"$row1[0]\">$row1[1]</option>";
		?>
		</select>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Matricule du véhicule : </span>
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
	<span class="style4">Date début contrat : </span>
	</td>
	<td><?php
			echo "<select name=\"jourcontrat\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moiscontrat\">&nbsp;&nbsp;";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneecontrat\">";
			echo "<option value=\"0\"></option>";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td><span class="style4">Date de fin de contrat :</span></td>
	<td><?php
			echo "<select name=\"jourfin\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<32;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"moisfin\">";
			echo "<option value=\"0\"></option>";
			for($i=1;$i<13;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>&nbsp;&nbsp;";
			echo "<select name=\"anneefin\">";
			echo "<option value=\"0\"></option>";
			for($i=2000;$i<2020;$i++)
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
	</td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td><span class="style4">Montant du contrat :</span></td>
	<td><input type="text" name="montant"></td>
</tr>
<tr><td height="16"></td></tr>
</table>
<input type="button" value="Retour" onClick="window.location='liste_fournisseur.php';">
<input name="valider" type="submit" value="Modifier">
</form>
</body>
</html>
<?
mysql_close(); 
?>