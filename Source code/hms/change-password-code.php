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

	if( empty($_POST['password']) || empty($_POST['re_password']) ) {
        $valid = 0;
        $_SESSION['status'] ="Password can not be empty";
        $_SESSION['status_code'] ="warning";
        header('Location: change-password.php');
    }

    if( !empty($_POST['password']) && !empty($_POST['re_password']) ) {
    	if($_POST['password'] != $_POST['re_password']) {
	    $valid = 0;
        $_SESSION['status'] ="Passwords do not match";
        $_SESSION['status_code'] ="warning";
        header('Location: change-password.php');
    	}        
    }

    if($valid == 1) {

    $password = $_POST['password'];

    // updating the database
    $statement = $pdo->prepare("UPDATE tbl_patient SET password=? WHERE patient_id=?");
    $statement->execute(array(md5($password),$_SESSION['patient']['patient_id']));

    $_SESSION['patient']['password'] = md5($password);       

    $_SESSION['status'] ="Password is updated successfully";
    $_SESSION['status_code'] ="success";
    header('Location: change-password.php');
    }
}

?>