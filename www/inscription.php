<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Login';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<body>
<link rel="stylesheet" href="/www/assets/inscription.css">

<header>
    <a href="index.php" class="correctlink"><h1 id="title">Responsive-Bank</h1></a>
    <nav>
        <div class="divnav">
            <a href="#" class="correctlink">Compte Banquaire</a>
            <a href="login.php" class="correctlink , space">Profil Utilisateur</a>
        </div>
    </nav>
</header>

<h1 class="titre">Inscription</h1>

<div id="contenu">
<form action="/actions/inscription.php" method="post">
    <div id="email">
		<label for="email">Nom :</label>
		<input type="text" id="email" name="email">
	</div>
    <div id="email">
		<label for="email">Prénom :</label>
		<input type="text" id="email" name="email">
	</div>
    <div id="email">
		<label for="email">Date de naissance :</label>
		<input type="text" id="email" name="email">
	</div>
    <div id="email">
		<label for="email">Age :</label>
		<input type="text" id="email" name="email">
	</div>
    <div id="email">
		<label for="email">Adresse :</label>
		<input type="text" id="email" name="email">
	</div>
	<div id="email">
		<label for="email">Email :</label>
		<input type="text" id="email" name="email">
	</div>
    <div id="email">
		<label for="email">Confirmer l'email :</label>
		<input type="text" id="email" name="email">
	</div>
    <div id="email">
		<label for="email">Numéro de téléphone :</label>
		<input type="text" id="email" name="email">
	</div>
	<div id="password">
		<label for="password">Mot de passe :</label>
		<input type="password" id="password" name="password">
	</div>
    <div id="password">
		<label for="password">Confirmer le mot de passe :</label>
		<input type="password" id="password" name="password">
	</div>
	<button id="button" type="submit">Inscription</button>
</form>
</div>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>