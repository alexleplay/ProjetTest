<?php
include ("../connect_base.php");
?>
<html>
<head>
<title>Ajouter un utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>
<body marginheight="40" bgcolor="#fffcd9">
<?php
echo("<b><u>Récapitulatif sur l'utilisateur :  </u></b><BR>");
//récupérer les données du formulaire "ajout_utilisateur_form"
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['tel'];
$cin=$_POST['cin'];
$interne=$_POST['interne'];
echo "<BR>";
echo "<b>Nom de l'utilisateur : </b>";
echo $nom."<BR>";
echo "<b>Prénom de l'utilisateur : </b>";
echo $prenom."<BR>";
echo "<b>Téléphone : </b>";
echo $tel."<BR>";
echo "<b>Téléphone portable: </b>";
echo $cin."<BR>";
// bouton de retour  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_utilisateur_form.php';\">";
echo "</form>";
// requéte insertion du nouvel enregistrement dans la table utilisateur
$requete = "INSERT INTO `individu` (`NOMINDIVIDU`, `PRENOMINDIVIDU`, `TELINDIVIDU`, `CININDIVIDU`, `INTERNE`) VALUES 
('".$nom."', '".$prenom."', '".$tel."', '".$cin."', ".$interne.")";
// execution de la requete
$resultat = mysql_query($requete) or die("erreur dans la requete : " .$requete);
mysql_close(); 
?>
</body>
</html>