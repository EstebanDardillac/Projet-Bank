<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Home page';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<body>

<h1>Login</h1>

<form action="/actions/login.php" method="post">
	<div>
		<label for="email">Email</label>
		<input type="text" id="email" name="email">
	</div>
	<div>
		<label for="password">Mot de passe</label>
		<input type="password" id="password" name="password">
	</div>
	<button type="submit">Login</button>
</form>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>