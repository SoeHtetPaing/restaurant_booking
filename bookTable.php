<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/creation.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>

  <?php
    if (!isset($_SESSION['isLoggedIn'])) {
    echo '<script>alert("You need to login first.")</script>';
    echo '<script>window.location="./login.php"</script>';
    }

  if (isset($_GET['rid'])) {
    $rid = $_GET['rid'];
  }
  ?>
  
  <?php require_once("./asset/layout/header.php"); ?>
          <div class="my-5 py-5 text-center">
            <h5><span class="text-light">Home/</span><span class="active-link">Table Booking</span></h5>
            <h1 style="font-family: 'Dancing Script'; color: #fff;">Table Booking</h1>
          </div>
          <div class="row p-3">
          <div class="col-sm col-lg-6 offset-lg-3 p-3 rounded" style="background-color: rgba(112, 112, 112, 0.5);">
          <form action="./searchRestaurant.php" method="POST">
                  <div class="text-center">
                      <span style="font-size: 20px; color: #000">Location</span>
                      <select name="area" name="area" required=""  style="cursor: pointer;" class="form-control-sm">
                          <option value="" class="text-muted">Select :</option>
                          <?php 
                              $locations = selectLocations($database);
                              foreach ($locations as $location) { ?>
                          <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                          <?php    }?>
                      </select>
                      <button class="btn btn-sm btn-dark" type="submit"><i class="fa-solid fa-search"></i></button>
                  </div>  
                </form>
          </div>
          </div>
      </div>
</div>

<div class="bg-light py-5">
        <div class="text-center">
          <h2>Choose a Booking Date and Time</h2>
        </div>

        <?php 
            $restaurant = selectRestaurantById($database, $rid);
        ?>

        <div class="col-sm col-lg-6 offset-lg-3 my-5">
                                
        <div class="row d-flex">
          <div class="col-md-4 ftco-animate img rounded" style="background-image: url(./asset/upload/<?php echo $restaurant["logo"]; ?>); background-size: cover; background-position: center;"></div>
          <div class="col-md-8 ftco-animate makereservation p-5 bg-light">
            
            <form action="./chooseTable.php" method="POST">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="reservation_name" class="form-control" placeholder="Your Name" required="" value="<?php echo $_SESSION['name'];?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="reservation_phone" class="form-control" placeholder="Phone" required="" value="<?php echo $_SESSION['phone'];?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" name="reservation_date" class="form-control" placeholder="Date" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Time</label>
                    <select name="reservation_time" class="form-control" placeholder="Time" required="">
                      <option value="10:00am">10:00am</option>
                      <option value="10:45am">10:45am</option>
                      <option value="11:30am">11:30am</option>
                      <option value="12:15pm">12:15pm</option>
                      <option value="1:15pm">1:15pm</option>
                      <option value="2:15pm">2:15pm</option>
                      <option value="3:15pm">3:15pm</option>
                      <option value="4:15pm">4:15pm</option>
                      <option value="5:15pm">5:15pm</option>
                      <option value="6:15pm">6:15pm</option>
                      <option value="7:15pm">7:15pm</option>
                      <option value="8:00pm">8:00pm</option>
                      <option value="8:45pm">8:45pm</option>
                      <option value="9:30pm">9:30pm</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-12 mt-3">
                  <div class="form-group">
                    <input type="hidden" name="rid" value="<?php echo $rid; ?>">
                    <input type="submit" name="reservation" value="Submit" class="btn btn-warning py-2 px-5">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        </div>
</div>

<?php require_once('./asset/layout/footer.php'); ?>