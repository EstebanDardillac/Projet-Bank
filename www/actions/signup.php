<?php

require_once __DIR__ . "/../../src/init.php";
require_once __DIR__ . "/actions/traitement_signup.php";

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

if(isset($_POST['inscription'])){
	$name = $_POST['name'];
	$first_name = $_POST['first_name'];
	$email = $_POST['email'];
	$dateNaiss = $_POST['dateNaiss'];
	$numTel = $_POST['numTel'];
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['confirm_mdp']);
	$client_number = rand();

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		if ($mdp2 == $mdp) {
			$var = $db->prepare('INSERT INTO users (nom, prenom, email, mdp, role, last_ip, client_number) VALUES (?, ?, ?, ?, 1, ?, ?)');
			$var->execute([$name, $first_name, $mdp, $email, $numTel, $dateNaiss, $client_number]);
			$donnees = $var->fetch();

			$variable = $db->prepare('SELECT * FROM users WHERE client_number = ? AND mdp = ?');
			$variable->execute([$client_number, $mdp]);
			$data = $variable->fetch();
			$_SESSION['user'] = $data;
			$_SESSION['loggedin'] = true;

			$sql = $db->prepare('SELECT solde FROM bankaccounts WHERE id_user = ?');
			$sql->execute([$data['id']]);
			$solde = $sql->fetch();
			$_SESSION['solde'] = $solde;

			$number_count = rand();
			$_SESSION['number_account'] = $number_count;
			$currencies = array(1, 2, 3, 4, 5, 6, 7);
			foreach ($currencies as $currencie) {
				$val_cur = $currencie;
				$sql = $db->prepare('INSERT INTO bankaccounts (numerocompte, id_user, solde, id_currencies) VALUES (?, ?, 0, ?)');
				$sql->execute([$number_count, $_SESSION['user']['id'], $currencie]);
			}
		}
	}        
}
// insert user and get last inserted id
$user_id = $userManager->insert($user);

// On connecte l'utilisateur directement apres son inscription.
$_SESSION['user_id'] = $user_id;

header('Location: /?page=home');