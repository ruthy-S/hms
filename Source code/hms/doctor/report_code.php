<?php
ob_start();
session_start();
include("../admin/inc/config.php");
include("../admin/inc/functions.php");
include("../admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message='';

// Check if the user is logged in or not
if(!isset($_SESSION['doctor'])) {
	header('location: login.php');
	exit;
}

if(isset($_POST['form1'])) {
	$valid = 1;
	
	if($valid == 1) {

	$statement = $pdo->prepare("INSERT INTO tbl_report (patient_id,date,description,doctor_id,doctor_name,doctor_department) VALUES (?,?,?,?,?,?)");
	$statement->execute(array($_POST['patient_id'],$_POST['date'],$_POST['description'],$_POST['doctor_id'],$_POST['doctor_name'],$_POST['doctor_department']));

	$statement = $pdo->prepare("UPDATE tbl_appointment SET status=? WHERE id=?");
	$statement->execute(array('Doctor consulted',$_POST['id']));

	$_SESSION['status'] ="Report created successfully!";
    $_SESSION['status_code'] ="success";
    header('Location: today_appointment.php');
	}
}

?>