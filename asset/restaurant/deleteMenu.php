<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>

<?php include '../layout/restaurant.header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="../../login.php"</script>';
}

?>
<?php
	if (isset($_GET['mid'])) {
		$mid =$_GET['mid'];

		$success = deleteMenu($database, $mid);

		if ($success) {
		// echo '<script>alert("Deleted.")</script>';
		echo '<script>window.location ="menuList.php"</script>';
	    } else {
			echo "Something worng in menu delete!";
		} 
	}
?>