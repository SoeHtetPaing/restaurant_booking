  <?php require_once("./asset/database/connection.php"); ?>
  <?php require_once("./asset/database/creation.php"); ?>
  <?php require_once("./asset/database/operation.php"); ?>

  <?php 
  if (isset($_POST['area'])) {
    $area_id = $_POST['area'];

    $location = selectLocationById($database, $area_id);
  }
  ?>
  
  <?php require_once("./asset/layout/header.php"); ?>

          <div class="my-5 py-5 text-center">
            <h5><span class="text-light">Home/</span><span class="active-link">Restaurants</span></h5>
            <h1 style="font-family: 'Dancing Script'; color: #fff;">Restaurants in <?php echo $location["name"]; ?></h1>
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

      <div class="bg-light py-5" id="target">
        <div class="text-center">
          <h6 class="text-muted">Our Restaurants</h6>
          <h2>Discover Our Exclusive Restaurants</h2>
        </div>

        <div class="col-sm col-lg-6 offset-lg-3 my-5">
        <ul class="nav nav-pills nav-fill w-25 mx-auto">
            <li class="nav-item me-1">
              <a class="nav-link fs-6 py-3 active" id="fill-tab-0" data-bs-toggle="pill" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"><i class="fa-solid fa-cookie-bite fa-lg me-3" style="color: #fbe183;"></i>Main</a>
            </li>
        </ul>
        <div class="tab-content my-3" id="tab-content">
          <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
            <?php 
                $restaurants = selectRestaurantByLocation($database, $area_id);

                foreach ($restaurants as $restaurant) {
                    echo '
                                
                    <div class="menu-list rounded p-2 px-3 d-flex justify-content-between mb-3">
                        <div class="d-flex">
                            <div class="rounded-circle" style="width: 80px; height: 80px; background-image: url(./asset/upload/'.$restaurant["logo"].'); background-size: cover; background-position: center;"></div>
                            <div class="ms-3 pt-2">
                                <h5>'.$restaurant["name"].'</h5>
                                <p class="text-black-50">'.$restaurant["address"].'</p>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="./bookTable.php?rid='.$restaurant["id"].'"><button class="btn btn-success">Book Table</button></a>
                        </div>
                    </div>
                ';
                }
            
            ?>
          </div>
        </div>
    </div>
      </div>

  <?php require_once('./asset/layout/footer.php'); ?>