<!-- select-menu.php -->
<?php 
if (isset($_POST['confirm'])) {
  require_once("./asset/database/connection.php");
  require_once("./asset/database/operation.php");

  $rid = $_POST['res_id'];
  $reservation_name = $_POST['reservation_name'];
  $reservation_phone = $_POST['reservation_phone'];
  $reservation_date = $_POST['reservation_date'];
  $reservation_time = $_POST['reservation_time'];

  $restaurant = selectRestaurantById($database, $rid);
?>
<?php require_once("./asset/database/connection.php"); ?>
<?php require_once("./asset/database/creation.php"); ?>
<?php require_once("./asset/database/operation.php"); ?>
  
<?php require_once("./asset/layout/header.php"); ?>

        <div class="my-5 py-5 text-center">
            <h5><span class="text-light">Home/</span><span class="active-link">Booking</span></h5>
            <h1 style="font-family: 'Dancing Script'; color: #fff;">Booking</h1>
        </div>
      </div>
</div>

    <section class="bg-light py-5">
      <div class="container">
	  	<div class="text-center">
          <h6 class="text-muted">Booking</h6>
          <h2>Confirm Your Booking</h2>
        </div>

		<div class="row my-5">
            <div class="col-1"></div>
            
            <div class="col-5">
        		        <h4 class="mb-3">Contact Information</h4>
                        <p class="bg-white rounded py-4 px-3 border">
							Name: <span class="ms-3 text-food"><?php echo $reservation_name; ?></span><br>
							Phone: <span class="ms-3 text-food"><?php echo $reservation_phone; ?></span><br>
							Reservation Date: <span class="ms-3 text-food"><?php echo $reservation_date; ?></span><br>
							Reservation Time: <span class="ms-3 text-food"><?php echo $reservation_time; ?></span><br>
					
						</p>
                        <p class="bg-white rounded py-4 px-3 border">
                            Table No: 
                        <?php for($p = 0; $p < count($_POST["table"]); $p++){
                            $tid = $_POST["table"][$p];
                            $table = selectTableById($database, $tid);
                        ?>  
                        <span class="ms-3 text-food"><?php echo $table['tname']; ?></span>
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

            <div class="col-5">
					<h4 class="mb-3">Menu Item Information</h4>
					<div class="col mb-3 d-flex p-4 border rounded" style="background: white;">
		                <div class="align-self-center" style="width: 100%">
		                	<table style="width: 100%" class="table">
		                		<thead>
		                			<tr>
			                			<th>Image</th>
			                			<th>Menu Name</th>
			                            <th>Unit Price</th>
			                            <th>Quantity</th>
			                            <th>Subtotal</th>
		                			</tr>
		                			
		                		</thead>
		                		<tbody>
		                			<?php 
 										$mqty = $_POST["qty"];
 										$mqty = array_filter($mqty);
										$mqty = array_values($mqty);
		                				$total_price = 0;
										if(count($_POST["menu"]) == count($mqty)) {
		                					for($i = 0; $i < count($_POST["menu"]); $i++){
				                        	$mid = $_POST['menu'][$i];
                                			$qty = $mqty[$i];

				                        	$menu = selectMenuById($database, $mid);
				                        	$total_price = $total_price + ($qty * $menu['price']);
				                    ?> 
				                    <tr>
			                			<td><img style="height: 40px;width: 40px;" src="./asset/upload/<?php echo $menu["photo"]; ?>">
			                			</td>
			                            <td><?php echo $menu['mname']; ?></td>
			                            <td><?php echo $menu['price']; ?></td>
						                <td><?php echo $qty; ?></td>
			                            <td><?php echo $qty * $menu['price']; ?></td>
							        </tr>
					                <?php } } else { echo "<p class='text-danger'>* ကျေးဇူးပြု၍ ၀ယ်ယူမည့် menu ကိုသာအမှန်ရှစ်ပြီး ဝယ်ယူမည့် menu၏ quantity ကိုသာဖြည့်သွင်းပေးပါ</p>"; } ?>
		                		</tbody>
		                	</table>
							<p class="text-end mb-0">Total Price: <span><?php echo $total_price; ?> Ks</span></p>
		                </div>
		            </div>
            </div>
        </div>

        <div class="row my-5 p-3">
			<div class="col-10 mx-auto py-4 border rounded" style="background: white;">
                  <h3 class="text-center">Pay First</h3>
                  <div class="row">
                      <div class="col-md-6" style="text-align: center;">
                        <img style="height: 200px; width: 200px;" src="./asset/upload/<?php echo $restaurant['imageqr']; ?>">
                        <p class="text-center">KBZPay:<span class="fw-bold ms-2"><?php echo $restaurant['phone']; ?></span></p>
                      </div>
                      <div class="col-md-6 mt-3">
                        <h6>Procedure:</h6>
                        <ol>
                          <li>send money</li>
                          <li>look transaction id <span class="text-secondary">eg. 0100347008059471538</span></li>
                          <li>enter transaction id below <i class="fa-solid fa-arrow-down ms-3"></i></li>
                        </ol>

						<form action="./asset/php/insert.php" method="POST">
	            		    <input type="hidden" name="res_id" value="<?php echo $rid; ?>">
	            		    <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
	            		    <input type="hidden" name="reservation_name" value="<?php echo $reservation_name; ?>">
	            		    <input type="hidden" name="reservation_phone" value="<?php echo $reservation_phone; ?>">
	            		    <input type="hidden" name="reservation_date" value="<?php echo $reservation_date; ?>">
	            		    <input type="hidden" name="reservation_time" value="<?php echo $reservation_time; ?>">
	            		    <?php for($r = 0; $r < count($_POST["table"]); $r++){
	            		            $tbl_id = $_POST['table'][$r]; ?>
	            		    <input type="hidden" name="table[]" value="<?php echo $tbl_id; ?>">
	            		    <?php } for($s = 0; $s < count($_POST["chair"]); $s++){ 
	            		            $chr_id = $_POST['chair'][$s]; ?>
	            		    <input type="hidden" name="chair[]" value="<?php echo $chr_id; ?>">
	            		    <?php } ?>
	            		    <?php for($t = 0; $t < count($_POST["menu"]); $t++){ 
	            		            $i_id = $_POST['menu'][$t];
                		          $qty = isset($mqty[$t]);
                		           ?>
	            		    <input type="hidden" name="menu[]" value="<?php echo $i_id; ?>">
                		  <input type="hidden" name="qty[]" value="<?php echo $qty; ?>">
	            		    <?php } ?>
							
							<div class="input-group w-75">
                		  		<input type="text" name="transaction_id" class="form-control" placeholder="Transaction Id" required="">	
								<input type="submit" value="Book" name="book" class="btn btn-warning py-2 px-3">
                			</div>
        				</form>
                      </div>
                  </div>
              </div>
		</div>

      </div>
    </section>
    
<?php require_once("./asset/layout/footer.php") ?>
<?php } ?>