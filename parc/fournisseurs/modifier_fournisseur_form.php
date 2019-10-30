<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modification fournisseur</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="modifier_fournisseur.php" method="POST">
<?php
$fournisseur=$_GET["code"];
//requête de travail
$requete="select idfournisseur, nomfournisseur, rsfournisseur, villefournisseur, telfournisseur from fournisseur where idfournisseur='$fournisseur'";
$resultat=mysql_query($requete) or die(mysql_error());
$row=mysql_fetch_array($resultat);
$code=$row[0];
$nom=$row[1];
$rs=$row[2];
$ville=$row[3];
$tel=$row[4];
echo "<center>";
echo "<span class=style2>- Modification de la société ".$nom." -</span><br><br><br>";
?>
<input type="hidden" name="code" value="<?php echo $code?>">
<table>
<tr>
	<td>
	<span class="style4">Nom : </span>
	</td>
	<td><input name="nom" type="text"  value="<?php echo $nom?>"></td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Raison Social : </span>
	</td>
	<td><input name="rs" type="text"  value="<?php echo $rs?>"></td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Ville : </span>
	</td>
	<td><input name="ville" type="text"  value="<?php echo $ville?>"></td>
</tr>
<tr><td height="8"></td></tr>
<tr>
	<td>
	<span class="style4">Téléphone : </span>
	</td>
	<td><input name="tel" type="text"  value="<?php echo $tel?>"></td>
</tr>
<tr><td height="8"></td></tr>
</table>
<input type="button" value="Retour" onClick="window.location='liste_fournisseur.php';">
<input name="valider" type="submit" value="Modifier">
</form>
</body>
</html>
<?
mysql_close(); 
?>