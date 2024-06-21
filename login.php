<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php 
  if (isset($_POST['login'])) {
    
  $email = $_POST['email'];
  $password = $_POST['password'];

  $error='<label for="promter" class="form-label"></label>';

  $result= selectUserRoleByEmail($database, $email);
    if($result!=null){
        $utype=$result["urole"];
        if ($utype=='c'){
            $customer = selectCustomerByEmail($database, $email);
            $password_check = password_verify($password, $customer["password"]);
            if ($password_check){
                
                saveSessionData($customer);
                
                header('location: ./index.php');

            }else{
                $error='<label for="promter" class="form-label fw-bold" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid password</label>';
            }

        }elseif($utype=='r'){
            $restaurant = selectRestaurantByEmail($database, $email);
            $password_check = password_verify($password, $restaurant["password"]);
            if ($password_check){
                saveSessionData($restaurant);
                
                header('location: ./asset/restaurant/index.php');

            }else{
                $error='<label for="promter" class="form-label fw-bold" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid password</label>';
            }


        }
        
    }else{
        $error='<label for="promter" class="form-label fw-bold" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
    }
    
}else{
    $error='<label for="promter" class="form-label">&nbsp;</label>';
}

function saveSessionData ($data) {
        $_SESSION['isLoggedIn'] = true;

        $_SESSION['id'] = $data['id'];
        $_SESSION['name'] = $data['name'];   
        $_SESSION['phone'] = $data['phone'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
  
}

?>

<?php require_once("./asset/layout/header.php"); ?>

<div class="my-5 text-center">
    <h5><span class="text-light">Home/</span><span class="active-link">Login</span></h5>
    <h1 class="mt-3" style="font-family: 'Dancing Script'; color: #fff;">Login</h1>
</div>
    <div class="row p-3">
        <div class="col-sm col-lg-6 offset-lg-3 p-5 rounded" style="background-color: rgba(112, 112, 112, 0.5);">
            <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group mb-3">
                                        <?php echo $error ?>
                                    </div>
					              <div class="form-group mb-3">
					                <input type="email" name="email" class="form-control" required="" placeholder="Email">
					              </div>
					              <div class="form-group mb-3">
					                <input type="password" name="password" class="form-control" required="" placeholder="Password">
					              </div>
					              <div class="form-group mb-3">
					                <input type="submit" value="Login" name="login" class="btn btn-dark">
					              </div>
					            </form>
                      <p class="text-center">For Register <a href="./register.php">Click Here.</a> </p>
        </div>
    </div>
</div>

<?php require_once('./asset/layout/footer.php');

