<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Home page';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<body>

<header>
    <a href="index.php" class="correctlink"><h1 id="title">Responsive-Bank</h1></a>
    <nav>
        <div class="divnav">
            <a href="#" class="correctlink">Compte Banquaire</a>
            <a href="login.php" class="correctlink , space">Profil Utilisateur</a>
        </div>
    </nav>
</header>

<h1 id="loginsep">Login</h1>

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