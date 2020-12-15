<?php
    session_start();
    
    $errors = array();
    if($_SESSION['errors'] !== null){
        $errors = $_SESSION['errors'];
        $_SESSION['errors'] = null;
    }
    
    include_once 'new_view.php';