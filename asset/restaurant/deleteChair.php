<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>

<?php include '../layout/restaurant.header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="../../login.php"</script>';
}

?>
<?php
	if (isset($_GET['cid'])) {
		$cid =$_GET['cid'];
		$tid = $_GET['tid'];
		$tname = $_GET['tname'];

        $success = deleteChair($database, $cid);
		if ($success) {
			// echo '<script>alert("Deleted.")</script>';
			echo '<script>window.location.href ="viewChair.php?tid='.$tid.'&tname='.$tname.'";</script>';
	    } else {
			echo "Something worng in chair delete!";
		} 
	}
?>