<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Recherche matériel par utilisateur</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Recherche d'utilisateur -</strong></p>
<center>
	<table border="0">
	<tr>
		<td>
			<form method="POST" action="recherche_par_nom.php">
			<table align="center">
				<tr>
					<td align="center" class="style4">Nom de l'utilisateur : </td>
				</tr>
				<tr><td><br></td></tr>
				<tr>	
					<td align="right">
					<b>Entrer le nom : </b><input type="text" name="nom">
					</td>
				</tr>
				<tr>
					<td align="right">
					<b>Entrer le prénom : </b><input type="text" name="prenom">
					</td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td colspan="2" align="center">
					<input type="submit" name="Envoyer" value="Rechercher">
					</td>
				</tr>
			</table>
			</form>
		</td>
		<td width="100"></td>
		<td>
			<form method="POST" action="recherche_par_matricule.php">
			<table align="center">
				<tr>
					<td align="center" class="style4">Matricule : </td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td align="right">
					<b>Entrer le matricule : </b><input type="text" name="matricule">
					</td>
				</tr>
				<tr><td><br></td></tr>
				<tr>
					<td colspan="2"  align="center">
					<input type="submit" name="Envoyer" value="Rechercher">
					</td>
				</tr>
				<tr><td><br></td></tr>
			</table>
			</form>
		</td>
	</tr>
	</table>
</center>
</body>
</html>
<?php
mysql_close();
?>