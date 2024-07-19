<?php require_once("../database/connection.php"); ?>
<?php require_once("../database/operation.php"); ?>

<?php include '../layout/restaurant.header.php'; 
if (!isset($_SESSION['isLoggedIn'])) {
	echo '<script>window.location="../../login.php"</script>';
}

?>

<section class="body">

			<!-- start: header -->
			<?php include '../layout/restaurant.navbar.php'; ?>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include '../layout/restaurant.sidebar.left.php'; ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header" style="background-color: #374151;">
						<h2 style="font-family: 'Dancing Script'; font-size: 20px;">Modify Account</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./index.php">
										<i class="fa-solid fa-home"></i>
									</a>
								</li>
								<li><span>My Profile</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class=" fa-solid fa-chevron-left" style="position: absolute; top: 18px; font-size: 12px;"></i></a>
						</div>
					</header>

                    <!-- start: page -->
						
						
                    <section>
            
                    <?php

                    // SELECT `id`, `restaurent_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `bkashnumber`, `approve_status`, `role` FROM `restaurant_info` WHERE 1

                    $rid = $_SESSION['id'];

                    // echo $rid;

                    $result = selectRestaurantById($database, $rid);
                    // var_dump($result);


                    if (isset($_POST['save'])) {
                      # code...
                      $name = $_POST['fullname'];
                      $email = $_POST['email'];
                      $phone = $_POST['phone'];
                      $address = $_POST['address'];
                      $area = $_POST['area'];
                      $password = $_POST['password'];

                      if($_POST["password"] == null) {
                        $sql = "update restaurant set name='$name', email='$email', phone='$phone', address='$address', location='$area' where id='$rid';";
                      } else {
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "update restaurant set name='$name', email='$email', phone='$phone', address='$address', location='$area', password='$password' where id='$rid';";
                      }

                      $success = updateRestaurant($database, $sql);
                      if ($success) {
                        $_SESSION['name'] = $name;
                        $_SESSION['email'] = $email;
                        
                        # code...
                        echo '<script>alert("Accounts has been updated.")</script>';
                        echo '<script>window.location="./profile.php"</script>';
                      }
                    }
                
                    if (isset($_POST['savephoto'])) { 
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

                            $sql = "update restaurant set logo='$file_name' where id='$rid';";
                            $success = updateRestaurant($database, $sql);

                            if ($success) {
                                $_SESSION["image"] = $file_name;
                                echo '<script>alert("Restaurant logo has been updated")</script>';
                                echo '<script>window.location="./profile.php"</script>';
                            }
                          
                        }else{
                          echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
                            echo '<script>window.location="./profile.php"</script>';
                        }
                    }

                    if (isset($_POST['saveQrPhoto'])) { 
                        $targetDirectory = "../upload/";
                        // get the file name
                        $file_name = $_FILES['imageqr']['name'];
                        // get the mime type
                        $file_mime_type = $_FILES['imageqr']['type'];
                        // get the file size
                        $file_size = $_FILES['imageqr']['size'];
                        // get the file in temporary
                        $file_tmp = $_FILES['imageqr']['tmp_name'];
                        // get the file extension, pathinfo($variable_name,FLAG)
                        $extension = pathinfo($file_name,PATHINFO_EXTENSION);
                    
                        //register as customer
                        if ($extension =="jpg" || $extension =="png" || $extension =="jpeg"){
                            move_uploaded_file($file_tmp,$targetDirectory.$file_name);

                            $sql = "update restaurant set imageqr='$file_name' where id='$rid';";
                            $success = updateRestaurant($database, $sql);

                            if ($success) {
                                echo '<script>alert("QR image has been updated")</script>';
                                echo '<script>window.location="./profile.php"</script>';
                            }
                          
                        }else{
                          echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
                            echo '<script>window.location="./profile.php"</script>';
                        }
                    }

                     ?>

                    <div class="contanier"> 
                    <div class="row">

                        <div class="col-lg-3"><!--left col-->
                           <div class="panel panel-default">            
                                <div class="panel-body"> 
                                    <div  id="image-container " class="stretch">
                                        <img src="../upload/<?php echo $result['logo'] ?>" alt="restaurant-pp" data-target="#logomodal"  data-toggle="modal" title="Click image to update your logo">
                                    </div>
                                </div>
                                <ul class="list-group">


                                    <li class="list-group-item text-muted">Profile</li> 
                                    <li class="list-group-item text-right"><span class="pull-left"><strong>Restaurant</strong></span> 
                                        <?php echo $result['name']; ?> 
                                    </li>

                                </ul>   

                          <!-- /.box -->
                            </div>

                            <div class="panel panel-default">            
                            <div class="panel-body"> 
                              <div  id="image-container " class="stretch">
                                <img src="../upload/<?php echo $result['imageqr'] ?>" alt="restaurant-pp" data-target="#logomodal1"  data-toggle="modal" title="Click image to update your QR">
                              </div>
                             </div>
                            <ul class="list-group">


                                <li class="list-group-item text-right"><span class="pull-left"><strong>KBZpay</strong></span> 
                                <?php echo $result['phone']; ?> 
                                </li>

                            </ul>   

                          <!-- /.box -->
                          </div>

                        </div> 
                        
                        <div class="col-lg-9"> 
                    <form class="form-horizontal" method="POST" action="./profile.php">  
                      <div class="row">    

                              <div class="form-group">
                                <div class="col-md-7">
                                <label class="col-md-4 control-label" for=
                                  "Fname">Restaurant Name:</label>

                                  <div class="col-md-8">
                                   <input type="text" name="fullname" class="form-control" required="" placeholder="Enter name" value="<?php echo $result['name'];?>">
                                  </div>
                                </div>
                              </div> 

                              <div class="form-group">
                                <div class="col-md-7">
                                <label class="col-md-4 control-label" for=
                                  "Lname">Email Address:</label>

                                  <div class="col-md-8"> 
                                     <input type="email" name="email" class="form-control" required="" placeholder="Enter email" value="<?php echo $result['email'];?>">
                                  </div>
                                </div>
                              </div> 


                              <div class="form-group">
                                <div class="col-md-7">
                                <label class="col-md-4 control-label" for=
                                  "Mname">Phone Number:</label>

                                  <div class="col-md-8"> 
                                     <input type="text" name="phone" class="form-control" required="" placeholder="Enter phone" value="<?php echo $result['phone'];?>">
                                  </div>
                                </div>
                              </div> 
                              
                              <div class="form-group">
                                <div class="col-md-7">
                                  <label class="col-md-4 control-label" for=
                                  "CustomerAddress">Location:</label>

                                  <div class="col-md-8">
                                     <select class="form-control " name="area" required="">
                                            <?php   
                                              $locations = selectLocations($database);
                                              var_dump($locations);
                                              foreach ($locations as $location) {
                                            
                                                if ($result['location']==$location['id']) {
                                                  # code...
                                                   echo  '<option  value="'.$location['id'].'" selected>'.$location['name'].'</option>';
                                                }else{
                                                     echo  '<option value="'.$location['id'].'">'.$location['name'].'</option>';
                                                } 
                                          } ?>
                                         </select>
                                  </div>
                                </div>
                              </div> 
                                      
                              <div class="form-group">
                                <div class="col-md-7">
                                  <label class="col-md-4 control-label" for=
                                  "Gender">Address:</label>
                                      
                                  <div class="col-md-8"> 
                                      
                                     <textarea name="address" id="" cols="30" rows="2" class="form-control" placeholder="Enter address"><?php echo $result['address'];?></textarea>
                                  </div>
                                </div>
                              </div> 
                                      
                                      
                               <div class="form-group">
                                <div class="col-md-7">
                                  <label class="col-md-4 control-label" for=
                                  "CustomerContact">Password:</label>
                                      
                                  <div class="col-md-8">
                                     <input type="password" name="password" class="form-control" placeholder="Enter new password">
                                  </div>
                                </div>
                              </div>   
                                      
                             <div class="form-group">
                                <div class="col-md-7">
                                  <label class="col-md-4 control-label" for=
                                  "CustomerContact"></label>
                                      
                                  <div class="col-md-8">
                                         <input type="submit" value="Save" name="save" class="btn btn-primary py-3 px-5">
                                  </div>
                                </div>
                              </div> 
                                  
                              
                              <div class="form-group">
                                <div class="col-md-7">
                                  <label class="col-md" for=
                                  "CustomerContact" style="margin-left: 4.5rem"> 
                                  <p class="text-danger">
                                    <span class="text-dark">Note: </span>Click image to update your image information! <br>
                                    <span class="text-dark">Note: </span>If you wanna to change password, fill password field! <br>

                                
                                  </p></label>
                                </div>
                              </div>
                                      
                          </div>  
                           </form>  
                                      
                        </div><!--/col-sm-9-->
                    </div><!--/row--> 

                    </div><!--/contanier-->
						
						
					<!-- end: page -->
				</section>
			</div>

			<?php include '../layout/restaurant.sidebar.right.php'; ?>
		</section>
		<script type="text/javascript">
	       function Done(){
	         return confirm("Are you sure?");
	       }
   		</script>

<?php include '../layout/restaurant.footer.php'; ?>


<div class="modal fade" id="logomodal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>

                                    <h4 class="modal-title" id="myModalLabel">Select your new restaurant logo</h4>
                                </div>

                                <form action="./profile.php" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8"> 
                                                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                                                              <input name="MAX_FILE_SIZE" type="hidden" 
                                                              value="1000000"> 
                                                              <input id="image" name="image" type="file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Update Profile</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content-->
                        </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  

<div class="modal fade" id="logomodal1" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type=
                "button">×</button>
                <h4 class="modal-title" id="myModalLabel">Are you sure your QR image?</h4>
            </div>
            <form action="./profile.php" enctype="multipart/form-data" method=
            "post">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="rows">
                            <div class="col-md-12">
                                <div class="rows">
                                    <div class="col-md-8"> 
                                        <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                                          <input name="MAX_FILE_SIZE" type="hidden" 
                                          value="1000000"> 
                                          <input id="image" name="imageqr" type="file">
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type=
                    "button">Close</button> <button class="btn btn-primary"
                    name="saveQrPhoto" type="submit">Update QR</button>
                </div>
            </form>
        </div><!-- /.modal-content-->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->  