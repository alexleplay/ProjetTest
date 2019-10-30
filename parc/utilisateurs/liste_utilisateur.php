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
$requete = "SELECT IDINDIVIDU, NOMINDIVIDU, PRENOMINDIVIDU, TELINDIVIDU, CININDIVIDU, idvehicule
			FROM INDIVIDU 
			where NOMINDIVIDU <> 'admin';";	
$resultat = mysql_query($requete) or die(mysql_error());
?>
<div align="center">
<span class="style2"><strong><font face="Comic Sans MS">Liste des utilisateurs</font></strong><br>
</span><br>
<TABLE border="1" align="center" class="tableau">
    <tr class="style3">
		<th width="100" align="center">Nom</th>
		<th width="100" align="center">Prénom</th>
		<th width="100" align="center">Téléphone</th>
		<th width="100" align="center">C.I.N</th>
		<th width="100" align="center">Véhicule</th>
		<th width="100" align="center">Modification</th>
		<th width="100" align="center">Suppression</th>
	</tr>
<?php
while ($row=mysql_fetch_row($resultat))
{
	echo "<tr>";
	echo "<td align=\"center\">$row[1]</td>";
	echo "<td align=\"center\">$row[2]</td>";
	if( !empty($row[3]) )
		echo "<td align=\"center\">$row[3]</td>";
	else
		echo "<td align=\"center\">---</td>";
	if( !empty($row[4]) )
		echo "<td align=\"center\">$row[4]</td>";
	else
		echo "<td align=\"center\">---</td>";
	$requete1 = "select immatriculationvehicule from vehicule where idvehicule='".$row[5]."'";
	$resultat1 = mysql_query($requete1) or die(mysql_error());
	$row1 = mysql_fetch_row($resultat1);
	if( !empty($row1[0]) )
		echo "<td align=\"center\">$row1[0]</td>";
	else
		echo "<td align=\"center\">---</td>";
	echo "<td align=\"center\"><a href=modifier_utilisateur_form.php?code=$row[0] target=\"bas\"><img src=\"../images/modifier.jpg\"></a></td>";
	echo "<td align=\"center\"><a href=confirmation_supprimer_utilisateur.php?code=$row[0] target=\"bas\"><img src=\"../images/supprimer.jpg\"></a></td>";
	echo "<tr>";
}
?>
</table>
</div>
</body>
</html>