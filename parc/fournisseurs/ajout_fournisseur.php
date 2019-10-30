<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Ajouter une société</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<b><u>Récapitulatif sur le fournisseur :  </u></b><BR>
<?php
//récupérer les données du formulaire "ajout_fournisseur_form"
$nom=$_POST['nom'];
$rs=$_POST['rs'];
$ville=$_POST['ville'];
$tel=$_POST['tel'];
//Gestion du libelle type de société
echo ("<b>Nom de la société : </b>");
echo $nom."<BR>";
echo ("<b>Raison sociale : </b>");
echo $rs."<BR>";
echo ("<b>Ville : </b>");
echo $ville."<BR>";
echo ("<b>Téléphone : </b>");
echo $tel."<BR>";
// bouton de retour  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_fournisseur_form.php';\">";
echo "</form>";
// requéte insertion du nouvel enregistrement
$query="insert into fournisseur (nomfournisseur, rsfournisseur, villefournisseur, telfournisseur) 
values ('".$nom."','".$rs."','".$ville."','".$tel."')";
// execution de la requète
$resultat = mysql_query($query) or die("erreur dans la requete : " . $query);
// deconnexion de la base
mysql_close(); 
?>
</body>
</html>