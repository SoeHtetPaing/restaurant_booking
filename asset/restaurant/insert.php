<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>

<?php
    if (!isset($_SESSION['isLoggedIn'])) {
    	echo '<script>window.location="../../login.php"</script>';
    }
    
    //add table
    if (isset($_POST['addtable'])){
        $tablename = $_POST['tablename'];
        $rid = $_SESSION['id'];

        $pos = strpos($tablename, "C");
        // echo $pos;
        $chair = substr($tablename, $pos + 1);
        $chair = (int) $chair;
        // echo is_integer($chair);

        $tsuccess = insertTable($database, $rid, $tablename);
        $tid = getTableId($database);
        $tid = $tid["tid"];
        // echo $tid;

        for ($i=1; $i <= $chair; $i++) { 
            $cno = $tablename."-".$i;
            $csuccess = insertChair($database, $tid, $cno);
        }
    	if ($tsuccess) {
            if($csuccess) {
                echo '<script>alert("New table is added successfully.")</script>';
    		    echo '<script>window.location="addTable.php"</script>';
            } else {
                echo "Something worng in restaurant chair add!";

            }
    		
    	}else {
            echo "Something worng in restaurant table add!";
        }
    }



    if (isset($_POST['addMenu'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $madeby = $_POST['madeby'];
        $food_type = $_POST['food_type'];

        $rid = $_SESSION['id'];
        

        //$ecnpassword= md5($password);
        $check = checkMenu($database, $rid, $name, $price);

        if ($check != null) {
            echo '<script>alert("Menu with this information is already exit!")</script>';
            echo '<script>window.location="./addMenu.php"</script>';
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
                        $success = insertMenu($database, $rid, $name, $madeby, $food_type, $price, $file_name);
                        if ($success) {
                            echo '<script>alert("Menu is added successfully.")</script>';
                            echo '<script>window.location="./addMenu.php"</script>';
                        }else {
                            echo "Something worng in menu add!";
                        }
                        
                    }else{
                        echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
                        echo '<script>window.location="./addMenu.php"</script>';
                    }
                }
        }
    }
?>