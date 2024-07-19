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
						<h2 style="font-family: 'Dancing Script'; font-size: 20px;">Booking Lists</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="../../index.php">
										<i class="fa-solid fa-home"></i>
									</a>
								</li>
								<li><span>My Bookings</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class=" fa-solid fa-chevron-left" style="position: absolute; top: 18px; font-size: 12px;"></i></a>
						</div>
					</header>

                    <!-- start: page -->

					<section class="panel">
                        <a href="./customerBookingList.php" style="text-decoration: none; color: #0088CC;"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a><br><br>

						<div class="panel-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-4 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-bold">Invoice No.</h2>
											<h4 class="h4 m-none text-dark text-bold">
											#<?php echo $_GET['bid']; ?></h4>
                                            <?php 
                                                $status = $_GET['status'];
                                                $reject = $_GET['reject'];
                                                if ($status == 0) {
                                                    ?>
                                                    <img src="../img/pending.jpg" alt="" style="width: 200px;">
                                                    <?php }else if ($status == 1) { ?>
                                                    <img src="../img/accept.jpg" alt="" style="width: 200px;">
                                                    <?php }else if ($status == 2) { ?>
                                                    <img src="../img/reject.jpg" alt="" style="width: 200px;">
													<?php }else { ?>
                                                    <img src="../img/cancel.jpg" alt="" style="width: 200px;">
                                                    <?php } ?>
										</div>
										<?php
											$rid = $_GET['rid'];

											$result = selectRestaurantById($database, $rid);
										?>
										<div class="col-sm-8 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												<b class="text-capitalize"><?php echo $result['name']; ?></b>
												<br/>
												<?php echo $result['address']; ?>
												<br/>
												Phone: +95 <?php echo substr($result['phone'], 1); ?>
												<br/>
												<?php echo $result['email']; ?>
											</address>
											<div class="ib">
												<img style="width: 100px;height: 100px; border-radius: 10px;" src="../upload/<?php echo $result['logo']; ?>" alt="restaurant-logo" />
											</div>
                                            
                                            <br/>
                                                <?php if ($status == 0) {
                                                    ?>
                                                    <span class="fw-bold text-warning"><?php echo $reject; ?></span>  
                                                    <?php }else if ($status == 1) { ?>
                                                    <span class="fw-bold text-success"><?php echo $reject; ?></span>  
                                                    <?php }else { ?>
                                                    <span class="fw-bold text-danger"><?php echo $reject; ?></span>     
                                                <?php } ?>
										</div>
									</div>
								</header>
								<?php 
									$bid = $_GET['bid'];
                                    $result = selectBookingById($database, $bid);
									$booking_date = $result['bdate'];
									$booking_time = $result['btime'];
									$booking_name = $result['name'];
									$booking_phone = $result['phone'];
                                ?>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">To:</p>
												<address>
													<?php echo $booking_name; ?>
													<br/>
													Phone: +95 <?php echo substr($booking_phone, 1); ?>
												
												</address>
											</div>
										</div>
										<div class="col-md-6">
											<div class="bill-data text-right">
												<p class="mb-none">
													<span class="text-dark">Booking Date:</span>
													<span class="value"><?php echo $booking_date; ?></span>
												</p>
												<p class="mb-none">
													<span class="text-dark">Booking Time:</span>
													<span class="value"><?php echo $booking_time; ?></span>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<p class="h5 mb-xs text-dark text-semibold">Table & chair:</p>
												<address>
													<?php 
													$result = selectBookingChair($database, $bid);
													foreach ($result as $r) {
													?>
													<?php echo $r['cno']; ?>, 
													<?php  } ?>
												</address>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table invoice-items">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-id"     class="text-semibold">#</th>
												<th id="cell-item"   class="text-semibold">Item Name</th>
												<th id="cell-price"  class="text-left text-semibold">Price</th>
												<th id="cell-qty"    class="text-center text-semibold">Quantity</th>
												<th id="cell-total"  class="text-center text-semibold">Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$result = selectBookingMenu($database, $bid);
											$count = 1;
											$grand_total = 0;
											foreach ($result as $r) {
											$grand_total = $grand_total + $r['price'] * $r['qty'];
											?>
											<tr>
												<td><?php echo $count; ?></td>
												<td class="text-semibold text-dark"><?php echo $r['mname']; ?></td>
												<td><?php echo $r['price']; ?> Ks</td>
												<td class="text-center"><?php echo $r['qty']; ?></td>
												<td class="text-center">
												<?php echo $subtotal= $r['price'] * $r['qty']; ?> Ks
												</td>
											</tr>
											<?php $count++; } ?>
										</tbody>
									</table>
								</div>
							
								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													<tr class="h4">
														<td colspan="2">Total Amount</td>
														<td class="text-left"><?php echo $grand_total; ?> Ks</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="text-right mr-lg">	
							</div>
						</div>
					</section>

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