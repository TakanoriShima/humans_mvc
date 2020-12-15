<?php
    require_once 'HumanDAO.php';
    session_start();
    
    $humans = HumanDAO::get_all_humans();

    $message = '';
    
    if($_SESSION['message'] !== null){
        $message = $_SESSION['message'];
        $_SESSION['message'] = null;
    }
    
    include_once 'index_view.php';    
        
?>
