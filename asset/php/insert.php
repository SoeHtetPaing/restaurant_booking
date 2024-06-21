<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>
<?php 
session_start();
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

				    if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
				    	move_uploaded_file($file_tmp,$targetDirectory.$file_name);

				    	$success = insertRestaurant($database, $name, $email, $phone, $address, $area, $password, $file_name);
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
					$file_name = "";

					$success = insertRestaurant($database, $name, $email, $phone, $address, $area, $password, $file_name);
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


    //remain booking
    
 
    	
?>