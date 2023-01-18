<?php

require_once __DIR__ . "/../../src/init.php";

if (!isset($_POST['email'], $_POST['password'], $_POST['cpassword'])) {
	error_die('Erreur du formulaire', '/?page=signup');
}

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
	error_die('Email invalide.', '/?page=signup');
}

if (strlen($_POST['password']) < 4) {
	error_die('Mot de passe trop court', '/?page=signup');
}

if ($_POST['password'] !== $_POST['cpassword']) {
	error_die('Les 2 mot de passe sont differents', '/?page=signup');
}


// Verifier si utilisateur existe deja en DB
$alreadyUser = $dbManager->getBy('users', 'email', $_POST['email'], 'User');
if ($alreadyUser !== false) {
	error_die('Deja inscrit', '/?page=signup');
}

// Creer et inserer utilisateur en DB
$user = new User(); 
$user->email = $_POST['email'];
$user->setPassword($_POST['password']);
$user->role = 1;
$user->last_ip = $_SERVER['REMOTE_ADDR'];

// insert user and get last inserted id
$user_id = $userManager->insert($user);

// On connecte l'utilisateur directement apres son inscription.
$_SESSION['user_id'] = $user_id;

header('Location: /?page=home');