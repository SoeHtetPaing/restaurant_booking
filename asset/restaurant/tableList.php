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
						<h2 style="font-family: 'Dancing Script'; font-size: 20px;">Table List</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./index.php">
										<i class="fa-solid fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Table List</span></li>
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
						
								<h2 class="panel-title">All Tables</h2>
							</header>
							<div class="panel-body">
								<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" data-swf-path="assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf">
									<thead>
										<tr>
											<th>No</th>
											<th>Table Name</th>
											<th class="hidden-phone">Chair</th>
											<th class="hidden-phone">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$count = 1;
										$rid = $_SESSION['id'];
										$result = selectTable($database, $rid);
										foreach ($result as $r) {
										?>
										<tr class="gradeX">
											<td class="center hidden-phone"><?php echo $count; ?></td>
											<td><?php echo $r['tname']; ?></td>
											<td class="center hidden-phone">
												<a href="viewChair.php?tid=<?php echo $r['tid']; ?>&tname=<?php echo $r['tname']; ?>" class="btn btn-info"  onclick="if (!Done()) return false; ">View Chairs</a>
											</td>
											<td class="center hidden-phone">
												<a href="deleteTable.php?tid=<?php echo $r['tid']; ?>" class="btn btn-danger"  onclick="if (!Done()) return false; ">Delete Table</a>
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