<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>

<?php include '../layout/restaurant.header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="../../login.php"</script>';
}

?>
<?php
	if (isset($_GET['tid'])) {
		$tid =$_GET['tid'];

        $success = deleteChairByTable($database, $tid);
		if ($success) {
            deleteTable($database, $tid);
			// echo '<script>alert("Deleted.")</script>';
			echo '<script>window.location.href ="listTable.php";</script>';
	    } else {
			echo "Something worng in table delete!";
		} 
	}
?>