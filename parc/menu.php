<?php
session_start();
//include "configuration.php";
?>
<html>
<head>
<title>menu</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="liensmenu.css" type="text/css">
</head>
<body>
<?php
// On test bien que l'utilisateur c'est bien connecter car il aurait pu se connecter en tapant l'url : /ceffparc/accueil.htm sans se logger
$login=$_SESSION["login"];
if ( empty($login) )
	echo "<br><br><br><br><br><br><br><br><br><br><center>Problème de connexion veuillez vous reconnecter <br><a href=\"./index.php\" target=\"_blank\" >Reconnexion</a></center> ";
else
	echo "
		<div align=\"center\">
			<p>
				<img src=\"images/logo.jpg\" width=\"158\" height=\"105\"><br><br>
				<span class=\"Style1\">
					<font face=\"Times New Roman, Times, serif\" size=\"+1\">Bonjour $login</font>
				</span>
			</p>
			<p><br>   
				<a href=\"./vehicule/cadregestion_veh.htm\" target=\"gestion\">Véhicules</a><br><br>
				<a href=\"./utilisateurs/cadregestion_util.htm\" target=\"gestion\">Utilisateurs</a><br><br>
				<a href=\"./fournisseurs/cadregestion_four.htm\" target=\"gestion\">Fournisseurs</a><br><br>
				<a href=\"./contrat/cadregestion_contrat.htm\" target=\"gestion\">Contrats</a><br><br>
				<a href=\"./sinistre/cadregestion_sinistre.htm\" target=\"gestion\">Sinistres</a><br><br>
				<a href=\"./reservation/cadregestion_reservation.htm\" target=\"gestion\">Réservations</a><br><br>
				<a href=\"./interventions/cadregestion_interventions.htm\" target=\"gestion\">Interventions</a><br><br>";
				if( $login == "admin" )
						echo "<a href=\"./administration/cadregestion_admin.htm\" target=\"gestion\">Administration</a><br>";
				else
						echo "Administration";
				echo "</p>
					<p><a href=\"session_fin.php\" target=\"_parent\">Déconnexion </a><br><br><br></p>
		</div>";
?>
</body>
</html>