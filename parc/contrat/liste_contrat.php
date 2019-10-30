<?php
include "../connect_base.php";
?>
<html>
<head>
<title>Liste des contrats</title>
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
$requete = "select idcontrat, nomfournisseur, rsfournisseur, libelletypecontrat, immatriculationvehicule, datedebcontrat, datefincontrat, montantcontrat
from contrat c, typecontrat t, vehicule v, fournisseur f
where c.idtypecontrat=t.idtypecontrat and f.idfournisseur=c.idfournisseur and v.idvehicule=c.idvehicule";
$resultat=mysql_query($requete) or die(mysql_error());
?>
<div align="center">
<span class="style2"><strong><font face="Comic Sans MS">Liste des contrats</font></strong></span><br><br>
<TABLE border="1" align="center" class="tableau">
    <tr class="style3">
		<th width="120" height="36">Nom Fournisseur </th>
		<th width="96">Raison Social</th>
		<th width="96">Type Contrat</th>
		<th width="128">Matricule vehicule</th>
		<th width="100">Debut Contrat</th>
		<th width="90">Fin Contrat</th>
		<th>Montant Contrat</th>
		<th>Modification</th>
		<th>Suppression</th>
	</tr>
		<?php
		while ($row=mysql_fetch_row($resultat))
		{
		$code=$row[0];
		$nom=$row[1];
		$rs=$row[2];
		$libelletc=$row[3];
		$matricule=$row[4];
		$debutcontrat=$row[5];
		if($debutcontrat==NULL)
			$debutcontrat="---";
		$fincontrat=$row[6];
		if($fincontrat==NULL)
			$fincontrat="---";
		$montantcontrat=$row[7];
		?>
		<tr>
			<td align="center">
				<?php echo $nom?>
			</td>
			<td align="center">
				<?php echo $rs?>
			</td>
			<td align="center">
				<?php echo $libelletc?>
			</td>
			<td align="center">
				<?php echo $matricule?>
			</td>
			<td align="center">
				<?php echo $debutcontrat?>
			</td>
			<td align="center">
				<?php echo $fincontrat?>
			</td>
			<td align="center">
				<?php echo $montantcontrat?>
			</td>
			<td align="center">
				<a href=modifier_contrat_form.php?code=<?php echo $code?> target="bas" title="Modifier"><img src="../images/modifier.jpg"></a>
			</td>
			<td align="center">
				<a href=confirmation_supprimer_contrat.php?code=<?php echo $code?> target="bas" title="Supprimer"><img src="../images/supprimer.jpg"></a>
			</td>
		</tr>
		<?php
		}
		?>
</table>
</div>
</body>
</html>