<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Liste des Véhicules</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="50" bgcolor="#fffcd9">
<div align="center">
	<font color="#000066" size="5" face="Comic Sans MS">
	<?php
	echo "Liste des ".$_GET["libelle"]."s"."<br><br>";
	?>
	</font>
	<?php
	//récupération de donnée
	$choix=$_GET["libelle"];
	//requête de travail
	$sql="select * from vehicule v, categorie c
			where c.IDCATEGORIE=v.IDCATEGORIE
			and c.LIBELLECATEGORIE='".$choix."' 
			order by IDVEHICULE";
	$query=mysql_query($sql) or die(mysql_error());
	?>
	<?php
	while ($row=mysql_fetch_row($query))
	{
		echo "<font class=\"style4\">";
		echo ($row[13]); echo "</font>&nbsp;"; 
		echo "<a href=\"detail_vehicule.php?&code=".$row[0]."\" target=\"bas\" class=\"style5\"><img src=\"../images/detail.jpg\"></a>"; echo "&nbsp;";
		echo "<a href=\"modifier_vehicule_form.php?&code=".$row[0]."\" target=\"bas\" class=\"style5\"><img src=\"../images/modifier.jpg\"></a>"; echo "&nbsp;";
		echo "<a href=\"confirmation_supprimer_vehicule.php?&code=".$row[0]."\" target=\"bas\" class=\"style5\"><img src=\"../images/supprimer.jpg\"></a>";
		echo "<br><br>";
	}
	// deconnexion de la base
	mysql_close(); 
	?>
</div>
</body>
</html>