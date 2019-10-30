<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Ajouter un contrat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un contrat -</strong></p>
<br>
<form name="ajout_fournisseur" method="post" action="ajout_contrat.php">
<table align="center" border="0">
	<tr>
		<td align="right"><span class="style4">Nom du fournisseur :</span></td>
		<td><select name="fournisseur">
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
		<td align="right"><span class="style4">Type contrat : </span></td>
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
		<td align="right">
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
		<td align="right">
		<span class="style4">Date début contrat :</span>
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
</table><br>
<div align="center"><input type ="submit" value="Enregistrer"><br><br></div>
</form>
</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>