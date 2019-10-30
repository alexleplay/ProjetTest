<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Recherche intervenation en fonction du nom du matériel</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
$matricule=$_POST['matricule'];
$requete = "select immatriculationvehicule from vehicule where idvehicule='".$matricule."'";
$resultat = mysql_query($requete);
$row = mysql_fetch_row($resultat);
?>
<p align="center" class="style2"><strong>- Recherche d'intervention sur <?php echo $row[0]?> -</strong></p>
<?php
$requete = "select idpanne, idindividu, dateprobintervention, dateintervention, dureeintervention, compterenduintervention, idintervention
from intervention
where idvehicule='".$matricule."'";
$resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
?>
<TABLE border="1" align="center" class="tableau">
    <tr>
		<th width="140" align="center" class="style3">Nom de l'intervenant</th>
		<th width="140" align="center" class="style3">Problème</th>
		<th width="130" align="center" class="style3">Date du problème</th>
		<th width="130" align="center" class="style3">Date intervention</th>
		<th width="110" align="center" class="style3">Durée intervention</th>
		<th width="180" align="center" class="style3">Compte-rendu</th>
		<th width="100" align="center" class="style3">Modification</th>
	</tr>
	<?php
	while($row=mysql_fetch_array($resultat))
	{
	$requete1 = "select nomindividu, prenomindividu from individu where idindividu='".$row[1]."'";
	$resultat1 = mysql_query($requete1) or die(mysql_error());
	$row1=mysql_fetch_row($resultat1);
	$nomintervenant=$row1[0];
	$prenomintervenant = $row1[1];
	$requete1 = "select libellepanne from panne where idpanne='".$row[0]."'";
	$resultat1 = mysql_query($requete1) or die(mysql_error());
	$row1=mysql_fetch_row($resultat1);
	$probleme=$row1[0];
	$dateprobleme=$row[2];
	//list($y,$m,$d) = explode('-', $date_probleme);
	//$date_probleme=$d.'/'.$m.'/'.$y; // date au format françai
	$dateintervention=$row[3];
	// $date_intervention est une valeur récupérée au format YYYY-MM-DD
	//list($y,$m,$d) = explode('-', $date_intervention);
	//$date_intervention=$d.'/'.$m.'/'.$y; // date au format français
	$dureeintervention=$row[4];
	$compterendu=$row[5];
	$code=$row[6];
	?>
	<tr>
		<td align="center">
			<?php echo $nomintervenant.' '.$prenomintervenant;?>
		</td>
		<td align="center">
			<?php echo $probleme;?>
		</td>
		<td align="center">
			<?php echo $dateprobleme;?>
		</td>  	
		<td align="center">
			<?php echo $dateintervention;?>
		</td>
		<td align="center">
			<?php echo $dureeintervention.'H';?>
		</td>
		<td align="center">
			<?php echo $compterendu;?>
		</td>
		<td align="center">
			<a href=modifier_intervention_form.php?code=<?php echo $code?> target="bas" title="Modifier" class="style5"><img src="../images/modifier.jpg"></a>
		</td>
	</tr>
	<?php
	}
	?>
</TABLE><br>
<center><input type="button" value="Retour" onClick="window.location='liste_intervention.php'"></input></center>
</body>
</html>
<?php
mysql_close();
?>