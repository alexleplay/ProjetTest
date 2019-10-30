<?php
include "../connect_base.php";
?>
<html>
<head>
<title>Liste des réservations</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../tableau.css" rel="stylesheet" type="text/css">
<script language="Javascript">
function imprimer(){window.print();}
</script>
</head>
<body marginheight="20" bgcolor="#fffcd9">
<input name="imprimer" onClick="imprimer()" type="button" value="Imprimer cette page"><br><br>
<?php
//requête de travail
$requete = "select idmission, nomindividu, prenomindividu, immatriculationvehicule, objectifmission, kmparcourumission, 
qtecarburantmission, datereservation, datefinreservation
from mission m, individu i, vehicule v
where m.idindividu=i.idindividu and v.idvehicule=m.idvehicule";
$resultat=mysql_query($requete) or die(mysql_error());
?>
<div align="center">
<span class="style2"><strong><font face="Comic Sans MS">Liste des réservations</font></strong></span><br><br>
<TABLE border="1" align="center" class="tableau">
    <tr class="style3">
		<th width="120" height="36">Nom Responsable</th>
		<th width="96">Matricule véhicule</th>
		<th>Objectif</th>
		<th width="90">Km parcouru</th>
		<th width="100">Qte Carburant</th>
		<th width="90">Date début</th>
		<th width="90">Date fin</th>
		<th>Modification</th>
		<th>Suppression</th>
	</tr>
		<?php
		while ($row=mysql_fetch_row($resultat))
		{
		$code=$row[0];
		$nom=$row[1].' '.$row[2];
		$matricule=$row[3];
		$objectif=$row[4];
		$km=$row[5];
		if($km==NULL)
			$km="---";
		$qte=$row[6];
		if($qte==NULL)
			$qte="---";
		$date=$row[7];
		$datefin=$row[8];
		?>
		<tr>
			<td align="center">
				<?php echo $nom?>
			</td>
			<td align="center">
				<?php echo $matricule?>
			</td>
			<td align="center">
				<?php echo $objectif?>
			</td>
			<td align="center">
				<?php echo $km?>
			</td>
			<td align="center">
				<?php echo $qte?>
			</td>
			<td align="center">
				<?php echo $date?>
			</td>
			<td align="center">
				<?php echo $datefin?>
			</td>
			<td align="center">
				<a href=modifier_reservation_form.php?code=<?php echo $code?> target="bas" title="Modifier"><img src="../images/modifier.jpg"></a>
			</td>
			<td align="center">
				<a href=confirmation_supprimer_reservation.php?code=<?php echo $code?> target="bas" title="Supprimer"><img src="../images/supprimer.jpg"></a>
			</td>
		</tr>
		<?php
		}
		?>
</table>
</div>
</body>
</html>