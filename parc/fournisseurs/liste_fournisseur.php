<?php
include "../connect_base.php";
?>
<html>
<head>
<title>Liste des logiciels</title>
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
$requete="select * from fournisseur";
$resultat=mysql_query($requete) or die(mysql_error());
?>
<div align="center">
<span class="style2"><strong><font face="Comic Sans MS">Liste des fournisseurs</font></strong></span><br><br>
<TABLE border="1" align="center" class="tableau">
    <tr class="style3">
		<th width="93" align="center">Nom </th>
		<th width="100" align="center">Raison Social</th>
		<th width="49" align="center">Ville</th>
		<th width="83" align="center">Téléphone</th>
		<th width="81" align="center">Modification</th>
		<th width="77" align="center">Suppression</th>
	</tr>
		<?php
		while ($row=mysql_fetch_row($resultat))
		{
		$code=$row[0];
		$nom=$row[1];
		$rs=$row[2];
		$ville=$row[3];
		$tel=$row[4];
		?>
		<tr>
			<td align="center">
				<?php echo $nom?>
			</td>
			<td align="center">
				<?php echo $rs?>
			</td>
			<td align="center">
				<?php echo $ville?>
			</td>
			<td align="center">
				<?php echo $tel?>
			</td>
			<td align="center">
				<a href=modifier_fournisseur_form.php?code=<?php echo $code?> target="bas" title="Modifier"><img src="../images/modifier.jpg"></a>
			</td>
			<td align="center">
				<a href=confirmation_supprimer_fournisseur.php?code=<?php echo $code?> target="bas" title="Supprimer"><img src="../images/supprimer.jpg"></a>
			</td>
		</tr>
		<?php
		}
		?>
</table>
</div>
</body>
</html>