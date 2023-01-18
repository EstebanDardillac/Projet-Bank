<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

if ($role == "banni"){
    die("Vous n'avez pas accés à cette page ")
}
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

<section class="sect1">

    <img src="https://dk85klopn8z0j.cloudfront.net/wp-content/uploads/2012/09/Choisir-une-banque.jpg" width="500" height="375">
    
    <p id="Lorems1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim eveniet eaque tempore fuga quisquam cumque, voluptates voluptas quis labore id neque, iure consectetur iste tempora eos quas ducimus minus possimus unde nemo! Nesciunt unde magnam sint quibusdam temporibus nobis dolor corporis laborum et cumque? At hic dolore culpa impedit soluta?</p>

</section>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>

</body>
</html>