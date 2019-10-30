<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Recherche Utilisateur par nom</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$requete = "select telindividu, cinindividu from individu where nomindividu='".$nom."' and prenomindividu='".$prenom."'";
$resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
$row = mysql_fetch_row($resultat);
?>
<p align="center" class="style2"><strong>- Recherche de l'utilisatuer - <?php echo $nom.' '.$prenom ?> -</strong></p>
<table border="1" align="center" class="tableau">
    <tr>
		<th width="140" align="center" class="style3" >Nom </th>
		<th width="140" align="center" class="style3" >Prénom </th>
		<th width="180" align="center" class="style3" >Tel </th>
		<th width="100" align="center" class="style3" >CIN </th>
    </tr>
	<tr>
		<td><?php echo $nom; ?></td>
		<td><?php echo $prenom; ?></td>
		<td><?php echo $row[0]; ?></td>
		<td><?php echo $row[1]; ?></td>
	</tr>
</table><br>
<center><input type="button" value="Retour" onClick="window.location='recherche_utilisateur_form.php'"></input></center>
</body>
</html>
<?php
mysql_close();
?>