﻿<?php 
	require_once('fonctionsDB.php');

	if (isset($_GET['idEquipe'])) {

		$joueurs = getAllJoueursParEquipe($_GET['idEquipe']);

		// S'il y a des joueurs
		if (mysqli_num_rows($joueurs) != 0) {
?>
		<table>
			<tr><th>Prénom</th><th>Nom</th></tr>
			<?php			
				while ($joueur = mysqli_fetch_assoc($joueurs)) {
					echo '<tr><td>' . $joueur['prenom'] . '</td><td>' . $joueur['nomFamille'] . '</td></tr>';
				}
			?>
		</table>
<?php
		} else {
			echo '<p>Il n\'y a pas de joueur dans cette équipe.</p>';
		}
	} else {
		echo 'Erreur query string';
	}
?>