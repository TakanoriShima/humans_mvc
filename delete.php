<?php
    require_once 'HumanDAO.php';
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $id = $_POST['id'];
        
        $human = HumanDAO::get_human($id);
    
        if($human === false){
            // error!
            $_SESSION['message'] = "そんな会員はいません";
            header("Location: index.php");
            exit;
        }else{
            HumanDAO::delete($id);
        
            $_SESSION['message'] = $id . '番の投稿の削除しました';
            header('Location: index.php');
            exit;
        }
        
    }else{
        $_SESSION['message'] = '不正アクセスです';
        header('Location: index.php');
        exit;
    }
?>