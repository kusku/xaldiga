<?php 
    include_once ('utils/utils.php');

    $menuSelection = isset($_GET['menu']) ? $_GET['menu'] : 'main';

    switch($menuSelection) {
        case 'infantil':
            require_once(getPath('/src/pages/infantil.php'));
            break;
            
        case 'main':
        default:
            require_once(getPath('/src/pages/main.php'));
            break;

    }
 ?>