<?php
    require_once 'HumanDAO.php';
    session_start();
    
   
    $id = $_GET['id'];
    $human = HumanDAO::get_human($id);
    
    if($human === false){
        $_SESSION['message'] = "そんな会員はいません";
        header("Location: index.php");
        exit;
    }
 
    include_once 'show_view.php';
?>


