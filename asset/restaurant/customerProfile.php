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
				<?php include '../layout/customer.sidebar.left.php'; ?>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header" style="background-color: #374151;">
						<h2 style="font-family: 'Dancing Script'; font-size: 20px;">Modify Account</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="../../index.php">
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
							      <a href="../../index.php" style="text-decoration: none; color: #0088CC;"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a><br><br>

            
                    <?php

                    // SELECT `id`, `restaurent_name`, `email`, `phone`, `address`, `location`, `logo`, `password`, `bkashnumber`, `approve_status`, `role` FROM `restaurant_info` WHERE 1

                    $cid = $_SESSION['id'];

                    // echo $cid;

                    $result = selectCustomerById($database, $cid);
                    // var_dump($result);


                    if (isset($_POST['save'])) {
                      # code...
                      $name = $_POST['fullname'];
                      $email = $_POST['email'];
                      $phone = $_POST['phone'];
                      $address = $_POST['address'];
                      $password = $_POST['password'];

                      if($_POST["password"] == null) {
                        $sql = "update customer set name='$name', email='$email', phone='$phone', address='$address' where id='$cid';";
                      } else {
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "update customer set name='$name', email='$email', phone='$phone', address='$address', password='$password' where id='$cid';";
                      }

                      $success = updateRestaurant($database, $sql);
                      if ($success) {
                        $_SESSION['name'] = $name;
                        $_SESSION['email'] = $email;
                        
                        # code...
                        echo '<script>alert("Accounts has been updated.")</script>';
                        echo '<script>window.location="./customerProfile.php"</script>';
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

                            $sql = "update customer set img='$file_name' where id='$cid';";
                            $success = updateRestaurant($database, $sql);

                            if ($success) {
                                $_SESSION["image"] = $file_name;
                                echo '<script>alert("Profile image has been updated")</script>';
                                echo '<script>window.location="./customerProfile.php"</script>';
                            }
                          
                        }else{
                          echo '<script>alert("Required JPG,PNG,GIF in Logo Field.")</script>';
                            echo '<script>window.location="./customerProfile.php"</script>';
                        }
                    }

                     ?>

                    <div class="contanier"> 
                    <div class="row">

                        <div class="col-lg-3"><!--left col-->
                           <div class="panel panel-default">            
                                <div class="panel-body"> 
                                    <div  id="image-container " class="stretch">
                                        <img src="../upload/<?php echo $result['img'] ?>" alt="customer-pp" data-target="#logomodal"  data-toggle="modal" title="Click image to update your logo">
                                    </div>
                                </div>
                                <ul class="list-group">


                                    <li class="list-group-item text-muted">Profile</li> 
                                    <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span> 
                                        <?php echo $result['name']; ?> 
                                    </li>

                                </ul>   

                          <!-- /.box -->
                            </div>

                          

                        </div> 
                        
                        <div class="col-lg-9"> 
                    <form class="form-horizontal" method="POST" action="./customerProfile.php">  
                      <div class="row">    

                              <div class="form-group">
                                <div class="col-md-7">
                                <label class="col-md-4 control-label" for=
                                  "Fname">Customer Name:</label>

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
                                         <input type="submit" value="Update" name="save" class="btn btn-primary py-3 px-5">
                                  </div>
                                </div>
                              </div> 

                              <div class="form-group">
                                <div class="col-md-7">
                                  <label class="col-md" for=
                                  "CustomerContact" style="margin-left: 4.5rem"> 
                                  <p class="text-danger">
                                    <span class="text-dark">Note: </span>Click image to update your profile! <br>
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

                                <form action="./customerProfile.php" enctype="multipart/form-data" method=
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