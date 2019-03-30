<?php 
    $menuSelection = isset($_GET['menu']) ? $_GET['menu'] : 'main';

    switch($menuSelection) {
        case 'infantil':
            require_once($_SERVER['DOCUMENT_ROOT'].'/src/pages/infantil.php');
            break;
            
        case 'main':
        default:
            require_once($_SERVER['DOCUMENT_ROOT'].'/src/pages/main.php');
            break;

    }
 ?>