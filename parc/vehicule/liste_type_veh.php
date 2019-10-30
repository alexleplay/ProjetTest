<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Liste des catérogie de véhicule</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="35" bgcolor="#fffcd9">
<?php
//requête de travail
$sql="select LIBELLECATEGORIE from categorie order by LIBELLECATEGORIE";
$query1=mysql_query($sql) or die(mysql_error());
while ($row=mysql_fetch_row($query1))
	echo "<div align=\"center\"><a href=\"liste_veh.php?&libelle=".$row[0]."\" target=\"bas\">".$row[0]."</a></div><br><br>";
?>
</body>
</html>
