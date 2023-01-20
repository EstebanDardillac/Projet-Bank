<?php
session_start();

// db
require_once __DIR__ . '/db.php';

// class
require_once __DIR__ . '/class/DbObject.php';
require_once __DIR__ . '/class/ContactForm.php';
require_once __DIR__ .'/class/BankAccounts.php';
// db manager
require_once __DIR__ . '/class/DbManager.php';
require_once __DIR__ . '/utils/role.php';

$dbManager = new DbManager($db);

// utils
require_once __DIR__ . '/utils/errors.php';

// on prepare la variable $user pour tout notre site internet, plus besoin de le faire plus tard.
// on sait que si on est connecte $user !== false
// on sait que $user->role renvoie le role de l'utilisateur
$user = false;
if (isset($_SESSION['id'])) {
    $sth = $db->prepare('SELECT * FROM users WHERE id_user = ?');
    $sth->execute([$_SESSION['id']]);
    $user = $sth->fetch();
}

require_once __DIR__ .'/utils/role.php';

