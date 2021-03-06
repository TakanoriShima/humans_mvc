<?php
    require_once 'HumanDAO.php';
    session_start();
    $errors = array();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // var_dump($_POST);
        $name = $_POST['name'];
        $age = $_POST['age'];
        
        $human = new Human($name, $age);
        $errors = $human->validate();
        if(count($errors) === 0){
            $message = HumanDAO::insert($human);
            $_SESSION['message'] = $message;
            $message = "";
            header("Location: index.php");
            exit;
        }else{
            $_SESSION['errors'] = $errors;
            header("Location: new.php");
            exit;
        }
    }else{
        $_SESSION['message'] = '不正アクセスです';
        header("Location: index.php");
        exit;
    }