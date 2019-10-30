<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Ajouter un utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un utilisateur -</strong></p>
<br>
<form name="ajout_utilisateur" method="post" action="ajout_utilisateur.php">
<table align="center" border="0">
	<tr>
		<td align="right">Nom :</td>
		<td><input type="text" name="nom"></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td align="right">Prénom :</td>
		<td><input type="text" name="prenom"></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td align="right">Téléphone :</td>
		<td><input type="text" name="tel" maxlength="10"></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td align="right">C.I.N :</td>
		<td><input type="text" name="cin"></td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td align="right">Interne :</td>
		<td>
			<select name="interne">
				<option value="1">Interne</option>
				<option value="0">Intervenant</option>
			</select>
		</td>
	</tr>
	<tr><td><br></td></tr>
</table><br>
<div align="center"><input type ="submit" value="Enregistrer"></div><br>
</form>
</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>