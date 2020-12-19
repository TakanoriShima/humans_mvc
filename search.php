<?php
    require_once 'HumanDAO.php';
    
    $keyword = $_GET['keyword'];
    $humans = HumanDAO::search_humans_name($keyword);
    $message = "";
    
    include_once 'index_view.php';