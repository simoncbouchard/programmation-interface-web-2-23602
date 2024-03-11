<html lang="fr_CA">
<head>
    <!-- meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cours 19 | Révision</title>
	<meta name="description" content="Cours 19 du cours 582-31F-MA Programmation d'interface Web 2 : Révision">

	<!-- styles -->
	<link rel="stylesheet" type="text/css" href="./assets/styles/styles.css">

    <!-- scripts -->
    <script type="module" src="./assets/scripts/main.js" defer></script>
</head>

<body data-js-component="Router">
	<header>
		<h1>Cours 19 - Révision</h1>
        <select data-js-equipes>
            <option value="0">Veuillez sélectionner une équipe</option>
            <?php
                // Générer les options dynamiquement
                require_once('requetes/fonctionsDB.php');
                $equipes = getAllEquipes();

                // Récupération des résultats sous forme de tableau associatif
                while ($equipe = mysqli_fetch_assoc($equipes)) { 
                    echo '<option value="' . $equipe['id'] . '">' . $equipe['nom'] . ' de ' . $equipe['quartier'] . '</option>';
                }
            ?>
        </select>
	</header>


    <template data-template-joueur>
        <li data-js-joueur="${{id}}">#{{numero}} : {{prenom}} {{nomFamille}}</li>
    </template>

    
	<main></main>
</body>
</html>