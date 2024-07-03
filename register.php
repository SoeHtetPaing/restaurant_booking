<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
<?php require_once("./asset/layout/header.php"); ?>

<div class="my-5 text-center">
    <h5><span class="text-light">Home/</span><span class="active-link">Register</span></h5>
    <h1 class="mt-3" style="font-family: 'Dancing Script'; color: #fff;">Register</h1>
</div>
    <div class="row p-3">
        <div class="col-sm col-lg-6 offset-lg-3 p-5 rounded" style="background-color: rgba(112, 112, 112, 0.5);">
            
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-customer-tab" data-bs-toggle="tab" data-bs-target="#nav-customer" type="button" role="tab" aria-selected="true"><i class="fa-solid fa-cookie-bite me-2"></i>As Customer</button>
              <button class="nav-link" id="nav-restaurant-tab" data-bs-toggle="tab" data-bs-target="#nav-restaurant" type="button" role="tab" aria-selected="false"><i class="fa-solid fa-utensils me-2"></i>As Restaurant</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-customer" role="tabpanel">
          <form action="./asset/php/insert.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group my-3">
                          <input type="text" name="fullname" class="form-control" required="" placeholder="Name">
                        </div>
                        <div class="form-group mb-3">
                          <input type="email" name="email" class="form-control" required="" placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                          <input type="text" name="phone" class="form-control" required="" placeholder="Phone">
                        </div>
                        <div class="form-group mb-3">
                          <textarea name="address" id="" cols="30" rows="2" class="form-control" placeholder="Address"></textarea>
                        </div>
                        <div class="form-group mb-3">
                          <input type="password" name="password" class="form-control" required="" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                          <input type="file" name="image" class="form-control" required="" >
                        </div>
                        <div class="form-group mb-3">
                          <input type="submit" value="Register" name="regascus" class="btn btn-dark">
                        </div>
                      </form>
                      <p class="text-center">For Login <a href="./login.php">Click Here</a> </p>
          </div>
          <div class="tab-pane fade" id="nav-restaurant" role="tabpanel">
          <form action="./asset/php/insert.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group my-3">
                          <input type="text" name="fullname" class="form-control" required="" placeholder="Restaurant Name">
                        </div>
                        <div class="form-group mb-3">
                          <input type="email" name="email" class="form-control" required="" placeholder="Restaurant Email">
                        </div>
                        <div class="form-group mb-3">
                          <input type="text" name="phone" class="form-control" required="" placeholder="Restaurant Phone">
                        </div>
                        <div class="form-group mb-3">
                          <label for="imageqr" class="text-danger">* Essential need KBZ QR</label>
                          <input type="file" name="imageqr" class="form-control" required="" >
                        </div>
                        <div class="form-group mb-3">
                        <select class="form-control" name="area" name="area" required="">
                          <option value="" class="text-muted">Select location :</option>
                          <?php 
                            $locations = selectLocations($database);
                            foreach ($locations as $location) { ?>
                          <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                          <?php    }?>
                        </select>
                        </div>
                        <div class="form-group mb-3">
                          <textarea name="address" id="" cols="30" rows="2" class="form-control" placeholder="Restaurant Address"></textarea>
                        </div>
                        <div class="form-group mb-3">
                          <input type="password" name="password" class="form-control" required="" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                          <input type="file" name="image" class="form-control" required="" >
                        </div>
                        <div class="form-group mb-3">
                          <input type="submit" value="Register" name="regasres" class="btn btn-dark">
                        </div>
                      </form>
                      <p class="text-center">For Login <a href="./login.php">Click Here</a> </p>
          </div>
        </div>
        
        </div>
    </div>
</div>
</div>

<div style="height: 300px; background-image: url('./asset/img/restaurant_icons.png')"></div>

<?php require_once('./asset/layout/footer.php');
