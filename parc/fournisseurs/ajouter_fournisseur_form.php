<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Ajouter une société</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un fournisseur -</strong></p>
<br>
<form name="ajout_fournisseur" method="post" action="ajout_fournisseur.php">
<table align="center" border="0">
	<tr>
		<td align="right"><span class="style4">Nom du fournisseur :</span></td>
		<td><input type="text" name="nom"></td>
    </tr>
	<tr>
		<td align="right"><span class="style4">Raison social : </span></td>
		<td><input type="text" name="rs"></td>
    </tr>
	<tr>
		<td align="right"><span class="style4">Ville :</span></td>
		<td><input type="text" name="ville"></td>
	</tr>
	<tr>
		<td align="right"><span class="style4">Téléphone : </span></td>
		<td><input type="text" name="tel" maxlength="9"></td>
	</tr>
</table><br><br>
<div align="center"><input type ="submit" value="Enregistrer"><br><br></div>
</form>
</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>