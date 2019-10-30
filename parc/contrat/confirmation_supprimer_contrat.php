<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Suppression contrat</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
//récupérer les données du formulaire "sup_even"
$contrat=$_GET['code'];
//Titre de la page
echo "<center>";
echo "<span class=style2>Suppression du contrat N° $contrat</span>";
echo "<br><br><br>Voulez-vous vraiment supprimer cette enregistrement ?<br><br>";
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_contrat.php?code=$contrat';\">";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_contrat.php';\">";
echo "</form></center>";
mysql_close(); 
?>
</p>
</body>
</html>