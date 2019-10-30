<?php
include ('../connect_base.php');
?>
<html>
<head>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
$matricule = $_POST['matricule'];
$requete = "select nomindividu, prenomindividu, telindividu, cinindividu 
from individu i, vehicule v
where i.idvehicule=v.idvehicule and v.immatriculationvehicule='".$matricule."'";
$resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
?>
<p align="center" class="style2"><strong>- Recherche de l'utilisateur qui utilise- <?php echo $matricule ?> -</strong></p>
<table border="1" align="center" class="tableau">
    <tr>
		<th width="140" align="center" class="style3" >Nom </th>
		<th width="140" align="center" class="style3" >Prénom </th>
		<th width="180" align="center" class="style3" >Tel </th>
		<th width="100" align="center" class="style3" >CIN </th>
    </tr>
	<?php
	while( $row = mysql_fetch_row($resultat) )
	{
	?>
	<tr>
		<td><?php echo $row[0]; ?></td>
		<td><?php echo $row[1]; ?></td>
		<td><?php echo $row[2]; ?></td>
		<td><?php echo $row[3]; ?></td>
	</tr>
	<?php } ?>
</table><br>
<center><input type="button" value="Retour" onClick="window.location='recherche_utilisateur_form.php'"></input></center>
</body>
</html>
<?php
mysql_close();
?>