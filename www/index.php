<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

if ($role == "banni"){
    die("Vous n'avez pas accés à cette page ");
}
$page_title = 'Home page';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<body>

<header>
    <a href="index.php" class="correctlink"><h1 id="title">Responsive-Bank</h1></a>
    <nav>
        <div class="divnav">
            <a href="compte.php" class="correctlink">Compte Banquaire</a>
            <a href="login.php" class="correctlink , space">Profil Utilisateur</a>
        </div>
    </nav>
</header>

<section class="sect1">

    <img src="https://dk85klopn8z0j.cloudfront.net/wp-content/uploads/2012/09/Choisir-une-banque.jpg" width="500" height="375">
    
    <p id="text1">ResponsiveBank est une banque en ligne innovante qui se concentre sur la satisfaction de ses clients. Avec une interface utilisateur conviviale et des outils de gestion de comptes en ligne avancés, ResponsiveBank facilite la gestion de vos finances quotidiennes. La sécurité est une priorité absolue pour ResponsiveBank, avec des protocoles de sécurité de pointe pour protéger vos informations personnelles et financières. En outre, ResponsiveBank offre des taux d'intérêt compétitifs sur ses comptes d'épargne et des options de crédit flexibles pour ses clients qualifiés. Avec ResponsiveBank, vous pouvez être sûr que vos finances sont entre de bonnes mains.</p>

</section>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>

</body>
</html>