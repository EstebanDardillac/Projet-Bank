<?php

require_once __DIR__ . '/../src/init.php';
// $db
// $_SESSION

$page_title = 'Home page';
require_once __DIR__ . '/../src/templates/partials/html_head.php';

?>
<body>

<header>
    <h1>The Bank</h1>
</header>

<section class="sect1">

    <div>
    <img src="https://dk85klopn8z0j.cloudfront.net/wp-content/uploads/2012/09/Choisir-une-banque.jpg" width="500" height="375">
    </div>

</section>

<?php require_once __DIR__ . '/../src/templates/partials/footer.php'; ?>
</body>
</html>