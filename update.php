<?php
    require_once 'HumanDAO.php';
    session_start();
    $errors = array();
    // $id = "";
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $human = HumanDAO::get_human($id);
        if($human === false){
            print 'NG';
            $_SESSION['message'] = "そんな会員はいません";
            header("Location: index.php");
            exit;
        }
        $human->name = $name;
        $human->age = $age;
        
        $errors = $human->validate();
        
        if(count($errors) === 0){
            $message = HumanDAO::update($human);
            $_SESSION['message'] = $message;
            header("Location: index.php");
            exit;
        }else{
            $_SESSION['errors'] = $errors;
            // print $id;
            header("Location: edit.php?id=" .  $id);
            exit;
        }
    }else{
        $_SESSION['message'] = '不正アクセスです';
        header("Location: index.php");
        exit;
    }
?>