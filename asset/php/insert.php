<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>
<?php

	if (isset($_POST['regascus'])){
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);

        // existing email chaeck
        $customer = selectCustomerByEmail($database, $email);
        if ($customer != null) {
        	echo '<script>alert("Restaurant With This Email Is Already Exit.")</script>';
        	echo '<script>window.location="../../register.php"</script>';
        }else{

	        	if (isset($_FILES['image'])) {
				 // files handle
				    $targetDirectory = "../upload/";
				    // get the file name
				    $file_name = $_FILES['image']['name'];
				    // get the mime type
				    $file_mime_type = $_FILES['image']['type'];
				    // get the file size
				    $file_size = $_FILES['image']['size'];
				    // get the file in temporary
				    $file_tmp = $_FILES['image']['tmp_name'];
				    // get the file extension, pathinfo($variable_name,FLAG)
				    $extension = pathinfo($file_name,PATHINFO_EXTENSION);

				    //register as customer
				    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
				    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);
				    	$success = insertCustomer($database, $name, $email, $phone, $address, $password, $file_name);
                        $success = insertPageUser($database, $email, 'c');
			        	if ($success) {
			        		echo '<script>alert("You Register successfully")</script>';
			        		echo '<script>window.location="../../login.php"</script>';
			        	}else {
			                echo "Error! Something is worng.";
			            }
				    	
				    }else{
				    	echo '<script>alert("Required JPG,PNG,GIF in profile picture field.")</script>';
		        		echo '<script>window.location="../../register.php"</script>';
				    }
				}else{
					$file_name = "";

                    $success = insertCustomer($database, $name, $email, $phone, $address, $password, $file_name);
                    $success = insertPageUser($database, $email, 'c');
                    if ($success) {
		        		echo '<script>alert("New faculty added successfully")</script>';
		        		echo '<script>window.location="../../register.php"</script>';
		        	}else {
		                echo "Error! Something is worng.";
		            }
				}
        }
    }

	//register as restaurant
	if (isset($_POST['regasres'])){
        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $area = $_POST['area'];
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_DEFAULT);        

        $customer = selectRestaurantByEmail($database, $email);
        if ($customer != null) {
        	echo '<script>alert("Restaurant With This Email Is Already Exit.")</script>';
        	echo '<script>window.location="../../register.php"</script>';
        }else{

	        	if (isset($_FILES['image']) && isset($_FILES["imageqr"])) {
				 // files handle
				    $targetDirectory = "../upload/";
				    // get the file name
				    $file_name = $_FILES['image']['name'];
				    $file_name_qr = $_FILES['imageqr']['name'];
				    // get the mime type
				    $file_mime_type = $_FILES['image']['type'];
				    $file_mime_type_qr = $_FILES['imageqr']['type'];
				    // get the file size
				    $file_size = $_FILES['image']['size'];
				    $file_size_qr = $_FILES['imageqr']['size'];
				    // get the file in temporary
				    $file_tmp = $_FILES['image']['tmp_name'];
				    $file_tmp_qr = $_FILES['imageqr']['tmp_name'];
				    // get the file extension, pathinfo($variable_name,FLAG)
				    $extension = pathinfo($file_name,PATHINFO_EXTENSION);
				    $extension_qr = pathinfo($file_name_qr,PATHINFO_EXTENSION);

					if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
				    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);
					}else{
				    	echo '<script>alert("Required JPG,PNG,GIF in logo field.")</script>';
		        		echo '<script>window.location="../../register.php"</script>';
				    }

				    if ($extension_qr =="jpg" || $extension_qr =="png" || $extension_qr =="jpeg"){
				    	move_uploaded_file($file_tmp_qr,$targetDirectory.$file_name_qr);

				    	$success = insertRestaurant($database, $name, $email, $phone, $address, $area, $file_name_qr, $password, $file_name);
                        $success = insertPageUser($database, $email, 'r');
                     if ($success) {
			        			echo '<script>alert("Restaurant added successfully")</script>';
			        				echo '<script>window.location="../../login.php"</script>';
			        	}else {
			                echo "Error! Something is worng.";
			            }
				    	
				    }else{
				    	echo '<script>alert("Required JPG,PNG,GIF in logo field.")</script>';
		        		echo '<script>window.location="../../register.php"</script>';
				    }
				}else{
					$file_name = $file_name_qr = "";

					$success = insertRestaurant($database, $name, $email, $phone, $address, $area, $file_name_qr, $password, $file_name);
                        $success = insertPageUser($database, $email, 'r');
                     if ($success) {
		        		echo '<script>alert("New faculty added successfully")</script>';
		        		echo '<script>window.location="../../login.php"</script>';
		        	}else {
			                echo "Error! Something is worng.";
		            }
				}
        }
    }


    //booking
	if (isset($_POST['book'])) {

    	$binsert = false;
    	$uid = $_SESSION['id'];
    	$rid = $_POST['res_id'];
  		$reservation_name = $_POST['reservation_name'];
		$reservation_phone = $_POST['reservation_phone'];
		$reservation_date = $_POST['reservation_date'];
		$reservation_time = $_POST['reservation_time'];
		$total_price = $_POST['total_price'];
		$transaction_id = $_POST['transaction_id'];

		date_default_timezone_set("Asia/Yangon");
        $maketime =date("h:i:sa");
        $makedate =date("Y-m-d");
		$bid= uniqid();

		echo $bid;

		$success = insertBooking($database, $bid, $rid, $uid, $makedate, $maketime, $reservation_name, $reservation_phone, $reservation_date, $reservation_time, $total_price, $transaction_id, 0, "We are still approving, please wait a movement!");
		if ($success) {
			$binsert = true;
		}else {
            echo "Error! Something worng.";
        }



        $cinsert = false;
        if ($binsert == true) {
        	for($q = 0; $q < count($_POST["chair"]); $q++){
                $cid = $_POST['chair'][$q];

                $chair = selectChairById($database, $cid);
                $cno = $chair["cno"];

				$success = insertBookingChair($database, $bid, $cid, $cno);
                if ($success) {
					$cinsert = true;
				}else {
					echo "Error! Something worng.";
				}
            }
        }

        $minsert = false;
        if ($cinsert == true) {
        	for($i = 0; $i < count($_POST["menu"]); $i++){
                $mid = $_POST['menu'][$i];
                $qty = $_POST['qty'][$i];

				$success = insertBookingMenu($database, $bid, $mid, $qty);
                if ($success) {
					$minsert = true;
				}else {
					echo "Error! Something worng.";
				}
            }
        }

       if ($binsert == true && $cinsert == true && $minsert == true) {
    		echo '<script>alert("Your booking is done. Please wait a movement for confirmation.")</script>';
    		echo '<script>window.location="../../index.php"</script>';
    	}else {
    		echo "Error! Something worng.";
        } 
    }
    
 
    	
?>