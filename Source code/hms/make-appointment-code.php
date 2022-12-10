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

	$statement = $pdo->prepare("INSERT INTO tbl_appointment (patient_id,name,phone,address,date,time,department,doctor,description,status) VALUES (?,?,?,?,?,?,?,?,?,?)");
	$statement->execute(array($_POST['patient_id'],$_POST['name'],$_POST['phone'],$_POST['address'],$_POST['date'],$_POST['time'],$_POST['department'],$_POST['doctor'],$_POST['description'],'Pending'));
    header('Location: appointment-success.php?doctor_id='.$_POST['doctor'].'&date='.$_POST['date'].'&time='.$_POST['time'].'');
                     
    }
}

?>