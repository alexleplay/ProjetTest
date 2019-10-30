<?php
include("../connect_base.php");
?>
<html>
<head>
<title>Modifier Données Véhicule</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
<link href="../tableau.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<form name="modifier_vehicule" method="post" action="modifier_vehicule.php">
<?php
//requete de recherche du materiel
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
echo "<span class=style2>- Modification des caractéristiques du Véhicule ".$matricule." -</span><br><br><br>";
echo "</center>";
?>
<input type="hidden" name="vehicule" value="<?php echo $vehicule?>">
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
		<td align="right">Modele :</td>
		<td><input type="text" name="modele" value="<?php echo $modele?>" readonly="1"></td>
		<td align="right">Statut :</td>
		<td><?php 
			$requete2 = mysql_query("SELECT * FROM typevehicule");
			echo "<select name=\"typevehicule\" id=\"typevehicule\">";
			while($resultat2 = mysql_fetch_array($requete2))
				echo "<option value=\"$resultat2[0]\">$resultat2[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
	<tr>
		<td align="right">Service :</td>
		<td>
			<?php 
			$requete3 = mysql_query("SELECT IDSERVICE, LIBELLESERVICE FROM service");
			echo "<select name=\"service\" id=\"service\">";
			echo "<option value=\"NULL\">Aucun Service</option>";
			while($resultat3 = mysql_fetch_array($requete3))
				echo "<option value=\"$resultat3[0]\">$resultat3[1]</option>";
			echo "</select>";
			?>
		</td>
		<td align="right">Site géographique :</td>
		<td>
			<?php 
			$requete4 = mysql_query("SELECT * FROM site");
			echo "<select name=\"site\" id=\"site\">";
			while($resultat4 = mysql_fetch_array($requete4))
				echo "<option value=\"$resultat4[0]\">$resultat4[1]</option>";
			echo "</select>";
			?>
		</td>
	</tr>
</table><br>
<div align="center"><input type ="submit" value="Enregistrer"></div><br>
</form>
<hr><br>
<form name="modifier_assurance_vehicule" method="post" action="modifier_assurance_vehicule.php">
<input type="hidden" name="vehicule" value="<?php echo $vehicule?>">
<center><span class="style2">- Assurance du véhicule <?php echo $matricule?> -</span></center><br>
<TABLE align="center">
    <tr align="center">
		<td colspan="8" size="+1" class="style3"><b>Date Debut Assurance</b><br><br></td>
	</tr>
	<tr>
		<td>Jour :</td>
		<td>
			<?php
			echo "<select name=\"jourassurance\" id=\"jourassurance\">";
			for( $i=1; $i<32; $i++ )
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
		<td width="40"></td>
		<td>Mois :</td>
		<td>
			<?php
			echo "<select name=\"moisassurance\" id=\"moisassurance\">";
			for( $i=1; $i<13; $i++ )
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
		<td width="40"></td>
		<td>Année :</td>
		<td>
			<?php 
			echo "<select name=\"anneeassurance\" id=\"anneeassurance\">";
			for ( $i=2008; $i<2040; $i++ )
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
    </tr>
	<tr><td><br></td></tr>
	<tr align="center">
		<td colspan="8" size="+1" class="style3"><b>Date Fin Assurance</b><br><br></td>
	</tr>
	<tr>
		<td>Jour :</td>
		<td>
			<?php
			echo "<select name=\"jourfinassurance\" id=\"jourfinassurance\">";
			for( $i=1; $i<32; $i++ )
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
		<td width="40"></td>
		<td>Mois :</td>
		<td>
			<?php
			echo "<select name=\"moisfinassurance\" id=\"moisfinassurance\">";
			for( $i=1; $i<13; $i++ )
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
		<td width="40"></td>
		<td>Année :</td>
		<td>
			<?php 
			echo "<select name=\"anneefinassurance\" id=\"anneefinassurance\">";
			for ( $i=2008; $i<2040; $i++ )
				echo "<option value=\"$i\">$i</option>";
			echo "</select>";
			?>
		</td>
    </tr>
	<tr><td><br></td></tr>
	<tr align="center">
		<td colspan="8" size="+1" class="style3"><b>Coût Assurance</b></td>
	</tr>
	<tr align="center">
		<td colspan="8">
			<?php
			$requete4= mysql_query("select COUTASSURANCE FROM vehicule where IDVEHICULE='".$vehicule."'");
			$resultat4 = mysql_fetch_row($requete4);
			?>
			<input type="text" name="coutassurance" maxlength="10" value="<?php echo $resultat4[0]?>">DH
		</td>
	</tr>
	<tr><td><br></td></tr>
</TABLE>
<div align="center"><input type ="submit" value="Enregistrer"></div>
</form>
</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>