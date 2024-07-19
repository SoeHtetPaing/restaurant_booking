<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>

<?php
	//reject 
	if ($_GET['action'] == "reject") {
		$id =$_GET['bid'];

        $booking = selectBookingById($database, $id);
        // var_dump($booking);
        $transaction = $booking["transaction"];


        if($transaction == "0100347008059471538") {
            $reject = "Invalid transaction id! Transaction id must not be sample id we shown!";
        } else {
            if(strlen($transaction) < 19) {
				$reject = "Invalid transaction id! Transaction id must be 19 digits!";
			} else {
				if (preg_match('/^[0-9]+$/', $transaction)) {
					$reject = "Invalid! Something worng in your booking!";                
				} else {
					$reject = "Invalid travsaction id! Transaction id may be number only!";                
				}
			}
        }

		$sql ="update booking set status=2, reject_reason='$reject' where bid = '$id';";

        $success = updateBooking($database, $sql);

		if ($success) {
		echo '<script>alert("Rejected.")</script>';
		echo '<script>window.location="./index.php"</script>';
	    }
	}

	// approve booking request
	if ($_GET['action'] == "approve") {
		$id =$_GET['bid'];
        $reject = null;

		$sql ="update booking set status=1, reject_reason='$reject' where bid = '$id';";
        $success = updateBooking($database, $sql);

		if ($success) {
	        echo  '<script>alert("Booking Confirmed.")</script>';
	        echo '<script>window.location="./index.php"</script>';
		
	    }
	}

	if ($_GET['action'] == "cancel") {
		$id =$_GET['bid'];
        $reject = null;

		$sql ="update booking set status=3, reject_reason='$reject' where bid = '$id';";
        $success = updateBooking($database, $sql);

		if ($success) {
	        echo  '<script>alert("Booking is successfully canceled!")</script>';
	        echo '<script>window.location="./customerBookingList.php"</script>';
		
	    }
	}
 

?>