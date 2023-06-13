<?php
session_start();
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

    include 'functions.php';

    if(isset($_GET['id'])) {
       
        if(drop($_GET['id']) > 0) {
            echo '<script>
            alert("Data has been deleted!");
            document.location.href = "../index.php";
            </script>';
            
        } else {
            echo '<script>
            alert("failed!");
            document.location.href = "../index.php";
            </script>';
        }
        
    }
 ?>