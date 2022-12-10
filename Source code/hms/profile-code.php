<?php
ob_start();
session_start();
include("admin/inc/config.php");
include("admin/inc/functions.php");
include("admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();

// Check if the user is logged in or not
if(!isset($_SESSION['patient'])) {
	header('location: index.php');
	exit;
}

if(isset($_POST['form1'])) {
    $valid = 1;
    
    if($valid == 1) {
        
    // updating into the database
    $statement = $pdo->prepare("UPDATE tbl_patient SET name=?, phone=?, address=? WHERE patient_id=?");
    $statement->execute(array($_POST['name'],$_POST['phone'],$_POST['address'],$_SESSION['patient']['patient_id']));

    $_SESSION['patient']['name'] = $_POST['name'];
    $_SESSION['patient']['phone'] = $_POST['phone'];
    $_SESSION['patient']['address'] = $_POST['address'];
    
    $_SESSION['status'] ="Profile updated successfully!";
    $_SESSION['status_code'] ="success";
    header('Location: profile.php');
    }
}

?>