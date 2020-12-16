<?php
    require_once 'HumanDAO.php';
    session_start();
    
    if(isset($_GET['id']) === true){
        $id = $_GET['id'];
        $human = HumanDAO::get_human($id);
    }else{
        $_SESSION['message'] = "そんな会員はいません";
        header("Location: index.php");
        exit;
    }
    
    include_once 'show_view.php';
?>


