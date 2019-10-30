<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Liste intervention</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Liste des interventions -</strong></p>
<center>
<table border="0">
	<tr>
		<td><br><br>
			<form method="POST" action="recherche_par_matricule.php">
			<table align="center">
				<tr>
					<td align="center"><b>Matricule du véhicule : </b></td>
				</tr>
				<tr>	
					<td align="center">
						<?php
						$requete = mysql_query("SELECT idvehicule, immatriculationvehicule
													FROM vehicule");
						?>
						<select name="matricule" id="matricule">
						<?php
							while($row = mysql_fetch_array($requete)) {
						?>
						<option value="<?php echo $row[0]; ?>" selected><?php echo $row[1]; ?></option>
						<?php
							}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="Envoyer" value="Rechercher"></td>
				</tr>
			</table>
			</form>
		</td>
		<td width="100"></td>
		<td>
		<form method="POST" action="recherche_par_intervenant.php">
		<table align="center">
		<tr><br><br>
			<td align="center"><b>Nom de l'intervenant : </b></td>
		</tr>	
		<tr>
			<td align="center"><?php
				$requete = mysql_query("select idindividu, nomindividu, prenomindividu from individu where interne=0");
				?>
				<select name="intervenant" id="intervenant">
				<?php
					while($row = mysql_fetch_array($requete)) {
				?>
				<option value="<?php echo $row[0]; ?>" selected><?php echo $row[1].' '.$row[2]; ?>
				</option>
				<?php
				}
				?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"  align="center"><input type="submit" name="Envoyer" value="Rechercher"></td>
		</tr>
		</table></form>
		</td>
		<td width="100"></td>
		<td>
			<form method="POST" action="recherche_par_date.php">
				<table align="center">
				<tr align=""><br><br>
					<td align="center"><b>Date intervention entre le :</b></td>
				</tr>	
				<tr>
					<td align="center">
						<?php
						echo "<select name=\"jourdebut\">";
						for($i=1;$i<32;$i++)
							echo "<option value=\"$i\">$i</option>";
						echo "</select>&nbsp;&nbsp;";
						echo "<select name=\"moisdebut\">";
						for($i=1;$i<13;$i++)
							echo "<option value=\"$i\">$i</option>";
						echo "</select>&nbsp;&nbsp;";
						echo "<select name=\"anneedebut\">";
						for($i=2000;$i<2020;$i++)
							echo "<option value=\"$i\">$i</option>";
						echo "</select>";
						?>
					</td>
				</tr>
				<tr>
					<td align="center"><b>Et le :</b></td>
				</tr>
				<tr>
					<td align="center">
						<?php
						echo "<select name=\"jourfin\">";
						for($i=1;$i<32;$i++)
							echo "<option value=\"$i\">$i</option>";
						echo "</select>&nbsp;&nbsp;";
						echo "<select name=\"moisfin\">";
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
				<tr>
					<td colspan="2"  align="center"><input type="submit" name="Envoyer" value="Rechercher"></td>
				</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
</center>
</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>