<?php
$role = "invité"
$acces = FALSE
if($user != false){
    switch ($user->role) {
        case 1000:
            $role = "Admin";
            break;
        case 200:
            $role = "Manager";
            break;
        case 10:
            $role = "Utilisteur vérifié";
            break;
        case 1:
            $role = "Utilsiteur non-vérifié";
            break;
        case 0:
            $role = "Utilisteur banni";
            break;
    }
}

