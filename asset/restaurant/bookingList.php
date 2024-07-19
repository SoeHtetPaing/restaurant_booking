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
						<h2 style="font-family: 'Dancing Script'; font-size: 20px;">Booking Lists</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./index.php">
										<i class="fa-solid fa-home"></i>
									</a>
								</li>
								<li><span>Bookings</span></li>
								<li><span>Booking List</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa-solid fa-chevron-left" style="position: absolute; top: 18px; font-size: 12px;"></i></a>
						</div>
					</header>

					<!-- start: page -->
						
						
						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa-solid fa-caret-down"></a>
									<a href="#" class="fa-solid fa-times"></a>
								</div>
						
								<h2 class="panel-title">All Bookings</h2>
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
										$rid = $_SESSION['id'];

										$result = selectBookingByRestaurantId($database, $rid);
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
													$permission = "";
													if ($status == 0) { ?>
												<p class="text-warning">Pending</p>
												<?php }else if ($status == 1) { ?>
													<p class="text-success">Confirmed</p>
												<?php }else if ($status == 2) { ?>
													<p class="text-danger">Reject</p>
												<?php } else {
													$permission = "disabled";
												?>
													<p style="color: #7C3919">Cancel</p>
												<?php } ?>
											</td>
											<td class="center hidden-phone">
												<?php 
													if ($status == 1) { 
														echo "<a href='./approveReject.php?action=reject&bid=".$r["bid"]."' class='btn btn-danger ".$permission."' onclick='if (!Done()) return false; '>&nbsp; Reject &nbsp;</a>";
													} else {
														echo "<a href='./approveReject.php?action=approve&bid=".$r["bid"]."' class='btn btn-success ".$permission."' onclick='if (!Done()) return false; '>Confirm</a>";
													}
												?>
											</td>
											<td class="center hidden-phone">
												<a href="invoice.php?bid=<?php echo $r['bid']; ?>&status=<?php echo $status; ?>&reject=<?php echo $r['reject_reason']; ?>" class="btn btn-primary">View</a>
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