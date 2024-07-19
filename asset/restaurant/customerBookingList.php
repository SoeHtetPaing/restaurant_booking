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
							<a href="../../index.php" style="text-decoration: none; color: #0088CC;"><i class="fa-solid fa-arrow-left"></i>&emsp;Back</a><br><br>
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa-caret-down"></a>
									<a href="#" class="fa-times"></a>
								</div>
						
								<h2 class="panel-title">My All Bookings</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="../swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>No</th>
											<th>Transaction Id</th>
											<th>Name</th>
											<th>Phone</th>
											<th>Date</th>
											<th>Time</th>
											<th>Bill</th>
											<th class="hidden-phone">Status</th>
											<th class="hidden-phone">Action</th>
											<th class="hidden-phone">View</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$count = 1;
										$cid = $_SESSION['id'];

										$result = selectBookingByCustomerId($database, $cid);
										foreach ($result as $r) {
										?>
										<tr class="gradeX">
											<td class="center hidden-phone"><?php echo $count; ?></td>
											<td class="center hidden-phone"><?php echo $r['transaction']; ?></td>
											<td><?php echo $r['name']; ?></td>
											<td><?php echo $r['phone']; ?></td>
											<td><?php echo $r['bdate']; ?></td>
											<td><?php echo $r['btime']; ?></td>
											<td><?php echo $r['bill']; ?> Ks</td>
											<td class="center hidden-phone">
												<?php 
													$status = $r['status'];
													if ($status == 0) { ?>
												<p class="text-warning">Pending</p>
												<?php }else if ($status == 1) { ?>
													<p class="text-success">Confirmed</p>
												<?php }else if ($status == 2) { ?>
													<p class="text-danger"><?php echo substr($r["reject_reason"], 0, 20); ?>...</p>
												<?php } else {?>
													<p style="color: #7C3919">Cancel</p>
												<?php } ?>
											</td>
											<td class="center hidden-phone">
												<?php 
													if ($status == 3) { 
														echo "<a href='#' class='btn btn-dark disabled' onclick='if (!Done()) return false; '>&nbsp; Cancelled &nbsp;</a>";
													} else if ($status == 2) { 
														echo "<a href='#' class='btn btn-danger disabled' onclick='if (!Done()) return false; '>&nbsp; Rejected &nbsp;</a>";
													} else {
														echo "<a href='./approveReject.php?action=cancel&bid=".$r["bid"]."' class='btn btn-dark' if (!Done()) return false; '>Cancel</a>";
													}
												?>
											</td>
											<td class="center hidden-phone">
												<a href="customerInvoice.php?rid=<?php echo $r['rid']; ?>&bid=<?php echo $r['bid']; ?>&status=<?php echo $status; ?>&reject=<?php echo $r['reject_reason']; ?>" class="btn btn-primary">View</a>
											</td>
										</tr>
										<?php $count++; } ?>
									</tbody>
								</table>
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