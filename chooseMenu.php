<?php 
if (isset($_POST['selectChair'])) {
  $rid = $_POST['res_id'];
  $reservation_name = $_POST['reservation_name'];
  $reservation_phone = $_POST['reservation_phone'];
  $reservation_date = $_POST['reservation_date'];
  $reservation_time = $_POST['reservation_time'];
?>

<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/creation.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
  
<?php require_once("./asset/layout/header.php"); ?>

        <div class="my-5 py-5 text-center">
            <h5><span class="text-light">Home/</span><span class="active-link">Menus</span></h5>
            <h1 style="font-family: 'Dancing Script'; color: #fff;">Our Exclusive Menu</h1>
        </div>
      </div>
</div>

    <form action="./booking.php" method="POST">
    <section class="bg-light py-5">
      <div class="container">
        <div class="text-center">
          <h6 class="text-muted">Our Menus</h6>
          <h2>Discover Our Exclusive Menu</h2>
        </div>

        <div class="row my-5">
            <div class="col-1"></div>
            
            <div class="col-6">
                <ul class="nav nav-pills nav-fill w-75 mx-auto">
                    <li class="nav-item me-1">
                      <a class="nav-link fs-6 py-3 active" id="fill-tab-0" data-bs-toggle="pill" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"><i class="fa-solid fa-pizza-slice fa-lg me-3" style="color: #fbe183;"></i>Main</a>
                    </li>
                    <li class="nav-item me-1">
                      <a class="nav-link fs-6 py-3" id="fill-tab-0" data-bs-toggle="pill" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="true"><i class="fa-solid fa-ice-cream fa-lg me-3" style="color: #adf5df;"></i>Dessert</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link fs-6 py-3" id="fill-tab-0" data-bs-toggle="pill" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="true"><i class="fa-solid fa-champagne-glasses fa-lg me-3" style="color: #e6e4ec;"></i>Drink</a>
                    </li>
                </ul>

                <div class="tab-content my-3" id="tab-content">
                  <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
                    <?php 
                        $menus = selectMenuByRestaurant($database, "Main", $rid);

                        foreach ($menus as $menu) {
                            echo '

                            <div class="menu-list rounded p-2 px-3 d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <div class="rounded-circle" style="width: 80px; height: 80px; background-image: url(./asset/upload/'.$menu["photo"].'); background-size: cover; background-position: center;"></div>
                                    <div class="ms-3 pt-2">
                                        <h5>'.$menu["mname"].'</h5>
                                        <p class="text-black-50">Madeby: '.$menu["madeby"].'</p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <h5>'.$menu["price"].' Ks <input type="checkbox" name="menu[]" value="'.$menu["mid"].'" id="menu[]"  class="menu ms-2"></h5>
                                    <input type="number" name="qty[]" min="1"  style="width: 90px;">    
                                </div>
                            </div>
                        ';
                        }
                    
                    ?>
                  </div>
                  <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
                  <?php 
                        $menus = selectMenuByRestaurant($database, "Dessert", $rid);
                    
                        foreach ($menus as $menu) {
                            echo '

                            <div class="menu-list rounded p-2 px-3 d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <div class="rounded-circle" style="width: 80px; height: 80px; background-image: url(./asset/upload/'.$menu["photo"].'); background-size: cover; background-position: center;"></div>
                                    <div class="ms-3 pt-2">
                                        <h5>'.$menu["mname"].'</h5>
                                        <p class="text-black-50">Madeby: '.$menu["madeby"].'</p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <h5>'.$menu["price"].' Ks <input type="checkbox" name="menu[]" value="'.$menu["mid"].'" id="menu[]"  class="menu ms-2"></h5>
                                    <input type="number" name="qty[]" min="1"  style="width: 90px;">    
                                </div>
                            </div>
                        ';
                        }
                    
                    ?>
                  </div>
                  <div class="tab-pane" id="fill-tabpanel-2" role="tabpanel" aria-labelledby="fill-tab-2">
                  <?php 
                        $menus = selectMenuByRestaurant($database, "Drink", $rid);
                    
                        foreach ($menus as $menu) {
                            echo '

                            <div class="menu-list rounded p-2 px-3 d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <div class="rounded-circle" style="width: 80px; height: 80px; background-image: url(./asset/upload/'.$menu["photo"].'); background-size: cover; background-position: center;"></div>
                                    <div class="ms-3 pt-2">
                                        <h5>'.$menu["mname"].'</h5>
                                        <p class="text-black-50">Madeby: '.$menu["madeby"].'</p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <h5>'.$menu["price"].' Ks <input type="checkbox" name="menu[]" value="'.$menu["mid"].'" id="menu[]"  class="menu ms-2"></h5>
                                    <input type="number" name="qty[]" min="1"  style="width: 90px;">    
                                </div>
                            </div>
                        ';
                        }
                    
                    ?>
                  </div>
                </div>
            </div>

            <div class="col-4">
                    <div class="p-3">
        		        <h4 class="mb-3">Booking Information</h4>
                        <p class="bg-white rounded py-4 px-3 border">Reservation Date: <span class="ms-3 text-food"><?php echo $reservation_date; ?></span></p>
                        <p class="bg-white rounded py-4 px-3 border">Reservation Time: <span class="ms-3 text-food"><?php echo $reservation_time; ?></span></p>
                        <p class="bg-white rounded py-4 px-3 border">
                            Table No: 
                        <?php for($p = 0; $p < count($_POST["table"]); $p++){
                            $tid = $_POST["table"][$p];
                            $table = selectTableById($database, $tid);
                        ?>  
                        <span class="ms-3 text-food"><?php echo $table["tname"]; ?></span>
                      <?php } ?>
                            <br>
                            Chair No: 
                        <?php for($q = 0; $q < count($_POST["chair"]); $q++){
                            $cid = $_POST["chair"][$q];
                            $chair = selectChairById($database, $cid);
                        ?> 
                        <span class="ms-3 text-food"><?php echo $chair['cno']; ?></span>
                       <?php } ?>
                        </p>                        
                    </div>
            </div>
        </div>

        <div class="col-lg-12" style="text-align: center;">
                <input type="hidden" name="res_id" value="<?php echo $rid; ?>">
                <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
                <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
                <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
                <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
                <?php for($r = 0; $r < count($_POST["table"]); $r++){
                        $tid = $_POST["table"][$r]; ?>
                <input type="hidden" name="table[]" value="<?php echo $tid; ?>">
                <?php } for($s = 0; $s < count($_POST["chair"]); $s++){ 
                        $cid = $_POST["chair"][$s]; ?>
                <input type="hidden" name="chair[]" value="<?php echo $cid; ?>">
                <?php } ?>
                <p style="display: none" id="confirm"><input type="submit" value="Confirm" name="confirm" class="btn btn-warning py-2 px-5" ></p>
                
        </div>



      </div>
    </section>
    </form>

<?php require_once("./asset/layout/footer.php") ?>

<?php } ?>

<script type="text/javascript">
 
$(document).ready(function(){
  $('input[type="checkbox"]').click(function(){
      // alert($('.menu:checked').length);

     var btnconfirm = document.getElementById("confirm");
     var maxchecked = $('.menu:checked').length;
     // alert(maxchecked) 
      if (maxchecked > 0 ) {
         btnconfirm.style.display = "block";
      } else {
         btnconfirm.style.display = "none";
      } 


  });
});

 </script>