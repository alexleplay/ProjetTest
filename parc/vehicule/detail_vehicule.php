<?php
include("../connect_base.php");
?>
<html>
<head>
<script language="Javascript">
function imprimer(){window.print();}
</script>
<title>Detail Véhicule</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
<link href="../tableau.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9">
<p align="left">
	<input name="imprimer" onClick="imprimer()" type="button" value="Imprimer cette page">
</p>
<form name="detail_materiel" method="post">
<?php
$vehicule=$_GET["code"];
$requete1="select IDVEHICULE, IMMATRICULATIONVEHICULE, LIBELLETYPECARBURANT, PUISSANCEVEHICULE, CARTEGRISEVEHICULE, NBRPORTEVEHICULE, LIBELLEMODELE, LIBELLETYPEVEHICULE, PATHPHOTOVEHICULE
from vehicule v , typeCarburant t, modele m, typevehicule tv
where t.IDTYPECARBURANT=v.IDTYPECARBURANT
and m.IDMODELE=v.IDMODELE
and tv.IDTYPEVEHICULE=v.IDTYPEVEHICULE
and v.IDVEHICULE='".$vehicule."'";
$resultat1=mysql_query($requete1) or die(mysql_error());
while ($row1=mysql_fetch_array($resultat1))
{
	$idvehicule=$row1[0];
	$matricule=$row1[1];
	$libellecarburant=$row1[2];
	$puissance=$row1[3];
	$cartegrise=$row1[4];
	$nbrporte=$row1[5];
	$modele=$row1[6];
	$statut=$row1[7];
	$photo=$row1[8];
}
echo "<center>";
echo "<span class=style2>- Caractéristique du materiel ".$matricule." -</span><br>";
echo "<br><br>";
echo "</center>";
?>
<input type="hidden" name="code" value="<?php echo $vehicule?>">
<table align="center" border="0">
	<tr>
		<td align="right">Carburant :</td>
		<td><input type="text" name="libellecarburant" value="<?php echo $libellecarburant?>" readonly="1"></td>
		<td align="right">Puissance : </td>
		<td><input type="text" name="puissance" value="<?php echo $puissance?>" readonly="1"></td>
	</tr>
	<tr>
		<td align="right">Carte grise :</td>
		<td><input type="text" name="cartegrise" value="<?php echo $cartegrise?>" readonly="1"></td>
		<td align="right">Nombre de porte :</td>
		<td><input type="text" name="nbrporte" maxlength="10" value="<?php echo $nbrporte?>" readonly="1"></td>
	</tr>
	<tr>
		<td align="right">Modele : </td>
		<td><input type="text" name="modele" value="<?php echo $modele?>" readonly="1"></td>
		<td align="right">Statut :</td>
		<td><input type="text" name="nom" value="<?php echo $statut?>" readonly="1"></td>
	</tr>
	<?php
	if( !empty($photo) )
	echo 
	"<tr>
		<td colspan=\"4\" align=\"center\">Photo Véhicule : </td>
	</tr>
	<tr>
		<td colspan=\"4\" align=\"center\">
			<img src=$photo>
		</td>
	</tr>" ;
	?>
</table><br>
</form>
<?php
$requete2="select DATEAQUISITIONVEHICULE, LIBELLETYPECONTRAT, MONTANTCONTRAT from vehicule v, typecontrat tc, contrat c
where v.IDVEHICULE=C.IDVEHICULE
and tc.IDTYPECONTRAT=c.IDTYPECONTRAT
and v.IDVEHICULE='".$vehicule."'";
$resultat2=mysql_query($requete2) or die(mysql_error());
while ($row2=mysql_fetch_array($resultat2))
{
	$dateacquisition=$row2[0];
	$modeacquisition=$row2[1];
	$montantacquisition=$row2[2];
}
?>
<center>
<span class=style2>- Informations sur le Mode d'acquisition du <?php echo $matricule?> -</span><br><br><br>
</center>
<input type="hidden" name="code" value="<?=$code?>">
<table align="center" border="0">
	<tr>
		<td align="right">Date d'acquisition :</td>
		<td><input type="text" name="dateacquisition" value="<?php echo $dateacquisition?>" readonly="1"></td>
	</tr>
	<tr>
		<td align="right">Mode d'acquisition: </td>
		<td><input type="text" name="modeacquisition" value="<?php echo $modeacquisition?>" readonly="1"></td>
	</tr>
	<tr>
		<td align="right">Montant d'acquisition: </td>
		<td><input type="text" name="modeacquisition" value="<?php echo $montantacquisition?>" readonly="1"></td>
	</tr>
</table><br>
<center><span class=style2>- Utilisateur du materiel <?php echo $matricule?> -</span></center><br>
<?php
//requête de travail utilisateur de véhicule
$requete3="select NOMINDIVIDU, PRENOMINDIVIDU, TELINDIVIDU
 	from individu i, vehicule v
	where i.IDVEHICULE=v.IDVEHICULE
	and v.IDVEHICULE='".$vehicule."'";
$resultat3=mysql_query($requete3) or die(mysql_error());
?>
<TABLE border="1" align="center" class="tableau">
	<tr>
		<th width="180" align="center" class="style3">Nom utilisateur</th>
		<th width="150" align="center" class="style3">Prénom utilisateur</th>
		<th width="150" align="center" class="style3">Tel utilisateur</th>
	</tr>
	<?php
	while ( $row3=mysql_fetch_row($resultat3) )
		echo "<tr><td align=\"center\">$row3[0]</td><td align=\"center\">$row3[1]</td><td align=\"center\">$row3[2]</td></tr>";
	?>
</TABLE>
</body>
</html>
<?php mysql_close(); ?>