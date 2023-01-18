<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Login';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<body>
<link rel="stylesheet" href="/www/assets/login.css">

<h1 class="titre">Login</h1>

<div id="contenu">
<form action="/actions/login.php" method="post">
	<div id="email">
		<label for="email">Email</label>
		<input type="text" id="email" name="email">
	</div>
	<div id="password">
		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password">
	</div>
	<button id="button" type="submit">Login</button>
</form>
</div>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>