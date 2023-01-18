<?php

require_once __DIR__ . '/../src/init.php';

$page_title = 'DB Tests';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<body>

<div>
    <h1>DB Manager - Tests2</h1>
</div>

<?php
// TEST select
echo '<div><h2>Test select</h2>';
$forms = $dbManager->select('SELECT * FROM bankaccounts', [], 'BankAccounts');
var_dump($forms);
echo '</div><hr>';

// TEST Advanced Insert
/*echo '<div><h2>Test insert advanced</h2>';
$new_contact_form = new ContactForm();
$new_contact_form->fullname = 'Test fullname';
$new_contact_form->phone = '08090080904';
$new_contact_form->email = 'test@test.com';
$new_contact_form->message = 'Test MESSAGE';

$idInsertedAdvanced = $dbManager->insert_advanced($new_contact_form);
var_dump($idInsertedAdvanced);
echo '</div><hr>';*/

// TEST insert
echo '<div><h2>Test insert</h2>';
$idInserted = $dbManager->insert(
    'INSERT INTO bankaccounts(id_bank, nom, prenom, date_naissance, age, adresse, mail, numero) VALUES(?, ?, ?, ?, ?, ?, ?, ?)',
    ['9', 'Dako', 'Samba', '2004-10-09', '18', '5 rue René Echavidre Taverny 95150', 'samba.dako@hotmail.fr', '098765432']
);

var_dump($idInserted);
echo '</div><hr>';

// TEST getById
echo '<div><h2>Test getById</h2>';
$contactForm1 = $dbManager->getById('bankaccounts', 1, 'BankAccounts');

var_dump($contactForm1);
echo '</div><hr>';

// TEST getBy
echo '<div><h2>Test getBy</h2>';
$contactForm1b = $dbManager->getBy('bankaccounts', 'id', 1, 'BankAccounts');

var_dump($contactForm1b);
echo '</div><hr>';

// TEST getById advanced
echo '<div><h2>Test getById advanced</h2>';
$contactForm2a = $dbManager->getById_advanced(1, 'BankAccounts');

var_dump($contactForm2a);
echo '</div><hr>';

// TEST getBy advanced
echo '<div><h2>Test getBy advanced</h2>';
$contactForm2b = $dbManager->getBy_advanced('id', 1, 'BankAccounts');

var_dump($contactForm2b);
echo '</div><hr>';

// TEST update
echo '<div><h2>Test update</h2>';
$updated = $dbManager->update(
    'bankaccounts',
    ['id'=> 1, 'nom' => 'Jean']
);

var_dump($updated);
echo '</div><hr>';

// TEST update advanced
echo '<div><h2>Test update advanced</h2>';
$laForm = $dbManager->getById('bankaccounts', 1, 'BankAccounts');
$laForm->fullname = 'New fullname ??';
$dbManager->update_advanced($laForm);

var_dump($updated);
echo '</div><hr>';

// TEST remove by id
echo '<div><h2>remove by id</h2>';
$removed = $dbManager->removeById('bankaccounts', 1);

var_dump($removed);
echo '</div><hr>';