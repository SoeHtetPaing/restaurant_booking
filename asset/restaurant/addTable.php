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
						<h2 style="font-family: 'Dancing Script'; font-size: 20px;">Add Tables</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="./index.php">
										<i class="fa-solid fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
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

										<h2 class="panel-title">Tables</h2>

										<p class="panel-subtitle" style="font-size: 15px;">
                                            Please fill right format: <span class="text-danger">T1C5</span>.<br>
                                            <span class="text-danger">T1C5</span> means <span class="text-danger">Table No.1</span> has <span class="text-danger">5 chairs</span>.<br><br>
                                            Last inserted table: <span class="text-danger">
                                                <?php 
                                                    $rid = $_SESSION["id"];
                                                    // $rid = 0;
                                                    $table = selectLastInsertTable($database, $rid);

                                                    if ($table == null) {
                                                        echo "No table insert!";
                                                    } else {
                                                        echo $table["tname"];
                                                    }
                                                ?>
                                            </span>
										</p>
									</header>
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="control-label">Enter table name follow above rule</label>
													<input type="text" name="tablename" class="form-control" required="" placeholder="Eg: T1C5">
												</div>
											</div>
										</div>
									</div>
									<footer class="panel-footer">
										<input type="submit" name="addtable" class="btn btn-primary" value="Add Table">
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