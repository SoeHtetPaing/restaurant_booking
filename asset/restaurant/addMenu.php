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
						<h2 style="font-family: 'Dancing Script'; font-size: 20px;">Add Menus</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./index.php">
										<i class="fa-solid fa-home"></i>
									</a>
								</li>
								<li><span>Menus</span></li>
								<li><span>Add</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa-solid fa-chevron-left" style="position: absolute; top: 18px; font-size: 12px;"></i></a>
						</div>
					</header>

                    <!-- start: page -->
                    <div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<form action="./insert.php" method="POST" enctype="multipart/form-data">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa-solid fa-caret-down"></a>
											<a href="#" class="fa-solid fa-times"></a>
										</div>

										<h2 class="panel-title">Menu Item</h2>

										<p class="panel-subtitle"  style="font-size: 15px;">
											For add <code>Menu Item</code> please fill up all field.
										</p>
									</header>
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Menu Name</label>
													<input type="text" name="name" class="form-control" required="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Price</label>
													<input type="text" name="price" class="form-control" required="">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="control-label">Made By</label>
													<textarea class="form-control" name="madeby" rows="1" id="textareaDefault"></textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Select food type</label>
													<select data-plugin-selectTwo class="form-control populate" name="food_type" required="">
														<option value="Main">Main</option>
														<option value="Dessert">Dessert</option>
														<option value="Drink">Drink</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="control-label">Image</label>
													<input type="file" name="image" class="form-control" required="">
												</div>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<input type="submit" name="addMenu" class="btn btn-primary" value="Add Item">
									</footer>
								</section>
							</form>	
						</div>
					</div>
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