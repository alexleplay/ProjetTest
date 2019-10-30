<?php
include "../connect_base.php";
?>
<html>
<head>
<title>Liste des sinistres</title>
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
$requete = "select idsinistre, nomindividu, prenomindividu, immatriculationvehicule, lieusinistre, datesinistre, degatmatsinistre, degatcorsinistre, nbrdecessinistre
from sinistre s, individu i, vehicule v
where s.idvehicule=v.idvehicule and i.idindividu=s.idindividu";
$resultat=mysql_query($requete) or die(mysql_error());
?>
<div align="center">
<span class="style2"><strong><font face="Comic Sans MS">Liste des sinistres</font></strong></span><br><br>
<TABLE border="1" align="center" class="tableau">
    <tr class="style3">
		<th width="120" height="36">Nom Responsable</th>
		<th width="96">Matricule véhicule</th>
		<th width="96">Lieu</th>
		<th width="128">Date</th>
		<th width="100">Dégât matériel</th>
		<th width="90">Dégât corporel</th>
		<th>Nombre de décès</th>
		<th>Modification</th>
		<th>Suppression</th>
	</tr>
		<?php
		while ($row=mysql_fetch_row($resultat))
		{
		$code=$row[0];
		$nom=$row[1].' '.$row[2];
		$matricule=$row[3];
		$lieu=$row[4];
		$date=$row[5];
		$degatmat=$row[6];
		if($degatmat==NULL)
			$degatmat="---";
		$degatcor=$row[7];
		if($degatcor==NULL)
			$degatcor="---";
		$nbrdeces=$row[8];
		if($nbrdeces==NULL)
			$nbrdeces="---";
		?>
		<tr>
			<td align="center">
				<?php echo $nom?>
			</td>
			<td align="center">
				<?php echo $matricule?>
			</td>
			<td align="center">
				<?php echo $lieu?>
			</td>
			<td align="center">
				<?php echo $date?>
			</td>
			<td align="center">
				<?php echo $degatmat?>
			</td>
			<td align="center">
				<?php echo $degatcor?>
			</td>
			<td align="center">
				<?php echo $nbrdeces?>
			</td>
			<td align="center">
				<a href=modifier_sinistre_form.php?code=<?php echo $code?> target="bas" title="Modifier"><img src="../images/modifier.jpg"></a>
			</td>
			<td align="center">
				<a href=confirmation_supprimer_sinistre.php?code=<?php echo $code?> target="bas" title="Supprimer"><img src="../images/supprimer.jpg"></a>
			</td>
		</tr>
		<?php
		}
		?>
</table>
</div>
</body>
</html>