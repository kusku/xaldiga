<?php

function getFolderName() {
    return '';
}

function getPath($path) {
    return $_SERVER['DOCUMENT_ROOT']. getFolderName() . $path;
}

function getCSSPath($path) {
    return getFolderName() . $path;
}

function getImagePath($path) {
    return "";
}

?>