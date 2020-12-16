<?php
    require_once 'HumanDAO.php';
    session_start();
    
    $id = $_GET['id'];
    $human = HumanDAO::get_human($id);
    
    if($human === false){
        // error!
        $_SESSION['message'] = "そんな会員はいません";
        header("Location: index.php");
        exit;
    }
    if($_SESSION['errors'] !== null){
        $errors = $_SESSION['errors'];
        $_SESSION['errors'] = null;
    }
 
    include_once 'edit_view.php';
?>