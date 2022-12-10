<?php
ob_start();
session_start();
include("../admin/inc/config.php");
include("../admin/inc/functions.php");
include("../admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();

if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
}
?>

<?php
$statement = $pdo->prepare("DELETE FROM tbl_schedule WHERE id=?");
$statement->execute(array($_REQUEST['id']));
header('location: schedule.php');
?>